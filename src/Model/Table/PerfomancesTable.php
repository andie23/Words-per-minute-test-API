<?php
namespace App\Model\Table;

use App\Model\Entity\Perfomance;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Log\Log;

/**
 * Perfomances Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Challenges
 * @property \Cake\ORM\Association\BelongsTo $Participants
 */
class PerfomancesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('perfomances');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Challenges', [
            'foreignKey' => 'challenge_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Participants', [
            'foreignKey' => 'participant_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('net_wpm', 'valid', ['rule' => 'numeric'])
            ->requirePresence('net_wpm', 'create')
            ->notEmpty('net_wpm');

        $validator
            ->add('gross_wpm', 'valid', ['rule' => 'numeric'])
            ->requirePresence('gross_wpm', 'create')
            ->notEmpty('gross_wpm');

        $validator
            ->add('accuracy', 'valid', ['rule' => 'numeric'])
            ->requirePresence('accuracy', 'create')
            ->notEmpty('accuracy');

        $validator
            ->add('correct_words', 'valid', ['rule' => 'numeric'])
            ->requirePresence('correct_words', 'create')
            ->notEmpty('correct_words');

        $validator
            ->add('incorrect_words', 'valid', ['rule' => 'numeric'])
            ->requirePresence('incorrect_words', 'create')
            ->notEmpty('incorrect_words');

        $validator
            ->requirePresence('typed_list', 'create')
            ->notEmpty('typed_list');

        $validator
            ->requirePresence('mistake_list', 'create')
            ->notEmpty('mistake_list');

        $validator
            ->add('minutes', 'valid', ['rule' => 'decimal'])
            ->requirePresence('minutes', 'create')
            ->notEmpty('minutes');

        $validator
            ->add('is_time_out', 'valid', ['rule' => 'boolean'])
            ->requirePresence('is_time_out', 'create')
            ->notEmpty('is_time_out');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['challenge_id'], 'Challenges'));
        $rules->add($rules->existsIn(['participant_id'], 'Participants'));
        return $rules;
    }

    public function log($data)
    {
        $challengeTimeLimit = $this->Challenges->get($data['challenge_id'])->time_limit;
        $data['participant_id'] = $this->Participants->getIDFromRefCode($data['code']);
        $data['mistake_list'] = json_encode($data['mistake_list']);
        $data['typed_list'] = json_encode($data['typed_list']);
        $data['score'] = $this->calculateScore(
            $data['net_wpm'], $data['accuracy'], $data['incorrect_words'], $data['seconds'],
            $challengeTimeLimit, $data['is_time_out']
        );
        $perfomanceEntity = $this->newEntity($data);
        if ($this->save($perfomanceEntity)){
            return $perfomanceEntity;
        }
        return [];
    }

    /**
     * Score algorithm
     *  Quick Notes:
     *      - The higher the WPM(Words per minute), the better.
     *      - The higher the Accuracy, the better.
     *      - Add WPM and accuracy to get base score (WPM + Accuracy = points)
     *      - Time Bonus points are awarded by getting the modulus of timelimit and minutes completed
     *        multiplied by 60 ((timeLimit\minutesCompleted) * 60 = points) 
     *      - A timeout has a penalty of 60 points (score - penalty)
     *      - Words with errors are multiplied by 5 to get the penalty.
     *        We're multiplying by 5 assuming 5 characters were messed up with each
     *        word (regardless whether 1 character is off)
     */
    public function calculateScore($wpm, $accuracy, $errors, $secondsCompleted, $timeLimitInMinutes, $isTimeout){
        $timeLimitInSeconds = $timeLimitInMinutes * 60;
        $timeScore = ($timeLimitInSeconds % $secondsCompleted)  * 2;
        $inCorrectWordsPenalty = $errors * 5;
        $timeoutPenalty = 0;

        if($isTimeout == 1){
            $timeoutPenalty = $timeLimitInSeconds;
        }
        
        $baseScore = $timeScore + $accuracy + $wpm;
        $errorPenalty = $timeoutPenalty + $inCorrectWordsPenalty;
        $finalScore = $baseScore - $errorPenalty;
        Log::write('info', __('Time Score: {0} % {1} * 2 = {2}',  $timeLimitInSeconds, $secondsCompleted, $timeScore));
        Log::write('info', __('Incorrect Words Penalty: {0} * 5 = {1}', $errors, $inCorrectWordsPenalty));
        Log::write('info', __('Timeout penalty: {0}', $timeoutPenalty));
        Log::write('info', __('Base Score: {0} + {1} + {2} = {3}', $timeScore, $accuracy, $wpm, $baseScore));
        Log::write('info', __('Error Penalty: {0}', $errorPenalty));
        Log::write('info', __('Final Score: {0}', $finalScore));
        return $finalScore >= 1 ? $finalScore : 0;
    }

    public function getAvgChallengePerfomancesById($id){
        return $this->find()
                    ->select([
                       'id' => 'Perfomances.id',
                       'score' => 'avg(score)',
                       'participant' => 'Participants.fullname',
                       'wpm' => 'avg(net_wpm)',
                       'accuracy' => 'avg(accuracy)',
                       'errors' => 'avg(incorrect_words)',
                       'minutes' => 'avg(minutes)',
                       'timeout' => 'avg(is_time_out)'
                    ])
                    ->contain('Participants')
                    ->where([
                        'challenge_id' => $id
                    ])
                    ->group('participant_id')
                    ->order(['score' => 'desc']);
    }
}

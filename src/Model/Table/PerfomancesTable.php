<?php
namespace App\Model\Table;

use App\Model\Entity\Perfomance;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

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
        $data['participant_id'] = $this->Participants->getIDFromRefCode($data['code']);
        $data['mistake_list'] = json_encode($data['mistake_list']);
        $data['typed_list'] = json_encode($data['typed_list']);

        $perfomanceEntity = $this->newEntity($data);

        return $this->save($perfomanceEntity);
    }
}

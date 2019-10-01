<?php
namespace App\Model\Table;

use App\Model\Entity\Challenge;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Lib\ArrayEntityBuilder;

/**
 * Challenges Model
 *
 * @property \Cake\ORM\Association\HasMany $Perfomances
 */
class ChallengesTable extends Table
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

        $this->table('challenges');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Perfomances', [
            'foreignKey' => 'challenge_id'
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
            ->add('time_limit', 'valid', ['rule' => 'numeric'])
            ->requirePresence('time_limit', 'create')
            ->notEmpty('time_limit');

        $validator
            ->requirePresence('paragraph', 'create')
            ->notEmpty('paragraph');

        $validator
            ->add('is_active', 'valid', ['rule' => 'boolean'])
            ->requirePresence('is_active', 'create')
            ->notEmpty('is_active');

        $validator
            ->add('created_by', 'valid', ['rule' => 'numeric'])
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        return $validator;
    }

    public function getActiveChallenge()
    {
        return $this->find()
                    ->where(['is_active' => 1])
                    ->first();
    }

    public function setStatus($challenge, $state){
        $entity = $this->patchEntity($challenge, ['is_active' => $state]);
        if ($this->save($entity)){
            return $challenge;
        }
        return [];
    }

    public function setActive($id){
       $activeChallenge = $this->getActiveChallenge();
       if ($activeChallenge){
            $this->setStatus($activeChallenge, 0);
       }
       return $this->setStatus($this->get($id), 1);
    }

    public function setRandomPassageAsActive(){
        $builder = new ArrayEntityBuilder();
        $challenges = $builder->buildNumericIndexedAssocArray($this->find()->all());
        $count = count($challenges);
        
        if ($count <= 1) {
            return True;
        }

        if ($challenges){
            $choosenChallenge = $challenges[rand(0, $count-1)];
            return $this->setActive($choosenChallenge->id, 1);
        }
        return False;
    }
}

<?php
namespace App\Model\Table;

use App\Model\Entity\Score;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Scores Model
 *
 */
class ScoresTable extends Table
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

        $this->table('scores');

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
            ->requirePresence('participant', 'create')
            ->notEmpty('participant');

        $validator
            ->add('points', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('points');

        $validator
            ->add('wpm', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('wpm');

        $validator
            ->add('accuracy', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('accuracy');

        $validator
            ->add('time', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('time');

        return $validator;
    }
}

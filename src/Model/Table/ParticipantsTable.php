<?php
namespace App\Model\Table;

use App\Model\Entity\Participant;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Participants Model
 *
 * @property \Cake\ORM\Association\HasMany $Perfomances
 */
class ParticipantsTable extends Table
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

        $this->table('participants');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Perfomances', [
            'foreignKey' => 'participant_id'
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
            ->allowEmpty('code')
            ->add('code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('fullname', 'create')
            ->notEmpty('fullname');

        return $validator;
    }
    public function getAllFromRefCode($code){
        $query = $this->find()
                      ->where(['code'=>$code])
                      ->hydrate(False)
                      ->first();
        return $query;
    }   

    public function verify($code){
        $query = $this->find()->where(['code' => $code]);
        if ($query->count() >=1 and $query->first()->is_active == 1){
            return True;
        }
        return False;
    }
    public function getIDFromRefCode($refCode)
    {
        $query = $this->find()
                      ->where(['code' => $refCode])
                      ->first();
        return $query->id;
    }

    public function setAccess($id, $bool)
    {
       return $this->save(
            $this->patchEntity(
                $this->get($id), ['is_active' => $bool]
            )
        );
    }
}

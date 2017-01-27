<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/*
 * Organizers Model
 */
class OrganizersTable extends Table
{

    /*
     * Initialize method
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('organizers');
        $this->displayField('nome_organizador');
        $this->primaryKey('id');
        $this->hasMany('Events');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nome_organizador', 'create')
            ->notEmpty('nome_organizador');

        $validator
            ->requirePresence('nome_empresa', 'create')
            ->notEmpty('nome_empresa');

        return $validator;
    }
}

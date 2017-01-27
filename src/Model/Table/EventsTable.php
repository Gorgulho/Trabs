<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/*
 * Eventos Model
 */
class EventsTable extends Table
{

    /*
     * Initialize method
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('events');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Organizers');
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
            ->requirePresence('nome_evento', 'create')
            ->notEmpty('nome_evento');

        $validator
            ->requirePresence('tipo_evento', 'create')
            ->notEmpty('tipo_evento');

        $validator
            ->date('data_evento')
            ->requirePresence('data_evento', 'create')
            ->notEmpty('data_evento');

        $validator
            ->time('hora_evento')
            ->requirePresence('hora_evento', 'create')
            ->notEmpty('hora_evento');

        $validator
            ->integer('organizacao_id')
            ->requirePresence('organizer_id', 'create')
            ->notEmpty('organizer_id');

        return $validator;
    }
}

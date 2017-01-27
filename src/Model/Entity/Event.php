<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evento Entity
 *
 * @property int $Evento_ID
 * @property string $Nome_Evento
 * @property string $Tipo_Evento
 * @property \Cake\I18n\Time $Data_Evento
 * @property \Cake\I18n\Time $Hora_Evento
 * @property int $Organizacao_ID
 */
class Event extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}

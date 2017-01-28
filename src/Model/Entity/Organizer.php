<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Organizer extends Entity
{

    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}

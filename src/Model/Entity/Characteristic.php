<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Characteristic extends Entity
{
    protected $_accessible = [
        'characteristic' => true,
        'created' => true,
        'modified' => true,
        'users' => true,
    ];
}

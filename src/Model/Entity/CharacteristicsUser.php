<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class CharacteristicsUser extends Entity
{
    protected $_accessible = [
        'characteristic_id' => true,
        'user_id' => true,
        'characteristic' => true,
        'user' => true,
    ];
}

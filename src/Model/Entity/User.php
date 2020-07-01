<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = [
        'name' => true,
        'created' => true,
        'modified' => true,
        'characteristics' => true,
    ];
}

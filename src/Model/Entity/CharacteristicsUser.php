<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CharacteristicsUser Entity
 *
 * @property int $id
 * @property int $characteristic_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Characteristic $characteristic
 * @property \App\Model\Entity\User $user
 */
class CharacteristicsUser extends Entity
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
        'characteristic_id' => true,
        'user_id' => true,
        'characteristic' => true,
        'user' => true,
    ];
}

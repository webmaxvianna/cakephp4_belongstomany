<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CharacteristicsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('characteristics');
        $this->setDisplayField('characteristic');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Users', [
            'foreignKey' => 'characteristic_id',
            'targetForeignKey' => 'user_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
            'joinTable' => 'characteristics_users',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('characteristic')
            ->maxLength('characteristic', 255)
            ->requirePresence('characteristic', 'create')
            ->notEmptyString('characteristic');

        return $validator;
    }
}

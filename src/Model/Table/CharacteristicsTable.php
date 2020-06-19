<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Characteristics Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Characteristic newEmptyEntity()
 * @method \App\Model\Entity\Characteristic newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Characteristic[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Characteristic get($primaryKey, $options = [])
 * @method \App\Model\Entity\Characteristic findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Characteristic patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Characteristic[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Characteristic|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Characteristic saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Characteristic[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Characteristic[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Characteristic[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Characteristic[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CharacteristicsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
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

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
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

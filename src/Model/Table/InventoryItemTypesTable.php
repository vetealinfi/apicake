<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InventoryItemTypes Model
 *
 * @property \App\Model\Table\InventoryItemsTable&\Cake\ORM\Association\HasMany $InventoryItems
 *
 * @method \App\Model\Entity\InventoryItemType newEmptyEntity()
 * @method \App\Model\Entity\InventoryItemType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\InventoryItemType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InventoryItemType get($primaryKey, $options = [])
 * @method \App\Model\Entity\InventoryItemType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\InventoryItemType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InventoryItemType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\InventoryItemType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InventoryItemType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InventoryItemType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\InventoryItemType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\InventoryItemType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\InventoryItemType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InventoryItemTypesTable extends Table
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

        $this->setTable('inventory_item_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('InventoryItems', [
            'foreignKey' => 'inventory_item_type_id',
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
            ->scalar('name')
            ->maxLength('name', 200)
            ->allowEmptyString('name');

        return $validator;
    }
}

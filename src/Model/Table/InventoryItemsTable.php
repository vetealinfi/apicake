<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InventoryItems Model
 *
 * @property \App\Model\Table\InventoryItemTypesTable&\Cake\ORM\Association\BelongsTo $InventoryItemTypes
 * @property \App\Model\Table\InventoriesTable&\Cake\ORM\Association\BelongsTo $Inventories
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\InventoryItemLogsTable&\Cake\ORM\Association\HasMany $InventoryItemLogs
 *
 * @method \App\Model\Entity\InventoryItem newEmptyEntity()
 * @method \App\Model\Entity\InventoryItem newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\InventoryItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InventoryItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\InventoryItem findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\InventoryItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InventoryItem[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\InventoryItem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InventoryItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InventoryItem[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\InventoryItem[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\InventoryItem[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\InventoryItem[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InventoryItemsTable extends Table
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

        $this->setTable('inventory_items');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('InventoryItemTypes', [
            'foreignKey' => 'inventory_item_type_id',
        ]);
        $this->belongsTo('Inventories', [
            'foreignKey' => 'inventory_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('InventoryItemLogs', [
            'foreignKey' => 'inventory_item_id',
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

        $validator
            ->integer('inventory_item_type_id')
            ->allowEmptyString('inventory_item_type_id');

        $validator
            ->integer('inventory_id')
            ->allowEmptyString('inventory_id');

        $validator
            ->integer('quantity')
            ->allowEmptyString('quantity');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('inventory_item_type_id', 'InventoryItemTypes'), ['errorField' => 'inventory_item_type_id']);
        $rules->add($rules->existsIn('inventory_id', 'Inventories'), ['errorField' => 'inventory_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}

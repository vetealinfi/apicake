<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InventoryItemLogs Model
 *
 * @property \App\Model\Table\InventoryItemsTable&\Cake\ORM\Association\BelongsTo $InventoryItems
 * @property \App\Model\Table\User1sTable&\Cake\ORM\Association\BelongsTo $User1s
 * @property \App\Model\Table\User2sTable&\Cake\ORM\Association\BelongsTo $User2s
 *
 * @method \App\Model\Entity\InventoryItemLog newEmptyEntity()
 * @method \App\Model\Entity\InventoryItemLog newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\InventoryItemLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InventoryItemLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\InventoryItemLog findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\InventoryItemLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InventoryItemLog[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\InventoryItemLog|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InventoryItemLog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InventoryItemLog[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\InventoryItemLog[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\InventoryItemLog[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\InventoryItemLog[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InventoryItemLogsTable extends Table
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

        $this->setTable('inventory_item_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('InventoryItems', [
            'foreignKey' => 'inventory_item_id',
        ]);
        $this->belongsTo('User1s', [
            'foreignKey' => 'user1_id',
        ]);
        $this->belongsTo('User2s', [
            'foreignKey' => 'user2_id',
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
            ->integer('inventory_item_id')
            ->allowEmptyString('inventory_item_id');

        $validator
            ->integer('user1_id')
            ->allowEmptyString('user1_id');

        $validator
            ->integer('user2_id')
            ->allowEmptyString('user2_id');

        $validator
            ->scalar('detail')
            ->allowEmptyString('detail');

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
        $rules->add($rules->existsIn('inventory_item_id', 'InventoryItems'), ['errorField' => 'inventory_item_id']);
        $rules->add($rules->existsIn('user1_id', 'User1s'), ['errorField' => 'user1_id']);
        $rules->add($rules->existsIn('user2_id', 'User2s'), ['errorField' => 'user2_id']);

        return $rules;
    }
}

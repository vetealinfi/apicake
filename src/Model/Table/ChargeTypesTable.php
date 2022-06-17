<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ChargeTypes Model
 *
 * @property \App\Model\Table\ChargesTable&\Cake\ORM\Association\HasMany $Charges
 *
 * @method \App\Model\Entity\ChargeType newEmptyEntity()
 * @method \App\Model\Entity\ChargeType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ChargeType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ChargeType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ChargeType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ChargeType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ChargeType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ChargeType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ChargeType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ChargeType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ChargeType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ChargeType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ChargeType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChargeTypesTable extends Table
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

        $this->setTable('charge_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Charges', [
            'foreignKey' => 'charge_type_id',
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
            ->maxLength('name', 1000)
            ->allowEmptyString('name');

        return $validator;
    }
}

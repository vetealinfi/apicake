<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Charges Model
 *
 * @property \App\Model\Table\ChargeTypesTable&\Cake\ORM\Association\BelongsTo $ChargeTypes
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\OrganizationsTable&\Cake\ORM\Association\BelongsTo $Organizations
 * @property \App\Model\Table\ChargeUsersTable&\Cake\ORM\Association\HasMany $ChargeUsers
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 *
 * @method \App\Model\Entity\Charge newEmptyEntity()
 * @method \App\Model\Entity\Charge newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Charge[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Charge get($primaryKey, $options = [])
 * @method \App\Model\Entity\Charge findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Charge patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Charge[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Charge|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Charge saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Charge[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Charge[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Charge[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Charge[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChargesTable extends Table
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

        $this->setTable('charges');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ChargeTypes', [
            'foreignKey' => 'charge_type_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Organizations', [
            'foreignKey' => 'organization_id',
        ]);
        $this->hasMany('ChargeUsers', [
            'foreignKey' => 'charge_id',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'charge_id',
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
            ->integer('charge_type_id')
            ->allowEmptyString('charge_type_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->allowEmptyString('name');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->integer('amount')
            ->allowEmptyString('amount');

        $validator
            ->integer('extensibility')
            ->allowEmptyString('extensibility');

        $validator
            ->integer('mandatory')
            ->allowEmptyString('mandatory');

        $validator
            ->integer('active')
            ->allowEmptyString('active');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->date('initial_date')
            ->allowEmptyDate('initial_date');

        $validator
            ->date('final_date')
            ->allowEmptyDate('final_date');

        $validator
            ->integer('organization_id')
            ->allowEmptyString('organization_id');

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
        $rules->add($rules->existsIn('charge_type_id', 'ChargeTypes'), ['errorField' => 'charge_type_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('organization_id', 'Organizations'), ['errorField' => 'organization_id']);

        return $rules;
    }
}

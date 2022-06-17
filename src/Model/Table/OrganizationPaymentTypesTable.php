<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrganizationPaymentTypes Model
 *
 * @property \App\Model\Table\OrganizationPaymentsTable&\Cake\ORM\Association\HasMany $OrganizationPayments
 *
 * @method \App\Model\Entity\OrganizationPaymentType newEmptyEntity()
 * @method \App\Model\Entity\OrganizationPaymentType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationPaymentType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationPaymentType get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrganizationPaymentType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OrganizationPaymentType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationPaymentType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationPaymentType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrganizationPaymentType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrganizationPaymentType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationPaymentType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationPaymentType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationPaymentType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrganizationPaymentTypesTable extends Table
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

        $this->setTable('organization_payment_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('OrganizationPayments', [
            'foreignKey' => 'organization_payment_type_id',
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
            ->maxLength('name', 500)
            ->allowEmptyString('name');

        return $validator;
    }
}

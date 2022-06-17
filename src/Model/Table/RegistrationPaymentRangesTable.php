<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RegistrationPaymentRanges Model
 *
 * @property \App\Model\Table\SchoolsTable&\Cake\ORM\Association\HasMany $Schools
 *
 * @method \App\Model\Entity\RegistrationPaymentRange newEmptyEntity()
 * @method \App\Model\Entity\RegistrationPaymentRange newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RegistrationPaymentRange[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RegistrationPaymentRange get($primaryKey, $options = [])
 * @method \App\Model\Entity\RegistrationPaymentRange findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RegistrationPaymentRange patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RegistrationPaymentRange[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RegistrationPaymentRange|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RegistrationPaymentRange saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RegistrationPaymentRange[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RegistrationPaymentRange[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RegistrationPaymentRange[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RegistrationPaymentRange[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RegistrationPaymentRangesTable extends Table
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

        $this->setTable('registration_payment_ranges');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Schools', [
            'foreignKey' => 'registration_payment_range_id',
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
            ->maxLength('name', 100)
            ->allowEmptyString('name');

        return $validator;
    }
}

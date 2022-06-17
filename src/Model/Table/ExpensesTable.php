<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Expenses Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\WriteUsersTable&\Cake\ORM\Association\BelongsTo $WriteUsers
 * @property \App\Model\Table\OrganizationsTable&\Cake\ORM\Association\BelongsTo $Organizations
 *
 * @method \App\Model\Entity\Expense newEmptyEntity()
 * @method \App\Model\Entity\Expense newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Expense[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Expense get($primaryKey, $options = [])
 * @method \App\Model\Entity\Expense findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Expense patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Expense[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Expense|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Expense saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Expense[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Expense[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Expense[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Expense[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExpensesTable extends Table
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

        $this->setTable('expenses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('WriteUsers', [
            'foreignKey' => 'write_user_id',
        ]);
        $this->belongsTo('Organizations', [
            'foreignKey' => 'organization_id',
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
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->integer('write_user_id')
            ->allowEmptyString('write_user_id');

        $validator
            ->integer('user_other')
            ->allowEmptyString('user_other');

        $validator
            ->integer('amount')
            ->allowEmptyString('amount');

        $validator
            ->integer('description')
            ->allowEmptyString('description');

        $validator
            ->integer('organization_id')
            ->allowEmptyString('organization_id');

        $validator
            ->date('expense_date')
            ->allowEmptyDate('expense_date');

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('write_user_id', 'WriteUsers'), ['errorField' => 'write_user_id']);
        $rules->add($rules->existsIn('organization_id', 'Organizations'), ['errorField' => 'organization_id']);

        return $rules;
    }
}

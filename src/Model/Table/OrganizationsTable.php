<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Organizations Model
 *
 * @property \App\Model\Table\OrganizationTypesTable&\Cake\ORM\Association\BelongsTo $OrganizationTypes
 * @property \App\Model\Table\OrganizationStatesTable&\Cake\ORM\Association\BelongsTo $OrganizationStates
 * @property \App\Model\Table\ChargesTable&\Cake\ORM\Association\HasMany $Charges
 * @property \App\Model\Table\CourseAccountsTable&\Cake\ORM\Association\HasMany $CourseAccounts
 * @property \App\Model\Table\EventsTable&\Cake\ORM\Association\HasMany $Events
 * @property \App\Model\Table\ExpensesTable&\Cake\ORM\Association\HasMany $Expenses
 * @property \App\Model\Table\IncomesTable&\Cake\ORM\Association\HasMany $Incomes
 * @property \App\Model\Table\InventoriesTable&\Cake\ORM\Association\HasMany $Inventories
 * @property \App\Model\Table\OrganizationInvitationsTable&\Cake\ORM\Association\HasMany $OrganizationInvitations
 * @property \App\Model\Table\OrganizationLogsTable&\Cake\ORM\Association\HasMany $OrganizationLogs
 * @property \App\Model\Table\OrganizationNewsTable&\Cake\ORM\Association\HasMany $OrganizationNews
 * @property \App\Model\Table\OrganizationPaymentsTable&\Cake\ORM\Association\HasMany $OrganizationPayments
 * @property \App\Model\Table\OrganizationSurveysTable&\Cake\ORM\Association\HasMany $OrganizationSurveys
 * @property \App\Model\Table\SubusersTable&\Cake\ORM\Association\HasMany $Subusers
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Organization newEmptyEntity()
 * @method \App\Model\Entity\Organization newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Organization[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Organization get($primaryKey, $options = [])
 * @method \App\Model\Entity\Organization findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Organization patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Organization[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Organization|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Organization saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Organization[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Organization[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Organization[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Organization[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrganizationsTable extends Table
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

        $this->setTable('organizations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('OrganizationTypes', [
            'foreignKey' => 'organization_type_id',
        ]);
        $this->belongsTo('OrganizationStates', [
            'foreignKey' => 'organization_state_id',
        ]);
        $this->hasMany('Charges', [
            'foreignKey' => 'organization_id',
        ]);
        $this->hasMany('CourseAccounts', [
            'foreignKey' => 'organization_id',
        ]);
        $this->hasMany('Events', [
            'foreignKey' => 'organization_id',
        ]);
        $this->hasMany('Expenses', [
            'foreignKey' => 'organization_id',
        ]);
        $this->hasMany('Incomes', [
            'foreignKey' => 'organization_id',
        ]);
        $this->hasMany('Inventories', [
            'foreignKey' => 'organization_id',
        ]);
        $this->hasMany('OrganizationInvitations', [
            'foreignKey' => 'organization_id',
        ]);
        $this->hasMany('OrganizationLogs', [
            'foreignKey' => 'organization_id',
        ]);
        $this->hasMany('OrganizationNews', [
            'foreignKey' => 'organization_id',
        ]);
        $this->hasMany('OrganizationPayments', [
            'foreignKey' => 'organization_id',
        ]);
        $this->hasMany('OrganizationSurveys', [
            'foreignKey' => 'organization_id',
        ]);
        $this->hasMany('Subusers', [
            'foreignKey' => 'organization_id',
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'organization_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'organizations_users',
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
            ->integer('organization_type_id')
            ->allowEmptyString('organization_type_id');

        $validator
            ->integer('organization_state_id')
            ->allowEmptyString('organization_state_id');

        $validator
            ->scalar('about')
            ->allowEmptyString('about');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 1000)
            ->allowEmptyString('slug');

        $validator
            ->integer('goal_amount')
            ->allowEmptyString('goal_amount');

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
        $rules->add($rules->existsIn('organization_type_id', 'OrganizationTypes'), ['errorField' => 'organization_type_id']);
        $rules->add($rules->existsIn('organization_state_id', 'OrganizationStates'), ['errorField' => 'organization_state_id']);

        return $rules;
    }
}

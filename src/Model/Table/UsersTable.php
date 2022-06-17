<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\GroupsTable&\Cake\ORM\Association\BelongsTo $Groups
 * @property \App\Model\Table\ChargeUsersTable&\Cake\ORM\Association\HasMany $ChargeUsers
 * @property \App\Model\Table\ChargesTable&\Cake\ORM\Association\HasMany $Charges
 * @property \App\Model\Table\EventsTable&\Cake\ORM\Association\HasMany $Events
 * @property \App\Model\Table\ExpensesTable&\Cake\ORM\Association\HasMany $Expenses
 * @property \App\Model\Table\IncomesTable&\Cake\ORM\Association\HasMany $Incomes
 * @property \App\Model\Table\InventoryItemsTable&\Cake\ORM\Association\HasMany $InventoryItems
 * @property \App\Model\Table\OrganizationInvitationsTable&\Cake\ORM\Association\HasMany $OrganizationInvitations
 * @property \App\Model\Table\OrganizationLogsTable&\Cake\ORM\Association\HasMany $OrganizationLogs
 * @property \App\Model\Table\OrganizationNewsTable&\Cake\ORM\Association\HasMany $OrganizationNews
 * @property \App\Model\Table\OrganizationSurveyAnswersTable&\Cake\ORM\Association\HasMany $OrganizationSurveyAnswers
 * @property \App\Model\Table\OrganizationSurveysTable&\Cake\ORM\Association\HasMany $OrganizationSurveys
 * @property \App\Model\Table\PagesTable&\Cake\ORM\Association\HasMany $Pages
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\PostsTable&\Cake\ORM\Association\HasMany $Posts
 * @property \App\Model\Table\SocialProfilesTable&\Cake\ORM\Association\HasMany $SocialProfiles
 * @property \App\Model\Table\SubusersTable&\Cake\ORM\Association\HasMany $Subusers
 * @property \App\Model\Table\EventActivitiesTable&\Cake\ORM\Association\BelongsToMany $EventActivities
 * @property \App\Model\Table\EventElementsTable&\Cake\ORM\Association\BelongsToMany $EventElements
 * @property \App\Model\Table\OrganizationsTable&\Cake\ORM\Association\BelongsToMany $Organizations
 * @property \App\Model\Table\SchoolsTable&\Cake\ORM\Association\BelongsToMany $Schools
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
        ]);
        $this->hasMany('ChargeUsers', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Charges', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Events', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Expenses', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Incomes', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('InventoryItems', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('OrganizationInvitations', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('OrganizationLogs', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('OrganizationNews', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('OrganizationSurveyAnswers', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('OrganizationSurveys', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Pages', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Posts', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('SocialProfiles', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Subusers', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsToMany('EventActivities', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'event_activity_id',
            'joinTable' => 'event_activities_users',
        ]);
        $this->belongsToMany('EventElements', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'event_element_id',
            'joinTable' => 'event_elements_users',
        ]);
        $this->belongsToMany('Organizations', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'organization_id',
            'joinTable' => 'organizations_users',
        ]);
        $this->belongsToMany('Schools', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'school_id',
            'joinTable' => 'schools_users',
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
            ->integer('group_id')
            ->allowEmptyString('group_id');

        $validator
            ->integer('active')
            ->allowEmptyString('active');

        $validator
            ->scalar('full_name')
            ->maxLength('full_name', 400)
            ->allowEmptyString('full_name');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 1000)
            ->allowEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 1000)
            ->allowEmptyString('last_name');

        $validator
            ->scalar('identificator')
            ->maxLength('identificator', 200)
            ->allowEmptyString('identificator');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 1000)
            ->allowEmptyString('slug');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('contact_phone')
            ->maxLength('contact_phone', 100)
            ->allowEmptyString('contact_phone');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 500)
            ->allowEmptyString('photo');

        $validator
            ->scalar('username')
            ->maxLength('username', 400)
            ->allowEmptyString('username');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 400)
            ->allowEmptyString('password');

        $validator
            ->integer('email_verified')
            ->allowEmptyString('email_verified');

        $validator
            ->integer('welcome_email')
            ->allowEmptyString('welcome_email');

        $validator
            ->scalar('last_account')
            ->maxLength('last_account', 20)
            ->allowEmptyString('last_account');

        $validator
            ->scalar('api_key')
            ->allowEmptyString('api_key');

        $validator
            ->scalar('api_key_plain')
            ->allowEmptyString('api_key_plain');

        $validator
            ->scalar('user_hash')
            ->allowEmptyString('user_hash');

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
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->existsIn('group_id', 'Groups'), ['errorField' => 'group_id']);

        return $rules;
    }
}

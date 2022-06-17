<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Events Model
 *
 * @property \App\Model\Table\OrganizationsTable&\Cake\ORM\Association\BelongsTo $Organizations
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\EventActivitiesTable&\Cake\ORM\Association\HasMany $EventActivities
 * @property \App\Model\Table\EventElementsTable&\Cake\ORM\Association\HasMany $EventElements
 * @property \App\Model\Table\EventElementsUsersTable&\Cake\ORM\Association\HasMany $EventElementsUsers
 *
 * @method \App\Model\Entity\Event newEmptyEntity()
 * @method \App\Model\Entity\Event newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Event[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Event get($primaryKey, $options = [])
 * @method \App\Model\Entity\Event findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Event patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Event[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Event|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Event saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EventsTable extends Table
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

        $this->setTable('events');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Organizations', [
            'foreignKey' => 'organization_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('EventActivities', [
            'foreignKey' => 'event_id',
        ]);
        $this->hasMany('EventElements', [
            'foreignKey' => 'event_id',
        ]);
        $this->hasMany('EventElementsUsers', [
            'foreignKey' => 'event_id',
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

        $validator
            ->integer('organization_id')
            ->allowEmptyString('organization_id');

        $validator
            ->date('initial_date')
            ->allowEmptyDate('initial_date');

        $validator
            ->date('final_date')
            ->allowEmptyDate('final_date');

        $validator
            ->scalar('place')
            ->maxLength('place', 1000)
            ->allowEmptyString('place');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->integer('active')
            ->allowEmptyString('active');

        $validator
            ->integer('participants')
            ->allowEmptyString('participants');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->time('initial_hour')
            ->allowEmptyTime('initial_hour');

        $validator
            ->time('final_hour')
            ->allowEmptyTime('final_hour');

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
        $rules->add($rules->existsIn('organization_id', 'Organizations'), ['errorField' => 'organization_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}

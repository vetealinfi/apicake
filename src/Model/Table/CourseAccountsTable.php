<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CourseAccounts Model
 *
 * @property \App\Model\Table\CoursesTable&\Cake\ORM\Association\BelongsTo $Courses
 * @property \App\Model\Table\SchoolsTable&\Cake\ORM\Association\BelongsTo $Schools
 * @property \App\Model\Table\OrganizationsTable&\Cake\ORM\Association\BelongsTo $Organizations
 *
 * @method \App\Model\Entity\CourseAccount newEmptyEntity()
 * @method \App\Model\Entity\CourseAccount newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CourseAccount[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CourseAccount get($primaryKey, $options = [])
 * @method \App\Model\Entity\CourseAccount findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CourseAccount patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CourseAccount[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CourseAccount|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CourseAccount saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CourseAccount[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CourseAccount[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CourseAccount[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CourseAccount[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CourseAccountsTable extends Table
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

        $this->setTable('course_accounts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
        ]);
        $this->belongsTo('Schools', [
            'foreignKey' => 'school_id',
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
            ->integer('course_id')
            ->allowEmptyString('course_id');

        $validator
            ->integer('school_id')
            ->allowEmptyString('school_id');

        $validator
            ->integer('organization_id')
            ->allowEmptyString('organization_id');

        $validator
            ->scalar('year')
            ->maxLength('year', 10)
            ->allowEmptyString('year');

        $validator
            ->scalar('letter')
            ->maxLength('letter', 10)
            ->allowEmptyString('letter');

        $validator
            ->scalar('name_other')
            ->maxLength('name_other', 1000)
            ->allowEmptyString('name_other');

        $validator
            ->integer('active')
            ->allowEmptyString('active');

        $validator
            ->integer('goal_to_raise')
            ->allowEmptyString('goal_to_raise');

        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

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
        $rules->add($rules->existsIn('course_id', 'Courses'), ['errorField' => 'course_id']);
        $rules->add($rules->existsIn('school_id', 'Schools'), ['errorField' => 'school_id']);
        $rules->add($rules->existsIn('organization_id', 'Organizations'), ['errorField' => 'organization_id']);

        return $rules;
    }
}

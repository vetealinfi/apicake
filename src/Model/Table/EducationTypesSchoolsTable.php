<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EducationTypesSchools Model
 *
 * @property \App\Model\Table\SchoolsTable&\Cake\ORM\Association\BelongsTo $Schools
 * @property \App\Model\Table\EducationTypesTable&\Cake\ORM\Association\BelongsTo $EducationTypes
 *
 * @method \App\Model\Entity\EducationTypesSchool newEmptyEntity()
 * @method \App\Model\Entity\EducationTypesSchool newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EducationTypesSchool[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EducationTypesSchool get($primaryKey, $options = [])
 * @method \App\Model\Entity\EducationTypesSchool findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EducationTypesSchool patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EducationTypesSchool[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EducationTypesSchool|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EducationTypesSchool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EducationTypesSchool[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EducationTypesSchool[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EducationTypesSchool[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EducationTypesSchool[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EducationTypesSchoolsTable extends Table
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

        $this->setTable('education_types_schools');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Schools', [
            'foreignKey' => 'school_id',
        ]);
        $this->belongsTo('EducationTypes', [
            'foreignKey' => 'education_type_id',
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
            ->integer('school_id')
            ->allowEmptyString('school_id');

        $validator
            ->integer('education_type_id')
            ->allowEmptyString('education_type_id');

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
        $rules->add($rules->existsIn('school_id', 'Schools'), ['errorField' => 'school_id']);
        $rules->add($rules->existsIn('education_type_id', 'EducationTypes'), ['errorField' => 'education_type_id']);

        return $rules;
    }
}

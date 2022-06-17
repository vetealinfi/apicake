<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schools Model
 *
 * @property \App\Model\Table\RegionsTable&\Cake\ORM\Association\BelongsTo $Regions
 * @property \App\Model\Table\ProvinciasTable&\Cake\ORM\Association\BelongsTo $Provincias
 * @property \App\Model\Table\ComunasTable&\Cake\ORM\Association\BelongsTo $Comunas
 * @property \App\Model\Table\SchoolTypesTable&\Cake\ORM\Association\BelongsTo $SchoolTypes
 * @property \App\Model\Table\SecondarySchoolTypesTable&\Cake\ORM\Association\BelongsTo $SecondarySchoolTypes
 * @property \App\Model\Table\SchoolStatesTable&\Cake\ORM\Association\BelongsTo $SchoolStates
 * @property \App\Model\Table\ReligionOrientationsTable&\Cake\ORM\Association\BelongsTo $ReligionOrientations
 * @property \App\Model\Table\RegistrationPaymentRangesTable&\Cake\ORM\Association\BelongsTo $RegistrationPaymentRanges
 * @property \App\Model\Table\MonthlyPaymentRangesTable&\Cake\ORM\Association\BelongsTo $MonthlyPaymentRanges
 * @property \App\Model\Table\CourseAccountsTable&\Cake\ORM\Association\HasMany $CourseAccounts
 * @property \App\Model\Table\EducationTypesTable&\Cake\ORM\Association\BelongsToMany $EducationTypes
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\School newEmptyEntity()
 * @method \App\Model\Entity\School newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\School[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\School get($primaryKey, $options = [])
 * @method \App\Model\Entity\School findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\School patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\School[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\School|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\School saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\School[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\School[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\School[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\School[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SchoolsTable extends Table
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

        $this->setTable('schools');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id',
        ]);
        $this->belongsTo('Provincias', [
            'foreignKey' => 'provincia_id',
        ]);
        $this->belongsTo('Comunas', [
            'foreignKey' => 'comuna_id',
        ]);
        $this->belongsTo('SchoolTypes', [
            'foreignKey' => 'school_type_id',
        ]);
        $this->belongsTo('SecondarySchoolTypes', [
            'foreignKey' => 'secondary_school_type_id',
        ]);
        $this->belongsTo('SchoolStates', [
            'foreignKey' => 'school_state_id',
        ]);
        $this->belongsTo('ReligionOrientations', [
            'foreignKey' => 'religion_orientation_id',
        ]);
        $this->belongsTo('RegistrationPaymentRanges', [
            'foreignKey' => 'registration_payment_range_id',
        ]);
        $this->belongsTo('MonthlyPaymentRanges', [
            'foreignKey' => 'monthly_payment_range_id',
        ]);
        $this->hasMany('CourseAccounts', [
            'foreignKey' => 'school_id',
        ]);
        $this->belongsToMany('EducationTypes', [
            'foreignKey' => 'school_id',
            'targetForeignKey' => 'education_type_id',
            'joinTable' => 'education_types_schools',
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'school_id',
            'targetForeignKey' => 'user_id',
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->allowEmptyString('name');

        $validator
            ->scalar('rol')
            ->maxLength('rol', 100)
            ->allowEmptyString('rol');

        $validator
            ->scalar('rol_dv')
            ->maxLength('rol_dv', 10)
            ->allowEmptyString('rol_dv');

        $validator
            ->integer('region_id')
            ->allowEmptyString('region_id');

        $validator
            ->integer('provincia_id')
            ->allowEmptyString('provincia_id');

        $validator
            ->integer('comuna_id')
            ->allowEmptyString('comuna_id');

        $validator
            ->integer('school_type_id')
            ->allowEmptyString('school_type_id');

        $validator
            ->integer('secondary_school_type_id')
            ->allowEmptyString('secondary_school_type_id');

        $validator
            ->integer('rural')
            ->allowEmptyString('rural');

        $validator
            ->scalar('phone')
            ->allowEmptyString('phone');

        $validator
            ->scalar('cellphone')
            ->allowEmptyString('cellphone');

        $validator
            ->scalar('address')
            ->allowEmptyString('address');

        $validator
            ->numeric('latitude')
            ->allowEmptyString('latitude');

        $validator
            ->numeric('longitude')
            ->allowEmptyString('longitude');

        $validator
            ->integer('school_integration_programs')
            ->allowEmptyString('school_integration_programs');

        $validator
            ->integer('matricula')
            ->allowEmptyString('matricula');

        $validator
            ->integer('school_state_id')
            ->allowEmptyString('school_state_id');

        $validator
            ->integer('religion_orientation_id')
            ->allowEmptyString('religion_orientation_id');

        $validator
            ->scalar('religion_orientation_other')
            ->maxLength('religion_orientation_other', 100)
            ->allowEmptyString('religion_orientation_other');

        $validator
            ->integer('registration_payment_range_id')
            ->allowEmptyString('registration_payment_range_id');

        $validator
            ->integer('monthly_payment_range_id')
            ->allowEmptyString('monthly_payment_range_id');

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
        $rules->add($rules->existsIn('region_id', 'Regions'), ['errorField' => 'region_id']);
        $rules->add($rules->existsIn('provincia_id', 'Provincias'), ['errorField' => 'provincia_id']);
        $rules->add($rules->existsIn('comuna_id', 'Comunas'), ['errorField' => 'comuna_id']);
        $rules->add($rules->existsIn('school_type_id', 'SchoolTypes'), ['errorField' => 'school_type_id']);
        $rules->add($rules->existsIn('secondary_school_type_id', 'SecondarySchoolTypes'), ['errorField' => 'secondary_school_type_id']);
        $rules->add($rules->existsIn('school_state_id', 'SchoolStates'), ['errorField' => 'school_state_id']);
        $rules->add($rules->existsIn('religion_orientation_id', 'ReligionOrientations'), ['errorField' => 'religion_orientation_id']);
        $rules->add($rules->existsIn('registration_payment_range_id', 'RegistrationPaymentRanges'), ['errorField' => 'registration_payment_range_id']);
        $rules->add($rules->existsIn('monthly_payment_range_id', 'MonthlyPaymentRanges'), ['errorField' => 'monthly_payment_range_id']);

        return $rules;
    }
}

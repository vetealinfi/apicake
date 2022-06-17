<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrganizationSurveyTypes Model
 *
 * @property \App\Model\Table\OrganizationSurveysTable&\Cake\ORM\Association\HasMany $OrganizationSurveys
 *
 * @method \App\Model\Entity\OrganizationSurveyType newEmptyEntity()
 * @method \App\Model\Entity\OrganizationSurveyType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurveyType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurveyType get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurveyType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurveyType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrganizationSurveyTypesTable extends Table
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

        $this->setTable('organization_survey_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('OrganizationSurveys', [
            'foreignKey' => 'organization_survey_type_id',
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

        return $validator;
    }
}

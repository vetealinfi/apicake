<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrganizationSurveys Model
 *
 * @property \App\Model\Table\OrganizationsTable&\Cake\ORM\Association\BelongsTo $Organizations
 * @property \App\Model\Table\OrganizationSurveyTypesTable&\Cake\ORM\Association\BelongsTo $OrganizationSurveyTypes
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\OrganizationSurveyAnswersTable&\Cake\ORM\Association\HasMany $OrganizationSurveyAnswers
 * @property \App\Model\Table\OrganizationSurveyOptionsTable&\Cake\ORM\Association\HasMany $OrganizationSurveyOptions
 *
 * @method \App\Model\Entity\OrganizationSurvey newEmptyEntity()
 * @method \App\Model\Entity\OrganizationSurvey newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurvey[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurvey get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrganizationSurvey findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OrganizationSurvey patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurvey[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurvey|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrganizationSurvey saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrganizationSurvey[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationSurvey[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationSurvey[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationSurvey[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrganizationSurveysTable extends Table
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

        $this->setTable('organization_surveys');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Organizations', [
            'foreignKey' => 'organization_id',
        ]);
        $this->belongsTo('OrganizationSurveyTypes', [
            'foreignKey' => 'organization_survey_type_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('OrganizationSurveyAnswers', [
            'foreignKey' => 'organization_survey_id',
        ]);
        $this->hasMany('OrganizationSurveyOptions', [
            'foreignKey' => 'organization_survey_id',
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
            ->integer('organization_id')
            ->allowEmptyString('organization_id');

        $validator
            ->integer('organization_survey_type_id')
            ->allowEmptyString('organization_survey_type_id');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->dateTime('due_date')
            ->allowEmptyDateTime('due_date');

        $validator
            ->scalar('title')
            ->maxLength('title', 1000)
            ->allowEmptyString('title');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 1000)
            ->allowEmptyString('photo');

        $validator
            ->integer('active')
            ->allowEmptyString('active');

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
        $rules->add($rules->existsIn('organization_survey_type_id', 'OrganizationSurveyTypes'), ['errorField' => 'organization_survey_type_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}

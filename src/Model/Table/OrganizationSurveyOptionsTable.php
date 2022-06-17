<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrganizationSurveyOptions Model
 *
 * @property \App\Model\Table\OrganizationSurveysTable&\Cake\ORM\Association\BelongsTo $OrganizationSurveys
 * @property \App\Model\Table\OrganizationSurveyAnswersTable&\Cake\ORM\Association\HasMany $OrganizationSurveyAnswers
 *
 * @method \App\Model\Entity\OrganizationSurveyOption newEmptyEntity()
 * @method \App\Model\Entity\OrganizationSurveyOption newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurveyOption[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurveyOption get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyOption findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyOption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurveyOption[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurveyOption|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyOption saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyOption[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyOption[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyOption[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyOption[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrganizationSurveyOptionsTable extends Table
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

        $this->setTable('organization_survey_options');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('OrganizationSurveys', [
            'foreignKey' => 'organization_survey_id',
        ]);
        $this->hasMany('OrganizationSurveyAnswers', [
            'foreignKey' => 'organization_survey_option_id',
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
            ->integer('organization_survey_id')
            ->allowEmptyString('organization_survey_id');

        $validator
            ->scalar('option_value')
            ->allowEmptyString('option_value');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 1000)
            ->allowEmptyString('photo');

        $validator
            ->scalar('url')
            ->maxLength('url', 2000)
            ->allowEmptyString('url');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

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
        $rules->add($rules->existsIn('organization_survey_id', 'OrganizationSurveys'), ['errorField' => 'organization_survey_id']);

        return $rules;
    }
}

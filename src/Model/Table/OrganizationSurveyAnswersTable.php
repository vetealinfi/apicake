<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrganizationSurveyAnswers Model
 *
 * @property \App\Model\Table\OrganizationSurveysTable&\Cake\ORM\Association\BelongsTo $OrganizationSurveys
 * @property \App\Model\Table\OrganizationSurveyOptionsTable&\Cake\ORM\Association\BelongsTo $OrganizationSurveyOptions
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\OrganizationSurveyAnswer newEmptyEntity()
 * @method \App\Model\Entity\OrganizationSurveyAnswer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurveyAnswer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurveyAnswer get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyAnswer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyAnswer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurveyAnswer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationSurveyAnswer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyAnswer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyAnswer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyAnswer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyAnswer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationSurveyAnswer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrganizationSurveyAnswersTable extends Table
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

        $this->setTable('organization_survey_answers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('OrganizationSurveys', [
            'foreignKey' => 'organization_survey_id',
        ]);
        $this->belongsTo('OrganizationSurveyOptions', [
            'foreignKey' => 'organization_survey_option_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->integer('organization_survey_option_id')
            ->allowEmptyString('organization_survey_option_id');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->scalar('body')
            ->allowEmptyString('body');

        $validator
            ->scalar('answer_value')
            ->allowEmptyString('answer_value');

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
        $rules->add($rules->existsIn('organization_survey_option_id', 'OrganizationSurveyOptions'), ['errorField' => 'organization_survey_option_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}

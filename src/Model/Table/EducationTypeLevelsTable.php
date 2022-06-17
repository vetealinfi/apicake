<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EducationTypeLevels Model
 *
 * @method \App\Model\Entity\EducationTypeLevel newEmptyEntity()
 * @method \App\Model\Entity\EducationTypeLevel newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EducationTypeLevel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EducationTypeLevel get($primaryKey, $options = [])
 * @method \App\Model\Entity\EducationTypeLevel findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EducationTypeLevel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EducationTypeLevel[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EducationTypeLevel|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EducationTypeLevel saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EducationTypeLevel[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EducationTypeLevel[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EducationTypeLevel[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EducationTypeLevel[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EducationTypeLevelsTable extends Table
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

        $this->setTable('education_type_levels');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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

<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EducationTypes Model
 *
 * @property \App\Model\Table\SchoolsTable&\Cake\ORM\Association\BelongsToMany $Schools
 *
 * @method \App\Model\Entity\EducationType newEmptyEntity()
 * @method \App\Model\Entity\EducationType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EducationType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EducationType get($primaryKey, $options = [])
 * @method \App\Model\Entity\EducationType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EducationType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EducationType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EducationType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EducationType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EducationType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EducationType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EducationType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EducationType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EducationTypesTable extends Table
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

        $this->setTable('education_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Schools', [
            'foreignKey' => 'education_type_id',
            'targetForeignKey' => 'school_id',
            'joinTable' => 'education_types_schools',
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
            ->scalar('code')
            ->maxLength('code', 10)
            ->allowEmptyString('code');

        $validator
            ->integer('normal_level')
            ->allowEmptyString('normal_level');

        return $validator;
    }
}

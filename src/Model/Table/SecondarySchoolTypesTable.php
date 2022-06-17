<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SecondarySchoolTypes Model
 *
 * @property \App\Model\Table\SchoolsTable&\Cake\ORM\Association\HasMany $Schools
 *
 * @method \App\Model\Entity\SecondarySchoolType newEmptyEntity()
 * @method \App\Model\Entity\SecondarySchoolType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SecondarySchoolType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SecondarySchoolType get($primaryKey, $options = [])
 * @method \App\Model\Entity\SecondarySchoolType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SecondarySchoolType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SecondarySchoolType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SecondarySchoolType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SecondarySchoolType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SecondarySchoolType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SecondarySchoolType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SecondarySchoolType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SecondarySchoolType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SecondarySchoolTypesTable extends Table
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

        $this->setTable('secondary_school_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Schools', [
            'foreignKey' => 'secondary_school_type_id',
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

        return $validator;
    }
}

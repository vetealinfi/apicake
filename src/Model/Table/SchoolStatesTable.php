<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SchoolStates Model
 *
 * @property \App\Model\Table\SchoolsTable&\Cake\ORM\Association\HasMany $Schools
 *
 * @method \App\Model\Entity\SchoolState newEmptyEntity()
 * @method \App\Model\Entity\SchoolState newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SchoolState[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SchoolState get($primaryKey, $options = [])
 * @method \App\Model\Entity\SchoolState findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SchoolState patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SchoolState[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SchoolState|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SchoolState saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SchoolState[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SchoolState[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SchoolState[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SchoolState[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SchoolStatesTable extends Table
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

        $this->setTable('school_states');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Schools', [
            'foreignKey' => 'school_state_id',
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

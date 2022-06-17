<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrganizationTypes Model
 *
 * @property \App\Model\Table\OrganizationsTable&\Cake\ORM\Association\HasMany $Organizations
 *
 * @method \App\Model\Entity\OrganizationType newEmptyEntity()
 * @method \App\Model\Entity\OrganizationType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationType get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrganizationType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OrganizationType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrganizationType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrganizationType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrganizationType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrganizationType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrganizationTypesTable extends Table
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

        $this->setTable('organization_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Organizations', [
            'foreignKey' => 'organization_type_id',
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
            ->maxLength('name', 200)
            ->allowEmptyString('name');

        return $validator;
    }
}

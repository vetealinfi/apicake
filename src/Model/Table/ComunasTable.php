<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comunas Model
 *
 * @property \App\Model\Table\RegionsTable&\Cake\ORM\Association\BelongsTo $Regions
 * @property \App\Model\Table\ProvinciasTable&\Cake\ORM\Association\BelongsTo $Provincias
 * @property \App\Model\Table\SchoolsTable&\Cake\ORM\Association\HasMany $Schools
 *
 * @method \App\Model\Entity\Comuna newEmptyEntity()
 * @method \App\Model\Entity\Comuna newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Comuna[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comuna get($primaryKey, $options = [])
 * @method \App\Model\Entity\Comuna findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Comuna patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Comuna[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comuna|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comuna saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comuna[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Comuna[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Comuna[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Comuna[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ComunasTable extends Table
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

        $this->setTable('comunas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id',
        ]);
        $this->belongsTo('Provincias', [
            'foreignKey' => 'provincia_id',
        ]);
        $this->hasMany('Schools', [
            'foreignKey' => 'comuna_id',
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
            ->scalar('code')
            ->maxLength('code', 10)
            ->allowEmptyString('code');

        $validator
            ->integer('region_id')
            ->allowEmptyString('region_id');

        $validator
            ->integer('provincia_id')
            ->allowEmptyString('provincia_id');

        $validator
            ->scalar('region_name_from_2000')
            ->maxLength('region_name_from_2000', 100)
            ->allowEmptyString('region_name_from_2000');

        $validator
            ->scalar('region_code_from_2000')
            ->maxLength('region_code_from_2000', 10)
            ->allowEmptyString('region_code_from_2000');

        $validator
            ->scalar('region_name_from_2008')
            ->maxLength('region_name_from_2008', 100)
            ->allowEmptyString('region_name_from_2008');

        $validator
            ->scalar('region_code_from_2008')
            ->maxLength('region_code_from_2008', 10)
            ->allowEmptyString('region_code_from_2008');

        $validator
            ->scalar('provincia_name_from_2000')
            ->maxLength('provincia_name_from_2000', 100)
            ->allowEmptyString('provincia_name_from_2000');

        $validator
            ->scalar('provincia_code_from_2000')
            ->maxLength('provincia_code_from_2000', 10)
            ->allowEmptyString('provincia_code_from_2000');

        $validator
            ->scalar('provincia_name_from_2008')
            ->maxLength('provincia_name_from_2008', 100)
            ->allowEmptyString('provincia_name_from_2008');

        $validator
            ->scalar('provincia_code_from_2008')
            ->maxLength('provincia_code_from_2008', 10)
            ->allowEmptyString('provincia_code_from_2008');

        $validator
            ->scalar('provincia_name_from_2010')
            ->maxLength('provincia_name_from_2010', 100)
            ->allowEmptyString('provincia_name_from_2010');

        $validator
            ->scalar('provincia_code_from_2010')
            ->maxLength('provincia_code_from_2010', 10)
            ->allowEmptyString('provincia_code_from_2010');

        $validator
            ->scalar('comuna_code_to_1999')
            ->maxLength('comuna_code_to_1999', 10)
            ->allowEmptyString('comuna_code_to_1999');

        $validator
            ->scalar('comuna_code_from_2000')
            ->maxLength('comuna_code_from_2000', 10)
            ->allowEmptyString('comuna_code_from_2000');

        $validator
            ->scalar('comuna_code_from_2008')
            ->maxLength('comuna_code_from_2008', 10)
            ->allowEmptyString('comuna_code_from_2008');

        $validator
            ->scalar('comuna_code_from_2010')
            ->maxLength('comuna_code_from_2010', 10)
            ->allowEmptyString('comuna_code_from_2010');

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

        return $rules;
    }
}

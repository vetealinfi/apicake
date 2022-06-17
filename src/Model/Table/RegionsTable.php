<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Regions Model
 *
 * @property \App\Model\Table\ComunasTable&\Cake\ORM\Association\HasMany $Comunas
 * @property \App\Model\Table\ProvinciasTable&\Cake\ORM\Association\HasMany $Provincias
 * @property \App\Model\Table\SchoolsTable&\Cake\ORM\Association\HasMany $Schools
 *
 * @method \App\Model\Entity\Region newEmptyEntity()
 * @method \App\Model\Entity\Region newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Region[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Region get($primaryKey, $options = [])
 * @method \App\Model\Entity\Region findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Region patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Region[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Region|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Region saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Region[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Region[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Region[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Region[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RegionsTable extends Table
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

        $this->setTable('regions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Comunas', [
            'foreignKey' => 'region_id',
        ]);
        $this->hasMany('Provincias', [
            'foreignKey' => 'region_id',
        ]);
        $this->hasMany('Schools', [
            'foreignKey' => 'region_id',
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

        return $validator;
    }
}

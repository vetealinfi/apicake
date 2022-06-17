<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReligionOrientations Model
 *
 * @property \App\Model\Table\SchoolsTable&\Cake\ORM\Association\HasMany $Schools
 *
 * @method \App\Model\Entity\ReligionOrientation newEmptyEntity()
 * @method \App\Model\Entity\ReligionOrientation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ReligionOrientation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ReligionOrientation get($primaryKey, $options = [])
 * @method \App\Model\Entity\ReligionOrientation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ReligionOrientation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ReligionOrientation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ReligionOrientation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReligionOrientation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReligionOrientation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ReligionOrientation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ReligionOrientation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ReligionOrientation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReligionOrientationsTable extends Table
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

        $this->setTable('religion_orientations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Schools', [
            'foreignKey' => 'religion_orientation_id',
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

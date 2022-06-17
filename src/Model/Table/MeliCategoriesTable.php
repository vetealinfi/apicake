<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MeliCategories Model
 *
 * @property \App\Model\Table\MelisTable&\Cake\ORM\Association\BelongsTo $Melis
 * @property \App\Model\Table\MeliCategoriesTable&\Cake\ORM\Association\BelongsTo $ParentMeliCategories
 * @property \App\Model\Table\MeliCategoriesTable&\Cake\ORM\Association\HasMany $ChildMeliCategories
 *
 * @method \App\Model\Entity\MeliCategory newEmptyEntity()
 * @method \App\Model\Entity\MeliCategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MeliCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MeliCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\MeliCategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MeliCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MeliCategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MeliCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MeliCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MeliCategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MeliCategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MeliCategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MeliCategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MeliCategoriesTable extends Table
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

        $this->setTable('meli_categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Melis', [
            'foreignKey' => 'meli_id',
        ]);
        $this->belongsTo('ParentMeliCategories', [
            'className' => 'MeliCategories',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('ChildMeliCategories', [
            'className' => 'MeliCategories',
            'foreignKey' => 'parent_id',
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
            ->scalar('meli_id')
            ->maxLength('meli_id', 20)
            ->allowEmptyString('meli_id');

        $validator
            ->integer('parent_id')
            ->allowEmptyString('parent_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->allowEmptyString('name');

        $validator
            ->scalar('picture')
            ->maxLength('picture', 1000)
            ->allowEmptyString('picture');

        $validator
            ->scalar('permalink')
            ->maxLength('permalink', 1000)
            ->allowEmptyString('permalink');

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
        $rules->add($rules->existsIn('meli_id', 'Melis'), ['errorField' => 'meli_id']);
        $rules->add($rules->existsIn('parent_id', 'ParentMeliCategories'), ['errorField' => 'parent_id']);

        return $rules;
    }
}

<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PostCategories Model
 *
 * @property \App\Model\Table\PostCategoriesTable&\Cake\ORM\Association\BelongsTo $ParentPostCategories
 * @property \App\Model\Table\PostCategoriesTable&\Cake\ORM\Association\HasMany $ChildPostCategories
 * @property \App\Model\Table\PostsTable&\Cake\ORM\Association\HasMany $Posts
 *
 * @method \App\Model\Entity\PostCategory newEmptyEntity()
 * @method \App\Model\Entity\PostCategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PostCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PostCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\PostCategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PostCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PostCategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PostCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PostCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PostCategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PostCategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PostCategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PostCategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class PostCategoriesTable extends Table
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

        $this->setTable('post_categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentPostCategories', [
            'className' => 'PostCategories',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('ChildPostCategories', [
            'className' => 'PostCategories',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('Posts', [
            'foreignKey' => 'post_category_id',
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
            ->scalar('slug')
            ->maxLength('slug', 2000)
            ->allowEmptyString('slug');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 1000)
            ->allowEmptyString('photo');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->integer('parent_id')
            ->allowEmptyString('parent_id');

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
        $rules->add($rules->existsIn('parent_id', 'ParentPostCategories'), ['errorField' => 'parent_id']);

        return $rules;
    }
}

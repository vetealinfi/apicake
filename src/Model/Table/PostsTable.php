<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Posts Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\PostCategoriesTable&\Cake\ORM\Association\BelongsTo $PostCategories
 * @property \App\Model\Table\PostParentsTable&\Cake\ORM\Association\BelongsTo $PostParents
 * @property \App\Model\Table\PostTypesTable&\Cake\ORM\Association\BelongsTo $PostTypes
 * @property \App\Model\Table\GalleriesTable&\Cake\ORM\Association\BelongsTo $Galleries
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\Post newEmptyEntity()
 * @method \App\Model\Entity\Post newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Post[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Post get($primaryKey, $options = [])
 * @method \App\Model\Entity\Post findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Post patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Post[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Post|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Post saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PostsTable extends Table
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

        $this->setTable('posts');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('PostCategories', [
            'foreignKey' => 'post_category_id',
        ]);
        $this->belongsTo('PostParents', [
            'foreignKey' => 'post_parent_id',
        ]);
        $this->belongsTo('PostTypes', [
            'foreignKey' => 'post_type_id',
        ]);
        $this->belongsTo('Galleries', [
            'foreignKey' => 'gallery_id',
        ]);
        $this->belongsToMany('Tags', [
            'foreignKey' => 'post_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'posts_tags',
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
            ->scalar('title')
            ->maxLength('title', 400)
            ->allowEmptyString('title');

        $validator
            ->date('publishing_date')
            ->allowEmptyDate('publishing_date');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 1500)
            ->allowEmptyString('slug');

        $validator
            ->scalar('body')
            ->allowEmptyString('body');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 1500)
            ->allowEmptyString('photo');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->integer('post_category_id')
            ->allowEmptyString('post_category_id');

        $validator
            ->integer('post_parent_id')
            ->allowEmptyString('post_parent_id');

        $validator
            ->integer('post_type_id')
            ->allowEmptyString('post_type_id');

        $validator
            ->scalar('post_type_detail')
            ->allowEmptyString('post_type_detail');

        $validator
            ->integer('gallery_id')
            ->allowEmptyString('gallery_id');

        $validator
            ->integer('highlight')
            ->allowEmptyString('highlight');

        $validator
            ->scalar('post_products')
            ->allowEmptyString('post_products');

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('post_category_id', 'PostCategories'), ['errorField' => 'post_category_id']);
        $rules->add($rules->existsIn('post_parent_id', 'PostParents'), ['errorField' => 'post_parent_id']);
        $rules->add($rules->existsIn('post_type_id', 'PostTypes'), ['errorField' => 'post_type_id']);
        $rules->add($rules->existsIn('gallery_id', 'Galleries'), ['errorField' => 'gallery_id']);

        return $rules;
    }
}

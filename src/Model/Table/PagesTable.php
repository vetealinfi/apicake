<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pages Model
 *
 * @property \App\Model\Table\MenusTable&\Cake\ORM\Association\BelongsTo $Menus
 * @property \App\Model\Table\SitesTable&\Cake\ORM\Association\BelongsTo $Sites
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Page newEmptyEntity()
 * @method \App\Model\Entity\Page newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Page[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Page get($primaryKey, $options = [])
 * @method \App\Model\Entity\Page findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Page patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Page[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Page|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Page saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PagesTable extends Table
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

        $this->setTable('pages');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Menus', [
            'foreignKey' => 'menu_id',
        ]);
        $this->belongsTo('Sites', [
            'foreignKey' => 'site_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('metatags')
            ->maxLength('metatags', 4294967295)
            ->allowEmptyString('metatags');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 1000)
            ->allowEmptyString('slug');

        $validator
            ->scalar('body')
            ->maxLength('body', 4294967295)
            ->allowEmptyString('body');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 1000)
            ->allowEmptyString('photo');

        $validator
            ->integer('menu_id')
            ->allowEmptyString('menu_id');

        $validator
            ->integer('type')
            ->allowEmptyString('type');

        $validator
            ->integer('site_id')
            ->allowEmptyString('site_id');

        $validator
            ->integer('in_home')
            ->allowEmptyString('in_home');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

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
        $rules->add($rules->existsIn('menu_id', 'Menus'), ['errorField' => 'menu_id']);
        $rules->add($rules->existsIn('site_id', 'Sites'), ['errorField' => 'site_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('productname')
            ->maxLength('productname', 100)
            ->requirePresence('productname', 'create')
            ->allowEmptyString('productname', false);

        $validator
            ->integer('category')
            ->requirePresence('category', 'create')
            ->allowEmptyString('category', false);

        $validator
            ->scalar('tag1')
            ->maxLength('tag1', 20)
            ->requirePresence('tag1', 'create')
            ->allowEmptyString('tag1', false);

        $validator
            ->scalar('tag2')
            ->maxLength('tag2', 20)
            ->requirePresence('tag2', 'create')
            ->allowEmptyString('tag2', false);

        $validator
            ->scalar('tag3')
            ->maxLength('tag3', 20)
            ->requirePresence('tag3', 'create')
            ->allowEmptyString('tag3', false);

        $validator
            ->scalar('tag4')
            ->maxLength('tag4', 20)
            ->requirePresence('tag4', 'create')
            ->allowEmptyString('tag4', false);

        $validator
            ->scalar('tag5')
            ->maxLength('tag5', 20)
            ->requirePresence('tag5', 'create')
            ->allowEmptyString('tag5', false);

        $validator
            ->dateTime('upload_time')
            ->requirePresence('upload_time', 'create')
            ->allowEmptyDateTime('upload_time', false);

        $validator
            ->integer('price')
            ->requirePresence('price', 'create')
            ->allowEmptyString('price', false);

        $validator
            ->scalar('img1')
            ->maxLength('img1', 100)
            ->requirePresence('img1', 'create')
            ->allowEmptyString('img1', false);

        $validator
            ->scalar('img2')
            ->maxLength('img2', 100)
            ->requirePresence('img2', 'create')
            ->allowEmptyString('img2', false);

        $validator
            ->scalar('img3')
            ->maxLength('img3', 100)
            ->requirePresence('img3', 'create')
            ->allowEmptyString('img3', false);

        $validator
            ->scalar('explanation')
            ->maxLength('explanation', 400)
            ->requirePresence('explanation', 'create')
            ->allowEmptyString('explanation', false);

        $validator
            ->boolean('r18')
            ->requirePresence('r18', 'create')
            ->allowEmptyString('r18', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

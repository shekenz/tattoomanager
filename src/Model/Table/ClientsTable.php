<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;

/**
 * Clients Model
 *
 * @method \App\Model\Entity\Client get($primaryKey, $options = [])
 * @method \App\Model\Entity\Client newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Client[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Client|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Client[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Client findOrCreate($search, callable $callback = null, $options = [])
 */
class ClientsTable extends Table
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

        $this->setTable('clients');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create');
	    //->allowEmpty('name');

        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 64)
            ->requirePresence('firstname', 'create')
            ->notEmpty('firstname');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 15)
            ->allowEmpty('phone');

        $validator
            ->email('email');
            //->allowEmpty('email');

        $validator
            ->date('birthdate')
            ->requirePresence('birthdate', 'create')
            ->notEmpty('birthdate');

        $validator
            ->boolean('gender')
            ->requirePresence('gender', 'create')
            ->notEmpty('gender');

		$validator
            ->dateTime('creationdate')
            ->requirePresence('creationdate', false)
            ->allowEmpty('creationdate', true);
            //->notEmpty('creationdate');
            
        $validator
            ->integer('user_id')
            ->requirePresence('user_id', true)
            ->notEmpty('user_id', true);

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
        //$rules->add($rules->isUnique(['email']));
        return $rules;
    }
    
    // Database connection configuration
    public static function defaultConnectionName() {
	    if (Configure::read('App.defaultConnection')) {
        	return Configure::read('App.defaultConnection');
        } else {
	        return 'default';
        }
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, callable $callback = null, $options = [])
 */
class UsuariosTable extends Table
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

        $this->setTable('usuarios');
        $this->setDisplayField('id_usuarios');
        $this->setPrimaryKey('id_usuarios');
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
            ->integer('id_usuarios')
            ->allowEmpty('id_usuarios', 'create')
            ->add('id_usuarios', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('usuario')
            ->maxLength('usuario', 30)
            ->allowEmpty('usuario', 'create');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->dateTime('create_time')
            ->allowEmpty('create_time');

        $validator
            ->dateTime('last_login')
            ->allowEmpty('last_login');

        $validator
            ->scalar('tipo_usuario')
            ->maxLength('tipo_usuario', 1)
            ->allowEmpty('tipo_usuario', 'create');

         $validator
            ->scalar('autorizado')
            ->maxLength('autorizado', 1)
            ->allowEmpty('autorizado', 'create');

        $validator
            ->scalar('voto')
            ->maxLength('voto', 1)
            ->allowEmpty('voto', 'create');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['id_usuarios']));

        return $rules;
    }

     public function findAuth(\Cake\ORM\Query $query, array $options)
    {
    $query
        ->find('all');
        

    return $query;
    }
    public function check($usuario,$pass){
        return ((new DefaultPasswordHasher)->check($pass,$usuario->password));
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Aportes Model
 *
 * @method \App\Model\Entity\Aporte get($primaryKey, $options = [])
 * @method \App\Model\Entity\Aporte newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Aporte[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Aporte|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aporte|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aporte patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Aporte[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Aporte findOrCreate($search, callable $callback = null, $options = [])
 */
class AportesTable extends Table
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

        $this->setTable('aportes');
        $this->setDisplayField('idaportes');
        $this->setPrimaryKey('idaportes');
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
            ->integer('idaportes')
            ->allowEmpty('idaportes', 'create')
            ->add('idaportes', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->decimal('monto')
            ->requirePresence('monto', 'create')
            ->notEmpty('monto');

        $validator
            ->dateTime('fecha_aporte')
            ->allowEmpty('fecha_aporte');

        $validator
            ->integer('proyectos_idproyectos')
            ->allowEmpty('proyectos_idproyectos');

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
        $rules->add($rules->isUnique(['idaportes']));

        return $rules;
    }
}

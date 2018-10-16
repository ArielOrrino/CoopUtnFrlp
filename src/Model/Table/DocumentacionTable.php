<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Documentacion Model
 *
 * @method \App\Model\Entity\Documentacion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Documentacion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Documentacion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Documentacion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Documentacion|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Documentacion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Documentacion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Documentacion findOrCreate($search, callable $callback = null, $options = [])
 */
class DocumentacionTable extends Table
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

        $this->setTable('documentacion');
        $this->setDisplayField('iddocumentacion');
        $this->setPrimaryKey('iddocumentacion');
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
            ->integer('iddocumentacion')
            ->allowEmpty('iddocumentacion', 'create')
            ->add('iddocumentacion', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('idproyectos')
            ->allowEmpty('idproyectos', 'create');

        $validator
            ->allowEmpty('factura');

        $validator
            ->decimal('monto_factura')
            ->allowEmpty('monto_factura');

        $validator
            ->date('fecha_subida')
            ->allowEmpty('fecha_subida');

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
        $rules->add($rules->isUnique(['iddocumentacion']));

        return $rules;
    }
}

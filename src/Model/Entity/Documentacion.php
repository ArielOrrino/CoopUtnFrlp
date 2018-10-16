<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Documentacion Entity
 *
 * @property int $iddocumentacion
 * @property int $idproyectos
 * @property string|resource $factura
 * @property float $monto_factura
 * @property \Cake\I18n\FrozenDate $fecha_subida
 */
class Documentacion extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'idproyectos' => true,
        'factura' => true,
        'monto_factura' => true,
        'fecha_subida' => true
    ];
}

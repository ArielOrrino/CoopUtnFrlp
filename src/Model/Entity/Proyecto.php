<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Proyecto Entity
 *
 * @property int $idproyectos
 * @property string $nombre_proyecto
 * @property float $monto_necesario
 * @property \Cake\I18n\FrozenDate $fecha_creacion
 * @property \Cake\I18n\FrozenDate $fecha_finalizado
 * @property int $cantidad_votos
 */
class Proyecto extends Entity
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
        'nombre_proyecto' => true,
        'monto_necesario' => true,
        'fecha_creacion' => true,
        'fecha_finalizado' => true,
        'cantidad_votos' => true, 
        'detalles' => true
    ];
}

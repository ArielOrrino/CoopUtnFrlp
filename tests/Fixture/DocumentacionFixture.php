<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocumentacionFixture
 *
 */
class DocumentacionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'documentacion';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'iddocumentacion' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'idproyectos' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'factura' => ['type' => 'binary', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'monto_factura' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'fecha_subida' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_documentacion_proyectos_idx' => ['type' => 'index', 'columns' => ['idproyectos'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['iddocumentacion', 'idproyectos'], 'length' => []],
            'iddocumentacion_UNIQUE' => ['type' => 'unique', 'columns' => ['iddocumentacion'], 'length' => []],
            'fk_documentacion_proyectos' => ['type' => 'foreign', 'columns' => ['idproyectos'], 'references' => ['proyectos', 'idproyectos'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_bin'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'iddocumentacion' => 1,
                'idproyectos' => 1,
                'factura' => 'Lorem ipsum dolor sit amet',
                'monto_factura' => 1.5,
                'fecha_subida' => '2018-09-16'
            ],
        ];
        parent::init();
    }
}

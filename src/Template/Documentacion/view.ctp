<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Documentacion $documentacion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        <li><?= $this->Html->link(__('Editar Documentacion'), ['action' => 'edit', $documentacion->iddocumentacion]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Documentacion'), ['action' => 'delete', $documentacion->iddocumentacion], ['confirm' => __('Esta seguro que desea eliminar la documentacion # {0}?', $documentacion->iddocumentacion)]) ?> </li>
        <li><?= $this->Html->link(__('Lista de Documentacion'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nueva Documentacion'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="documentacion view large-9 medium-8 columns content">
    <h3><?= h($documentacion->iddocumentacion) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Iddocumentacion') ?></th>
            <td><?= $this->Number->format($documentacion->iddocumentacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Idproyectos') ?></th>
            <td><?= $this->Number->format($documentacion->idproyectos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monto Factura') ?></th>
            <td><?= $this->Number->format($documentacion->monto_factura) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Subida') ?></th>
            <td><?= h($documentacion->fecha_subida) ?></td>
        </tr>
    </table>
</div>

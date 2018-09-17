<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aporte $aporte
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        <li><?= $this->Html->link(__('Editar Aporte'), ['action' => 'edit', $aporte->idaportes]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Aporte'), ['action' => 'delete', $aporte->idaportes], ['confirm' => __('Esta seguro que desea eliminar el aporte # {0}?', $aporte->idaportes)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Aportes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo Aporte'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="aportes view large-9 medium-8 columns content">
    <h3><?= h($aporte->idaportes) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Idaportes') ?></th>
            <td><?= $this->Number->format($aporte->idaportes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monto') ?></th>
            <td><?= $this->Number->format($aporte->monto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Aporte') ?></th>
            <td><?= h($aporte->fecha_aporte) ?></td>
        </tr>
    </table>
</div>

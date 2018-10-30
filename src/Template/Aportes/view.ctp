<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aporte $aporte
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
    <?php if ($this->request->getSession()->read('Auth.User.tipo_usuario')=='A') : ?> 
        <li><?= $this->Html->link(__('Editar Aporte'), ['action' => 'edit', $aporte->idaportes]) ?> </li>
    <?php endif; ?>
        <li><?= $this->Html->link(__('Listar Aportes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo Aporte'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="aportes view large-9 medium-8 columns content">
    <h3><?= h($aporte->idaportes) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('#Control') ?></th>
            <td><?= $this->Number->format($aporte->idaportes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monto') ?></th>
            <td><?= $this->Number->format($aporte->monto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Proyecto destino') ?></th>
            <td><?= h($aporte->proyectos_idproyectos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Aporte') ?></th>
             <?php $fecha = date("d/m/y",strtotime($aporte->fecha_aporte)); ?>
            <td><?= h($fecha) ?></td>
        </tr>
    </table>
</div>

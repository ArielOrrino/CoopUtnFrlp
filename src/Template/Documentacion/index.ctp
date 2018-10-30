<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Documentacion[]|\Cake\Collection\CollectionInterface $documentacion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        <?php if ($this->request->getSession()->read('Auth.User.tipo_usuario')=='A') : ?> 
             <li><?= $this->Html->link(__('Nueva Documentacion'), ['action' => 'add']) ?></li>
        <?php endif; ?>
    </ul>
</nav>
<div class="documentacion index large-9 medium-8 columns content">
    <h3><?= __('Documentacion') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('iddocumentacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idproyectos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('monto_factura') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_subida') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($documentacion as $documentacion): ?>
            <tr>
                <td><?= $this->Number->format($documentacion->iddocumentacion) ?></td>
                <td><?= $this->Number->format($documentacion->idproyectos) ?></td>
                <td><?= $this->Number->format($documentacion->monto_factura) ?></td>
                <?php $fecha = date("d/m/y",strtotime($documentacion->fecha_subida)); ?>
                <td><?= h($fecha) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $documentacion->iddocumentacion]) ?>
                <?php if ($this->request->getSession()->read('Auth.User.tipo_usuario')=='A') : ?> 
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $documentacion->iddocumentacion]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $documentacion->iddocumentacion], ['confirm' => __('Esta seguro que desea eliminar la documentacion # {0}?', $documentacion->iddocumentacion)]) ?>
                <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primera')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultima') . ' >>') ?>
        </ul>
       <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} en total')]) ?></p>
    </div>
</div>

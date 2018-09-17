<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proyecto[]|\Cake\Collection\CollectionInterface $proyectos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        <li><?= $this->Html->link(__('Nuevo Proyecto'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="proyectos index large-9 medium-8 columns content">
    <h3><?= __('Proyectos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idproyectos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre_proyecto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('monto_necesario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_creacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_finalizado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad_votos') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proyectos as $proyecto): ?>
            <tr>
                <td><?= $this->Number->format($proyecto->idproyectos) ?></td>
                <td><?= h($proyecto->nombre_proyecto) ?></td>
                <td><?= $this->Number->format($proyecto->monto_necesario) ?></td>
                <td><?= h($proyecto->fecha_creacion) ?></td>
                <td><?= h($proyecto->fecha_finalizado) ?></td>
                <td><?= $this->Number->format($proyecto->cantidad_votos) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $proyecto->idproyectos]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $proyecto->idproyectos]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $proyecto->idproyectos], ['confirm' => __('Esta seguro que desea eliminar el proyecto # {0}?', $proyecto->idproyectos)]) ?>
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

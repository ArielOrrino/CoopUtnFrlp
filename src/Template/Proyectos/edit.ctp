<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proyecto $proyecto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        <li><?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $proyecto->idproyectos],
                ['confirm' => __('Esta seguro que desea eliminar el proyecto # {0}?', $proyecto->idproyectos)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Lista de Proyectos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="proyectos form large-9 medium-8 columns content">
    <?= $this->Form->create($proyecto) ?>
    <fieldset>
        <legend><?= __('Editar Proyecto') ?></legend>
        <?php
            echo $this->Form->control('nombre_proyecto');
            echo $this->Form->control('monto_necesario');
//            echo $this->Form->control('fecha_creacion', ['empty' => true]);
            echo $this->Form->control('fecha_finalizado', ['empty' => true]);
            echo $this->Form->control('cantidad_votos');
            echo $this->Form->control('detalles');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submitir')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proyecto $proyecto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        <li><?= $this->Html->link(__('Lista de Proyectos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="proyectos form large-9 medium-8 columns content">
    <?= $this->Form->create($proyecto) ?>
    <fieldset>
        <legend><?= __('Alta de Proyecto') ?></legend>
        <?php
            date_default_timezone_set("America/Argentina/Buenos_Aires");
            $now = date('Y-m-d',Time());
            echo $this->Form->control('nombre_proyecto');
            echo $this->Form->control('monto_necesario');
            echo $this->Form->control('fecha_creacion', ['type' => 'hidden', 'value' => $now]);
            echo $this->Form->control('fecha_finalizado', ['type' => 'hidden','empty' => true]);
            echo $this->Form->control('cantidad_votos',['type' => 'hidden', 'value' => 0]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submitir')) ?>
    <?= $this->Form->end() ?>
</div>

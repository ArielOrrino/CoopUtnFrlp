<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Documentacion $documentacion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        <li><?= $this->Html->link(__('Lista de Documentacion'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="documentacion form large-9 medium-8 columns content">
    <?= $this->Form->create($documentacion) ?>
    <fieldset>
        <legend><?= __('Agregar Documentacion') ?></legend>
        <?php
            date_default_timezone_set("America/Argentina/Buenos_Aires");
            $now = date('Y-m-d',Time());
            echo $this->Form->control('idproyectos', ['label' => 'corresponde al proyecto:']);
            echo $this->Form->control('factura');
            echo $this->Form->control('monto_factura');
            echo $this->Form->control('fecha_subida', ['type' => 'hidden', 'value' => $now]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submitir')) ?>
    <?= $this->Form->end() ?>
</div>

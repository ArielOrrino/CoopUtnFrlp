<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Documentacion $documentacion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        <li><?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $documentacion->iddocumentacion],
                ['confirm' => __('Esta seguro que desea eliminar la documentacion # {0}?', $documentacion->iddocumentacion)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Lista de Documentacion'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="documentacion form large-9 medium-8 columns content">
    <?= $this->Form->create($documentacion) ?>
    <fieldset>
        <legend><?= __('Editar Documentacion') ?></legend>
        <?php
            echo $this->Form->control('monto_factura');
            echo $this->Form->control('fecha_subida', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submitir')) ?>
    <?= $this->Form->end() ?>
</div>

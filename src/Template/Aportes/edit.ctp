<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aporte $aporte
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        <li><?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $aporte->idaportes],
                ['confirm' => __('Esta seguro que desea eliminar el aporte # {0}?', $aporte->idaportes)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Lista de Aportes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="aportes form large-9 medium-8 columns content">
    <?= $this->Form->create($aporte) ?>
    <fieldset>
        <legend><?= __('Editar Aporte') ?></legend>
        <?php
            echo $this->Form->control('monto');
            echo $this->Form->control('proyectos_idproyectos');
            echo $this->Form->control('fecha_aporte');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submitir')) ?>
    <?= $this->Form->end() ?>
</div>

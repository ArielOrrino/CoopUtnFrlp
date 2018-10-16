<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aporte $aporte
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        <li><?= $this->Html->link(__('Lista de Aportes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="aportes form large-9 medium-8 columns content">
    <?= $this->Form->create($aporte) ?>
    <fieldset>
        <legend><?= __('Confirmar Donación') ?></legend>
        <?php
            date_default_timezone_set("America/Argentina/Buenos_Aires");
            $now = date('Y-m-d H:i:s',Time());
            $MD = $this->request->params['pass'][0];
            echo $this->Form->control('monto', ['id' => 'monto', 'value'=>$MD, 'readonly']);
            echo $this->Form->control('proyectos_idproyectos', ['type' => 'hidden']);
            echo $this->Form->control('fecha_aporte', ['type' => 'hidden', 'value' => $now]);            
        ?>
    </fieldset>
    <?php echo $this->Html->link(('Donar'), ['action' => 'mp', $MD],array('class' => 'button', 'id' => 'bdonar'));?>  
    <?= $this->Form->end() ?>
</div>

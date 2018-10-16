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
        <legend><?= __('Agregar Aporte') ?></legend>
        <?php
            date_default_timezone_set("America/Argentina/Buenos_Aires");
            $now = date('Y-m-d H:i:s',Time());
            echo $this->Form->control('monto', ['id' => 'monto']);
            $monto1 = (float)$this->Form->control('monto');
            echo $this->Form->control('proyectos_idproyectos', ['type' => 'hidden']);
            echo $this->Form->control('fecha_aporte', ['type' => 'hidden', 'value' => $now]);            
        ?>
    </fieldset>
    <?php if ($this->request->getSession()->read('Auth.User.tipo_usuario')=='A') : ?>
        <?= $this->Form->button(__('Efectivo')) ?>
    <?php endif; ?>
    <?php echo $this->Form->button('MercadoPago', ['type'=>'button','id' => 'boton', 'onClick'=>'guardarMonto()']);?>  
    <?= $this->Form->end() ?>
</div>

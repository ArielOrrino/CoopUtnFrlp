<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aporte $aporte
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        <li><?= $this->Html->link(__('Listar Aportes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo Aporte'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="aportes view large-9 medium-8 columns content">
    <h1>Recibo</h1>

<h3> Hemos recibido tu aporte, tu ayuda es muy valiosa, muchas gracias! </h3>
 <span> Tu aporte de $<?php echo $aporte->monto ?> fue registrado exitosamente, podras verlo en la pagina con el numero de control # <?php echo $aporte->idaportes ?> con fecha <?php echo $aporte->fecha_aporte ?></span>
</div>

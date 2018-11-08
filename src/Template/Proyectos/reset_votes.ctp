<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proyecto[]|\Cake\Collection\CollectionInterface $proyectos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
    <?php if ($this->request->getSession()->read('Auth.User.tipo_usuario')=='A') : ?> 
        <li><?= $this->Html->link(__('Nuevo Proyecto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Resetear Votos'), ['action' => 'resetVotes']) ?></li>
      <?php endif; ?>
        <li><?= $this->Html->link(__('Votar Proyecto'), ['action' => 'votos']) ?></li>
        <li><a href="../../noticias">Noticias de proyectos</a></li> 
    </ul>
</nav>
<div class="proyectos index large-9 medium-8 columns content">
    <h3><?= __('Votos reseteados correctamente') ?></h3>
    
</div>

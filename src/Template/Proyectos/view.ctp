<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proyecto $proyecto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        <?php if ($this->request->getSession()->read('Auth.User.tipo_usuario')=='A') : ?> 
          <li><?= $this->Html->link(__('Nuevo Proyecto'), ['action' => 'add']) ?> </li>
          <li><?= $this->Html->link(__('Editar Proyecto'), ['action' => 'edit', $proyecto->idproyectos]) ?> </li>
          <li><?= $this->Form->postLink(__('Borrar Proyecto'), ['action' => 'delete', $proyecto->idproyectos], ['confirm' => __('Esta seguro que desea eliminar el proyecto # {0}?', $proyecto->idproyectos)]) ?> </li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('Lista de Proyectos'), ['action' => 'index']) ?> </li>
        <li><a href="../../noticias">Noticias de proyectos</a></li> 
        
    </ul>
</nav>
<div class="proyectos view large-9 medium-8 columns content">
    <h3><?= h($proyecto->idproyectos) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre Proyecto') ?></th>
            <td><?= h($proyecto->nombre_proyecto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monto Necesario') ?></th>
            <td><?= $this->Number->format($proyecto->monto_necesario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad Votos') ?></th>
            <td><?= $this->Number->format($proyecto->cantidad_votos) ?></td>
        </tr>
        <?php $fechaCreacion = date("d/m/y",strtotime($proyecto->fecha_creacion)); ?>
        <?php if (!$proyecto->fecha_finalizado==null) : ?> 
                    <?php $fechaFinalizado = date("d/m/y",strtotime($proyecto->fecha_finalizado)); ?>                    
            <?php else : ?>
                        <?php $fechaFinalizado = null;  ?> 
            <?php endif; ?>
        <tr>
            <th scope="row"><?= __('Fecha Creacion') ?></th>
            <td><?= h($fechaCreacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Finalizado') ?></th>
            <td><?= h($fechaFinalizado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Detalles') ?></th>
            <td><?= h($proyecto->detalles) ?></td>
        </tr>
    </table>

</div>

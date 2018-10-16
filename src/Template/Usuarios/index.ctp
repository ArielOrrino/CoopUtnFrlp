<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario[]|\Cake\Collection\CollectionInterface $usuarios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        
    </ul>
</nav>
<div class="usuarios index large-9 medium-8 columns content">
    <h3><?= __('Usuarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>                
                <th scope="col"><?= $this->Paginator->sort('usuario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo_usuario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_login') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>                
                <td><?= h($usuario->usuario) ?></td>
                <td><?= h($usuario->email) ?></td>
                <td><input value= "<?= h($usuario->password) ?>" type ="password" id="myInput" readonly></td>
                <td><?= h($usuario->tipo_usuario) ?></td>    
                <td><?= h($usuario->create_time) ?></td>
                <td><?= h($usuario->last_login) ?></td>
                <td class="actions">
                 <?php if ($this->request->getSession()->read('Auth.User.usuario')==$usuario->usuario) : ?> 
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $usuario->id_usuarios]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $usuario->id_usuarios]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $usuario->id_usuarios], ['confirm' => __('Esta seguro que desea eliminar el usuario # {0}?', $usuario->id_usuarios)]) ?>
                <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primera')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultima') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} en total')]) ?></p>
    </div>
</div>

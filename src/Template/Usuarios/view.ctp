<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        <?php if ($this->request->getSession()->read('Auth.User.usuario')==$usuario->usuario) : ?> 
        <li><?= $this->Html->link(__('Editar Usuario'), ['action' => 'edit', $usuario->id_usuarios]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Usuario'), ['action' => 'delete', $usuario->id_usuarios], ['confirm' => __('Esta seguro que desea eliminar el usuario # {0}?', $usuario->id_usuarios)]) ?> </li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('Lista de Usuarios'), ['action' => 'index']) ?> </li>

    </ul>
</nav>
<div class="usuarios view large-9 medium-8 columns content">
 <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= h($usuario->usuario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($usuario->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><input value= "<?= h($usuario->password) ?>" type ="password" id="myInput" maxlength="8" size="8" readonly>
            <?php if ($this->request->getSession()->read('Auth.User.usuario')==$usuario->usuario) : ?> 
            <input type="checkbox" onclick="myFunction()">
            <?php endif; ?>  
        </td>                        
        </tr>        
        <tr>
            <th scope="row"><?= __('Fecha de Creacion') ?></th>
            <td><?= h($usuario->create_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ultimo Login') ?></th>
            <td><?= h($usuario->last_login) ?></td>
        </tr>
    </table>
</div>

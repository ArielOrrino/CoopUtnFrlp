<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        <li><?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $usuario->id_usuarios],
                ['confirm' => __('Esta seguro que desea eliminar el usuario {0}?', $usuario->id_usuarios)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="usuarios form large-9 medium-8 columns content">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Editar Usuario') ?></legend>
        <?php
            echo $this->Form->control('usuario');
            echo $this->Form->control('email');
            echo $this->Form->control('password', ['maxlength'=>"8", 'size'=>"8", 'id'=>'myInput']);
            echo $this->Form->control('tipo_usuario', ['maxlength'=>"1", 'size'=>"1"]);
            echo $this->form->input('Mostrar contraseña', ['type'=>'checkbox','onClick'=>'myFunction()']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submitir')) ?>
    <?= $this->Form->end() ?>
</div>

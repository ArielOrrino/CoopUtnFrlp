<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\Log\Log;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;
Configure::read('debug');
$cakeDescription = 'Cooperativa alumnos UTN';?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <?= $this->Html->css('login.css') ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="generator" content="Webnode 2">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="keywords" content="">
    <meta property="og:title" content="Cooperativa Alumnos Utn">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="Cooperativa Alumnos Utn">
    <script type="text/javascript" src="https://d1di2lzuh97fh2.cloudfront.net/files/3f/3fw/3fwae8.js?ph=a0eca4f8da"></script>
    <title>Cooperativa alumnos UTN</title>
    <link href="https://d1di2lzuh97fh2.cloudfront.net/files/3r/3rx/3rxffv.css?ph=a0eca4f8da" rel="stylesheet">
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?= $this->Html->meta('icon') ?> 

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
    <body class='login'>
        <?= $this->Flash->render() ?>
 <div class="contenedor-form" id='toggle'>
        <div class="toggle">
            <a class="link1" href="../../">Volver al inicio</a>   
        </div>
        <div class="formulario session" id='test'>
            <h2 id="IniciarS">Iniciar Sesión</h2>            
            <?=$this->Form->create() ?>
         
             <fieldset>               
                <?= $this->Form->control('usuario', ['id' => 'usuario', 'type'=>'text', 'name'=>'usuario','placeholder' => 'Usuario', 'label'=>false, 'required']) ?>
          
                <?= $this->Form->control('password', ['type'=>'password', 'name' => 'password','id' => 'password','required', 'placeholder' => 'Password', 'label'=>false,
                'required']) ?>
                <div id="botoneslog">
                <?= $this->Form->button('Iniciar Sesion') ?>
                <button id="vibrar" class="vibrar" onclick="vibrador()">vibrar</button>
                <?= $this->Form->Html->link('Registrarse',['controller'=>'usuarios','action'=>'add'],['class'=>'button', 'id' => 'registrarse']) ?>             
                </div>
                </fieldset> 
            <?=$this->Form->end() ?>
        </div>
    </div>
</body>
    <?= $this->Html->script('funciones.js') ?>
</html>
 
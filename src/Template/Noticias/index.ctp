<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Documentacion[]|\Cake\Collection\CollectionInterface $noticias
 */

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<div class="noticias index content">
    <h1 id="titnoticias">NOTICIAS DE PROYECTOS</h1>

<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div id="carouselproy" class="carousel-inner">
    <div class="carousel-item active">
        <?= $this->Html->image('proy/proy1.jpg', ['alt' => 'Proyecto1', 'class' => 'imgpro', 'width' => '1100', 'height' => '500'])?>
    </div>
    <div class="carousel-item">
        <?= $this->Html->image('proy/proy2.jpg', ['alt' => 'Proyecto2', 'class' => 'imgpro', 'width' => '1100', 'height' => '500'])?>
    </div>
    <div class="carousel-item">
        <?= $this->Html->image('proy/proy3.jpg', ['alt' => 'Proyecto3', 'class' => 'imgpro', 'width' => '1100','height' => '500'])?>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<!-- Plantilla Nuevas Noticias -->
 <div id="plantillaproy">
 <div class="row">
     <div class="notiproy col">
            <h3 class="titproy"> Proyecto 1 </h3>
            <?= $this->Html->image('proy/proy1.jpg', ['alt' => 'Proyecto1', 'width' => '500', 'height' => '200'])?>
            <p> Descripcion del proyecto</p>
    </div>
    <div class="notiproy col">
            <h3 class="titproy"> Proyecto 2 </h3>
            <?= $this->Html->image('proy/proy2.jpg', ['alt' => 'Proyecto2', 'width' => '500', 'height' => '200'])?>
            <p> Descripcion del proyecto</p>
    </div>
 </div>
 <div class="row">
    <div class="notiproy  col">
            <h3 class="titproy"> Proyecto 3 </h3>
            <?= $this->Html->image('proy/proy3.jpg', ['alt' => 'Proyecto3', 'width' => '500', 'height' => '200'])?>
            <p> Descripcion del proyecto</p>
    </div>
    <div class="notiproy col-6" >
            <h3 class="titproy"> Próximamente </h3>
            <?= $this->Html->image('proy/nuevoproy.jpg', ['alt' => 'NuevoProyecto', 'width' => '500', 'height' => '200'])?>
    </div>
    </div>
 </div>

    <!-- <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primera')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultima') . ' >>') ?>
        </ul>
       <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} en total')]) ?></p>
    </div> -->
</div>

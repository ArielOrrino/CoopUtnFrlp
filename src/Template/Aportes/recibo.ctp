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
    <div class = "recibo">
        <img class = "LogoRecibo" src="../../img/logoCoop.jpg">
        <h1>Recibo</h1>

        <h3> Hemos recibido tu aporte, tu ayuda es muy valiosa para continuar mejorando nuestra Universidad juntos, muchas gracias! </h3>
        <span> Tu aporte de $<?php echo $aporte->monto ?> fue registrado exitosamente, podras verlo en la pagina con el numero de control # <?php echo $aporte->idaportes ?> con fecha <?php echo $aporte->fecha_aporte ?></span>
<div class ='espacioQR'> 
    <span> Si lo deseas, podes escanear este codigo y te redirigirá a ver tu aporte</span>
    <div id='qr'>        
     </div> 
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="../../js/src/jquery.qrcode.js"></script>
<script type="text/javascript" src="../../js/src/qrcode.js"></script>

<script>
    jQuery('#qr').qrcode({
        text    : "http://localhost:8765/aportes/view/<?php echo $aporte->idaportes ?>",
        height: 100,
        width: 100,

    }); 
</script>


    </div>
</div>
  <!-- <textarea name="msg" rows="10" cols="40" value = "http://localhost:8765/aportes/view/<?php echo $aporte->idaportes ?>" onload="update_qrcode()"></textarea><br>  -->
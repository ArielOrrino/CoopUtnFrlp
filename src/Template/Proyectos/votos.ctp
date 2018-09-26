
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proyecto[]|\Cake\Collection\CollectionInterface $proyectos
 */
?>

<style>
progress {
  border: none;
  height: 3px;
}

progress::-webkit-progress-value {
  background: blue;
}

.btn {
    width: 70px;
    height: 35px;
    background-color: #008CBA;
    border-color: #007095;
    color: white;
}

.btn:hover {
    background-color: #007095;
}
</style>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Modulos') ?></li>
        <li><?= $this->Html->link(__('Nuevo Proyecto'), ['action' => 'add']) ?></li>
    </ul>
</nav>


<?php
    $request = $this->Url->build(['controller' => 'Proyectos', 'action' => 'vote', 'ext' => 'json']);
    ?>


<?php $projects = 0;
$votos_totales = 0;
foreach ($proyectos as $proyecto) {
    $projects++;
    $votos_totales += $proyecto->cantidad_votos;
}
?>

<div class="proyectos index large-9 medium-8 columns content">
    <h3><?= __('Proyectos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <tbody>
            <?php foreach ($proyectos as $proyecto): ?>
            <tr>
                <td><?= h($proyecto->nombre_proyecto) ?></td>
            </tr>
            <tr>
                <td><?php
                    if ($votos_totales != 0) {
                        echo round($proyecto->cantidad_votos*100/$votos_totales, 2);
                    } else {
                        echo 0;
                    }

                ?>%
                <br>
                <progress value="<?php
                    if ($votos_totales != 0) {
                        $p = round($proyecto->cantidad_votos*100/$votos_totales, 2);
                    } else {
                        $p = 0;
                    }
                    echo $p;
                ?>" max="100"><?php echo $p ?></progress>
                <br>
                <?php
                    echo $this->Form->create("Projects",array('url'=>'/proyectos/vote/'.$proyecto->idproyectos));
                    echo $this->Form->input('Votar', array('type' => 'submit', 'class'=>'btn'));
                    echo $this->Form->end();
                ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
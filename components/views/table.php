<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
if (!empty($table)): ?>


    <table class="table table-striped" >
        <thead class="table table-bordered">
        <tr>
            <th class="text-center" scope="col">Управление</th>
            <th class="text-center" scope="col">Руководитель</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($table as $a1): ?>
            <tr>
                <td class="text-center"><?= $a1->uprav_name ?></td>
                <td class="text-center"><?= $a1->director ?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>


<?php endif;?>

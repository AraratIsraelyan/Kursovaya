<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Dolzhnosti */

$this->title = 'Изменить должность: ' . $model->id_dolzhnosti;
$this->params['breadcrumbs'][] = ['label' => 'Должности', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_dolzhnosti, 'url' => ['view', 'id' => $model->id_dolzhnosti]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="dolzhnosti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

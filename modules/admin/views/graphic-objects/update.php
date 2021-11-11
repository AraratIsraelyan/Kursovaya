<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\GraphicObjects */

$this->title = 'Изменить график объекта: ' . $model->id_type_job;
$this->params['breadcrumbs'][] = ['label' => 'Graphic Objects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_type_job, 'url' => ['view', 'id' => $model->id_type_job]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="graphic-objects-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Material */

$this->title = 'Изменить материал: ' . $model->id_material;
$this->params['breadcrumbs'][] = ['label' => 'Материал', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_material, 'url' => ['view', 'id' => $model->id_material]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

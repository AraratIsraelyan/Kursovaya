<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Brigades */

$this->title = 'Изменить бригаду: ' . $model->id_brigad;
$this->params['breadcrumbs'][] = ['label' => 'Бригады', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_brigad, 'url' => ['view', 'id' => $model->id_brigad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="brigades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

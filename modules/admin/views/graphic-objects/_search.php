<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\GraphicObjectsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="graphic-objects-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_type_job') ?>

    <?= $form->field($model, 'id_object') ?>

    <?= $form->field($model, 'date_nachalo') ?>

    <?= $form->field($model, 'date_end') ?>

    <?= $form->field($model, 'job_name') ?>

    <?php // echo $form->field($model, 'date_cdachi') ?>

    <?php // echo $form->field($model, 'id_brigad') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TehnikaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tehnika-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tehnika') ?>

    <?= $form->field($model, 'id_object') ?>

    <?= $form->field($model, 'tehnic_name') ?>

    <?= $form->field($model, 'kolichestvo') ?>

    <?= $form->field($model, 'id_type_job') ?>

    <?php // echo $form->field($model, 'id_uprav') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

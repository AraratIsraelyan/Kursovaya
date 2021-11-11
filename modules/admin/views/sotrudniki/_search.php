<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SotrudnikiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sotrudniki-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sotrudnika') ?>

    <?= $form->field($model, 'id_brigad') ?>

    <?= $form->field($model, 'firstname') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'date_birth') ?>

    <?php // echo $form->field($model, 'date_naim') ?>

    <?php // echo $form->field($model, 'passport') ?>

    <?php // echo $form->field($model, 'phone_number') ?>

    <?php // echo $form->field($model, 'id_dolzhnosti') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

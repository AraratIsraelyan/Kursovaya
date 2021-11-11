<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\StroiUprav */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stroi-uprav-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uprav_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'director')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

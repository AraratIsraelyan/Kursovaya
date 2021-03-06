<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Dolzhnosti */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dolzhnosti-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dolzhnost_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'specialnost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'atribut1')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Objects;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Brigades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brigades-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brigad_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_uprav')->textInput() ?>


    <?= $form->field($model, 'id_brigadir')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BrigadesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brigades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_brigad') ?>

    <?= $form->field($model, 'brigad_name') ?>

    <?= $form->field($model, 'id_uprav') ?>

    <?= $form->field($model, 'id_object') ?>

    <?= $form->field($model, 'id_brigadir') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

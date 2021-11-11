<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\DolzhnostiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dolzhnosti-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_dolzhnosti') ?>

    <?= $form->field($model, 'dolzhnost_name') ?>

    <?= $form->field($model, 'specialnost') ?>

    <?= $form->field($model, 'atribut1') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

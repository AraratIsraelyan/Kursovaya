<?php

use yii\helpers\Html;
use app\models\Objects;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\modules\admin\models\Brigades;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\GraphicObjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="graphic-objects-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_object')->dropDownList(ArrayHelper::map(Objects::find()->all(), 'id_object', 'object_name'))  ?>

    <?= $form->field($model,'date_nachalo')->widget(DatePicker::classname(),['language' => 'ru',
        'value' => $model->date_nachalo,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ],])->label('Выберите конечную дату:') ?>

    <?= $form->field($model,'date_end')->widget(DatePicker::classname(),['language' => 'ru',
        'value' => $model->date_end,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ],])->label('Выберите конечную дату:') ?>

    <?= $form->field($model, 'job_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'date_cdachi')->widget(DatePicker::classname(),['language' => 'ru',
        'value' => $model->date_cdachi,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ],])->label('Выберите дату сдачи:') ?>

    <?= $form->field($model, 'id_brigad')->dropDownList(ArrayHelper::map(Brigades::find()->all(), 'id_brigad', 'brigad_name'))  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

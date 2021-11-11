<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Brigades;
use app\models\Dolzhnosti;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Sotrudniki */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sotrudniki-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_brigad')->dropDownList(ArrayHelper::map(Brigades::find()->all(), 'id_brigad', 'brigad_name'))  ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'date_birth')->widget(DatePicker::classname(),['language' => 'ru',
        'value' => $model->date_birth,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ],])->label('Выберите дату найма:')?>

    <?= $form->field($model,'date_naim')->widget(DatePicker::classname(),['language' => 'ru',
        'value' => $model->date_naim,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ],])->label('Выберите дату найма:')  ?>

    <?= $form->field($model, 'passport')->textInput() ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_dolzhnosti')->dropDownList(ArrayHelper::map(Dolzhnosti::find()->all(), 'id_dolzhnosti', 'dolzhnost_name'))  ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\GraphicObjects;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Material */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'material_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_type_job')->dropDownList(ArrayHelper::map(GraphicObjects::find()->all(), 'id_type_job', 'job_name'))  ?>

    <?= $form->field($model, 'kolvo')->textInput() ?>

    <?= $form->field($model, 'ispolzovano')->textInput() ?>

    <?= $form->field($model, 'stoimost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

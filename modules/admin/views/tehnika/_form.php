<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Objects;
use app\modules\admin\models\Stroi_uprav;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Tehnika */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tehnika-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_object')->dropDownList(ArrayHelper::map(Objects::find()->all(), 'id_object', 'object_name'))  ?>

    <?= $form->field($model, 'tehnic_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kolichestvo')->textInput() ?>

    <?= $form->field($model, 'id_type_job')->dropDownList(ArrayHelper::map(\app\modules\admin\models\GraphicObjects::find()->all(), 'id_type_job', 'job_name'))  ?>

    <?= $form->field($model, 'id_uprav')->dropDownList(ArrayHelper::map(\app\modules\admin\models\StroiUprav::find()->all(), 'id_uprav', 'uprav_name'))  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Objects;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Zakazchiki */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zakazchiki-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_object')->dropDownList(ArrayHelper::map(Objects::find()->all(), 'id_object', 'object_name'))  ?>

    <?= $form->field($model, 'zak_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

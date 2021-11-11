<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Zapros1;
use app\models\Tehnika;
use app\models\StroiUprav;
use app\models\Objects;
use app\models\Marerial;
use app\models\GraphicObjects;
use yii\grid\GridView;
use kartik\date\DatePicker;
use app\models\Brigades;

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Запрос 6</title>
</head>
<body>
<h1>13.	Получить перечень бригад, выполненных указанный вид строительных работ в течение обозначенного периода времени с указанием объектов, где эти работы выполнялись.</h1>

<?php $form = ActiveForm::begin();?>

<?=$form->field($model,'object_name')->dropDownList(ArrayHelper::map(GraphicObjects::find()->all(), 'id_type_job', 'job_name'))
    ->label('Выберите вид работы:')?>

<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model,'date_nachalo')->widget(DatePicker::classname(),['language' => 'ru',
            'value' => $model->date_nachalo,
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ],])->label('Выберите начальную дату:') ?>
    </div>
    <div class="col-sm-6">
        <?=   $form->field($model,'date_end')->widget(DatePicker::classname(),['language' => 'ru',
            'value' => $model->date_end,
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ],])->label('Выберите конечную дату:') ?>
    </div>
</div>

<?= Html::submitButton('Отправить',['class'=>'btn btn-success'])?>
<?php ActiveForm::end(); ?>
<?php if ($model->load(Yii::$app->request->post())):  ?>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'object.object_name', 'brigad_name',
        ],
    ]);?>
<?php endif; ?>
<br>
<a href="?r=site/queries/" class="btn btn-success" role="button" aria-pressed="true">Назад</a>
</body>
</html>

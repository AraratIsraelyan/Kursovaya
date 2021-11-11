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

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Запрос 7</title>
</head>
<body>
<h1>7.	Получить график и смету на строительство указанного объекта. </h1>

<?php $form = ActiveForm::begin();?>
<?=$form->field($model,'object_name')->dropDownList(ArrayHelper::map(Objects::find()->all(), 'id_object', 'object_name'))
    ->label('Выберите объект:'),

Html::submitButton('Отправить',['class'=>'btn btn-success'])?>
<?php ActiveForm::end(); ?>
<?php if ($model->load(Yii::$app->request->post())):  ?>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'material_name','typeJob.date_nachalo','typeJob.date_end',
        ],
    ]);?>
<?php endif; ?>
<br>
<a href="?r=site/queries/" class="btn btn-success" role="button" aria-pressed="true">Назад</a>
</body>
</html>

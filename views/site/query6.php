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
    <title>Запрос 6</title>
</head>
<body>
<h1>6. Получить перечень строительной техники, выделенной на указанный объект либо работавшей там в течение указанного периода времени. </h1>

<?php $form = ActiveForm::begin();?>
<?=$form->field($model, 'check')->radioList([
    '0' => 'Поиск по объекту',
    '1' => 'Поиск по промежутку времени',
])->label('Выберите параметр поиска:'),
$form->field($model,'object_name')->dropDownList(ArrayHelper::map(Objects::find()->all(), 'id_object', 'object_name'))
    ->label('Выберите объект:'),
//$form->field($model,'date_nachalo')->input('date')->label('Выберите начальную дату:'),

$form->field($model,'date_nachalo')->widget(DatePicker::classname(),['language' => 'ru',
    'value' => $model->date_nachalo,
    'pluginOptions' => [
'format' => 'yyyy-mm-dd',
'todayHighlight' => true
],])->label('Выберите начальную дату:'),

//$form->field($model,'date_end')->input('date')->label('Выберите конечную дату:'),

$form->field($model,'date_end')->widget(DatePicker::classname(),['language' => 'ru',
    'value' => $model->date_end,
    'pluginOptions' => [
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true
    ],])->label('Выберите конечную дату:'),

   /* if (!empty($form->field($model,'date_nachalo')) &&  !empty($form->field($model,'date_end'))) {
        ($form->field($model,'date_nachalo')->input('date', '00-00-0000')
        ($form->field($model,'date_end')->input('date', '09-09-9999'),
    }*/
Html::submitButton('Отправить',['class'=>'btn btn-success'])?>
<?php ActiveForm::end(); ?>
<?php if ($model->load(Yii::$app->request->post())):  ?>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'tehnic_name','typeJob.date_nachalo','typeJob.date_end',
        ],
    ]);?>
<?php endif; ?>
<br>
<a href="?r=site/queries/" class="btn btn-success" role="button" aria-pressed="true">Назад</a>
</body>
</html>

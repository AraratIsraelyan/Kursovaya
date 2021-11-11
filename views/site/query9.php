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
use kartik\date\DatePicker;
use yii\grid\GridView;
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Запрос 3</title>
</head>
<body>
<p style="font-size: 28px">9. Получить перечень объектов, возводимых в некотором строительном управлении или в целом по организации, на которых в обозначенный период времени выполнялся указанный вид строительных работ. </p>

<?php $form = ActiveForm::begin();
$z2 = Objects::find()
    ->select('id_object')
    ->all();
$z3 = Objects::find()
    ->select('id_uprav')
    ->all();
?>
<?=$form->field($model,'uprav_name')->dropDownList(ArrayHelper::map(StroiUprav::find()->where(['in','id_uprav',$z3])->all(), 'id_uprav', 'uprav_name'))
    ->label('Выберите строительное управление:'),
$form->field($model,'job_name')->dropDownList(ArrayHelper::map(GraphicObjects::find()->where(['in','id_object',$z2])->all(), 'id_type_job', 'job_name'))
    ->label('Выберите тип выполняемых работ:'),

$form->field($model,'date_nachalo')->widget(DatePicker::classname(),['language' => 'ru',
    'value' => $model->date_nachalo,
    'pluginOptions' => [
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true
    ],])->label('Выберите начальную дату:'),

$form->field($model,'date_end')->widget(DatePicker::classname(),['language' => 'ru',
    'value' => $model->date_end,
    'pluginOptions' => [
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true
    ],])->label('Выберите конечную дату:'),

Html::submitButton('Отправить',['class'=>'btn btn-success'])
?>
<br><br><br>
<?php ActiveForm::end(); ?>

<?php if ($model->load(Yii::$app->request->post())):  ?>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'object_name',

        ],
    ]);?>
<?php endif; ?>

<a href="?r=site/queries/" class="btn btn-success" role="button" aria-pressed="true">Назад</a>
</body>
</html>
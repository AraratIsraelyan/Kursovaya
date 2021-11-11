<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Objects;
use app\models\GraphicObjects;
use app\models\StroiUprav;
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
<h1>5.	Получить перечень строительной техники, переданной указанному строительному управлению. </h1>
<?php $form = ActiveForm::begin();?>
<?=$form->field($model,'uprav_name')->dropDownList(ArrayHelper::map(StroiUprav::find()->all(), 'id_uprav', 'uprav_name'))
    ->label('Выберите управление:'),

Html::submitButton('Отправить',['class'=>'btn btn-success'])?>
<?php ActiveForm::end(); ?>

<?php if ($model->load(Yii::$app->request->post())):  ?>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tehnic_name', 'kolichestvo',
        ],
    ]);
    ?>
<?php endif; ?>
<a href="?r=site/queries/" class="btn btn-success" role="button" aria-pressed="true">Назад</a>
</body>
</html>
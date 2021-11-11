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
<h1>1.	Получить перечень строительных управлений и/или участков и их руководителей</h1>


    <?php /*=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'uprav_name','director',
        ],
    ]);*/?>

<br>
<div><?= app\components\TableWidget::widget()?></div>

<a href="?r=site/queries/" class="btn btn-success" role="button" aria-pressed="true">Назад</a>
</body>
</html>

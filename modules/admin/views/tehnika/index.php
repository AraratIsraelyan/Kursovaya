<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TehnikaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Техника';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tehnika-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить технику', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tehnika',
            'id_object',
            'tehnic_name',
            'kolichestvo',
            'id_type_job',
            'uprav.uprav_name',
            //'id_uprav',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
<a href="?r=admin" class="btn btn-success" role="button" aria-pressed="true">Назад</a>
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\GraphicObjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Виды работ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="graphic-objects-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить график объекта', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
    //    'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'job_name',
            'object.object_name',
            'date_nachalo',
            'date_end',
            'job_name',
            'date_cdachi',
          //  'id_brigad',
            'brigad.brigad_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <a href="?r=admin" class="btn btn-success" role="button" aria-pressed="true">Назад</a>
</div>

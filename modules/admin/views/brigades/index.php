<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\BrigadesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Бригады';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brigades-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить бригаду', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
     //   'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id_brigad',
            'brigad_name',
          //  'id_uprav',
            'object.object_name',
            //'id_object',
            'id_brigadir',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <a href="?r=admin" class="btn btn-success" role="button" aria-pressed="true">Назад</a>
</div>

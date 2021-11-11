<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\StroiUpravSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Строительное управление';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stroi-uprav-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить строительное управление', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'id_uprav',
            
            'uprav_name',
            'director',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <a href="?r=admin" class="btn btn-success" role="button" aria-pressed="true">Назад</a>
</div>

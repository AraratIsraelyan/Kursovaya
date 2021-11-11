<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Dolzhnosti */

$this->title = $model->id_dolzhnosti;
$this->params['breadcrumbs'][] = ['label' => 'Должности', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dolzhnosti-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['Update', 'id' => $model->id_dolzhnosti], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['Delete', 'id' => $model->id_dolzhnosti], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
      //      'id_dolzhnosti',
            'dolzhnost_name',
            'specialnost',
            'atribut1',
        ],
    ]) ?>

</div>

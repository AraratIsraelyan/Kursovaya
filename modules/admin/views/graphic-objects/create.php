<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\GraphicObjects */

$this->title = 'Добавить вид работы';
$this->params['breadcrumbs'][] = ['label' => 'График объекта', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="graphic-objects-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

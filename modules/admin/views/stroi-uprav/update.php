<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\StroiUprav */

$this->title = 'Добавить строительное управление: ' . $model->id_uprav;
$this->params['breadcrumbs'][] = ['label' => 'Строительное управление', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_uprav, 'url' => ['view', 'id' => $model->id_uprav]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="stroi-uprav-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

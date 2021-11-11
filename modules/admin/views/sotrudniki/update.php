<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Sotrudniki */

$this->title = 'Изменить сотрудника: ' . $model->id_sotrudnika;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sotrudnika, 'url' => ['view', 'id' => $model->id_sotrudnika]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="sotrudniki-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

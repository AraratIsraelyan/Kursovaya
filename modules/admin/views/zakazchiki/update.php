<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Zakazchiki */

$this->title = 'Изменить заказчика: ' . $model->id_zakazchika;
$this->params['breadcrumbs'][] = ['label' => 'Заказчики', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_zakazchika, 'url' => ['view', 'id' => $model->id_zakazchika]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="zakazchiki-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

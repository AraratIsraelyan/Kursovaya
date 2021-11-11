<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Tehnika */

$this->title = 'Изменить технику: ' . $model->id_tehnika;
$this->params['breadcrumbs'][] = ['label' => 'Техника', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tehnika, 'url' => ['view', 'id' => $model->id_tehnika]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="tehnika-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

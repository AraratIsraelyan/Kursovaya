<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Tehnika */

$this->title = 'Добавить технику';
$this->params['breadcrumbs'][] = ['label' => 'Техника', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tehnika-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

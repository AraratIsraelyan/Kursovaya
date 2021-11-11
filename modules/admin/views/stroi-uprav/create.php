<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\StroiUprav */

$this->title = 'Добавить строительное управление';
$this->params['breadcrumbs'][] = ['label' => 'Строительное управление', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stroi-uprav-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

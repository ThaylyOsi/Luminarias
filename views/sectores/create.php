<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sectores $model */

$this->title = Yii::t('app', 'Create Sectores');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sectores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sectores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

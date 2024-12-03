<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sectores $model */

$this->title = Yii::t('app', 'Update Sectores: {name}', [
    'name' => $model->id_sector,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sectores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sector, 'url' => ['view', 'id_sector' => $model->id_sector]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sectores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

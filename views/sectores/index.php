<?php

use app\models\Sectores;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SectoresSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Sectores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sectores-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Sectores'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sector',
            'nombre_sector',
            'capacidad_sector',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Sectores $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_sector' => $model->id_sector]);
                 }
            ],
        ],
    ]); ?>


</div>

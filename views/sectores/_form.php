<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Sectores $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sectores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_sector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capacidad_sector')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

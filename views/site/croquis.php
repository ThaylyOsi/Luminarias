<?php
    use yii\helpers\Html;
    use app\assets\AppAsset;
    AppAsset::register($this); 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CROQUIS DE SISTEMAS</title>
    </head>
    <body>
        <H1><b>Laboratorio de Sistemas y Computación</b></H1>

        <div class="image-container">
            <?= Html::img('@web/images/img_lab_hd.png', ['alt' => 'Mi Imagen']); ?>
            <!--?= Html::button('LC1', ['class' =>'button_lc1']); ?-->
        
            <?= Html::button('LC1', ['Class' => 'btn_lc', 'Id' => 'btn_lc1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/lc1']) . "';"]) ?>
            <?= Html::button('LC2', ['class' => 'btn_lc', 'id' => 'btn_lc2', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/lc2']) . "';"]) ?>
            <?= Html::button('LC3', ['class' => 'btn_lc', 'id' => 'btn_lc3', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/lc3']) . "';"]) ?>
            <?= Html::button('LC4', ['class' => 'btn_lc', 'id' => 'btn_lc4', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/lc4']) . "';"]) ?>
            <?= Html::button('LC5', ['class' => 'btn_lc', 'id' => 'btn_lc5', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/lc5']) . "';"]) ?>
            <?= Html::button('LC6', ['class' => 'btn_lc', 'id' => 'btn_lc6', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/lc6']) . "';"]) ?>     
        </div>

    </body>
</html>

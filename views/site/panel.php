<?php
    use yii\helpers\Html;
    use app\assets\AppAsset;
    AppAsset::register($this); 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>PANEL DE CONTROL</title>
    </head>
    <body id="panel-body">

        <main id="panel-main">
            <H1><b>Panel de Control</b></H1>
            <br>

            <div id="panel-container">
            <div class="panel-section" id="all">
                    <div class="name-container">BBB</div>
                    <div class="img-container">MMM</div>
                    <div class="btn-container">
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                    </div>             
                </div>
            <div class="panel-section" id="jefatura">
                    <div class="name-container">BBB</div>
                    <div class="img-container">MMM</div>
                    <div class="btn-container">
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                    </div>            
                </div>
                <div class="panel-section" id="oficinas">
                    <div class="name-container">BBB</div>
                    <div class="img-container">MMM</div>
                    <div class="btn-container">
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                    </div>             
                </div>
                <div class="panel-section" id="pasillo">
                    <div class="name-container">BBB</div>
                    <div class="img-container">MMM</div>
                    <div class="btn-container">
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                    </div>           
                </div>                
                <div class="panel-section" id="lc1">
                    <div class="name-container">BBB</div>
                    <div class="img-container">MMM</div>
                    <div class="btn-container">
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                    </div>             
                </div>
                <div class="panel-section" id="lc2">
                    <div class="name-container">BBB</div>
                    <div class="img-container">MMM</div>
                    <div class="btn-container">
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                    </div>             
                </div>
                <div class="panel-section" id="lc3">
                    <div class="name-container">BBB</div>
                    <div class="img-container">MMM</div>
                    <div class="btn-container">
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                    </div>             
                </div>
                <div class="panel-section" id="lc4">
                    <div class="name-container">BBB</div>
                    <div class="img-container">MMM</div>
                    <div class="btn-container">
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                    </div>             
                </div>
                <div class="panel-section" id="lc5">
                    <div class="name-container">BBB</div>
                    <div class="img-container">MMM</div>
                    <div class="btn-container">
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                    </div>             
                </div>
                <div class="panel-section" id="lc6">
                    <div class="name-container">BBB</div>
                    <div class="img-container">MMM</div>
                    <div class="btn-container">
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                    </div>            
                </div>
                <div class="panel-section" id="lc">
                    <div class="name-container">BBB</div>
                    <div class="img-container">MMM</div>
                    <div class="btn-container">
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                    </div>             
                </div>
                <div class="panel-section" id="">
                    <div class="name-container">BBB</div>
                    <div class="img-container">MMM</div>
                    <div class="btn-container">
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                    </div>             
                </div>
                <div class="panel-section" id="">
                    <div class="name-container">BBB</div>
                    <div class="img-container">MMM</div>
                    <div class="btn-container">
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                    </div>             
                </div>
                <div class="panel-section" id="">
                    <div class="name-container">BBB</div>
                    <div class="img-container">MMM</div>
                    <div class="btn-container">
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                        <?= Html::button('ON/OFF', ['class' => 'btn_OnOff_Panel', 'id' => 'OnOff1', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/encender']) . "';"]) ?> 
                    </div>            
                </div>
            </div>        
        </main>
    </body>
</html>
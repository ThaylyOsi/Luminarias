<?php
    use yii\helpers\Html;
    use app\assets\AppAsset;
    AppAsset::register($this); 
?>

<?php

    /** @var yii\web\View $this */

    $this->title = 'My Yii Application';
?>

<body id="body-index">
    
    <div class="all-container">

        <div class="header-container all-container-div">
            <h1 class="titulo">BIENVENIDOS</h1>

            <p class="subtitulo">Proyecto de asistencia de luminarias</p>

            <p class="texto">Hecho por: </br> 
                Thayly Osiris Cerecedo Vera </br> 
                Cristian Irán Hernández Gonzaga
            </p>
            <div class="btn_mgc-container">
                <?= Html::button('CROQUIS', ['Class' => 'btn_mgc', 'Id' => 'button', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/croquis']) . "';"]) ?>
                <?= Html::button('PANEL', ['Class' => 'btn_mgc', 'Id' => 'button', 'onclick' => "location.href='" . \yii\helpers\Url::to(['site/panel']) . "';"]) ?>
                <?= Html::button('Ventana', ['class' => 'button_ventana', 'onclick' => "openAssistantWindow()"])?>
            </div>
  
        </div>

        <div class="body-content all-container-div">

            <div class="row">
                <div class="col1">
                    <h2>Propósito</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>

                    <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
                </div>
                <div class="col2">
                    <h2>Contexto</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>

                    <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
                </div>
                <div class="col3">
                    <h2>Integrantes</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>

                    <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
                </div>
            </div>

        </div>
    </div>

//Parte de Cristian

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        var assistantWindow;

        function openAssistantWindow() {
            // Ejecuta el asistente virtual
            $.ajax({
                url: '<?= Url::to(['site/run-python']) ?>',
                method: 'GET',
                success: function(response) {
                    console.log('Asistente virtual iniciado');
                },
                error: function() {
                    console.log('Error al iniciar el asistente virtual');
                }
            });
            // Calcula el centro de la pantalla
            var width = 600;
            var height = 350;
            var left = (screen.width / 2) - (width / 2);
            var top = (screen.height / 2) - (height / 2);

        
            // Abre la ventana emergente centrada
            assistantWindow = window.open("", "Asistente Virtual", "width=" + width + ",height=" + height + ",top=" + top + ",left=" + left);
            assistantWindow.document.write(`
                <div class='popup-content'>
                    <img src="/proyecto1/web/images/MovimientoAudio.gif" alt="GIF animado" style="width:100%; height:auto;">
                </div>
            `);
            
        
        }

        function closeAssistantWindow() {
            if (assistantWindow && !assistantWindow.closed) {
                assistantWindow.close();
            }
        }

        // Escucha mensajes desde el servidor
        const eventSource = new EventSource("<?= Url::to(['site/event-stream']) ?>");
        eventSource.onmessage = function(event) {
            if (event.data === "close") {
                closeAssistantWindow();
            }
        };
    </script>

</body>
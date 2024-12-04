<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

// De Cris - ini

public function actionRunPython()
{
    // Ruta al archivo Python
    $pythonScript = Yii::getAlias('@app/web/python/AsistenteVirtualM2.py');

    // Ejecuta el archivo Python
    $output = shell_exec("python $pythonScript 2>&1");

    // Muestra la salida del script Python
    return $this->renderContent("<pre>$output</pre>");
}

//////////////////////////////////////////////////////////////////////////////////////////
public function actionAsistente()
{

    $output = exec("python C:/xampp/htdocs/proyecto1/web/python/AsistenteVirtualM2.py");
    echo $output. '--';
}

public function actionStopPython()
{
    // Ruta al archivo de señal
    $stopSignalFile = Yii::getAlias('@app/web/python/stop_signal.txt');

    // Crear el archivo de señal
    file_put_contents($stopSignalFile, 'stop');

    return $this->renderContent("El asistente virtual ha sido detenido.");

    
}

public function actionCloseEndpoint()
{
    // Envía un mensaje a los clientes conectados para cerrar la ventana
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    echo "data: close\n\n";
    flush();
}
// De Cris - fin

////////////////////////////////////////////////////////////////

    //Apertura del croquis del Laboratorio de Sistemas y Computación
    public function actionCroquis(){
        return $this->render('croquis');
    }

    //Aperturar la Sala LC1
    public function actionLc1 (){
        return $this->render('lc1');
    }

    //Aperturar la Sala LC2
    public function actionLc2 (){
        return $this->render('lc2');
    }

    //Aperturar la Sala LC3
    public function actionLc3 (){
        return $this->render('lc3');
    }

    //Aperturar la Sala LC4
    public function actionLc4 (){
        return $this->render('lc4');
    }

    //Aperturar la Sala LC5
    public function actionLc5 (){
        return $this->render('lc5');
    }

    //Aperturar la Sala LC6
    public function actionLc6 (){
        return $this->render('lc6');
    }

  //Aperturar el Panel
  public function actionPanel (){
    return $this->render('panel');
}

///////////////////////////////////////////////////////////////////

/* Cris cambió este método original
    //Encender
    public function actionEncender(){
        $valor = "Hola";
        $salida =exec("python ligero.py ".$valor);
        echo $salida;
    }
*/

// De Cris - ini
    //Prueba para Encender
    public function actionEncender(){
        $valor = "buen día jovenes";
        $output = exec("python C:/xampp/htdocs/proyecto1/views/site/ligero.py \"$valor\"");
        echo $output.'--';
       
    }

    //Encender
    public function actionEncenderLed($valor=null){
        $valor = "encender_LC1";
        $output = exec("python C:/xampp/htdocs/proyecto1/views/site/encenderled.py \"$valor\"");
        echo $output.'--';
       
    }
// De Cris - fin

}

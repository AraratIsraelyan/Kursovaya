<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use app\models\Objects;
use app\models\Brigades;
use app\models\Dolzhnosti;
use app\models\GraphicObjects;
use app\models\Material;
use app\models\Sotrudniki;
use app\models\StroiUprav;
use app\models\Tehnika;
use app\models\Zakazchiki;
use app\Models\Zapros1;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
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
        $this -> view -> title = 'Главная';
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

    public function actionQuery1(){
        $this -> view -> title = 'Запрос 1';
        $dataProvider = new ActiveDataProvider([
            'query' => StroiUprav::find()
                ->orderBy('uprav_name'),
            'pagination' => [
                'pageSize' => 1,
            ],
        ]);
        return $this->render('query1', ['dataProvider' => $dataProvider,]);
    }

    public function actionQuery2(){
        $this -> view -> title = 'Запрос 2';
        $model = new Zapros1();
        if ($model->load(Yii::$app->request->post())) {
            $uname = $model->uprav_name;
            $oname = $model->object_name;
            $checki = $model->check;

            if ($checki == '0'){
                $dataProvider = new ActiveDataProvider([
                    'query' => Sotrudniki::find()
                        ->JoinWith(['brigad','dolzhnosti'])
                        ->Where(['specialnost' => 'инженер'])
                        ->orWhere(['specialnost' => 'техник'])
                        ->andWhere(['brigades.id_object' => $oname]),
                    'pagination' => [
                        'pageSize' => 10,
                    ],
                ]);
        }
        if ($checki == '1'){
            $dataProvider = new ActiveDataProvider([
                'query' => Sotrudniki::find()
                    ->JoinWith(['brigad','dolzhnosti'])
                    ->Where(['specialnost' => 'инженер'])
                    ->orWhere(['specialnost' => 'техник']),
                    //->andWhere(['brigades.id_object' => $oname]),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
        }
            return $this->render('query2',['model' => $model,'dataProvider' => $dataProvider,'oname' => $oname, 'uname' => $uname, 'checki' => $checki]);
        }
        else {return  $this->render('query2',['model' => $model,]);}
    }

    public function actionQuery3()
    {
        $this -> view -> title = 'Запрос 3';
        $model = new Zapros1();
        if ($model->load(Yii::$app->request->post())) {
            $uname = $model->uprav_name;
            $dataProvider = new ActiveDataProvider([
                'query' => GraphicObjects::find()
                    ->JoinWith('object.uprav')
                    ->JoinWith('object')
                    ->where(['in', 'stroi_uprav.id_uprav', $uname]),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
            return $this->render('query3', ['model' => $model, 'dataProvider' => $dataProvider,]);
        }
        else {
            return $this->render('query3', ['model' => $model]);}
    }

    public function actionQuery4(){
        $this -> view -> title = 'Запрос 4';
        $model = new Zapros1();
        if ($model->load(Yii::$app->request->post())) {
            $uname = $model->object_name;
            $dataProvider = new ActiveDataProvider([
                'query' => Sotrudniki::find()
                    ->JoinWith('brigad.object')
                    ->JoinWith('brigad')
                    ->where(['in', 'objects.id_object', $uname])
                ->orderBy('brigades.brigad_name'),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
            return $this->render('query4', ['model' => $model, 'dataProvider' => $dataProvider,]);
        }
        else {
            return $this->render('query4', ['model' => $model]);}
    }

    public function actionQuery5(){
        $this -> view -> title = 'Запрос 5';
        $model = new Zapros1();
        if ($model->load(Yii::$app->request->post())) {
            $uname = $model->uprav_name;
            $dataProvider = new ActiveDataProvider([
                'query' => Tehnika::find()
                    ->JoinWith('uprav')
                    ->where(['in', 'stroi_uprav.id_uprav', $uname])
                    ->orderBy('tehnic_name'),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
            return $this->render('query5', ['model' => $model, 'dataProvider' => $dataProvider,]);
        }
        else {
            return $this->render('query5', ['model' => $model]);}
    }


    public function actionQuery6(){
        $this -> view -> title = 'Запрос 6';
        $model = new Zapros1();
        if ($model->load(Yii::$app->request->post())){
            $name = $model->object_name;
            $jobs = $model->job_name;
            $nachalo = $model->date_nachalo;
            $finale = $model->date_end;
            $checki = $model->check;

            if ($checki == '0'){
                $dataProvider = new ActiveDataProvider([
                    'query' => Tehnika::find()
                        ->JoinWith(['typeJob'])
                        ->Where(['tehnika.id_object' => $name]),
                    'pagination' => [
                        'pageSize' => 10,
                    ],
                ]);
                $dataProvider->setSort([
                    'attributes' => [
                        'technik_name',
                        'typeJob.date_nachalo' => [
                            'asc' => ['graphic_object.date_nachalo' => SORT_ASC],
                            'desc' => ['graphic_object.date_nachalo' => SORT_DESC],
                        ],
                        'typeJob.date_end' => [
                            'asc' => ['graphic_object.date_end' => SORT_ASC],
                            'desc' => ['graphic_object.date_end' => SORT_DESC],
                        ],
                    ]
                ]);
            }
            if ($checki == '1'){
                $dataProvider = new ActiveDataProvider([
                    'query' => Tehnika::find()
                        ->JoinWith(['typeJob'])
                        //->Where(['in','graphic_object.id_object', $name]),
                        ->andWhere(['>', 'graphic_objects.date_nachalo', $nachalo])
                        ->andWhere(['<', 'graphic_objects.date_end', $finale]),
                    'pagination' => [
                        'pageSize' => 10,
                    ],
                ]);
                $dataProvider->setSort([
                    'attributes' => [
                        'technik_name',
                        'typeJob.date_nachalo' => [
                            'asc' => ['graphic_objects.date_nachalo' => SORT_ASC],
                            'desc' => ['graphic_objects.date_nachalo' => SORT_DESC],
                        ],
                        'typeJob.date_end' => [
                            'asc' => ['graphic_objects.date_end' => SORT_ASC],
                            'desc' => ['graphic_objects.date_end' => SORT_DESC],
                        ],
                    ]
                ]);
            }
            return $this->render('query6',['model' => $model,'dataProvider' => $dataProvider,'oname' => $oname, 'uname' => $uname, 'checki' => $checki]);
        }
        else {return  $this->render('query6',['model' => $model,]);}
    }

    public function actionQuery7(){
        $this -> view -> title = 'Запрос 7';
        $model = new Zapros1();
        if ($model->load(Yii::$app->request->post())){
            $name = $model->object_name;
            $nachalo = $model->date_nachalo;
            $finale = $model->date_end;
        $dataProvider = new ActiveDataProvider([
            'query' => Material::find()
                ->JoinWith(['typeJob'])
                ->where(['graphic_objects.id_object' => $name])
                ->groupBy('graphic_objects.id_object'),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        $dataProvider->setSort([
                'attributes' => [
                    'material_name',
                    'typeJob.date_nachalo' => [
                        'asc' => ['graphic_objects.date_nachalo' => SORT_ASC],
                        'desc' => ['graphic_objects.date_nachalo' => SORT_DESC],
                    ],
                    'typeJob.date_end' => [
                        'asc' => ['graphic_objects.date_end' => SORT_ASC],
                        'desc' => ['graphic_objects.date_end' => SORT_DESC],
                    ],
                ]
            ]);
            return $this->render('query7',['name' => $name,'jobs' => $jobs, 'nachalo' => $nachalo, 'finale' => $finale, 'model' => $model, 'dataProvider' => $dataProvider,]);}
        else {
            return $this->render('query7',['model' => $model,]);
        }
    }

    public function actionQuery8(){
        $this -> view -> title = 'Запрос 8';
        $model = new Zapros1();
        if ($model->load(Yii::$app->request->post())){
            $name = $model->object_name;
            $nachalo = $model->date_nachalo;
            $finale = $model->date_end;
            $dataProvider = new ActiveDataProvider([
                'query' => GraphicObjects::find()
                    ->JoinWith(['object'])
                    ->where(['graphic_objects.id_object' => $name])
                    ->andwhere(['IS NOT','graphic_objects.date_cdachi', null]),
                    //->groupBy('graphic_objects.id_object'),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            return $this->render('query8',['name' => $name,'jobs' => $jobs, 'nachalo' => $nachalo, 'finale' => $finale, 'model' => $model, 'dataProvider' => $dataProvider,]);}
        else {
            return $this->render('query8',['model' => $model,]);}
    }

    public function actionQuery9(){
        $this -> view -> title = 'Запрос 9';
        $model = new Zapros1();
        if ($model->load(Yii::$app->request->post())){
            $name = $model->uprav_name;
            $jobs = $model->job_name;
            $nachalo = $model->date_nachalo;
            $finale = $model->date_end;

            $dataProvider = new ActiveDataProvider([
                'query' => Objects::find()
                    ->JoinWith(['graphicObjects', 'uprav'])
                    ->where(['stroi_uprav.id_uprav' => $name])
                    ->andWhere(['in','graphic_Objects.id_type_job',$jobs])
                    ->andWhere(['<', 'graphic_Objects.date_end', $finale])
                    ->andWhere(['>', 'graphic_Objects.date_nachalo', $nachalo]),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
            $dataProvider->setSort([
                'attributes' => [
                    'object_name',
                ]
            ]);
            return $this->render('query9',['name' => $name,'jobs' => $jobs, 'nachalo' => $nachalo, 'finale' => $finale, 'model' => $model, 'dataProvider' => $dataProvider,]);}
        else {
            return $this->render('query9',['model' => $model,]);
        }
    }

    public function actionQuery10(){
        $this -> view -> title = 'Запрос 10';
        $model = new Zapros1();
        if ($model->load(Yii::$app->request->post())) {
            $uname = $model->uprav_name;
            $oname = $model->object_name;
            $jobs = $model->job_name;
            $nachalo = $model->date_nachalo;
            $finale = $model->date_end;
            $checki = $model->check;

            if ($checki == '0') {
                $dataProvider = new ActiveDataProvider([
                    'query' => GraphicObjects::find()
                        ->JoinWith(['object', 'object.uprav'])
                        //->where(['stroi_uprav.id_uprav' => $uname])
                        ->where(['graphic_objects.id_object' => $oname])
                        ->andwhere(['>','graphic_objects.date_cdachi', 'graphic_objects.date_end']),
                    'pagination' => [
                        'pageSize' => 10,
                    ],
                ]);
            }
            elseif ($checki == '1') {
                $dataProvider = new ActiveDataProvider([
                    'query' => GraphicObjects::find()
                        ->JoinWith(['object', 'object.uprav'])
                        ->where(['stroi_uprav.id_uprav' => $uname])
                        //->where(['graphic_objects.id_object' => $oname])
                        ->andwhere(['>','graphic_objects.date_cdachi', 'graphic_objects.date_end']),
                    'pagination' => [
                        'pageSize' => 10,
                    ],
                ]);
            }
            elseif ($checki == '2') {
                $dataProvider = new ActiveDataProvider([
                    'query' => GraphicObjects::find()
                        ->JoinWith(['object', 'object.uprav'])
                        ->andwhere(['>','graphic_objects.date_cdachi', 'graphic_objects.date_end']),
                    'pagination' => [
                        'pageSize' => 10,
                    ],
                ]);
            }
            return $this->render('query10',['model' => $model, 'dataProvider' => $dataProvider]);
        }
        else {return $this->render('query10',['model' => $model,]);}
    }

    public function actionQuery11(){
        $this -> view -> title = 'Запрос 10';
        $model = new Zapros1();
        if ($model->load(Yii::$app->request->post())) {
            $uname = $model->uprav_name;
            $oname = $model->object_name;
            $jobs = $model->job_name;
            $nachalo = $model->date_nachalo;
            $finale = $model->date_end;
            $checki = $model->check;

            if ($checki == '0') {
                $dataProvider = new ActiveDataProvider([
                    'query' => Material::find()
                        ->JoinWith(['typeJob', 'typeJob.object', 'typeJob.object.uprav'])
                        //->where(['stroi_uprav.id_uprav' => $uname])
                        ->where(['graphic_objects.id_object' => $oname])
                        ->andwhere(['>','material.kolvo', 'ispolzovano']),
                    'pagination' => [
                        'pageSize' => 10,
                    ],
                ]);
            }
            elseif ($checki == '1') {
                $dataProvider = new ActiveDataProvider([
                    'query' => Material::find()
                        ->JoinWith(['typeJob', 'typeJob.object', 'typeJob.object.uprav'])
                        ->where(['stroi_uprav.id_uprav' => $uname])
                        //->where(['graphic_objects.id_object' => $oname])
                        ->andwhere(['>','material.kolvo', 'ispolzovano']),
                    'pagination' => [
                        'pageSize' => 10,
                    ],
                ]);
            }
            elseif ($checki == '2') {
                $dataProvider = new ActiveDataProvider([
                    'query' => Material::find()
                        ->JoinWith(['typeJob', 'typeJob.object', 'typeJob.object.uprav'])
                        ->andwhere(['>','material.kolvo', 'ispolzovano']),
                    'pagination' => [
                        'pageSize' => 10,
                    ],
                ]);
            }
            return $this->render('query11',['model' => $model, 'dataProvider' => $dataProvider]);
        }
        else {return $this->render('query11',['model' => $model,]);}

    }

    public function actionQuery12(){
        $this -> view -> title = 'Запрос 12';
        $model = new Zapros1();
        if ($model->load(Yii::$app->request->post())){
            $name = $model->object_name;
            $nachalo = $model->date_nachalo;
            $finale = $model->date_end;
            $dataProvider = new ActiveDataProvider([
                'query' => GraphicObjects::find()
                    ->JoinWith(['object','brigad'])
                    ->where(['brigades.id_brigad' => $name])
                    ->andWhere(['<', 'graphic_Objects.date_end', $finale])
                    ->andWhere(['>', 'graphic_Objects.date_nachalo', $nachalo]),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
            return $this->render('query12',['model' => $model, 'dataProvider' => $dataProvider]);}
        else {return $this->render('query12',['model' => $model,]);}
    }

    public function actionQuery13(){
        $this -> view -> title = 'Запрос 13';
        $model = new Zapros1();
        if ($model->load(Yii::$app->request->post())){
            $name = $model->object_name;
            $nachalo = $model->date_nachalo;
            $finale = $model->date_end;
            $dataProvider = new ActiveDataProvider([
                'query' => Brigades::find()
                    ->JoinWith(['object','graphicObjects'])
                    ->where(['graphic_objects.id_type_job' => $name])
                    ->andWhere(['<', 'graphic_Objects.date_end', $finale])
                    ->andWhere(['>', 'graphic_Objects.date_nachalo', $nachalo]),
                'pagination' => ['pageSize' => 10,   ],  ]);
            return $this->render('query13',['model' => $model, 'dataProvider' => $dataProvider]);}
        else {return $this->render('query13',['model' => $model,]);}    }

    public function actionQueries(){
        $this -> view -> title = 'Запросы';

        return $this->render('queries');
    }

}

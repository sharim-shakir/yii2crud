<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Posts;
use app\models\Course;
use app\models\Student;
use app\models\Subject;



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
        // $posts = Posts::find()->all();
         // return $this->render('home',['posts' => $posts]);
    
        $student = Student::find()->all();
        return $this->render('home',['student' =>$student]);
    }

    public function actionCreate(){
        $student = new Student();
        $course = Course::find()->all(); 
        $subject = Subject::find()->all(); // Make sure to adjust the namespace for your Course model

        // Make sure to adjust the namespace for your Course model

        $formData = Yii::$app->request->post();
        if($student->load($formData)){
 
   // Convert the array of selected subject IDs to a string before saving
        $selectedSubjectIds = Yii::$app->request->post('Student')['subject'];
        $student->subject = implode(',', $selectedSubjectIds);


                // Convert the array of selected course IDs to a string before saving
        $selectedCourseIds = Yii::$app->request->post('Student')['course_books'];
        $student->course_books = implode(',', $selectedCourseIds);

            if($student->save()){
                Yii::$app->getSession()->setFlash('message','Post Published Sucessfully');
                return $this->redirect(['index']);
            }
            else{
                                Yii::$app->getSession()->setFlash('message','Failed to Post.');
            }
        } 
         return $this->render('create',['student' => $student  ,'course' => $course ,'subject' => $subject // Pass the courses to the view
]);
    }


   public function actionView($id){
   $post = Posts::findOne($id);
        return $this->render('view',['post'=>$post]);    
   }

   public function actionUpdate($id){
   $post = Posts::findOne($id);
   if($post->load(Yii::$app->request->post()) && $post->save() ){
    Yii::$app->getSession()->setFlash('message','Post Updated Successfully');
    return $this->redirect(['index','id'=> $post->id]);
   }
   else{
    return $this->render('update',['post'=>$post]);
   }
        return $this->render('update',['post'=>$post]);    
       }

   public function actionDelete($id){
   $post = Posts::findOne($id)->delete();
   if($post){
    Yii::$app->getSession()->setFlash('message','Post Delete Successfully');
    return $this->redirect(['index']);
   }
   }

   //
 public function actionCourse(){
        $course = new Course();
        $formData = Yii::$app->request->post();
        if($course->load($formData)){
            if($course->save()){
                Yii::$app->getSession()->setFlash('message','Post Published Sucessfully');
                return $this->redirect(['index']);
            }
            else{
                                Yii::$app->getSession()->setFlash('message','Failed to Post.');
            }
        } 
         return $this->render('course',['course' => $course]);
    }

    public function actionSubject(){
        $subject = new Subject();
        $formData = Yii::$app->request->post();
        if($subject->load($formData)){
            if($subject->save()){
                Yii::$app->getSession()->setFlash('message','Post Published Sucessfully');
                return $this->redirect(['index']);
            }
            else{
                                Yii::$app->getSession()->setFlash('message','Failed to Post.');
            }
        } 
         return $this->render('subject',['subject' => $subject]);
    }

    /*
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
}

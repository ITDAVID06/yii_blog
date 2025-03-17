<?php

class SiteController extends Controller
{
    public $layout='//layouts/column2';

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        Yii::import('application.models.Post'); // Ensure Post model is available

        $criteria = new CDbCriteria([
            'condition' => 'status='.Post::STATUS_PUBLISHED,
            'order' => 'update_time DESC',
            'with' => 'commentCount',
        ]);
        if (isset($_GET['tag'])) {
            $criteria->addSearchCondition('tags', $_GET['tag']);
        }

        $dataProvider = new CActiveDataProvider('Post', [
            'pagination' => [
                'pageSize' => 10
            ],
            'criteria' => $criteria
        ]);


        // Render the 'blog' view and pass the dataProvider
        $this->render('index', compact('dataProvider'));
        }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error=Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model=new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes=$_POST['ContactForm'];
            if ($model->validate()) {
                $name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                $subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
                $headers="From: $name <{$model->email}>\r\n".
                    "Reply-To: {$model->email}\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model'=>$model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model=new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax']==='login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login', array('model'=>$model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    protected function newComment($post)
    {
        $comment = new Comment;

        // $_POST['ajax'] is id of the form
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'comment-form')
        {
            echo CActiveForm::validate($comment);
            Yii::app()->end();
        }

        if (isset($_POST['Comment'])) {
            $comment->attributes = $_POST['Comment'];
            if ($post->addComment($comment)) {
                if ($comment->status === Comment::STATUS_PENDING) {
                    Yii::app()->user->setFlash(
                        'commentSubmitted',
                        'Thank you for your comment. Your comment will be posted once it is approved.'
                    );
                }
                $this->refresh();
            }
        }
        return $comment;
    }

    private $model;

    public function actionView()
    {
        $post = $this->loadModel();
        $comment = $this->newComment($post);

        $this->render('view', array(
            'model' => $post,
            'comment' => $comment,
        ));
    }

    public function loadModel()
    {
        if ($this->model === null) {
            if (isset($_GET['id'])) {
                if (Yii::app()->user->isGuest) {
                    $condition = 'status='.Post::STATUS_PUBLISHED
                        .' OR status='.Post::STATUS_ARCHIVED;
                } else {
                    $condition = '';
                }
                $this->model = Post::model()->findByPk($_GET['id'], $condition);
            }
            if ($this->model === null) {
                throw new CHttpException(404, 'The requested page does not exist.');
            }
        }
        return $this->model;
    }
}

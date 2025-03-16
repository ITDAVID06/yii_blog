<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
    'Login',
);
?>

    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Login</h1>
    <p class="text-gray-600">Please fill out the following form with your login credentials:</p>

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions' => ['class' => 'space-y-4']
    )); ?>

    <p class="text-gray-500 text-sm">Fields with <span class="text-red-500">*</span> are required.</p>

    <?php echo $form->errorSummary($model, '<div class="bg-red-100 p-4 rounded-md shadow text-red-700">', '</div>'); ?>

    <div>
        <?php echo $form->labelEx($model, 'username', ['class' => 'block text-gray-700 font-medium']); ?>
        <?php echo $form->textField($model, 'username', array('class'=>'w-full p-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300')); ?>
        <?php echo $form->error($model, 'username', ['class' => 'text-red-500 text-sm']); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model, 'password', ['class' => 'block text-gray-700 font-medium']); ?>
        <?php echo $form->passwordField($model, 'password', array('class'=>'w-full p-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300')); ?>
        <?php echo $form->error($model, 'password', ['class' => 'text-red-500 text-sm']); ?>
        <p class="text-gray-500 text-sm mt-1">Hint: You may login with <kbd class="px-2 py-1 bg-gray-200 rounded">demo</kbd>/<kbd class="px-2 py-1 bg-gray-200 rounded">demo</kbd> or <kbd class="px-2 py-1 bg-gray-200 rounded">admin</kbd>/<kbd class="px-2 py-1 bg-gray-200 rounded">admin</kbd>.</p>
    </div>

    <div class="flex items-center">
        <?php echo $form->checkBox($model, 'rememberMe', ['class' => 'mr-2']); ?>
        <?php echo $form->label($model, 'rememberMe', ['class' => 'text-gray-700']); ?>
        <?php echo $form->error($model, 'rememberMe', ['class' => 'text-red-500 text-sm ml-2']); ?>
    </div>

    <div class="mt-4">
        <?php echo CHtml::submitButton('Login', ['class' => 'w-full bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-md transition']); ?>
    </div>

    <?php $this->endWidget(); ?>


<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

    <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">
        <?php echo $model->isNewRecord ? 'Create Post' : 'Update Post'; ?>
    </h1>

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'post-form',
        'enableAjaxValidation'=>false,
        'htmlOptions' => ['class' => 'space-y-6']
    )); ?>

    <p class="text-gray-500 text-sm text-center">Fields with <span class="text-red-500">*</span> are required.</p>

    <?php echo $form->errorSummary($model, '<div class="bg-red-100 p-4 rounded-md shadow text-red-700">', '</div>'); ?>

    <div>
        <?php echo $form->labelEx($model, 'title', ['class' => 'block text-gray-700 font-medium']); ?>
        <?php echo $form->textField($model, 'title', array('class'=>'w-full p-3 border rounded-md focus:outline-none focus:ring focus:ring-green-300')); ?>
        <?php echo $form->error($model, 'title', ['class' => 'text-red-500 text-sm']); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model, 'content', ['class' => 'block text-gray-700 font-medium']); ?>
        <?php echo $form->textArea($model, 'content', array('rows'=>6, 'class'=>'w-full p-3 border rounded-md focus:outline-none focus:ring focus:ring-green-300')); ?>
        <?php echo $form->error($model, 'content', ['class' => 'text-red-500 text-sm']); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model, 'tags', ['class' => 'block text-gray-700 font-medium']); ?>
        <?php echo $form->textArea($model, 'tags', array('rows'=>3, 'class'=>'w-full p-3 border rounded-md focus:outline-none focus:ring focus:ring-green-300')); ?>
        <?php echo $form->error($model, 'tags', ['class' => 'text-red-500 text-sm']); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model, 'status', ['class' => 'block text-gray-700 font-medium']); ?>
        <?php echo $form->dropDownList($model, 'status', Lookup::items('PostStatus'), array('class'=>'w-full p-3 border rounded-md focus:outline-none focus:ring focus:ring-green-300')); ?>
        <?php echo $form->error($model, 'status', ['class' => 'text-red-500 text-sm']); ?>
    </div>

    <div class="mt-6 text-center">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => 'w-full md:w-1/2 bg-green-500 hover:bg-green-600 text-white font-medium py-3 px-6 rounded-md transition']); ?>
    </div>

    <?php $this->endWidget(); ?>
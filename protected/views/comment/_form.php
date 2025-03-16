<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>

<?php $form = $this->beginWidget('CActiveForm', [
    'id' => 'comment-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => ['class' => 'space-y-4']
]); ?>

<p class="text-gray-500 text-sm">Fields with <span class="text-red-500">*</span> are required.</p>

<?php echo $form->errorSummary($model, '<div class="bg-red-100 p-4 rounded-md shadow text-red-700">', '</div>'); ?>

<div>
    <?php echo $form->labelEx($model, 'content', ['class' => 'block text-gray-700 font-medium']); ?>
    <?php echo $form->textArea($model, 'content', ['rows' => 4, 'class' => 'w-full p-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300']); ?>
    <?php echo $form->error($model, 'content', ['class' => 'text-red-500 text-sm']); ?>
</div>

<div>
    <?php echo $form->labelEx($model, 'author', ['class' => 'block text-gray-700 font-medium']); ?>
    <?php echo $form->textField($model, 'author', ['class' => 'w-full p-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300']); ?>
    <?php echo $form->error($model, 'author', ['class' => 'text-red-500 text-sm']); ?>
</div>

<div>
    <?php echo $form->labelEx($model, 'email', ['class' => 'block text-gray-700 font-medium']); ?>
    <?php echo $form->textField($model, 'email', ['class' => 'w-full p-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300']); ?>
    <?php echo $form->error($model, 'email', ['class' => 'text-red-500 text-sm']); ?>
</div>

<?php if (!Yii::app()->user->isGuest) : ?>
    <div>
        <?php echo $form->labelEx($model, 'status', ['class' => 'block text-gray-700 font-medium']); ?>
        <?php echo $form->dropDownList($model, 'status', [
            '1' => 'Pending Approval',
            '2' => 'Approved'
        ], [
            'prompt' => 'Select Status',
            'class' => 'w-full p-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300'
        ]); ?>
        <?php echo $form->error($model, 'status', ['class' => 'text-red-500 text-sm']); ?>
    </div>
<?php endif; ?>

<div>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save', [
        'class' => 'bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-md transition'
    ]); ?>
</div>

<?php $this->endWidget(); ?>

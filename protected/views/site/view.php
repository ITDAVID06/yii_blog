<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
    'Posts'=>array('index'),
    $model->title,
);

$this->menu=array(
    array('label'=>'List Post', 'url'=>array('index')),
    array('label'=>'Create Post', 'url'=>array('create')),
    array('label'=>'Update Post', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Delete Post', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

<div class="container mx-auto mt-6 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-semibold text-gray-800 mb-4"><?php echo CHtml::encode($model->title); ?></h1>
    
    <p class="text-gray-500 text-sm mb-4">
    Last updated: <?php echo date('F j, Y, g:i a', $model->update_time ?? time()); ?>
</p>

    <p class="text-green-700 text-sm font-semibold mb-4">Tags: <?php echo CHtml::encode($model->tags); ?></p>
    
    <div class="bg-gray-100 p-6 rounded-md shadow text-gray-800 leading-relaxed">
        <?php echo nl2br(CHtml::encode($model->content)); ?>
    </div>
    
    <div id="comments" class="mt-6">
        <?php if ($model->commentCount>=1) { ?>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                <?php echo $model->commentCount.' Comment(s)'; ?>
            </h3>
            
            <div class="bg-white p-4 rounded-md shadow">
                <?php
                $this->renderPartial('/post/_comments', [
                    'post' => $model,
                    'comments' => $model->comments
                ]);
                ?>
            </div>
        <?php } ?>
        
        <h3 class="text-xl font-semibold text-gray-800 mt-6">Leave a Comment</h3>
        
        <?php if (Yii::app()->user->hasFlash('commentSubmitted')) { ?>
            <div class="bg-green-100 p-4 rounded-md shadow text-green-700 mt-4">
                <?= Yii::app()->user->getFlash('commentSubmitted') ?>
            </div>
        <?php } else { ?>
            <div class="bg-white p-4 rounded-md shadow mt-4">
                <?php
                    $this->renderPartial('/comment/_form', [
                        'model' => $comment
                    ])
                ?>
            </div>
        <?php } ?>
    </div>
</div>
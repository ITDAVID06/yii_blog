<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">
        <a href="<?php echo CHtml::normalizeUrl(['view', 'id' => $data->id]); ?>" class="text-green-600 hover:text-green-800">
            <?php echo CHtml::encode($data->title); ?>
        </a>
    </h2>
    
    <p class="text-gray-500 text-sm mb-2">
        <strong>Created:</strong> <?php echo date('F j, Y, g:i a', strtotime($data->create_time)); ?>
    </p>
    <p class="text-gray-500 text-sm mb-2">
        <strong>Last Updated:</strong> <?php echo date('F j, Y, g:i a', strtotime($data->update_time)); ?>
    </p>
    
    <p class="text-green-700 text-sm font-semibold mb-4">
        <strong>Tags:</strong> <?php echo CHtml::encode($data->tags); ?>
    </p>
    
    <div class="bg-gray-100 p-6 rounded-md shadow text-gray-800 leading-relaxed">
        <?php echo nl2br(CHtml::encode($data->content)); ?>
    </div>
</div>
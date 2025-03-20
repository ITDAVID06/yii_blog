<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="w-full bg-white p-6 rounded-lg shadow-lg mb-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-3">
        <a href="<?php echo CHtml::normalizeUrl(['view', 'id' => $data->id]); ?>" class="text-green-600 hover:text-green-800 transition">
            <?php echo CHtml::encode($data->title); ?>
        </a>
    </h2>
    
    <p class="text-gray-500 text-sm mb-2">
        <strong>Created:</strong> <?php echo date('F j, Y, g:i a', $data->create_time); ?>
    </p>
    <p class="text-gray-500 text-sm mb-2">
        <strong>Last Updated:</strong> <?php echo date('F j, Y, g:i a', $data->update_time); ?>
    </p>
    
    <p class="text-green-700 text-sm font-semibold mb-4">
        <strong>Tags:</strong> <?php echo CHtml::encode($data->tags); ?>
    </p>
    
    <!--  -->


    <div class="mt-4 text-right">
        <a href="<?php echo CHtml::normalizeUrl(['view', 'id' => $data->id]); ?>" class="text-blue-600 hover:text-blue-800 font-medium">
            Read More →
        </a>
    </div>
</div>

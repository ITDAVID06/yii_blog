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

    <div class="flex flex-wrap items-center text-gray-500 text-sm mb-4">
        <span class="mr-4">
            <i class="fas fa-calendar-alt text-gray-400"></i> 
            Created: <?php echo date('F j, Y, g:i a', $data->create_time ?? time()); ?>
        </span>
        <span>
            <i class="fas fa-clock text-gray-400"></i> 
            Last Updated: <?php echo date('F j, Y, g:i a', $data->update_time ?? time()); ?>
        </span>
    </div>

    <div class="mb-4">
        <span class="inline-block bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-md">
            <i class="fas fa-tags"></i> <?php echo CHtml::encode($data->tags); ?>
        </span>
    </div>

    <div class="mt-4 text-right">
        <a href="<?php echo CHtml::normalizeUrl(['view', 'id' => $data->id]); ?>" class="text-blue-600 hover:text-blue-800 font-medium">
            Read More →
        </a>
    </div>
</div>

<?php /* @var $this PostController */ ?>
<?php /* @var $data Post */ ?>

<div class="w-full md:w-1/2 p-4">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden h-full flex flex-col">
        <!-- Placeholder background (mimics an image) -->
        <div class="h-40 bg-gradient-to-br from-green-200 to-green-400"></div>

        <div class="p-4 flex-grow">
            <h3 class="text-xl font-semibold text-gray-800"><?php echo CHtml::encode($data->title); ?></h3>
            <p class="text-gray-600 line-clamp-3"><?php echo CHtml::encode(substr($data->content, 0, 100)) . '...'; ?></p>
        </div>

        <div class="p-4 border-t flex justify-between items-center">
            <p class="text-sm text-green-700">Tags: <?php echo CHtml::encode($data->tags); ?></p>
            <a href="<?php echo CHtml::normalizeUrl(['view', 'id' => $data->id]); ?>" class="text-blue-600 hover:underline">Read More →</a>
        </div>
    </div>
</div>

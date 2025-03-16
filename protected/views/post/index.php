<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = ['Posts'];

$this->menu = [
    ['label' => 'Create Post', 'url' => ['create']],
    ['label' => 'Manage Post', 'url' => ['admin']],
];
?>

<div class="container mx-auto mt-6 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-semibold text-gray-800 mb-4">Published Posts</h1>
    
    <?php if (!empty($_GET['tag'])) : ?>
        <h2 class="text-xl text-green-700 font-semibold mb-4">
            Filtered by Tag: <i><?= CHtml::encode($_GET['tag']) ?></i>
        </h2>
    <?php endif; ?>
    
    <div class="bg-gray-100 p-4 rounded-md shadow mb-4">
        <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
            'template' => "{items}\n{pager}",
            'itemsCssClass' => 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6'
        )); ?>
    </div>
</div>

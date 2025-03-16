<?php
/* @var $this CommentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = ['Comments'];

$this->menu = [
    ['label' => 'Create Comment', 'url' => ['create']],
    ['label' => 'Manage Comment', 'url' => ['admin']],
];
?>


    <h1 class="text-3xl font-semibold text-gray-800 mb-4">Comments</h1>

    <?php
    $this->widget('zii.widgets.CListView', [
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
        'itemsCssClass' => 'space-y-4',
        'summaryCssClass' => 'text-gray-600 mb-4',
        'pagerCssClass' => 'mt-4 flex justify-center',
        'htmlOptions' => ['class' => 'w-full'],
    ]);
    ?>


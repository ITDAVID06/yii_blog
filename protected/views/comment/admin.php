<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs = [
    'Comments' => ['index'],
    'Manage',
];

$this->menu = [
    ['label' => 'List Comment', 'url' => ['index']],
    ['label' => 'Create Comment', 'url' => ['create']],
];

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


    <h1 class="text-3xl font-semibold text-gray-800 mb-4">Manage Comments</h1>

    <div class="search-form bg-gray-100 p-4 mt-4 rounded-lg shadow-md" style="display:none">
        <?php $this->renderPartial('_search', ['model' => $model]); ?>
    </div>

    <!-- ✅ Added scrollable container -->
    <div class="overflow-x-auto">
        <?php $this->widget('zii.widgets.grid.CGridView', [
            'id' => 'comment-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'itemsCssClass' => 'min-w-full border border-gray-200 shadow-md rounded-lg',
            'htmlOptions' => ['class' => 'w-full'],
            'columns' => [
                [
                    'name' => 'id',
                    'htmlOptions' => ['class' => 'p-4 text-center'],
                    'headerHtmlOptions' => ['class' => 'bg-green-600 text-white p-4']
                ],
                [
                    'name' => 'content',
                    'htmlOptions' => ['class' => 'p-4'],
                    'headerHtmlOptions' => ['class' => 'bg-green-600 text-white p-4']
                ],
                [
                    'name' => 'status',
                    'filter' => Lookup::items('CommentStatus'),
                    'htmlOptions' => ['class' => 'p-4 text-center'],
                    'headerHtmlOptions' => ['class' => 'bg-green-600 text-white p-4']
                ],
                [
                    'name' => 'create_time',
                    'type' => 'datetime',
                    'filter' => false,
                    'htmlOptions' => ['class' => 'p-4 text-center'],
                    'headerHtmlOptions' => ['class' => 'bg-green-600 text-white p-4']
                ],
                [
                    'name' => 'author',
                    'htmlOptions' => ['class' => 'p-4'],
                    'headerHtmlOptions' => ['class' => 'bg-green-600 text-white p-4']
                ],
                [
                    'name' => 'email',
                    'htmlOptions' => ['class' => 'p-4'],
                    'headerHtmlOptions' => ['class' => 'bg-green-600 text-white p-4']
                ],
                [
                    'header' => 'Actions',
                    'class' => 'CButtonColumn',
                    'htmlOptions' => ['class' => 'p-4 text-center'],
                    'headerHtmlOptions' => ['class' => 'bg-green-600 text-white p-4'],
                    // 'buttons' => [
                    //     'view' => [
                    //         'label' => '<i class="fas fa-eye"></i>',
                    //         'imageUrl' => false,
                    //         'encodeLabel' => false,
                    //         'options' => ['class' => 'text-blue-500 hover:text-blue-700 text-lg mx-2']
                    //     ],
                    //     'update' => [
                    //         'label' => '<i class="fas fa-edit"></i>',
                    //         'imageUrl' => false,
                    //         'encodeLabel' => false,  
                    //         'options' => ['class' => 'text-yellow-500 hover:text-yellow-700 text-lg mx-2']
                    //     ],
                    //     'delete' => [
                    //         'label' => '<i class="fas fa-trash"></i>',
                    //         'imageUrl' => false,
                    //         'encodeLabel' => false,
                    //         'options' => ['class' => 'text-red-500 hover:text-red-700 text-lg mx-2']
                    //     ]
                    // ],
                    'template' => '<div class="flex justify-center space-x-3">{view} {update} {delete}</div>'
                ]
            ]
        ]); ?>
    </div> <!-- End scrollable container -->


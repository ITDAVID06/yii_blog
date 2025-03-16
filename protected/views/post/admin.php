<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs = ['Manage Posts'];

$dataProvider = $model->search(); // Ensure $dataProvider is defined
?>


    <h1 class="text-3xl font-semibold text-gray-800 mb-4">Manage Posts</h1>
    
    <!-- Search and Filter Section -->
    <?php echo CHtml::beginForm(['post/admin'], 'get', ['class' => 'mb-4 p-4 bg-gray-100 rounded-lg shadow flex flex-col md:flex-row justify-between']); ?>
        <div class="w-full md:w-1/2">
            <label class="block text-gray-700 font-medium">Search Title:</label>
            <?php echo CHtml::textField('Post[title]', isset($_GET['Post']['title']) ? $_GET['Post']['title'] : '', [
                'class' => 'w-full p-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300',
                'placeholder' => 'Enter post title...',
            ]); ?>
        </div>
        <div class="w-full md:w-1/4 mt-4 md:mt-0">
            <label class="block text-gray-700 font-medium">Filter Status:</label>
            <?php echo CHtml::dropDownList('Post[status]', isset($_GET['Post']['status']) ? $_GET['Post']['status'] : '', 
                Lookup::items('PostStatus'), [
                    'prompt' => 'Select Status',
                    'class' => 'w-full p-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300',
                ]); ?>
        </div>
        <div class="w-full md:w-1/6 flex items-end">
            <?php echo CHtml::submitButton('Filter', [
                'class' => 'w-full bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-md transition'
            ]); ?>
        </div>
    <?php echo CHtml::endForm(); ?>

    <?php
    $this->widget('zii.widgets.grid.CGridView', [
        'dataProvider' => $dataProvider,
        'filter' => $model,
        'itemsCssClass' => 'w-full border border-gray-200 shadow-md rounded-lg overflow-hidden',
        'htmlOptions' => ['class' => 'w-full'],
        'columns' => [
            [
                'name' => 'title',
                'type' => 'raw',
                'value' => 'CHtml::link(CHtml::encode($data->title), ["view", "id" => $data->id])',
                'htmlOptions' => ['class' => 'p-4 text-green-600 hover:text-green-800 font-semibold'],
                'headerHtmlOptions' => ['class' => 'bg-green-600 text-white p-4']
            ],
            [
                'name' => 'status', 
                'value' => 'Lookup::item("PostStatus", $data->status)', 
                'filter' => Lookup::items('PostStatus'),
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
                'header' => 'Actions',
                'class' => 'CButtonColumn',
                'htmlOptions' => ['class' => 'p-4 text-center'],
                'headerHtmlOptions' => ['class' => 'bg-green-600 text-white p-4'],
                'buttons' => [
                    'view' => [
                        'label' => '<i class="fas fa-eye"></i>',
                        'imageUrl' => false,
                        'encodeLabel' => false,
                        'options' => ['class' => 'text-blue-500 hover:text-blue-700 text-lg mx-2']
                    ],
                    'update' => [
                        'label' => '<i class="fas fa-edit"></i>',
                        'imageUrl' => false,
                        'encodeLabel' => false,
                        'options' => ['class' => 'text-yellow-500 hover:text-yellow-700 text-lg mx-2']
                    ],
                    'delete' => [
                        'label' => '<i class="fas fa-trash"></i>',
                        'imageUrl' => false,
                        'encodeLabel' => false,
                        'options' => ['class' => 'text-red-500 hover:text-red-700 text-lg mx-2']
                    ]
                ],
                'template' => '<div class="flex justify-center space-x-3">{view} {update} {delete}</div>'
            ]
        ]
    ]);
    ?>


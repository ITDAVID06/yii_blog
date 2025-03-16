<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs = [
    'Comments' => ['index'],
    $model->id,
];

$this->menu = [
    ['label' => 'List Comment', 'url' => ['index']],
    ['label' => 'Create Comment', 'url' => ['create']],
    ['label' => 'Update Comment', 'url' => ['update', 'id' => $model->id]],
    ['label' => 'Delete Comment', 'url' => '#', 'linkOptions' => ['submit' => ['delete', 'id' => $model->id], 'confirm' => 'Are you sure you want to delete this item?']],
    ['label' => 'Manage Comment', 'url' => ['admin']],
];
?>

<div class="container mx-auto mt-6 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-semibold text-gray-800 mb-4">View Comment #<?php echo $model->id; ?></h1>

    <div class="bg-gray-100 p-6 rounded-md shadow-sm text-gray-700">
        <p><strong>Content:</strong> <?php echo nl2br(CHtml::encode($model->content)); ?></p>
        <p class="mt-2"><strong>Status:</strong>
            <span class="<?php echo $model->status == 1 ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700'; ?> px-2 py-1 rounded-md">
                <?php echo $model->status == 1 ? 'Pending Approval' : 'Approved'; ?>
            </span>
        </p>
        <p class="mt-2"><strong>Author:</strong> <?php echo CHtml::encode($model->author); ?></p>
        <p class="mt-2"><strong>Email:</strong> <?php echo CHtml::encode($model->email); ?></p>
        <p class="mt-2"><strong>Website:</strong>
            <?php echo $model->url ? CHtml::link(CHtml::encode($model->url), $model->url, ['target' => '_blank', 'class' => 'text-blue-500 hover:text-blue-700']) : 'N/A'; ?>
        </p>
        <p class="mt-2"><strong>Post ID:</strong> <?php echo CHtml::encode($model->post_id); ?></p>
        <p class="mt-2 text-gray-500 text-sm"><strong>Created on:</strong> <?php echo date('F j, Y \a\t h:i a', $model->create_time); ?></p>
    </div>

    <div class="mt-4 flex space-x-3">
        <?php echo CHtml::link('<i class="fas fa-edit"></i> Update', ['update', 'id' => $model->id], [
            'class' => 'bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded-md transition flex items-center space-x-2'
        ]); ?>
        <?php echo CHtml::link('<i class="fas fa-trash"></i> Delete', ['delete', 'id' => $model->id], [
            'class' => 'bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-md transition flex items-center space-x-2',
            'confirm' => 'Are you sure you want to delete this item?'
        ]); ?>
    </div>
</div>

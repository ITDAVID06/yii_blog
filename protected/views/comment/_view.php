<?php
$deleteJS = <<<DEL
$('.container').on('click','.time a.delete',function() {
	var th=$(this),
		container=th.closest('div.comment'),
		id=container.attr('id').slice(1);
	if(confirm('Are you sure you want to delete comment #'+id+'?')) {
		$.ajax({
			url:th.attr('href'),
			type:'POST'
		}).done(function(){container.slideUp()});
	}
	return false;
});
DEL;
Yii::app()->getClientScript()->registerScript('delete', $deleteJS);
?>

<div class="comment p-4 border border-gray-200 rounded-lg shadow-md bg-white mb-4" id="c<?php echo $data->id; ?>">

    <div class="flex justify-between items-center mb-2">
        <span class="text-gray-500 text-sm">
            <?php echo CHtml::link("#{$data->id}", $data->url, [
                'class' => 'cid text-green-600 hover:text-green-800',
                'title' => 'Permalink to this comment',
            ]); ?>
        </span>
        <span class="text-gray-500 text-xs">
            <?php echo date('F j, Y \a\t h:i a', $data->create_time); ?>
        </span>
    </div>

    <div class="author font-semibold text-gray-800 mb-2">
        <?php echo $data->authorLink; ?> says on
        <?php echo CHtml::link(CHtml::encode($data->post->title), $data->post->url, ['class' => 'text-green-600 hover:text-green-800']); ?>
    </div>

    <div class="content text-gray-700 bg-gray-100 p-3 rounded-md shadow-sm">
        <?php echo nl2br(CHtml::encode($data->content)); ?>
    </div>

    <div class="time mt-2 flex items-center space-x-3 text-sm">
        <?php if ($data->status == Comment::STATUS_PENDING) : ?>
            <span class="pending bg-yellow-100 text-yellow-700 px-2 py-1 rounded-md">Pending approval</span>
            <?php echo CHtml::linkButton('Approve', [
                'submit' => ['comment/approve', 'id' => $data->id],
                'class' => 'bg-green-500 hover:bg-green-600 text-white font-medium py-1 px-3 rounded-md transition'
            ]); ?>
        <?php endif; ?>

        <?php echo CHtml::link('Update', ['comment/update', 'id' => $data->id], [
            'class' => 'text-blue-500 hover:text-blue-700'
        ]); ?>

        <?php echo CHtml::link('Delete', ['comment/delete', 'id' => $data->id], [
            'class' => 'delete text-red-500 hover:text-red-700'
        ]); ?>
    </div>

</div><!-- comment -->

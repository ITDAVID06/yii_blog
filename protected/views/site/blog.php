<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = ['Posts'];

$this->menu = [
    ['label' => 'Create Post', 'url' => ['create']],
    ['label' => 'Manage Post', 'url' => ['admin']],
];
?>

<h1 class="text-3xl font-semibold text-gray-800 mb-6">Published Posts</h1>

<?php if (!empty($_GET['tag'])) : ?>
    <h2 class="text-xl text-green-700"><i><?= CHtml::encode($_GET['tag']) ?></i></h2>
<?php endif; ?>

<div class="flex flex-wrap -mx-4">
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_post',
        'template' => "{items}\n{pager}",
        'itemsCssClass' => 'flex flex-wrap -mx-4',
        'pagerCssClass' => 'mt-6 flex justify-center'
    )); ?>
</div>

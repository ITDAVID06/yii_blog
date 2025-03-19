<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container mx-auto mt-6 grid grid-cols-12 gap-6">
    <!-- Main Content (9 Columns) -->
    <div class="col-span-9">
        <div id="content" class="bg-white p-6 rounded-lg">
            <?php echo $content; ?>
        </div>
    </div>

    <!-- Sidebar (3 Columns) -->
    <div class="col-span-3 flex flex-col gap-4">
        <?php if (!Yii::app()->user->isGuest) { ?>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <?php $this->widget('UserMenu'); ?>
            </div>
        <?php } ?>

        <div class="bg-white p-4 rounded-lg shadow-md">
            <?php $this->widget('TagCloud', ['maxTags' => Yii::app()->params['tagCloudCount']]); ?>
        </div>

        <div class="bg-white p-4 rounded-lg shadow-md">
            <?php $this->widget('RecentComments', ['maxComments' => Yii::app()->params['recentCommentCount']]); ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>

<ul class="space-y-2">
    <?php foreach ($this->getRecentComments() as $comment) { ?>
        <li class="text-gray-700">
            <?= $comment->authorLink ?> on
            <?= CHtml::link(
                CHtml::encode($comment->post->title),
                $comment->getUrl(),
                ['class' => 'text-green-600 hover:text-green-800 font-medium']
            ) ?>
        </li>
    <?php } ?>
</ul>

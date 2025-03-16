<ul class="user-menu space-y-2 bg-white p-4 rounded-lg shadow-md">
    <li>
        <?= CHtml::link('<i class="fas fa-plus-circle"></i> Create New Post', 
            ['post/create'], 
            ['class' => 'flex items-center gap-2 text-blue-600 font-semibold px-4 py-2 rounded-md hover:bg-blue-100 transition']
        ) ?>
    </li>
    <li>
        <?= CHtml::link('<i class="fas fa-tasks"></i> Manage Posts', 
            ['post/admin'], 
            ['class' => 'flex items-center gap-2 text-green-600 font-semibold px-4 py-2 rounded-md hover:bg-green-100 transition']
        ) ?>
    </li>
    <li>
        <?= CHtml::link('<i class="fas fa-comments"></i> Manage Comments', 
            ['comment/admin'], 
            ['class' => 'flex items-center gap-2 text-yellow-600 font-semibold px-4 py-2 rounded-md hover:bg-yellow-100 transition']
        ) ?>
    </li>
    <li class="flex items-center justify-between px-4 py-2 rounded-md hover:bg-gray-100 transition">
        <?= CHtml::link('<i class="fas fa-check-circle"></i> Approve Comments', 
            ['comment/index'], 
            ['class' => 'flex items-center gap-2 text-gray-700 font-semibold']
        ) ?>
        <span class="bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded">
            <?= Comment::model()->pendingCommentCount; ?>
        </span>
    </li>
    <li>
        <?= CHtml::link('<i class="fas fa-sign-out-alt"></i> Logout', 
            ['site/logout'], 
            ['class' => 'flex items-center gap-2 text-red-600 font-semibold px-4 py-2 rounded-md hover:bg-red-100 transition']
        ) ?>
    </li>
</ul>

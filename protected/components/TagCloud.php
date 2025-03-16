<?php
Yii::import('zii.widgets.CPortlet');

class TagCloud extends CPortlet
{
    public $title = 'Tags';
    public $maxTags = 20;

    protected function renderContent()
    {
        $tags = Tag::model()->findTagWeights($this->maxTags);

        echo '<div class="flex flex-wrap gap-2">'; // Wrap tags in a flex container

        foreach ($tags as $tag => $data) {
            echo '<div class="flex items-center space-x-1 bg-green-100 text-green-700 px-3 py-1 rounded-md shadow-sm">';
            
            // Tag link
            echo CHtml::link(CHtml::encode($tag), ['post/index', 'tag' => $tag], [
                'class' => 'font-medium hover:text-green-800'
            ]);

            // Tag count
            echo CHtml::tag('span', [
                'class' => 'text-gray-600 text-xs font-semibold bg-white px-2 py-0.5 rounded-full shadow-sm'
            ], $data['count']);

            echo '</div>';
        }

        echo '</div>'; // Close flex container
    }
}

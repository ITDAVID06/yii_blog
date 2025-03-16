<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Add FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background-color: #f3f7f4;
        }
        .navbar {
            background: linear-gradient(135deg, #3a6351, #a1c9a1);
        }
        .navbar-brand {
            font-weight: bold;
        }
        .breadcrumb {
            background-color: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }
        .content-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card {
            background: linear-gradient(135deg, #cce3de, #a4c3b2);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #2c3e50;
        }
        .card-text {
            color: #4a6652;
        }
        footer {
            background: linear-gradient(135deg, #3a6351, #a1c9a1);
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar flex justify-between items-center p-4 text-white">
        <div class="container flex justify-between items-center mx-auto">
            <a class="text-lg font-bold" href="<?php echo Yii::app()->homeUrl; ?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>
            <div class="space-x-4">
                <a class="hover:underline" href="<?php echo Yii::app()->createUrl('/site/index'); ?>"> Home</a>
                <a class="hover:underline" href="<?php echo Yii::app()->createUrl('/site/page', array('view'=>'about')); ?>">About</a>
                <?php if (Yii::app()->user->isGuest) { ?>
                    <a class="hover:underline" href="<?php echo Yii::app()->createUrl('/site/login'); ?>">Login</a>
                <?php } else { ?>
                    <a class="hover:underline" href="<?php echo Yii::app()->createUrl('/site/logout'); ?>">Logout (<?php echo Yii::app()->user->name; ?>)</a>
                <?php } ?>
            </div>
        </div>
    </nav>
    
    <div class="container mx-auto mt-4 p-4">
    <div class="content-container p-6 bg-white rounded-lg shadow-lg">
        <?php if (isset($this->breadcrumbs)) { ?>
            <nav aria-label="breadcrumb" class="mb-4">
                <?php $this->widget('zii.widgets.CBreadcrumbs', [
                    'links' => $this->breadcrumbs,
                    'homeLink' => CHtml::link(
                        '<i class="fas fa-home text-green-600"></i><span class="ml-1">Home</span>', 
                        Yii::app()->createUrl('site/index'), 
                        ['class' => 'text-green-600 hover:text-green-800 font-semibold flex items-center']
                    ),
                    'htmlOptions' => ['class' => 'flex space-x-2 text-gray-500 text-lg'],
                    'separator' => '<span class="text-gray-400">/</span>',
                ]); ?>
            </nav>
        <?php } ?>
        <?php echo $content; ?>
    </div>
</div>

    
    <footer class="text-center py-6 mt-10">
        <p>&copy; <?php echo date('Y'); ?> by Don Henessy David. All Rights Reserved.</p>
        <p><?php echo Yii::powered(); ?></p>
    </footer>
</body>
</html>
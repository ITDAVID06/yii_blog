<!DOCTYPE html>
<html lang="en" class="relative">
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
        .dark-mode {
            filter: invert(1) hue-rotate(180deg);
        }

        html.dark-mode {
            filter: invert(1) hue-rotate(180deg);
            background-color: #121212 !important;
        }
        /* Prevent images and videos from inverting */
        html.dark-mode img,
        html.dark-mode video {
            filter: invert(1) hue-rotate(180deg);
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
<body class="w-full min-h-screen flex flex-col">
    <nav class="navbar flex justify-between items-center p-4 text-white">
        <div class="container flex justify-between items-center mx-auto">
            <a class="text-lg font-bold" href="<?php echo Yii::app()->homeUrl; ?>">
                <?php echo CHtml::encode(Yii::app()->name); ?>
            </a>
            <div class="space-x-4">
                <a class="hover:underline" href="<?php echo Yii::app()->createUrl('/site/index'); ?>"> Home</a>
                <a class="hover:underline" href="<?php echo Yii::app()->createUrl('/site/page', array('view'=>'about')); ?>">About</a>
                <?php if (Yii::app()->user->isGuest) { ?>
                    <a class="hover:underline" href="<?php echo Yii::app()->createUrl('/site/login'); ?>">Login</a>
                <?php } else { ?>
                    <a class="hover:underline" href="<?php echo Yii::app()->createUrl('/site/logout'); ?>">
                        Logout (<?php echo Yii::app()->user->name; ?>)
                    </a>
                <?php } ?>
                <button id="dark-mode-toggle" class="p-3 rounded-full bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-200 shadow-md transition duration-300 hover:bg-gray-300 dark:hover:bg-gray-700">
                    <i id="dark-mode-icon" class="fas fa-moon"></i>
                </button>

            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-4 p-4 flex-1">
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

    <footer class="text-center py-6 mt-auto bg-green-700 text-white">
        <p>&copy; <?php echo date('Y'); ?> by Don Henessy David. All Rights Reserved.</p>
        <p><?php echo Yii::powered(); ?></p>
    </footer>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("dark-mode-toggle");
    const darkModeIcon = document.getElementById("dark-mode-icon");
    const html = document.documentElement;

    // Load user preference
    if (localStorage.getItem("darkMode") === "enabled") {
        html.classList.add("dark-mode");
        darkModeIcon.classList.replace("fa-moon", "fa-sun"); // Change icon to sun if dark mode is enabled
    }

    // Toggle dark mode on click
    toggleButton.addEventListener("click", function () {
        html.classList.toggle("dark-mode");

        if (html.classList.contains("dark-mode")) {
            localStorage.setItem("darkMode", "enabled");
            darkModeIcon.classList.replace("fa-moon", "fa-sun"); // Swap to sun icon
        } else {
            localStorage.setItem("darkMode", "disabled");
            darkModeIcon.classList.replace("fa-sun", "fa-moon"); // Swap to moon icon
        }
    });
});
</script>




</body>

</html>
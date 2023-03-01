<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/main.css">
    <title>Task list</title>
</head>
<body>
    <div class="container">
        <!-- 1 блок -->
        <h3>Task list</h3>
        <form class="form" action="controller/add.php" method="post">
            <input class="ad enter_text" name="input" type="text" placeholder="Enter text ...">
            <button class="ad add_task" name="submit" type="submit">ADD TASK</button>
        </form>

        <div class="button_all">
            <form action="controller/remove_all.php" method="post">
                <button class="button_content">REMOVE ALL</button>
            </form>
            <form action="controller/ready_all.php" method="post">
                <button class="button_content">READY ALL</button>
            </form>
        </div>
        
        <!-- 2 блок -->
        <!-- Цикл по глобальному массиву $_SESSION -->
        <?php foreach ($_SESSION as $key => $value): ?>
        <div class="content">
            <!-- Вывод круга в зависимости от статуса -->
            <?php
                if (strpos($key, 'unready')) {
                    echo '<div class="circle_green"></div>';
                } else {
                    echo '<div class="circle_red"></div>';
                }
            ?>
            <!-- Текст заметки -->
            <p class="text"><?php echo $value ?></p>
            
            <!-- Вывод кнопок. Текст в кнопке меняется в зависимости от статуса -->
            <div class="button">
                <form action="controller/<? echo (strpos($key, 'unready')) ? 'ready': 'unready';?>.php" method="post">
                    <button class="button_content" name="<? echo "$key" ?>" type="">
                        <?php 
                            if (strpos($key, 'unready')) {
                                echo 'UNREADY';
                            } else {
                                echo 'READY';
                            }
                        ?>
                    </button>
                </form>
                    
                <!-- Удаление заметки -->
                <form action="controller/delete.php" method="post">
                    <button class="button_content" name="<? echo "$key" ?>" type="">DELETE</button>
                </form>  
            </div>
        </div>
        <?php endforeach ?>
    </div>
</body>
</html>
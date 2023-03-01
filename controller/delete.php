<?php
    session_start();

    foreach ($_POST as $key => $value) {
        $a = $key;
    }
    
    // Удаление заметки
    unset($_SESSION[$a]);
    header('Location: ../index.php');
<?php
    session_start();

    // Все заметки меняют статус с невыполнен на выполненно  
    foreach ($_SESSION as $key => $value) {
        if (strpos($key, '-unready')) {
            continue;
        } else {
            $_SESSION[$key . '-unready'] = $_SESSION[$key];
            unset($_SESSION[$key]);
        }
    }
    header('Location: ../index.php');
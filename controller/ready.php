<?php
    session_start();

    // Меняет статус заметки на с "выполнено" на "невыполнено"
    foreach ($_POST as $key => $value) {
        $a = $key;
    }

    $b = $a;

    // Позиция элемента по ключу в массиве
    $position = array_search($a, array_keys($_SESSION));

    // Замена существующего элемента в массиве. Изменение статуса заметки.
    $_SESSION = array_slice($_SESSION, 0, $position, true) +
            array(str_replace('-unready', '', $a) => $_SESSION[$b]) +
            array_slice($_SESSION, $position, NULL, true);

    
    unset($_SESSION[$b]);
    
    header('Location: ../index.php');
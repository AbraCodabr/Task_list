<?php

    session_start();

    // Меняет статус заметки на с "невыполнено" на "выполнено"

    foreach ($_POST as $key => $value) {
        $a = $key;
    }

    // Позиция элемента по ключу в массиве
    $position = array_search($a, array_keys($_SESSION));

    // Замена существующего элемента в массиве. Изменение статуса заметки.
    $_SESSION = array_slice($_SESSION, 0, $position, true) +
            array($a . '-unready' => $_SESSION[$a]) +
            array_slice($_SESSION, $position, NULL, true);

    unset($_SESSION[$a]);
    
    header('Location: ../index.php');

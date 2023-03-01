<?php
    session_start();

    // Создание сессии, добовление заметки 
    $_SESSION['input' . count($_SESSION)] = $_POST['input'];
    header('Location: ../index.php');
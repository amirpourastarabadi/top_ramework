@extends('layouts.register')

<form action="/comments" method="post">
    <input type="text" name="body" placeholder="body">
    <?php

    if (isset($errors['body'])) {
        echo '<br>';
        foreach ($errors['body'] as $error) {
            echo "<span style='color: red;'>{$error}</span><br>";
        }
    }

    ?>
    <br>
    <br>
    <input type="submit" value="send">
</form>
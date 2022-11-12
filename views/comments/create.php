@extends('layouts.register')

<form action="/comments" method="post">
    <input type="text" name="body" placeholder="body">
    <?php if(isset($errors['body'])) echo "<span style='color: red;'>{$errors['body'][0]}</span>" ?>
    <br>
    <br>
    <input type="submit" value="send">
</form>
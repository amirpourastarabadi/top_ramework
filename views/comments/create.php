@extends('layouts.register')

<form action="/comments" method="post">
    <input type="text" name="body" placeholder="body">
    <br>
    <br>
    <input type="submit" value="send">
</form>
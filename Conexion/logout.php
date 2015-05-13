<?php
require_once("conexionPHP.php");
session_start();
session_destroy();
redirecciona("../index.html");
?>
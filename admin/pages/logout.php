<?php
require_once('required.php');
session_start();
unset($_SESSION);
session_destroy();
die(header('location:index.php'));

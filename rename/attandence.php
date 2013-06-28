<?php
include '3hammers.php';
$hammer = new Hammers();

switch ($_POST['action']) {
    case "check_in":
        Hammers::check_in();
        break;
    case "check_out":
        Hammers::check_out();
        break;
    default:
        Hammers::wellcome();
        break;
}


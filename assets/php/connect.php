<?php

define ("HOST", "localhost");
define ("USER", "root");
define ("PWD", "");
define ("DB", "test");

$db = new mysqli(HOST, USER, PWD, DB);

if($db->connect_errno > 0)
{
    $error = TRUE;
    error_log("No DB connection", 0);
}
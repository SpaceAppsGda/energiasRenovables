<?php

include("driver.php");

$driver = new dbDriver();
$driver->getState(addslashes($_GET['state']));

?>
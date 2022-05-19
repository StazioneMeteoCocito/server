<?php
//header("Content-Type: application/json");
require("rlib.php");
$dataL["update"]=date("d/m/Y H:i:s",strtotime($dataL["utciso"]));
echo json_encode($dataL);

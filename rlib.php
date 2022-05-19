<?php
function lastE($n)
{
    $a = explode("/", $n);
    return $a[count($a) - 1];
}
$y = 0;
if(!count(glob("data/2*"))){
    http_response_code(500);
    header("Content-Type: text/html");
    ?>
    <h1>Update in progress</h1>
    <p>Data cannot be displayed right now</h1>
    <?php
    exit;
}
$dataL=json_decode(file_get_contents("data/last.json"),true);

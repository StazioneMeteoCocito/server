<?php
function rglob($pattern, $flags = 0) {
    $files = glob($pattern, $flags); 
    foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
        $files = array_merge($files, rglob($dir.'/'.basename($pattern), $flags));
    }
    return $files;
}
$list = [];
$lf = rglob("data/*.csv");
foreach($lf as $fn){
    $a=file($fn);
    $d0=explode(",",$a[0])[0];
    if($d0[0]!=2) continue;
    $dd=strtotime($d0);
    $list[$dd]=count($a);
}
echo json_encode($list);
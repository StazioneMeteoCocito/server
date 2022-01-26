<?php
require 'vendor/autoload.php';
error_reporting(E_ALL); 
ini_set("display_errors", 1); 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Ods;
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

function normtime($time){
    $a=explode(":",$time);
    return $a[0]*60+$a[1];
}

function normYMD($ymd){
    $e=explode("-",$ymd);
    if(!checkdate($e[1], $e[2], $e[0])) return false;
    return mktime(0, 0, 0, $e[1], $e[2], $e[0]);
}

function allDirsInRange($start,$end){
    $s=normYMD($start);
    $e=normYMD($end);
    if(empty($start)|| $s === false || empty($end) || $e === false) return false;
    $c=$s;
    $paths = [];
    $paths[]="../data/".date("Y/m/d",$c);
    while($c < $e){
        $c = strtotime("+1 day", $c);
        $paths[]="../data/".date("Y/m/d",$c);
    }
    return $paths;
    
}
/*
var_dump(allDirsInRange("2021-11-10","2022-01-25"));
exit;*/
$timeMap=["0"=>0,"15"=>15,"30"=>30,"1"=>1*60,"3"=>3*60,"5"=>5*60];
$timeMapLabels=["0"=>"Tutte le misurazioni","15"=>"Ogni 15 minuti","30"=>"Ogni 30 minuti","1"=>"Ogni ora","3"=>"Ogni 3 ore","5"=>"Ogni 5 ore"];
$sheetMap=["T"=>"Temperatura","H"=>"Umidità","P"=>"Pressione","PM10"=>"PM10","PM25"=>"PM2,5","S"=>"Fumo e vapori infiammabili"];
$fileMap=["T"=>"temperature.csv","H"=>"humidity.csv","P"=>"pressure.csv","PM10"=>"pm10.csv","PM25"=>"pm25.csv","S"=>"smoke.csv"];
$unitMap=["T"=>"°C","H"=>"%","P"=>"hPa","PM10"=>"µg/m³","PM25"=>"µg/m³","S"=>"µg/m³"];
$typeList=[];
foreach(explode(",",$_GET["datatypes"]) as $dts){
    if(!in_array($dts,array_keys($sheetMap))) die("<h3>Errore 0x02<br /><a href=\".\">Chiudi</a></h3>");
    $typeList[]=$dts;
}
if(!in_array($dts,array_keys($sheetMap))) die("<h3>Errore 0x03<br /><a href=\".\">Chiudi</a></h3>");
if(!count($typeList)) die("<h3>Errore 0x04<br /><a href=\".\">Chiudi</a></h3>");
$dirs = allDirsInRange($_GET["start"],$_GET["end"]);
if($dirs === false) die("<h3>Errore 0x05<br /><a href=\".\">Chiudi</a></h3>");
if(!in_array($_GET["definition"],array_keys($timeMap))) die("<h3>Errore 0x6<br /><a href=\".\">Chiudi</a></h3>");
$spreadsheet = new Spreadsheet();
$spreadsheet->getProperties()
    ->setCreator("Stazione Meteo Cocito")
    ->setLastModifiedBy("Stazione Meteo Cocito")
    ->setTitle("Esportazione dati della stazione meteo del Liceo Cocito")
    ->setSubject("Dati liceo Cocito")
    ->setDescription("Qyesto file è il risultato di una esportazione di dati della stazione meteo del Liceo Scientifico Statale Leonardo Cocito")
    ->setKeywords("office excel cocito meteo dati stazione centralina")
    ->setCategory("Esportazione");
$spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
$spreadsheet->removeSheetByIndex(0);
foreach($typeList as $tl){
    $myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, $sheetMap[$tl]);
    $myWorkSheet->setCellValue('A1',  $sheetMap[$tl]);
    $myWorkSheet->setCellValue('A3',  "Data");
    $myWorkSheet->setCellValue('B3',  "Ora");
    $myWorkSheet->setCellValue('C3',  "Valore");
    $myWorkSheet->setCellValue('D3',  "Unità");
    $i=4;
    $unit = $unitMap[$tl];
    foreach($dirs as $dir){
        $fn = $dir."/".$fileMap[$tl];
        if(!file_exists($fn)) continue;
        $lastTime=-100000000;
        foreach(file($fn) as $row){
            $rarr = explode(",",$row);
            $dta=explode(" ",$rarr[0]);
            $date=$dta[0];
            $time=$dta[1];
            $value = (double) $rarr[1];
            $t = normtime($time);
            if($_GET["definition"]!=0 && $t-$lastTime<$timeMap[$_GET["definition"]]) continue;
            $lastTime=$t;
            $myWorkSheet->setCellValueByColumnAndRow(1, $i , $date);
            $myWorkSheet->setCellValueByColumnAndRow(2, $i , $time);
            $myWorkSheet->setCellValueByColumnAndRow(3, $i , $value);
            $myWorkSheet->setCellValueByColumnAndRow(4, $i , $unit);
            $i++;
        }
    }
    /*
    $myWorkSheet->setCellValue('F3',  "Media");
     $myWorkSheet->setCellValue(
    'F4',
    '=AVERAGE(C:C)'
    );
    $myWorkSheet->setCellValue('G3',  "Minimo");
    $myWorkSheet->setCellValue(
    'G4',
    '=MIN(C:C)'
    );
    $myWorkSheet->setCellValue('H3',  "Massimo");
    $myWorkSheet->setCellValue(
    'H4',
    '=MAX(C:C)'
    );
    $myWorkSheet->setCellValue('I3',  "Moda");
    $myWorkSheet->setCellValue(
    'I4',
    '=MODE(C:C)'
    );
    $myWorkSheet->setCellValue('J3',  "Deviazione Standard");
    $myWorkSheet->setCellValue(
    'J4',
    '=STDEV(C:C)'
    );
    $myWorkSheet->setCellValue('K3',  "Numero di valori");
    $myWorkSheet->setCellValue(
    'K4',
    '=COUNT(C:C)'
    );
    // Formulas take too much time to compute
    **/
    $myWorkSheet->setCellValue('D3',  "Unità");
    $myWorkSheet->getColumnDimension('A')->setAutoSize(true);
    $myWorkSheet->getColumnDimension('B')->setAutoSize(true);
    $myWorkSheet->getColumnDimension('C')->setAutoSize(true);
    $myWorkSheet->getColumnDimension('D')->setAutoSize(true);
    $myWorkSheet->getColumnDimension('E')->setAutoSize(true);
   /* $myWorkSheet->getColumnDimension('F')->setAutoSize(true);
    $myWorkSheet->getColumnDimension('H')->setAutoSize(true);
    $myWorkSheet->getColumnDimension('I')->setAutoSize(true);
    $myWorkSheet->getColumnDimension('J')->setAutoSize(true);
    $myWorkSheet->getColumnDimension('K')->setAutoSize(true);*/
    $spreadsheet->addSheet($myWorkSheet);
    
   
}

$myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, "Riepilogo");
    $myWorkSheet->setCellValue('A1', 'Esportazione di Dati');
    $myWorkSheet->setCellValue('B1', 'Stazione Meteorologica permanente del Liceo Scientifico Statale "Leonardo Cocito"');
    
    
    $myWorkSheet->setCellValue('A4', gen_uuid());
    $myWorkSheet->setCellValue('B4', date("d/m/Y h:i:s"));
    $myWorkSheet->setCellValue('A7', "Dati richiesti");
    $i=8;
    foreach($typeList as $tl){
        $myWorkSheet->setCellValueByColumnAndRow(1, $i , $sheetMap[$tl]);
        $i++;
    }
    
    $myWorkSheet->setCellValue('B7', "Definizione dei dati");
    $myWorkSheet->setCellValue('B8', $timeMapLabels[$_GET["definition"]]);
    
    $myWorkSheet->getColumnDimension('A')->setAutoSize(true);
    $myWorkSheet->getColumnDimension('B')->setAutoSize(true);
    $spreadsheet->addSheet($myWorkSheet,0);
$spreadsheet->setActiveSheetIndex(0);
$export = $_GET["export"]?:"xlsx";
switch($export){
    case "xlsx":
    $fn="StazioneMeteoCocito.".date("d-m-Y-H-i-s").".export.xlsx";
    $writer = new Xlsx($spreadsheet);
    //$writer->setPreCalculateFormulas(false);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'. urlencode($fn).'"');
    break;
case "ods":
    $fn="StazioneMeteoCocito.".date("d-m-Y-H-i-s").".export.ods";
    $writer = new Ods($spreadsheet);
    //$writer->setPreCalculateFormulas(false);
    header('Content-Type: application/vnd.oasis.opendocument.spreadsheet');
    header('Content-Disposition: attachment; filename="'. urlencode($fn).'"');
    break;
}
$writer->save('php://output');
// https://www.liceococito.edu.it/meteo/exportExcel/xls.php?datatypes=T,H,P&start=2021-12-20&end=2022-01-25&definition=1

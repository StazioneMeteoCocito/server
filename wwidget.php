<?php
require("rlib.php");
//Set the Content Type
header('Content-type: image/svg+xml');

function nformat($n){
    return number_format($n,2,",","'");
}
?>

<svg width="300" height="500" xmlns="http://www.w3.org/2000/svg">
 <title>Stazione Meteo</title>
 <?php
 /*
 <defs>
     <style type="text/css">
     <![CDATA[
        @import url('https://fonts.googleapis.com/css2?family=Krona+One&display=swap');
        #titolo{
            font-family: 'Krona One', sans-serif;
        }
        ]]>

     </style>
 </defs>
 */
 ?>
 <g>
  <title>Stazione Meteo</title>
  <text xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="titolo" y="30" x="60" stroke-width="0" stroke="#000" fill="#000000">Stazione Meteo</text>
  <line id="barra1" y2="46" x2="304.00169" y1="46" x1="0.00001" stroke="#000" fill="none"/>
  <?php
  
//<!---<text transform="matrix(0.758496, 0, 0, 0.85076, 73.966, 13.1995)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" stroke-width="0" id="ultimoAggiornamento" y="75.1229" x="-54.00953" stroke="#000" fill="#000000">Ultimo aggiornamento:</text>--->
  ?>
    <line id="barra0" y2="0" x2="302.00169" y1="0" x1="-1.99999" stroke="#000" fill="none"/>
  <text transform="matrix(0.758496, 0, 0, 0.85076, 73.966, 13.1995)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" stroke-width="0" id="ultimoAggiornamentoData" y="95" x="-35.55195" stroke="#000" fill="#000000"><?php echo date("d/m/Y H:i:s",strtotime($dataL["utciso"])); ?></text>
 <?php
 //<text transform="matrix(0.758496, 0, 0, 0.85076, 73.966, 13.1995)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="12" stroke-width="0" id="man" y="120" x="-80.55195" stroke="#000" fill="#000000">In esposizione presso "I Giovani e le Scienze" 2022, a Milano</text>
  ?>
  <line id="barra2" y2="127" x2="302.00169" y1="127" x1="-1.99999" stroke="#000" fill="none"/>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="temperatura" y="176.36275" x="26.00056" stroke="#ff0000" fill="#ff2e00">Temperatura</text>
  <line id="barra3" y2="204" x2="300.46625" y1="204" x1="-4" stroke="#000" fill="none"/>
  <line id="barra4" y2="522.00508" x2="146" y1="128" x1="146" stroke="#000" fill="none"/>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="temperaturaData" y="178.68137" x="258.50917" stroke="#ff0000" fill="#ff2e00"><?php echo nformat($dataL["T"]); ?> °C</text>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="umidita" y="263.3112" x="26.00056" stroke="#0400ff" fill="#0800ff">Umidità</text>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="umiditaData" y="263.3112" x="258.50917" stroke="#0400ff" fill="#0800ff"><?php echo nformat($dataL["H"]); ?> %</text>
  <line id="barra5" y2="276" x2="320.07608" y1="276" x1="-2" stroke="#000000" fill="none"/>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="pressione" y="345.6224" x="26.00056" stroke="#19ff00" fill="#00ff2e">Pressione</text>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="pressioneData" y="343.30378" x="258.50917" stroke="#19ff00" fill="#00ff2e"><?php echo nformat($dataL["P"]); ?> hPa</text>
  <line id="barra6" y2="344" x2="311.01447" y1="344" x1="0" stroke="#000000" fill="none"/>
  <line id="barra7" y2="485" x2="311" y1="485" x1="312" stroke="#000000" fill="none"/>
  <line id="barra8" y2="401" x2="385" y1="401" x1="380" stroke="#000000" fill="none"/>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="pm10" y="426.7743" x="26.00056" stroke="#00ffff" fill="#00ffff">PM10</text>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="pm10Data" y="425.61499" x="258.50917" stroke="#00ffff" fill="#00ffff"><?php echo nformat($dataL["PM10"]); ?> µg/m³</text>
  <path id="barra9" d="m-6,415l342.21046,0" opacity="undefined" stroke="#000000" fill="none"/>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="pm25" y="512.56344" x="26.00056" stroke="#d000ff" fill="#e500ff">PM2,5</text>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="pm25Data" y="513.72276" x="258.50917" stroke="#d000ff" fill="#e500ff"><?php echo nformat($dataL["PM25"]); ?> µg/m³</text>
  <line id="barra10" y2="500" x2="302.00169" y1="500" x1="-1.99999" stroke="#000" fill="none"/>
  <line id="barra11" y2="500" x2="0" y1="0" x1="0" stroke="#000" fill="none"/>
  <line id="barra12" y2="500" x2="300" y1="0" x1="300" stroke="#000" fill="none"/>

 </g>
</svg>

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

 <g>
  <title>Stazione Meteo</title>
  <text xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="svg_1" y="32" x="47" stroke-width="0" stroke="#000" fill="#000000">Stazione Meteo</text>
  <line id="svg_2" y2="46" x2="304.00169" y1="46" x1="0.00001" stroke="#000" fill="none"/>
  <text transform="matrix(0.758496, 0, 0, 0.85076, 73.966, 13.1995)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" stroke-width="0" id="svg_3" y="75.1229" x="-54.00953" stroke="#000" fill="#000000">Ultimo aggiornamento:</text>
  <text transform="matrix(0.758496, 0, 0, 0.85076, 73.966, 13.1995)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" stroke-width="0" id="svg_4" y="115.08717" x="-35.55195" stroke="#000" fill="#000000"><?php echo date("d/m/Y H:i:s",file_get_contents("lastContact")); ?></text>
  <line id="svg_5" y2="127" x2="302.00169" y1="127" x1="-1.99999" stroke="#000" fill="none"/>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="svg_7" y="176.36275" x="26.00056" stroke="#ff0000" fill="#ff2e00">Temperatura</text>
  <line id="svg_8" y2="204" x2="300.46625" y1="204" x1="-4" stroke="#000" fill="none"/>
  <line id="svg_9" y2="522.00508" x2="146" y1="128" x1="146" stroke="#000" fill="none"/>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="svg_10" y="178.68137" x="258.50917" stroke="#ff0000" fill="#ff2e00"><?php echo nformat($dataL["T"]); ?> °C</text>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="svg_12" y="263.3112" x="54.50162" stroke="#0400ff" fill="#0800ff">Umidità</text>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="svg_13" y="263.3112" x="258.50916" stroke="#0400ff" fill="#0800ff"><?php echo nformat($dataL["H"]); ?> %</text>
  <line id="svg_14" y2="276" x2="320.07608" y1="276" x1="-2" stroke="#0400ff" fill="none"/>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="svg_15" y="345.6224" x="41.00112" stroke="#19ff00" fill="#00ff2e">Pressione</text>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="svg_16" y="343.30378" x="242.00856" stroke="#19ff00" fill="#00ff2e"><?php echo nformat($dataL["P"]); ?>hPa</text>
  <line id="svg_17" y2="344" x2="311.01447" y1="344" x1="0" stroke="#000000" fill="none"/>
  <line id="svg_18" y2="485" x2="311" y1="485" x1="312" stroke="#000000" fill="none"/>
  <line id="svg_19" y2="401" x2="385" y1="401" x1="380" stroke="#000000" fill="none"/>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="svg_20" y="426.7743" x="74.00234" stroke="#00ffff" fill="#00ffff">PM10</text>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="svg_21" y="425.61499" x="258.50916" stroke="#00ffff" fill="#00ffff"><?php echo nformat($dataL["PM10"]); ?> µg/m³</text>
  <path id="svg_22" d="m-6,415l342.21046,0" opacity="undefined" stroke="#000000" fill="none"/>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="svg_23" y="512.56344" x="72.50228" stroke="#d000ff" fill="#e500ff">PM2,5</text>
  <text transform="matrix(0.666642, 0, 0, 0.86258, 3.45887, 21.1058)" xml:space="preserve" text-anchor="start" font-family="'Roboto Mono'" font-size="24" id="svg_24" y="513.72276" x="248.00878" stroke="#d000ff" fill="#e500ff"><?php echo nformat($dataL["PM25"]); ?> µg/m³</text>
 </g>
</svg>

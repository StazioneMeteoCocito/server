<?php

function human_filesize($bytes, $decimals = 2)
{
    if ($bytes < 1024) {
        return $bytes . ' B';
    }

    $factor = floor(log($bytes, 1024));
    return sprintf("%.{$decimals}f ", $bytes / pow(1024, $factor)) . ['B', 'KB', 'MB', 'GB', 'TB', 'PB'][$factor];
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Papers e Media - Stazione MeteoCocito</title>
    <meta charset="UTF-8">
    <!-- Primary Meta Tags -->
    <meta name="title" content="Papers e Media - Stazione MeteoCocito">
    <meta name="description" content="Questa pagina contiene dati, grafici e statistiche raccolte dalla Stazione Meteo Permanente del Liceo Scientifico Statale 
        Leonardo Cocito">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://liceococito.edu.it/meteo/">
    <meta property="og:title" content="Stazione Meteo Permanente del Liceo Scientifico Statale Leonardo Cocito">
    <meta property="og:description" content="Questa pagina contiene dati, grafici e statistiche raccolte dalla Stazione Meteo Permanente del Liceo Scientifico Statale 
        Leonardo Cocito">
    <meta property="og:image" content="https://liceococito.edu.it/meteo/logoLiceo.gif">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://liceococito.edu.it/meteo/">
    <meta property="twitter:title" content="Stazione Meteo Permanente del Liceo Scientifico Statale Leonardo Cocito">
    <meta property="twitter:description" content="Questa pagina contiene dati, grafici e statistiche raccolte dalla Stazione Meteo Permanente del Liceo Scientifico Statale
        Leonardo Cocito">
    <meta property="twitter:image" content="https://liceococito.edu.it/meteo/logoLiceo.gif">
    <script type="application/ld+json">
    {
    "@context": "https://schema.org/",
    "@type": "WebSite",
    "name": "Stazione Meteo Permanente del Liceo Scientifico Statale Leonardo Cocito",
    "url": "https://www.liceococito.edu.it/meteo/"
    }
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
</head>

<body class="w3-theme-l4">

    <div style="min-width:400px">

        <div class="w3-bar w3-large w3-theme-d4">

            <span class="w3-bar-item">
                <h1>Stazione Meteo Permanente del Liceo Scientifico Statale "Leonardo Cocito"</h1>
                <hr />
                <p><i>Papers e Media</i></p>    
            </span>

            <div class="w3-bar w3-black">
                <a href="../" id="graphics" class="mainB w3-bar-item w3-button w3-mobile"
                    data-dropdown="yes">Home</a>


            </div>
         

        </div>
        <div class="progress-line"></div>
        <div class="w3-container w3-content" id="landing">
            <div class="w3-panel w3-white w3-card w3-display-container">
                <center>
                <p>Questa pagina contiene l&apos;archivio di papers e articoli concernenti la stazione meteo.</p>
                <a href="photogallery/images/6M303257.jpg" target="_blank"><img src="photogallery/images/6M303257.jpg" alt="Foto premiazione" style="width:80%;margin-bottom:20px"></a>
                </center>
            </div>
        </div>



        <div class="w3-container w3-content">
         <div class="w3-panel w3-white w3-card w3-display-container">
             
             <div class="w3-row">
              <div class="w3-third w3-container"><p><img src="ws.thumbnail.png" style="width:200px;" /><br /><a href="ws.pdf">PCTO - Aula del Cielo</a><br /> <span style="font-size:20px;">🇮🇹 </span><img src="pdf.png" style="width:20px"; /></p></div>
              <div class="w3-third w3-container"><p><img src="it.thumbnail.png" style="width:200px;" /><br /><a href="ita.pdf"><i>I Giovani e Le Scienze</i>: Stazione meteorologica Open Source</a><br /> <span style="font-size:20px;">🇮🇹 </span><img src="pdf.png" style="width:20px"; /></p></div>
              <div class="w3-third w3-container"><p><img src="en.thumbnail.png" style="width:200px;" /><br /><a href="paper.pdf"><i>I Giovani e Le Scienze</i>: Open source Weather Station</a><br /> <span style="font-size:20px;">🇬🇧 </span><img src="pdf.png" style="width:20px"; /></p></div>
              </div>
              <div class="w3-row">
             <div class="w3-third w3-container"><p><img src="tonga.thumbnail.png" style="width:200px;" /><br /><a href="tonga.pdf">Variazione di pressione in relazione all'Eruzione del vulcano presso <i>Hunga Tonga</i></a><br /> <span style="font-size:20px;">🇮🇹 </span><img src="pdf.png" style="width:20px"; /></p></div>
              <div class="w3-third w3-container "><p><img src="gazzAlba.jpeg" style="width:150px;" /><br /><a href="gazzAlba.jpeg">Liceo Cocito weather station, La Gazzetta D'Alba", martedì 19 aprile 2022, p. 13</a><br /> <span style="font-size:20px;">🇮🇹 </span><img src="img.png" style="width:20px"; /></p></div>
              <div class="w3-third w3-container "><p><img src="radio24.png" style="width:200px;" /><br /><br /><br /><br /><a href="2022-05-01-si-puo-fare-radio24-estratto.mp3">Radio 24, Si può fare, Trasmissione del 01 maggio 2022, Intervista a Mattia Mascarello </a><br /> <span style="font-size:20px;">🇮🇹 </span><img src="mp3.jpg" style="width:20px"; /></p></div>
               </div>
              <div class="w3-row">             
 <div class="w3-third w3-container "><p><img src="gioscie.thumbnail.png" style="width:150px;" /><br /><a href="gioscie.pdf">I Giovani e Le Scienze 2022, Programma </a><br /> <span style="font-size:20px;">🇮🇹 </span><img src="pdf.png" style="width:20px"; /></p></div>
              <div class="w3-third w3-container "><p><img src="videoY.png" style="width:250px;" /><br /><a href="https://www.youtube.com/watch?v=ABfpUzKpJI4">Video di presentazione per <i>I Giovani e Le Scienze</i></a><br /> <span style="font-size:20px;">🇮🇹 </span><img src="video.png" style="width:20px"; /></p></div>
<div class="w3-third w3-container "><p><img src="photogallery/images/IMG_20220410_131836.jpg" style="width:300px;" /><br /><a href="photogallery/">Galleria fotografica del viaggio a Milano per <i>I Giovani e Le Scienze</i></a><br /> <span style="font-size:20px;">🇮🇹 </span><img src="img.png" style="width:20px"; /></p></div>
            </div>

                    
            </div>
            </div>

        </div>
        <footer class="w3-container w3-teal">
            <p>&copy; 2022, Mattia Mascarello, Lorenzo Dellapiana, Luca Savio Biello</p>
        </footer>
<script src="main.js"></script>
</body>

</html>
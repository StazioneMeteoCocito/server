<!DOCTYPE html>
<html>

<head>
    <title>Bollettino Radio - Stazione MeteoCocito</title>
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
                <p>Bollettino radio</p>    
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
                <h2>Registrazione del pi&ugrave; recente bollettino</h2>
                <audio controls>
                  <source src="../data/bulletin.mp3" type="audio/mpeg">
                Errore
                </audio>
                <h2>Trascrizione messaggio radio</h2>
                </center>
                <pre>
                <?php
                echo file_get_contents("../data/radio");
                ?>
                </pre>
            </div>
        </div>


        </div>
        <footer class="w3-container w3-teal">
            <p>&copy; 2022, Mattia Mascarello, Lorenzo Dellapiana, Luca Savio Biello</p>
        </footer>
</body>

</html>

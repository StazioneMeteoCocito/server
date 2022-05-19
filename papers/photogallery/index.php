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
  <link href='simplelightbox-master/dist/simple-lightbox.min.css' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <script type="text/javascript" src="simplelightbox-master/dist/simple-lightbox.jquery.min.js"></script>
        
        <link href='style.css' rel='stylesheet' type='text/css'>
    
    
</head>

<body class="w3-theme-l4">

    <div style="min-width:400px">

        <div class="w3-bar w3-large w3-theme-d4">

            <span class="w3-bar-item">
                <h1>Stazione Meteo Permanente del Liceo Scientifico Statale "Leonardo Cocito"</h1>
                <hr />
                <p>Galleria fotografica</p>
            </span>

            <div class="w3-bar w3-black">
                <a href="../" id="graphics" class="mainB w3-bar-item w3-button w3-mobile"
                    data-dropdown="yes"><i>Papers e Media</i></a>

                <a href="downloadGS2022.zip" class="mainB w3-bar-item w3-button w3-mobile w3-teal"
                    data-dropdown="yes">Scarica tutto</a>


            </div>
         

        </div>
      
        <div class='container'>
            <div class="gallery">
              
            <?php 
            // Image extensions
            $image_extensions = array("png","jpg","jpeg","gif");

            // Target directory
            $dir = 'images/';
            if (is_dir($dir)){
                
                if ($dh = opendir($dir)){
                    $count = 1;

                    // Read files
                    while (($file = readdir($dh)) !== false){

                        if($file != '' && $file != '.' && $file != '..'){
                            
                            // Thumbnail image path
                            $thumbnail_path = "thumbs/".$file;

                            // Image path
                            $image_path = "images/".$file;
                            
                            $thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);
                            $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);

                            // Check its not folder and it is image file
                            if(!is_dir($image_path) && 
                                in_array($thumbnail_ext,$image_extensions) && 
                                in_array($image_ext,$image_extensions)){
                                ?>

                                <!-- Image -->
                                <a href="<?php echo $image_path; ?>">
                                    <img src="<?php echo $thumbnail_path; ?>" alt="" title=""/>
                                </a>
                                <!-- --- -->
                                <?php

                                // Break
                                if( $count%4 == 0){
                                ?>
                                    <div class="clear"></div>
                                <?php    
                                }
                                $count++;
                            }
                        }
                            
                    }
                    closedir($dh);
                }
            }
            ?>
            </div>
        </div>

<style>
img{
    width:22vw;
    display:inline;
}
</style>
<div>
        <footer class="w3-container w3-teal">
            <p>&copy; 2022, Mattia Mascarello, Lorenzo Dellapiana, Luca Savio Biello</p>
        </footer>
</body>

</html>
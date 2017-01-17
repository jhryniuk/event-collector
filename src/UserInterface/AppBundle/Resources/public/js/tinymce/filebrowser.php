<?php
$carpeta_ficheros = '/home/jan/Publiczny/Symfony/SystemLogowania/web/files';
$directorio = opendir($carpeta_ficheros); // Opens Folder
while ($fichero = readdir($directorio)) { // reads every file
    if (!is_dir($fichero)) { // Omits the folders
        echo "<div class='fichero' data-src='" . $carpeta_ficheros . $fichero . "'>" . $fichero . "</div>";
    }
}

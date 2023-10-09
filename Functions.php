<?php
function getProjectFolder() {
    $directory = __DIR__;

    if (strpos($directory, '\\') !== false) {
        echo 'C:\\xampp\\htdocs\\' . str_replace('\\', '/', $directory);
    } else {
        echo 'C:/xampp/htdocs/' . $directory;
    }

    echo "Información detallada sobre \$directory:";
    var_dump($directory);
}

getProjectFolder();
?>







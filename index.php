<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" description="Chetan Lodha">
    <link rel="stylesheet" href="./styles.css">
    <title>Getting Folder Content Using PHP</title>
</head>
<body>
    <div class="container">
        <h1 class="heading">Files</h1>
        <div class="item-container">
            <?php
            // Store current directories path
            $dir = getcwd();
            // Open current directory
            $dh = opendir($dir);
            // List of files to be excluded from being displayed
            $skip = array("dummy",".","..",".git");
            // Store extensions for handling different file types
            $images = array("dummy","png","jpg","gif");
            $videos = array("dummy","mp4","mkv","hevc");
            $audio = array("dummy","mp3","m4a","flac");
            // Handle each file as required until all files are displayed
            while (($file = readdir($dh)) !== false){
                if(array_search($file,$skip)){ }    // Skip unwanted files present in the project directory and display all other files
                else{
                    $file_type = (new SplFileInfo($file))->getExtension();  // Get the extension of the file
                    echo "<div class=\"item\">";
                    if(array_search($file_type,$images)){   // Check if the current file matches the extension and handle it accordingly
                        echo "<a href=\"$file\" target=\"_blank\"><img src=\"$file\" class=\"thumbnail\"></a><br>";
                        echo "<a href=\"$file\"><p class=\"name\">$file</p></a>";
                    }
                    else if(array_search($file_type,$videos)){
                        echo "<a href=\"$file\" target=\"_blank\"><video src=\"$file\" class=\"thumbnail\"></video></a><br>";
                        echo "<a href=\"$file\"><p class=\"name\">$file</p></a>";
                    }
                    else if(array_search($file_type,$audio)){ 
                        echo "<a href=\"$file\" target=\"_blank\"><img src=\"placeholder-audio.svg\" class=\"thumbnail-placeholder\"></a><br>";
                        echo "<a href=\"$file\"><p class=\"name\">$file</p></a>";
                    }
                    else if(!array_search($file,$skip)){ 
                        echo "<a href=\"$file\" target=\"_blank\"><img src=\"placeholder-document.svg\" class=\"thumbnail-placeholder\"></a><br>";
                        echo "<a href=\"$file\"><p class=\"name\">$file</p></a>";
                    }
                    echo "</div>";
                }
            }
            echo "</div>"
            ?>
        </div>
    </div>
</body>
</html>
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
            $dir = getcwd();
            $dh = opendir($dir);
            $skip = array("dummy",".","..",".git");
            $images = array("dummy","png","jpg","gif");
            $videos = array("dummy","mp4","mkv","hevc");
            $audio = array("dummy","mp3","m4a","flac");
            while (($file = readdir($dh)) !== false){
                if(array_search($file,$skip)){ }
                else{
                    $file_type = (new SplFileInfo($file))->getExtension();
                    echo "<div class=\"item\">";
                    if(array_search($file_type,$images)){
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
            echo "</div>";
            ?>
        </div>
    </div>
</body>
</html>
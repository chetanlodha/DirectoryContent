<html>
<head>
    <meta charset="utf-8">
    <meta name="author" description="Chetan Lodha">
    <link rel="stylesheet" href="styles.css">
    <title>Getting Folder Content Using PHP</title>
</head>
<body>
    <div class="container">
        <div class="item-container">
            <?php
            $dir = getcwd();
            $dh = opendir($dir);
            $skip = array("." , ".." , "index.php" , "styles.css");
            $images = array("dummy","png","jpg","gif");
            $x = 0;
            while (($file = readdir($dh)) !== false){
                if($x < count($skip) && $file === $skip[$x]){  
                    $x++;
                }
                else{
                    $file_type = (new SplFileInfo($file))->getExtension();
                    if(array_search($file_type,$images) == true){
                        echo "<div class=\"item\">";
                        echo "<img src=\"$file\" class=\"thumbnail\"><br>";
                        echo "<a href=\"$file\"><p class=\"name\">$file</p></a>";
                        echo "</div>";
                    }
                }
            }
            echo "</div>";
            ?>
        </div>
    </div>
</body>
</html>
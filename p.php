<?php
ini_set('upload_max_filesize', '100M');
ini_set('post_max_size', '100M');
ini_set('max_execution_time', '100');
ini_set('max_input_time', '60');
ini_set('memory_limit', '10M');
ini_set('upload_tmp_dir', './tmp/');

echo "Resultado variable \$_FILES:\n";
echo "<pre>";
print_r($_FILES);
echo "</pre>";

?>

<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
            });
        </script>
        <style type="text/css">
        </style>
    </head>
    <body>

        <form method="post" action="" enctype="multipart/form-data">
            <input type="file" name="txtFile" id="txtFile" /><input type="submit" value="Subir" />
        </form>

    </body>
</html>

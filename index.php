<html>
<head>
   <title>Envio de Vídeos</title>
</head>
<body>
   <form action="#" method="POST" enctype="multipart/form-data">
      <input type="file" name="fileUpload">
      <input type="submit" value="Enviar">
   </form>
</body>
</html>

<?php
   if(isset($_FILES['fileUpload']))
   {
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

      $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
      $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
      $dir = '/var/www/html/htdocs/'; //Diretório para uploads

      move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
	  
	  //editar no php.ini os parametros de upload_max_filesize = 80000M; e post_max_size = 80000M;
   }
?>

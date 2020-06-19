<html>
<head>
 <title>Upload de imagens</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<?php
    $GLOBALS['currIp'] = $_GET["ip"];
?>
<body>
<div class="container">
<h2><strong>Envio de imagens</strong></h2><hr>

<form method="POST" enctype="multipart/form-data"  action="#" >
  <label for="conteudo">Enviar imagem:</label>
  <input type="file" name="pic1" class="form-control">

  <label for="conteudo">Enviar imagem:</label> 
  <input type="file" name="pic2" accept="image/*" class="form-control">
  
   <label for="conteudo">Enviar URL de vídeo:</label> 
   <input type="text" name="url" id="url" class="form-control">
  
  <div align="center">
    <button type="submit" class="btn btn-success">Enviar imagem</button>
  </div>
  
  
</form>

 <?php
    $altura = "768";
    $largura = "1366";
    
  if (isset($_POST['url']) && strpos($_POST['url'], "youtube") !== false)
  {
    
    $url = explode("?", $_POST['url'])[1];
    $params = ['url'=> $url];
    $dir = "http://".$GLOBALS["currIp"].":5000"."/url/".$url;
    $defaults = array(
    CURLOPT_URL => $dir,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $params,
    );
    $ch = curl_init();
    curl_setopt_array($ch, $defaults);
    
    if(!$result = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    }
    
    curl_close($ch);
  }
  if(isset($_FILES['pic1']['name']) && $_FILES["pic1"]["error"] == 0)
 {
    $imagem_temporaria = imagecreatefromjpeg($_FILES['pic1']['tmp_name']);
    $largura_original = imagesx($imagem_temporaria);
    $altura_original = imagesy($imagem_temporaria);
    $nova_largura = $largura ? $largura : floor (($largura_original / $altura_original) * $altura);
    $nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $largura);
    $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
    imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);
    
    //$ext = strtolower(substr($_FILES['pic1']['name'],-4)); //Pegando extensão do arquivo
    $new_name = '1' . '.jpeg'; //Definindo um novo nome para o arquivo
    $dir_local = "./imagens/";
    $dir = "http://".$GLOBALS["currIp"]."/imagens/"; //Diretório para uploads
    imagejpeg($imagem_redimensionada,  $dir_local.$new_name);
    echo $dir_local.$new_name;
    echo "<br>";
    echo $dir.$new_name;
    //@move_uploaded_file($_FILES['pic1']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    echo copy($dir_local.$new_name, $dir.$new_name);
    print_r($_FILES);
    echo '<div class="alert alert-success" role="alert" align="center">
          <img src="./imagens/' . $new_name . '" class="img img-responsive img-thumbnail" width="200"> 
          <br>
          Imagem enviada com sucesso!
          <br>
          <a href="exemplo_upload_de_imagens.php">
          	</center><a href="index.php">Sair</a></center>
          </a></div>';
 }
  if(isset($_FILES['pic2']['name']) && $_FILES["pic2"]["error"] == 0)
 {
    $imagem_temporaria = imagecreatefromjpeg($_FILES['pic2']['tmp_name']);
    $largura_original = imagesx($imagem_temporaria);
    $altura_original = imagesy($imagem_temporaria);
    $nova_largura = $largura ? $largura : floor (($largura_original / $altura_original) * $altura);
    $nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $largura);
    $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
    imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);
    
    //$ext = strtolower(substr($_FILES['pic2']['name'],-4)); //Pegando extensão do arquivo
    $new_name = '2' . '.jpeg'; //Definindo um novo nome para o arquivo
    $dir = "http://".$GLOBALS["currIp"]."/imagens/"; //Diretório para uploads
    $dir_local = "./imagens/";
    echo $dir;
    imagejpeg($imagem_redimensionada, $dir_local.$new_name);
    @move_uploaded_file($_FILES['pic2']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    
    echo '<div class="alert alert-success" role="alert" align="center">
          <img src="./imagens/' . $new_name . '" class="img img-responsive img-thumbnail" width="200"> 
          <br>
          Imagem enviada com sucesso!
          <br>
          <a href="exemplo_upload_de_imagens.php">
          	</center><a href="index.php">Sair</a></center>
          </a></div>';
 } 
?>
</div>
<body>
</html>

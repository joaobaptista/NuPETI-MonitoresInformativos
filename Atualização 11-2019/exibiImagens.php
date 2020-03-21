<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Monitores Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


   
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />


    <link href="assets/css/animate.min.css" rel="stylesheet"/>


    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <link href="assets/css/demo.css" rel="stylesheet" />


    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="assets/img/fadergs_zn.jpg">



    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="dashboard.html" class="simple-text">
                    MONITORES FADERGS
                </a>
            </div>

            <ul class="nav">
                
               
                
                
                
                <li>
                    <a href="http://10.177.40.52/dashboard.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Painel Administrativo</p>
                    </a>
                </li>
                <li>
                    <a href="infos.html">
                        <i class="pe-7s-bell"></i>
                        <p>Informações</p>
                    </a>
                </li>
				
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
               
                <div class="collapse navbar-collapse">
                  

                    <ul class="nav navbar-nav navbar-right">
                        

                        <li>
                            <a href="http://10.177.0.39">
                                <p>Sair</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="col-md-12">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Imagens em Exibição</h4>
								
								
								
								<div class="row">
						
						<div class="col-md-4 mb">
                      		
                      			
								<?php
									$url = "http://10.177.40.216"; //IP do raspberry 
								?>
								
								<html>
								<br>
								<center><h6><b>IMAGEM 1 ATUAL</b></h6></center>
									<img src="<?php echo $url; ?>/imagens/1.jpeg"" height="350" width="500"> 
								<center><h6><b>IMAGEM 2 ATUAL</b></h6></center>
									<img src="<?php echo $url; ?>/imagens/2.jpeg"" height="350" width="500">
								
								</html>
								
				
			
                      		
						</div>
						
						
						
						
						
						
						
						
						
						
						
					
					
					
                
                  
             
                
              </div>
								</div>
                            <div class="content">
                              
                               
                            </div>
                        </div>
                    </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="infos.html">
                               Sobre o Projeto
                            </a>
                        </li>
						<li>
                            <a href="infos.html">
                               Atualizações
                            </a>
                        </li>
  
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://carreiras.fadergs.edu.br/praticas-na-fadergs">NuPeTI</a>  - Escola de Arquitetura, Engenharia e Tecnologia da Informação – Fadergs 
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	

</html>


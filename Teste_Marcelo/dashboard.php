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
                                    <a href="logout.php">
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
                        <div class="container" style="overflow: auto; height:400px;">
                            <h4 class="title">Placas cadastradas no sistema</h4>
                            <form method="POST" enctype="multipart/form-data"  action="#" >
                                <?php
                                    include('conexao.php');
                                    $boards_query = "SELECT * FROM boards";
                                    $query = mysqli_query($conexao,$boards_query);
                                    $location_query = "SELECT * FROM locations WHERE idlocation = ";
                                    
                                ?>
                                <table id="mainTable" class="table">
                                    <thead>
                                        <tr class="header">
                                            <th scope="col">Nome</td>
                                            <th scope="col">IP</td>
                                            <th scope="col">Local</td>
                                            <th scope="col">Dados</td>
                                            <th scope="col">Envio</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           $location = null;
                                           $index = 1;
                                           while ($row = mysqli_fetch_array($query)) {
                                               echo "<tr>";
                                                   echo "<td>".$row["alias"]."</td>";
                                                   echo "<td>".$row["ip_addr"]."</td>";
                                                   $res = mysqli_query($conexao, "{$location_query}{$row["fk_location"]}");
                                                   $location = mysqli_fetch_array($res);
                                                   echo "<td>".$location["description"]."</td>";
                                                   echo "<td>";
                                                        echo "<button type=\"button\" class=\"btn btn-danger\" onclick=\"tableItemClicked('{$row["ip_addr"]}')\">";
                                                        echo "Ver dados";
                                                        echo "</button>";
                                                   echo "</td>";
                                                   echo "<td>";
                                                        echo "<button type=\"button\" class=\"btn btn-danger\" onclick=\"navigateToUpdatePage('{$row["ip_addr"]}')\">";
                                                        echo "Enviar dados";
                                                        echo "</button>";
                                                   echo "</td>";
                                               echo "</tr>";
                                           }
                                        ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="imageDisplayRow">

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
    <script>
        var server = "localhost";
        var subdomain = "monitoresInformativos";
        function tableItemClicked(ipAddress) {
            if(document.contains(document.getElementById("imageRow"))) {
                document.getElementById("imageRow").remove();
            }
            let div = document.createElement('div');
            let htmlCode = "<html>" + 
                                "<br>" + 
                                "<div style=\"float:left;\">" + 
                                    "<h6><b>IMAGEM 1 ATUAL</b></h6>" +
                                    "<img src=\"http://" + ipAddress + "/imagens/1.jpeg\" height=\"350\" width=\"500\"/>" + 
                                 "</div>" +
                                "<div style=\"float:left;\">" + 
                                    "<h6><b>IMAGEM 2 ATUAL</b></h6>" + 
                                    "<img src=\"http://" + ipAddress + "/imagens/2.jpeg\" height=\"350\" width=\"500\"/>" + 
                                "</div>" +
                           "</html>";
            div.setAttribute("id", "imageRow");
            div.className = "card";
            div.innerHTML = htmlCode;
            document.getElementById("imageDisplayRow").appendChild(div);
        }
        function navigateToUpdatePage(ipAddress) {
            window.location.href = "envio_imagens.php?ip="+ipAddress;
        }
    </script>
    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> <-->
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
</html>


<?php

$root = \realpath($_SERVER["DOCUMENT_ROOT"]);

include "$root\curriculo\Datos\conexion.php";


mysql_connect("localhost","root",""); 
mysql_select_db("sistema_ciencias_juridicas");
?>

<!DOCTYPE html>
<html lang="utf-8">

<head>

    <meta charset="utf-8">
    
    
    
    
    
     <script>

            /* 
             * To change this license header, choose License Headers in Project Properties.
             * To change this template file, choose Tools | Templates
             * and open the template in the editor.
             */

            var x;
            x = $(document);
            x.ready(guardarPais);
            
            function guardarPais()
            {
                alert("holaaaaaaaaaaaaaaaa");
                var x;
                x = $("#persona");
                x.click(buscar);
                
            }


            function buscar()
            {
                var pnombre= $("#id_persona").val();
                alert(pnombre);
                
                data={
                    idpersona:$('#id_persona').val()
                }
                
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadabuscar,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }
            
           
            


            function inicioEnvio()
            {
                var x = $("#contenedor2");
                x.html('Cargando...');
            }

            function llegadabuscar()
            {
                $("#contenedor2").load('Datos/BuscarPersona.php',data);
                //$("#contenedor").load('../cargarPOAs.php');
            }
            

            function problemas()
            {
                $("#contenedor2").text('Problemas en el servidor.');
            }



        </script>
        
    
    


</head>

<body>

   
      
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ingreso de Empleados</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            <div class="col-lg-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Busqueda por numero de identidad
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">       

                                    <form role="form" action="#" method='POST'>


                                        <!--<div class="form-group">-->


                                        <select name='idpersona' id="id_persona">
                                            <?php
                                            $consulta_mysql = "SELECT * FROM `persona`";
                                            $rec = mysql_query($consulta_mysql);



                                            while ($row = mysql_fetch_array($rec)) {
                                                echo "<option value = '" . $row['N_identidad'] . "'>";
                                                
                                                

                                                echo $row["N_identidad"];

                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                        
                                        <button id="persona" class="btn btn-primary">Buscar</button>
                                        
                                    </form>
                                    
                               </div>
                              </div>
                        </div>
                </div>
            </div>



                                        <!--<button type="submit" class="btn btn-primary" class="icon-ok" >Buscar</button>-->

                                        <!--</div>-->


                                        <!-- ---------------------------------------   -->
                                        
     
            <!-- /.row -->

            <!-- /#page-wrapper -->
            
            
 <div id="contenedor2" class="panel-body">
    
 </div>           

<div id="contenedor3" class="panel-body">
        <?php
        
        $root = \realpath($_SERVER["DOCUMENT_ROOT"]);

        include "$root\curriculo\Datos\cargarEmpleados.php";
         
     
        ?>
 </div>



   




<!-- /#wrapper -->

<!-- jQuery -->


<!-- Bootstrap Core JavaScript -->

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>



<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Flot Charts JavaScript -->

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

	
<script type="text/javascript"></script>

</body>

</html>



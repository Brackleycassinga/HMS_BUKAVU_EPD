<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']=='LABORANTIN'){
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NEW HOPE HOSPITAL</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/timeline.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">
	<link href="bootstrap/css/anim.css" rel="stylesheet" />
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<style>

</style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header"> 
				<?php require_once ("Ajout/entete.php");?>
				
				<?php require_once ("Ajout/menuLabo.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : LISTE DES EXAMENS </small> 
				  <img src="IMA/coffre.jpg" width="100px" height="80px"/><img src="IMA/dep.jpg" width="100px" height="80px"/>
             </h1>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            LISTE DE TOUS LES EXAMENS AU LABORATOIRE
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
								<div class="col-lg-1">
                                </div>
                                <div class="col-lg-10">
							 <?php
								
									
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM Examens, CategoriesExamens WHERE Examens.IdCategorie=CategoriesExamens.IdCategorie") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){
										
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>													
														<br/>
													<table class='table'>
														
														<thead>
															<tr>
																<th>NUM.</th>
																<th>DESIGNATION DE L'EXAMEN</th>															
																<th>PRIX PREVU</th>															
																<th>CATEGORIE</th>															
																<th>ACTION</th>															
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['IdExamen'];?></td>
                                            <td><?php echo $row['DesignExamen'];?></td>                                          
                                            <td><?php echo $row['PrixPrevu'];?></td>                                          
                                            <td><?php echo $row['DesignCategorie'];?></td> 
											<td><?php echo "<a  href='ModifExamens.php?id=".$row['IdExamen']."' title='Modifier examen'><span class='glyphicon glyphicon-edit'></span> Modifier</a> &nbsp;&nbsp;
												<a style='color:red;' href='SuppExamens.php?id=".$row['IdExamen']."' title='Supprimer examen'><span class='glyphicon glyphicon-trash'></span> Supprimer</a>";?>  </td>											
                                        </tr>                                      
									</tbody>
							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													<strong>Aucun examen trouvé dans la base de donnée! Veuillez les ajouter</strong></div></div>";
									}
								
							?>
									
					 
					</div>                           
                </div>           
			</div>
		</div>
    </div>
</div>


	
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php
	}else{
		header('Location:index.php');
	}
?>
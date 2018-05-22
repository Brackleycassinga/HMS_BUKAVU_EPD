<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& ($_SESSION['Fonction']=='PHARMACIEN' OR $_SESSION['Fonction']=='MD' OR $_SESSION['Fonction']=='AG')){
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
				
				<?php if ($_SESSION['Fonction']=='PHARMACIEN')
						require_once ("Ajout/menuPharmacie.php");
					elseif ($_SESSION['Fonction']=='MD' OR $_SESSION['Fonction']=='AG')
						require_once ("Ajout/menu.php");
				?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : LISTE  DES MEDICAMENTS EN STOCK</small> 
				  <img src="IMA/medicaments.png" width="200px" height="80px"/><img src="IMA/dep.jpg" width="100px" height="80px"/>
             </h1>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            LISTE DE TOUS LES MEDICAMENTS DE LA PHARMACIE
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
									 <?php
											require_once("BDD/connect.php");
											$sqlSearch=mysql_query("SELECT * FROM Medicaments, CategoriesMed WHERE Medicaments.IdCategorieMed=CategoriesMed.IdCategorieMed order by DesignMedicament") or die(mysql_error());
											if (mysql_num_rows($sqlSearch)>0){
												echo"<div class='col-lg-12'>                       
														<div class='panel-body'>
															<div class='table-responsive'>
															<table class='table'>														
																<thead>
																	<tr>																
																		<th>DESIGNATION DU MEDICAMENT</th>																
																		<th>DOSAGE</th>															
																		<th>ST. ALERTE</th>															
																		<th>PRIX PREVU</th>																
																		<th>CATEGORIE</th>																
																		<th>QTE. STOCK</th>
																	</tr>
																</thead>";
												while($row=mysql_fetch_array($sqlSearch)){
													
									 ?>				
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['DesignMedicament'];?></td>                                          
                                            <td><?php echo $row['Dosage'];?></td>                                     
                                            <td><?php echo $row['StockAlerte'];?></td>                                           
                                            <td><?php echo $row['ValeurUnit'];?> FC</td>                                          
                                            <td><?php echo $row['DesignCategorieMed'];?></td>                                          
                                            <?php if ($row['StockAlerte']>=$row['StockExistant']){?>
											<td style="color:red;"><center><?php echo $row['StockExistant'];?></center></td> 
											<?php }else{ ?>
                                            <td><center><?php echo $row['StockExistant'];?></center></td>
											<?php } ?>
                                        </tr>                                      
                                    </tbody>
							<?php
										}
							?>
								</table>
							<?php
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													<strong>Aucun médicament trouvé dans la base de donnée! Veuillez les ajouter</strong></div></div>";
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
<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& ($_SESSION['Fonction']=='CAISSIER' OR $_SESSION['Fonction']=='COMPTABLE' OR $_SESSION['Fonction']=='MD' OR $_SESSION['Fonction']=='AG')){
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
				<?php if ($_SESSION['Fonction']=='CAISSIER')
						require_once ("Ajout/menuCaissier.php");
					elseif ($_SESSION['Fonction']=='COMPTABLE')
						require_once ("Ajout/menuCompt.php");
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
                 Gestion des Malades en ligne <small>  : SITUATION FINANCIERE DES MALADES</small> 
				  <img src="IMA/im29.jpg" width="120px" height="80px"/><img src="IMA/rechdoc.png" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           SITUATION FINANCIERE DE MALADES
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                            
							 <?php
								
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM  Facturations, Patients WHERE Facturations.Idauto_Patient=Patients.Idauto_Patient") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){										
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:red'>VOICI LA SITUATION FINANCIERE DES MALADES DEJA FACTURES</font></center>
														<br/>
													<table class='table'>
														
														<thead>
															<tr>
																<th>DATE FACTURE</th>
																<th>CODE</th>
																<th>PHOTO </th>
																<th>NOMS COMPLETS </th>
																<th>SEXE</th>																
																<th>MONTANT FACTURE</th>																
																<th>MONTANT PAYE</th>																
																<th>RESTE</th>																
																<th>OBSERVATION</th>																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>				
											<tbody>
												<tr>
													<td><?php $DateFacturation=new DateTime($row['DateFacturation']); echo Date_Format($DateFacturation,'d-m-Y') ;?></td>
													<td><?php echo $row['CodePatient'];?></td>
													<td><?php echo "<img  width=\"80\" height=\"80\" src=";
																echo '"Patients/';
																echo $row["Photo"];
																echo '"/>';?></td>
													<td><?php echo $row['Noms'];?></td>                                          
													<td><?php echo $row['Sexe'];?></td>                                          
													<td><?php echo $row['MontantFacture'];?></td>                                          
													<td><?php $sel=mysql_query("SELECT Sum(MontantPaie) FROM Payements WHERE IdFacturation='".$row['IdFacturation']."'");
															  $mp=mysql_fetch_array($sel);
															  echo $mp[0];
														?>
													</td>                                          
													<td><?php $Reste=$row['MontantFacture']-$mp[0];
																echo $Reste;
														?>
													</td>											
													<td><?php
															if($Reste>0)
																echo "<span class='glyphicon glyphicon-hand-right' style='color:red;'> DOIT</span>";
															elseif($Reste<0)
																echo "<span class='glyphicon glyphicon-plus' style='color:green;'> SURPLUS</span>";
															else
																echo "<span class='glyphicon glyphicon-ok' style='color:blue;'> TOTALITE</span>";
														?>
													</td>                                           
												</tr>                                      
											</tbody> 
							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span> AUCUNE FACTURATION TROUVEE DANS LA BASE DE DONNEES</div></div>";
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
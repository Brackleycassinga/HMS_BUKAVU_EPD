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
				
				<?php require_once ("Ajout/menuLabo.php"); ?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : LES EXAMMENS EFFECTUES POUR UNE PERIODE </small> 
				 <img src="IMA/coffre.jpg" width="120px" height="80px" />
             </h1>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            RECHERCHE ET AFFICHAGE DES EXAMMENS EFFECTUES POUR UNE PERIODE
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       	<div class="col-lg-4">										
											<label>Date début </label>
											<div class="form-group input-group">
												<table>                                          
													<tr><td><select class="form-control" name="JourD" required >
														<option value="">Jour</option>												
															<?php 
																for($i=1; $i<=31; $i++){
																	echo "<option value=".$i.">".$i."</option>";
																}
															?>
													</select></td><td>
															
													<select class="form-control" name="MoisD" style="width:180px;">
														<option value="">Mois</option>
														<option value="01">Janvier</option>
														<option value="02">Fevrier</option>
														<option value="03">Mars</option>
														<option value="04">Avril</option>
														<option value="05">Mai</option>
														<option value="06">Juin</option>
														<option value="07">Juillet</option>
														<option value="08">Aout</option>
														<option value="09">Septembre</option>
														<option value="10">Octobre</option>
														<option value="11">Novembre</option>
														<option value="12">Decembre</option>
													</select></td><td>
															
													<select class="form-control" name="AnneeD" required >
														<option value="">Année</option>												
														<?php 
															for($i=date('Y'); $i>=2016; $i--){
																echo "<option value=".$i.">".$i."</option>";
															}
														?>
													</select></td></tr>
												</table>                                           
											</div>
										</div>
										<div class="col-lg-4">
											<label>Date Fin </label>
											<div class="form-group input-group">
												<table>                                          
													<tr><td><select class="form-control" name="JourF" required >
														<option value="">Jour</option>												
															<?php 
																for($i=1; $i<=31; $i++){
																	echo "<option value=".$i.">".$i."</option>";
																}
															?>
													</select></td><td>
															
													<select class="form-control" name="MoisF" style="width:180px;">
														<option value="">Mois</option>
														<option value="01">Janvier</option>
														<option value="02">Fevrier</option>
														<option value="03">Mars</option>
														<option value="04">Avril</option>
														<option value="05">Mai</option>
														<option value="06">Juin</option>
														<option value="07">Juillet</option>
														<option value="08">Aout</option>
														<option value="09">Septembre</option>
														<option value="10">Octobre</option>
														<option value="11">Novembre</option>
														<option value="12">Decembre</option>
													</select></td><td>
															
													<select class="form-control" name="AnneeF" required >
														<option value="">Année</option>												
														<?php 
															for($i=date('Y'); $i>=2016; $i--){
																echo "<option value=".$i.">".$i."</option>";
															}
														?>
													</select></td></tr>
												</table>                                           
											</div>
										</div>
										<div class="col-lg-2">
											<label>&nbsp;</label>
											<div class="form-group input-group">
												<button type="submit" class="btn btn-success" name="Rechercher" >  <span class="glyphicon glyphicon-search"></span> Rechercher </button>
											</div>
										</div>
									</form>
								</div>
							 
							 <?php
								if(isset($_POST['Rechercher'])){
									$JourD=$_POST['JourD'];
									$MoisD=$_POST['MoisD'];
									$AnneeD=$_POST['AnneeD'];
									$DateDebut = $AnneeD."-".$MoisD."-".$JourD;
									$JourF=$_POST['JourF'];
									$MoisF=$_POST['MoisF'];
									$AnneeF=$_POST['AnneeF'];
									$DateFin = $AnneeF."-".$MoisF."-".$JourF;
									require_once("BDD/connect.php");
									
									$Exam=mysql_query("SELECT * FROM PrescExamens, ResultExamens, Patients, Utilisateurs WHERE (ResultExamens.DateResultat BETWEEN '".$DateDebut."' AND '".$DateFin."') 
										AND PrescExamens.IdPrescription=ResultExamens.IdPrescription AND PrescExamens.Idauto_Patient=Patients.Idauto_Patient 
										AND ResultExamens.IdUtilisateur=Utilisateurs.IdUtilisateur") or die(mysql_error());
							?>
										<div id='Rapport'>                      
											<div class='panel-body'>
												<div class='table-responsive'>
													<center><h3 style='font-weight:bold; color:blue'>STATISTIQUE PERIODIQUE DU LABO DU <?php echo "".$JourD."-".$MoisD."-".$AnneeD." AU ".$JourF."-".$MoisF."-".$AnneeF.""; ?></h3></center>
													
													<div class='col-lg-12'>														
															<table class='table'>														
																<thead>
																	<tr>
																		<th>DATE </th>
																		<th>MALADE EXAMINE </th>
																		<th>LES EXAMENS</th>									
																		<th>LABORANTIN</th>
																		<th>ACTION ENVISAGEE</th>
																	</tr>
																</thead>
															<?php
																	if (mysql_num_rows($Exam)>0){
																		while($row=mysql_fetch_array($Exam)){
															?>
				
																<tbody>
																	<tr>
																		<td><?php $DateResultat=new DateTime($row['DateResultat']); echo Date_Format($DateResultat,'d-m-Y');?></td>
																		<td><?php echo $row['Noms'];?></td>                                          
																		<td><?php
																		// Affichage des examens prescrits
																			$Examen = "";
																			$rechEx=mysql_query("SELECT * FROM PrescExamensCompose, Examens WHERE PrescExamensCompose.IdPrescription='".$row['IdPrescription']."' AND PrescExamensCompose.IdExamen=Examens.IdExamen");
																				if(mysql_num_rows($rechEx)>0){
																					while($ligne=mysql_fetch_array($rechEx)){
																						$Examen="".$Examen."".$ligne['DesignExamen'].";";
																					}													
																					echo $Examen;
																				}
																			?>
																		</td>
																		<td><?php echo $row['NomsUtil'];?></td>
																		<td><?php echo "<a href='AffichResultatsExamens.php?id=".$row['IdResultat']."' title='Afficher les resultats du labo'><span class='glyphicon glyphicon-list'></span> Afficher les reslutats</a>";?></td>
																									
																	</tr>
																</tbody>

															<?php
																		}
																	}else{
																		echo "<td>AUCUNE </td>";
																	}
																	?>
															</table>
														</div>
													</div>
											</div>
										</div>
						</div>
					</div>
		</div>
	</div>
								<center><button type="submit" class="btn btn-primary" name="Imprimer" onclick="javascript:imprimer_bloc('Rapport', 'Rapport');"><span class="glyphicon glyphicon-print"></span> Imprimer le rapport</button></center>
							
							<?php
								}
							?>

					
						 
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
	
	<script language="javascript">
			function imprimer_bloc(titre, objet) { 
				// Définition de la zone à imprimer 
				var zone = document.getElementById(objet).innerHTML; 
				
				// Ouverture du popup 
				var fen = window.open("", "", "height=auto, width=1200,toolbar=0, menubar=0, scrollbars=0, resizable=1,status=0, location=0, left=10, top=10"); 
				
				// style du popup 
				fen.document.body.style.color = '#000000'; 
				fen.document.body.style.backgroundColor = '#FFFFFF'; 
				fen.document.body.style.padding = "20px"; 
				fen.document.body.style.border = "1px solid black"; 
				
				// Ajout des données a imprimer 
				fen.document.title = titre; 
				fen.document.body.innerHTML += " " + zone + " "; 
				
				// Impression du popup 
				fen.window.print(); 
				
				//Fermeture du popup 
				fen.window.close(); 
				return true; 
			} 
		</script>

</body>

</html>
<?php
	}else{
		header('Location:index.php');
	}
?>
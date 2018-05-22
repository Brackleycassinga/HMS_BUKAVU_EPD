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
                 Gestion des Malades en ligne <small>  : SORTIES DE MEDICAMENTS EN STOCK </small> 
				 <img src="IMA/medicaments.png" width="120px" height="80px" />
             </h1>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            RECHERCHE ET AFFICHAGE DES SORTIES DES MEDICAMENTS EN STOCK
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
									
									$sqlSearchMal=mysql_query("SELECT * FROM SortieMedMalades, PrescMedicaments, Patients, Medicaments, CategoriesMed WHERE (SortieMedMalades.DateSortieMedMal BETWEEN '".$DateDebut."' AND '".$DateFin."') 
										AND SortieMedMalades.IdMedicament=Medicaments.IdMedicament AND CategoriesMed.IdCategorieMed=Medicaments.IdCategorieMed
										AND PrescMedicaments.IdPrescMed=SortieMedMalades.IdPrescMed AND PrescMedicaments.Idauto_Patient=Patients.Idauto_Patient") or die(mysql_error());
										
									$sqlSearchServ=mysql_query("SELECT * FROM SortieMedServices, Services, Medicaments, CategoriesMed WHERE (SortieMedServices.DateSortieMedServ BETWEEN '".$DateDebut."' AND '".$DateFin."') 
										AND SortieMedServices.IdMedicament=Medicaments.IdMedicament AND CategoriesMed.IdCategorieMed=Medicaments.IdCategorieMed
										AND SortieMedServices.CodeService=Services.CodeService") or die(mysql_error());
							?>
										                      
											<div class='panel-body'>
												<div class='table-responsive'>
													<div id='Facture'>
														<center><h3 style='font-weight:bold; color:blue'>VOICI LES SORTIES DES MEDICAMENTS EN STOCK DU <?php echo "".$JourD."-".$MoisD."-".$AnneeD." AU ".$JourF."-".$MoisF."-".$AnneeF.""; ?></h3></center>
														
														<div class='col-lg-12'> 
															<span style='font-weight:bold; color:red'>1. POUR LES MALADES</span></center>
															<br/><br/>
															<table class='table'>														
																<thead>
																	<tr>
																		<th>DATE SORTIE</th>
																		<th>MALADE BENEFICIAIRE</th>
																		<th>MEDICAMENT</th>				
																		<th>CATEGORIE</th>																
																		<th>QTE PRESCRITE</th>																
																		<th>QTE LIVREE</th>																
																		<th>PRIX UNIT</th>																
																		
																	</tr>
																</thead>
							<?php
									if (mysql_num_rows($sqlSearchMal)>0){
										while($row=mysql_fetch_array($sqlSearchMal)){
							?>
				
																<tbody>
																	<tr>
																		<td><?php $DateSortieMedMal=new DateTime($row['DateSortieMedMal']); echo Date_Format($DateSortieMedMal,'d-m-Y');?></td>
																		<td><?php echo $row['Noms'];?></td>                                          
																		<td><?php echo $row['DesignMedicament'] ." ".$row['Dosage'];?></td>                                          
																		
																		<td><?php echo $row['DesignCategorieMed'];?></td>                                          
																		<td style="text-align:center;"><?php $rech=mysql_query("SELECT * FROM PrescMedicamentsCompose WHERE IdPrescMed='".$row['IdPrescMed']."' AND IdMedicament='".$row['IdMedicament']."'");
																				  $tb=mysql_fetch_array($rech);
																				  echo $tb['QuantiteDemande'];
																			?>
																		</td>                                         
																		<td style="text-align:center;"><?php echo $row['QteLivreeMedMal'];?></td>                                          
																		<td style="text-align:center;"><?php echo $row['PrixUnitMedMal'];?></td>                                          
																										
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
												
												
												<div class='col-lg-12'>
													<br/>
													<span style='font-weight:bold; color:red'>2. POUR LES SERVICES</span></center>
															<br/><br/>
															<table class='table'>														
																<thead>
																	<tr>
																		<th>DATE DE SORTIE</th>
																		<th>SERVICE BENEFICIAIRE</th>
																		<th>MEDICAMENT</th>				
																		<th>CATEGORIE</th>																
																		<th>QTE DEMANDEE</th>																
																		<th>QTE LIVREE</th>																
																		<th>PRIX UNIT</th>																
																		
																	</tr>
																</thead>
							<?php
									if (mysql_num_rows($sqlSearchServ)>0){
										while($row=mysql_fetch_array($sqlSearchServ)){
							?>
				
																<tbody>
																	<tr>
																		<td><?php $DateSortieMedServ=new DateTime($row['DateSortieMedServ']); echo Date_Format($DateSortieMedServ,'d-m-Y');?></td>
																		<td><?php echo $row['DesignService'];?></td>                                          
																		<td><?php echo $row['DesignMedicament'] ." ".$row['Dosage'];?></td>                                          
																		
																		<td><?php echo $row['DesignCategorieMed'];?></td>                                          
																		<td style="text-align:center;"><?php echo $row['QteDemandeMedServ'];?></td>                                          
																		<td style="text-align:center;"><?php echo $row['QteLivreeMedServ'];?></td>                                          
																		<td style="text-align:center;"><?php echo $row['PrixUnitMedServ'];?></td>                                          
																										
																	</tr>
																</tbody>

									<?php
										}
									}else{
										echo "<td>AUCUNE</td>";
									}
									?>
															</table>
														</div>
													</div>
												</div>
											</div>
								<center><button type="submit" class="btn btn-primary" name="Imprimer" onclick="javascript:imprimer_bloc('Facture', 'Facture');"><span class="glyphicon glyphicon-print"></span> Imprimer le rapport</button></center>
							
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
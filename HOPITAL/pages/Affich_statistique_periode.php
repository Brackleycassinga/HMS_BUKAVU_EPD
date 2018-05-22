<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& ($_SESSION['Fonction']=='MD' OR $_SESSION['Fonction']=='AG')){
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
                 Gestion des Malades en ligne <small>  : STATISTIQUE POUR UNE PERIODE </small> 
				 <img src="IMA/medicaments.png" width="120px" height="80px" />
             </h1>
                    <div class="panel panel-green">
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
									
									$Pat=mysql_query("SELECT * FROM   Patients, Utilisateurs WHERE (Patients.DateArrive BETWEEN '".$DateDebut."' AND '".$DateFin."') 
										AND Patients.IdUtilisateur=Utilisateurs.IdUtilisateur") or die(mysql_error());
									
									$Consult=mysql_query("SELECT * FROM Consultations, Utilisateurs, Patients WHERE (Consultations.DateConsultation BETWEEN '".$DateDebut."' AND '".$DateFin."') 
										AND Consultations.IdUtilisateur=Utilisateurs.IdUtilisateur AND Consultations.Idauto_Patient=Patients.Idauto_Patient") or die(mysql_error());
									
									$Exam=mysql_query("SELECT * FROM PrescExamens, ResultExamens, Patients, Utilisateurs WHERE (ResultExamens.DateResultat BETWEEN '".$DateDebut."' AND '".$DateFin."') 
										AND PrescExamens.IdPrescription=ResultExamens.IdPrescription AND PrescExamens.Idauto_Patient=Patients.Idauto_Patient 
										AND ResultExamens.IdUtilisateur=Utilisateurs.IdUtilisateur") or die(mysql_error());
									
									$Hospit=mysql_query("SELECT * FROM Hospitalisations, Services, Patients WHERE (Hospitalisations.DateHosp BETWEEN '".$DateDebut."' AND '".$DateFin."') 
										AND Hospitalisations.CodeService=Services.CodeService AND Hospitalisations.Idauto_Patient=Patients.Idauto_Patient") or die(mysql_error());
									
									$Tour=mysql_query("SELECT * FROM TourSalles, Utilisateurs, Patients WHERE (TourSalles.DateTour BETWEEN '".$DateDebut."' AND '".$DateFin."') 
										AND TourSalles.IdUtilisateur=Utilisateurs.IdUtilisateur AND TourSalles.Idauto_Patient=Patients.Idauto_Patient") or die(mysql_error());
									
									$Sortie=mysql_query("SELECT * FROM Sorties, Hospitalisations, Patients WHERE (Sorties.DateSortie BETWEEN '".$DateDebut."' AND '".$DateFin."') 
										AND Sorties.Idauto_Hosp=Hospitalisations.Idauto_Hosp AND Hospitalisations.Idauto_Patient=Patients.Idauto_Patient") or die(mysql_error());
									
									$Paie=mysql_query("SELECT * FROM Payements, Facturations, Patients, Utilisateurs WHERE (Payements.DatePaie BETWEEN '".$DateDebut."' AND '".$DateFin."') 
										AND Payements.IdFacturation=Facturations.IdFacturation AND Facturations.Idauto_Patient=Patients.Idauto_Patient
										AND Payements.IdUtilisateur=Utilisateurs.IdUtilisateur") or die(mysql_error());
										
									$StockMed=mysql_query("SELECT * FROM Entreestocks, Medicaments, CategoriesMed WHERE (Entreestocks.DateEntree BETWEEN '".$DateDebut."' AND '".$DateFin."') 
										AND Entreestocks.IdMedicament=Medicaments.IdMedicament AND CategoriesMed.IdCategorieMed=Medicaments.IdCategorieMed") or die(mysql_error());
																		
									$sqlSearchMal=mysql_query("SELECT * FROM SortieMedMalades, PrescMedicaments, Patients, Medicaments, CategoriesMed WHERE (SortieMedMalades.DateSortieMedMal BETWEEN '".$DateDebut."' AND '".$DateFin."') 
										AND SortieMedMalades.IdMedicament=Medicaments.IdMedicament AND CategoriesMed.IdCategorieMed=Medicaments.IdCategorieMed
										AND PrescMedicaments.IdPrescMed=SortieMedMalades.IdPrescMed AND PrescMedicaments.Idauto_Patient=Patients.Idauto_Patient") or die(mysql_error());
										
									$sqlSearchServ=mysql_query("SELECT * FROM SortieMedServices, Services, Medicaments, CategoriesMed WHERE (SortieMedServices.DateSortieMedServ BETWEEN '".$DateDebut."' AND '".$DateFin."') 
										AND SortieMedServices.IdMedicament=Medicaments.IdMedicament AND CategoriesMed.IdCategorieMed=Medicaments.IdCategorieMed
										AND SortieMedServices.CodeService=Services.CodeService") or die(mysql_error());
							?>
										<div id='Statistiques'>                      
											<div class='panel-body'>
												<div class='table-responsive'>
													<center><h3 style='font-weight:bold; color:blue'>STATISTIQUE PERIODIQUE DU <?php echo "".$JourD."-".$MoisD."-".$AnneeD." AU ".$JourF."-".$MoisF."-".$AnneeF.""; ?></h3></center>
														
														<div class='col-lg-12'> 
															<span style='font-weight:bold; color:red'>LES MALADES ENREGISTRES</span></center>
															<br/><br/>
															<table class='table'>														
																<thead>
																	<tr>
																		<th>DATE </th>
																		<th>CODE DU MALADE</th>
																		<th>INDEX </th>
																		<th>NOMS COMPLETS</th>
																		<th>AGE</th>				
																		<th>SEXE</th>				
																		<th>PROFESSION</th>				
																		<th>UTILISATEUR</th>																
																		
																	</tr>
																</thead>
															<?php
																	if (mysql_num_rows($Pat)>0){
																		while($row=mysql_fetch_array($Pat)){
															?>
				
																<tbody>
																	<tr>
																		<td><?php $DateArrive=new DateTime($row['DateArrive']); echo Date_Format($DateArrive,'d-m-Y');?></td>
																		<td><?php echo $row['CodePatient'];?></td>                                          
																		<td><?php echo $row['IndexMal'];?></td>                                          
																		<td><?php echo $row['Noms'];?></td>                                          
																		<td><?php echo $row['Age'];?></td>
																		<td><?php echo $row['Sexe'];?></td>
																		<td><?php echo $row['Profession'];?></td>
																		<td><?php echo $row['NomsUtil'];?></td>                                          
																									
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
											
											<div class='panel-body'>
												<div class='col-lg-12'> 
													<span style='font-weight:bold; color:red'>LES CONSULTATIONS</span></center>
															<br/><br/>
															<table class='table'>														
																<thead>
																	<tr>
																		<th>DATE </th>
																		<th>MALADE CONSULTE</th>
																		<th>HYPOTHE DIAGNOSTIQUE</th>				
																		<th>MEDECIN CONSULTANT</th>																
																		
																	</tr>
																</thead>
															<?php
																	if (mysql_num_rows($Consult)>0){
																		while($row=mysql_fetch_array($Consult)){
															?>
				
																<tbody>
																	<tr>
																		<td><?php $DateConsultation=new DateTime($row['DateConsultation']); echo Date_Format($DateConsultation,'d-m-Y');?></td>
																		<td><?php echo $row['Noms'];?></td>                                          
																		<td><?php echo $row['Hypothese'];?></td>
																		<td><?php echo $row['NomsUtil'];?></td>                                          
																									
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
									
									
									<!-- !-->
									
											<div class='panel-body'>
												<div class='table-responsive'>
													<div class='col-lg-12'> 
														<span style='font-weight:bold; color:red'>LES EXAMENS FAIT AU LABORATOIRE </span></center>
															<br/><br/>
															<table class='table'>														
																<thead>
																	<tr>
																		<th>DATE </th>
																		<th>MALADE CONCERNE </th>
																		<th>LES EXAMENS</th>									
																		<th>LABORANTIN</th>																
																		
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
									
									<!-- !-->
									
											<div class='panel-body'>
												<div class='table-responsive'>
													<div class='col-lg-12'> 
														<span style='font-weight:bold; color:red'>LES HOSPITALISATIONS</span></center>
															<br/><br/>
															<table class='table'>														
																<thead>
																	<tr>
																		<th>DATE </th>
																		<th>CODE HOSP. </th>
																		<th>MALADE HOSPITALISE</th>
																		<th>SALLE</th>				
																		<th>N° LIT</th>																
																		<th>SERVICE</th>																
																		
																	</tr>
																</thead>
															<?php
																	if (mysql_num_rows($Hospit)>0){
																		while($row=mysql_fetch_array($Hospit)){
															?>
				
																<tbody>
																	<tr>
																		<td><?php $DateHosp=new DateTime($row['DateHosp']); echo Date_Format($DateHosp,'d-m-Y');?></td>
																		<td><?php echo $row['CodeHosp'];?></td>                                          
																		<td><?php echo $row['Noms'];?></td>                                          
																		<td><?php echo $row['SalleHosp'];?></td>
																		<td><?php echo $row['NumLit'];?></td>
																		<td><?php echo $row['DesignService'];?></td>                                          
																									
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
									
									
									<!-- !-->
									
											<div class='panel-body'>
												<div class='table-responsive'>
													<div class='col-lg-12'> 
														<span style='font-weight:bold; color:red'>LES TOURS DE SALLES </span></center>
															<br/><br/>
															<table class='table'>														
																<thead>
																	<tr>
																		<th>DATE </th>
																		<th>HEURE </th>
																		<th>NOM DU MALADE </th>
																		<th>EVOLUTION CONSTATEE</th>				
																		<th>MEDECIN</th>				
																		<th>ACCOMPAGNANT</th>																
																		
																	</tr>
																</thead>
															<?php
																	if (mysql_num_rows($Tour)>0){
																		while($row=mysql_fetch_array($Tour)){
															?>
				
																<tbody>
																	<tr>
																		<td><?php $DateTour=new DateTime($row['DateTour']); echo Date_Format($DateTour,'d-m-Y');?></td>
																		<td><?php echo $row['HeureTour'];?></td>                                          
																		<td><?php echo $row['Noms'];?></td>                                          
																		<td><?php echo $row['Evolution'];?></td>
																		<td><?php echo $row['NomsUtil'];?></td>
																		<td><?php echo $row['Accompagnant'];?></td>                                          
																									
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
									
									
									<!-- !-->
									
											<div class='panel-body'>
												<div class='table-responsive'>
													<div class='col-lg-12'> 
														<span style='font-weight:bold; color:red'>LES SORTIES AUTORISEES </span></center>
															<br/><br/>
															<table class='table'>														
																<thead>
																	<tr>
																		<th>DATE HOSPIT. </th>
																		<th>DATE SORTIE </th>
																		<th>NOM DU MALADE </th>
																		<th>ETAT DE SORTIE</th>				
																		<th>OBSERVATION FAITE</th>				
																		<th>NBRE DE JOUR</th>				
																		
																	</tr>
																</thead>
															<?php
																	if (mysql_num_rows($Sortie)>0){
																		while($row=mysql_fetch_array($Sortie)){
															?>
				
																<tbody>
																	<tr>
																		<td><?php $DateHosp=new DateTime($row['DateHosp']); echo Date_Format($DateHosp,'d-m-Y');?></td>
																		<td><?php $DateSortie=new DateTime($row['DateSortie']); echo Date_Format($DateSortie,'d-m-Y');?></td>
																		<td><?php echo $row['Noms'];?></td>                                          
																		<td><?php echo $row['EtatSortie'];?></td>
																		<td><?php echo $row['Observation'];?></td>
																		<td><?php 
																				$sel=mysql_query("SELECT datediff( DateSortie, DateHosp )FROM Hospitalisations,Sorties 
																				WHERE Hospitalisations.Idauto_Patient='".$row['Idauto_Patient']."' AND Hospitalisations.Idauto_Hosp=Sorties.Idauto_Hosp"); 
																				$req=mysql_fetch_row($sel);
																				echo "".$req[0]." Jour(s)";
																			?>
																		</td>                                          
																									
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
											
									<!-- !-->
									
											<div class='panel-body'>
												<div class='table-responsive'>
													<div class='col-lg-12'> 
														<span style='font-weight:bold; color:red'>LES PAYEMENTS DE SOINS MEDICAUX PAR LES MALADES </span></center>
															<br/><br/>
															<table class='table'>														
																<thead>
																	<tr>
																		<th>DATE PAIE. </th>
																		<th>NOM DU MALADE </th>
																		<th>MONTANT PAYE</th>				
																		<th>OBSERVATION </th>				
																		<th>PERCEPTEUR</th>				
																		
																	</tr>
																</thead>
															<?php
																	if (mysql_num_rows($Paie)>0){
																		while($row=mysql_fetch_array($Paie)){
															?>
				
																<tbody>
																	<tr>
																		<td><?php $DatePaie=new DateTime($row['DatePaie']); echo Date_Format($DatePaie,'d-m-Y');?></td>
																		<td><?php echo $row['Noms'];?></td>                                          
																		<td><?php echo $row['MontantPaie'];?></td>
																		<td><?php echo $row['Observation'];?></td>
																		<td><?php echo $row['NomsUtil'];?></td>
																								
																	</tr>
																</tbody>

															<?php
																		}
																	}else{
																		echo "<td>AUCUN </td>";
																	}
															?>
															</table>
														</div>
													</div>
											</div>
									
									
									<!-- !-->
											
											<div class='panel-body'>
												<div class='table-responsive'>
													<div class='col-lg-12'> 
														<span style='font-weight:bold; color:red'>PHARMACIE : LES ENTREES DE MEDICAMENTS EN STOCK </span></center>
															<br/><br/>
															<table class='table'>														
																<thead>
																	<tr>
																		<th>DATE D'ENTREE</th>
																		<th>DESIGNATION</th>																
																		<th>DOSAGE</th>											
																		<th>CATEGORIE</th>																
																		<th>QTE ENTREE</th>																
																		<th>PRIX UNIT</th>																
																		<th>PROVENANCE</th>			
																		
																	</tr>
																</thead>
															<?php
																	if (mysql_num_rows($StockMed)>0){
																		while($row=mysql_fetch_array($StockMed)){
															?>
				
																<tbody>
																	<tr>
																		<td><?php $DateEntree=new DateTime($row['DateEntree']); echo Date_Format($DateEntree,'d-m-Y');?></td>
																		<td><?php echo $row['DesignMedicament'];?></td>                                          
																		<td><?php echo $row['Dosage'];?></td>
																		<td><?php echo $row['DesignCategorieMed'];?></td>                                          
																		<td><?php echo $row['QteEntree'];?></td>                                          
																		<td><?php echo $row['PrixUnit'];?></td>                                          
																		<td><?php echo $row['Provenance'];?></td>                                          
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
									
									
									<!-- !-->
														<div class='col-lg-12'> 
															<span style='font-weight:bold; color:red'>PHARMACIE : SORTIE DES MEDICAMENTS EN STOCK POUR LES MALADES</span></center>
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
													<span style='font-weight:bold; color:red'>PHARMACIE : SORTIE DES MEDICAMENTS EN STOCK POUR LES SERVICES</span></center>
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
								<center><button type="submit" class="btn btn-primary" name="Imprimer" onclick="javascript:imprimer_bloc('Statistiques', 'Statistiques');"><span class="glyphicon glyphicon-print"></span> Imprimer le rapport</button></center>
							</div>
						</div>
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
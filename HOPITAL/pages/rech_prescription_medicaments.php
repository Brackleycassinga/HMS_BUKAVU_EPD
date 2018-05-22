<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']=='PHARMACIEN'){
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
				
				<?php require_once ("Ajout/menuPharmacie.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : LIVRAISON DES MEDICAMENTS AUX MALADES</small> 
				  <img src="IMA/medicaments.png" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           RECHERCHE DE LA PRESCRIPTION DES MEDICAMENTS CONCERNES PAR LA LIVRAISON
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">                                       											
										<label>N° de la Prescription, Code ou Nom du malade</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour votre recherche" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-primary" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
								</div>
							 
                            </div>
                        
							 <?php
								if(isset($_POST['Rechercher'])){
									$Mot=$_POST['Mot'];
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM Utilisateurs, PrescMedicaments, Patients WHERE (Patients.CodePatient LIKE '%$Mot%' OR Patients.Noms LIKE '%$Mot%' OR PrescMedicaments.IdPrescMed LIKE '%$Mot%') AND Patients.Idauto_Patient=PrescMedicaments.Idauto_Patient AND Utilisateurs.IdUtilisateur=PrescMedicaments.IdUtilisateur") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) TROUVEES POUR [ \" $Mot \"]</font></center>
														<br/>
													<table class='table'>
														
														<thead>
															<tr>
																<th>DATE PRESCR.</th>
																<th>CODE MALADE</th>
																<th>PHOTO</th>
																<th>NOMS DU MALADE</th>
																<th>SEXE</th>
																<th>MEDICAMENTS</th>
																<th>MEDECIN</th>
																<th>ACTION ENVISAGEE</th>
																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
											
							 ?>
				
                                    <tbody>
                                        <tr>                                           
                                            <td><?php $DatePrescMed = new DateTime($row['DatePrescMed']);
														echo Date_Format($DatePrescMed,'d-m-Y');
												?>
											</td>
                                            <td><?php echo $row['CodePatient'];?></td>
											<td><?php echo "<img  width=\"80\" height=\"80\" src=";
														echo '"Patients/';
														echo $row["Photo"];
														echo '"/>';?></td>
                                            <td><?php echo $row['Noms'];?></td>                                          
                                            <td><?php echo $row['Sexe'];?></td>                                          
                                            <td><?php
											// Affichage des medicaments prescrits
												$ListeMedicaments = "";
												$rechEx=mysql_query("SELECT * FROM PrescMedicamentsCompose, Medicaments WHERE PrescMedicamentsCompose.IdPrescMed='".$row['IdPrescMed']."' AND PrescMedicamentsCompose.IdMedicament=Medicaments.IdMedicament");
													if(mysql_num_rows($rechEx)>0){
														while($ligne=mysql_fetch_array($rechEx)){
															$ListeMedicaments="".$ListeMedicaments."".$ligne['DesignMedicament'].";";
														}													
														echo $ListeMedicaments;
													}
												?>
											</td>                                          
                                            <td><?php echo $row['NomsUtil'];?></td>                                          
                                            <td><?php 
												$search=mysql_query("SELECT * FROM PrescMedicamentsCompose WHERE PrescMedicamentsCompose.IdPrescMed='".$row['IdPrescMed']."'");
												$nombre=mysql_num_rows($search);
												$NbreLivTotale = 0; // Initialisation du Nombre total de livraison effectuée en totalité demandée
												While($ligne=mysql_fetch_array($search)){
													$sp=mysql_query("SELECT SUM(QteLivreeMedMal) FROM SortieMedMalades WHERE IdPrescMed='".$ligne['IdPrescMed']."' AND IdMedicament='".$ligne['IdMedicament']."'");
													$QteLiv=mysql_fetch_array($sp);
													if($QteLiv[0]==$ligne['QuantiteDemande']){
														$NbreLivTotale = $NbreLivTotale + 1;
													}
												}
												// Test si les livraisons totales sont égales au nombre demandé
												if($NbreLivTotale < $nombre)
													echo "<a href='rech_prescription_medicaments.php?id=".$row['IdPrescMed']."' title='Cliquez pour effectuer la livraison'><span class='glyphicon glyphicon-list'></span> Livrer les médicaments</a>";
												else
													echo "<span class='glyphicon glyphicon-ok'></span> &nbsp; Déjà livrer.";
													
												?>
											</td>                                           
                                        </tr>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune suggestion trouvée dans la liste de prescription des médicaments aux malades pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>
						</div>
                    </div>
					<?php 
						if(isset($_GET['id'])){
							require_once("BDD/connect.php");
							$sql=mysql_query("SELECT * FROM PrescMedicaments, Patients WHERE IdPrescMed='".$_GET['id']."' AND Patients.Idauto_Patient=PrescMedicaments.Idauto_Patient");
							$row=mysql_fetch_array($sql);
					?>
					
						<form action="save_livraison_medicaments.php" method="GET" >
							<div class="panel panel-primary">
								<div class="panel-body">
									<div class="col-lg-2">
										<input type="hidden" name="IdPrescMed" value="<?php echo $row['IdPrescMed']; ?>"></tr>
									</div>					
									<div class="col-lg-6">					
										<label style="color:red;">Code et noms complets du Patient concerné</label>
										<div class="form-group input-group"> 
											<input type="hidden" name="Idauto_Patient" value="<?php echo $row['Idauto_Patient']; ?>"></tr>		
											<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                       
											<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly >
											<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" readonly >
										</div>
										<label style="color:red;">Mode de Paiement pour la livraison </label>
										<div class="form-group input-group"> 
											<div class="form-group input-group">
												<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
												<select class="form-control" name="ModePaie" style="width:580px;" required >
													<option value="">----Veuillez s&eacute;lectionner ici----</option>
													<option>CREDIT</option>
													<option>CASH</option>																						
												</select>
											</div>
										</div>
										<label>Date de livraison de médicament </label>
											<div class="form-group input-group">
												<table>                                          
													<tr><td><select class="form-control" name="Jour" required >
														<option value="">Jour</option>												
															<?php 
																for($i=1; $i<=31; $i++){
																	echo "<option value=".$i.">".$i."</option>";
																}
															?>
													</select></td><td>
															
													<select class="form-control" name="Mois" style="width:180px;">
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
															
													<select class="form-control" name="Annee" required >
														<option value="">Année</option>												
														<?php 
															for($i=date('Y'); $i>=2016; $i--){
																echo "<option value=".$i.">".$i."</option>";
															}
														?>
													</select></td></tr>
												</table>                                           
											</div>
								<?php
									$rech=mysql_query("SELECT * FROM PrescMedicamentsCompose, Medicaments WHERE PrescMedicamentsCompose.IdPrescMed='".$_GET['id']."' AND PrescMedicamentsCompose.IdMedicament=Medicaments.IdMedicament") or die(mysql_error());
									$i=mysql_num_rows($rech)+1;
								?>
									<input type="hidden" class="form-control" name="NbreMed" value="<?php echo $i-1 ; ?>" required>
								<?php
									while($ligne=mysql_fetch_array($rech)){
										$i=$i-1;
										$sp=mysql_query("SELECT SUM(QteLivreeMedMal) FROM SortieMedMalades WHERE IdPrescMed='".$_GET['id']."' AND IdMedicament='".$ligne['IdMedicament']."'");
										$rsp=mysql_fetch_array($sp);
											if($rsp[0]>0) $QteLiv=$rsp[0]; else $QteLiv=0;
											$Reste = $ligne['QuantiteDemande']-$QteLiv;
								?>							
										<label style="color:green"><?php echo $ligne['DesignMedicament']; ?> (<?php echo $ligne['Consommation']; ?>) </label>
										<div class="form-group input-group"> 	
											<span class="input-group-addon">Qté Demandée <span class="glyphicon glyphicon-hand-right"></span></span>                                           
											<input type="hidden" class="form-control" name="IdMedicament<?php echo $i; ?>" value="<?php echo $ligne['IdMedicament']; ?>" required>
											<input type="text" class="form-control" name="QteDemande<?php echo $i; ?>" value="<?php echo $ligne['QuantiteDemande']; ?>" readonly>
											<span class="input-group-addon">Qté déjà livrée <span class="glyphicon glyphicon-hand-right"></span></span>											
											<input type="text" class="form-control" name="QteDejaLivree<?php echo $i; ?>" value="<?php echo $QteLiv; ?>" readonly>
											<span class="input-group-addon">Reste à livrér <span class="glyphicon glyphicon-hand-right"></span></span>												
											<input type="text" class="form-control" name="Reste<?php echo $i; ?>" value="<?php echo $Reste; ?>" readonly>											
										</div>
								<?php 
									if($Reste > 0){
								?>
										<div class="form-group input-group"> 	
											<span class="input-group-addon">Qté Livrée <span class="glyphicon glyphicon-hand-right"></span></span>
											<input type="text" class="form-control" name="QteLivree<?php echo $i; ?>" placeholder="Qté livrée" required>
											<span class="input-group-addon">Prix Unitaire <span class="glyphicon glyphicon-hand-right"></span></span>											
											<input type="text" class="form-control" name="PrixUnit<?php echo $i; ?>" placeholder="Prix unitaire" required>
																					
										</div>
								
								<?php 
									}
								}
								?>
											<center><button type="submit" class="btn btn-primary" name="EnregResulat"><span class="glyphicon glyphicon-ok"></span> Enregistrer la livraison</button></center>
									</div>
									<div class="col-lg-4">
										<div class="panel panel-red">
											<div class="panel-body">
												<center><img src="IMA/help.png" /></center><br>
												<p align="justify"><strong>Pour enregistrer, aucun champ pour le resultat ne doit pas être vide. Si un des médicaments n'est pas 
												livré, veuillez précisez la quantité (0)</strong></p>
											</div>												
										</div>
									</div>
								</div>					
							</div>										
						</form>
				
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

</body>

</html>
<?php
	}else{
		header('Location:index.php');
	}
?>
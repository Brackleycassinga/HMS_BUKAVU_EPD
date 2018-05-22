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
                 Gestion des Malades en ligne <small>  : MODIFICATION DE LIVRAISON DE MED. AUX MALADES </small> 
				  <img src="IMA/setup.jpg" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                           FORMULAIRE DE MODIFICATION DE LIVRAISONS DE MEDICAMENTS AUX MALADES
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>Code ou Nom du malade bénéficiaire de médicament</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour votre recherche" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-success" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
								</div>							 
                            </div>
                        
							 <?php
								if(isset($_POST['Rechercher'])){
									$Mot=$_POST['Mot'];
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM Utilisateurs, PrescMedicaments, Patients, SortieMedMalades WHERE 
															(Patients.CodePatient LIKE '%$Mot%' OR Patients.Noms LIKE '%$Mot%') 
															AND Patients.Idauto_Patient=PrescMedicaments.Idauto_Patient AND Utilisateurs.IdUtilisateur=PrescMedicaments.IdUtilisateur 
															AND PrescMedicaments.IdPrescMed=SortieMedMalades.IdPrescMed") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) TROUVEES POUR [ \" $Mot \"]</font></center>
														<br/>
													<table class='table'>
														
														<thead>
															<tr>
																<th>DATE </th>
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
                                            
                                            <td><?php $DateSortieMedMal = new DateTime($row['DateSortieMedMal']);
														echo Date_Format($DateSortieMedMal,'d-m-Y');
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
												$Medicament = "";
												$rechEx=mysql_query("SELECT * FROM SortieMedMalades, Medicaments WHERE SortieMedMalades.IdPrescMed='".$row['IdPrescMed']."' AND SortieMedMalades.IdMedicament=Medicaments.IdMedicament");
													if(mysql_num_rows($rechEx)>0){
														while($ligne=mysql_fetch_array($rechEx)){
															$Medicament="".$Medicament."".$ligne['DesignMedicament'].";";
														}													
														echo $Medicament;
													}
												?>
											</td>                                          
                                            <td><?php echo $row['NomsUtil'];?></td>                                          
                                            <td><?php 
													echo "<a href='rech_sortie_stock_malade_edit.php?id=".$row['IdPrescMed']."' title='Cliquez ici pour afficher les détails'>
														<span class='glyphicon glyphicon-edit'></span> Afficher détail</a>";
												?>
											</td>                                           
                                        </tr>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune livraison des médicaments trouvée pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>
						</div>
                    </div>
					<?php 
						if(isset($_GET['id'])){
							require_once("BDD/connect.php");
							$sql=mysql_query("SELECT * FROM SortieMedMalades, PrescMedicaments, Patients  WHERE SortieMedMalades.IdPrescMed='".$_GET['id']."' AND SortieMedMalades.IdPrescMed=PrescMedicaments.IdPrescMed AND Patients.Idauto_Patient=PrescMedicaments.Idauto_Patient");
							$row=mysql_fetch_array($sql);
					?>
					
						<form action="edit_resultat_examens.php" method="GET" >
							<div class="panel panel-green">
								<div class="panel-body">
									<div class="col-lg-2">										
										<input type="hidden" name="IdPrescMed" value="<?php echo $row['IdPrescMed']; ?>"></tr>
									</div>					
									<div class="col-lg-6">					
										<label style="color:red;">Code et noms complets du Patient </label>
										<div class="form-group input-group"> 
											<input type="hidden" name="Idauto_Patient" value="<?php echo $row['Idauto_Patient']; ?>"></tr>		
											<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                       
											<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly >
											<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" readonly >
										</div>
								<?php
									$rech=mysql_query("SELECT * FROM SortieMedMalades, Medicaments WHERE IdPrescMed='".$_GET['id']."' AND SortieMedMalades.IdMedicament=Medicaments.IdMedicament") or die(mysql_error());
									$i=mysql_num_rows($rech)+1;
								?>
									<input type="hidden" class="form-control" name="NbreRes" value="<?php echo $i-1 ; ?>" required>
								<?php
									while($ligne=mysql_fetch_array($rech)){
										$i=$i-1;
										// echo $i;
								?>							
										<label><?php echo $ligne['DesignMedicament']; ?></label>
										<div class="form-group input-group">
											<input type="hidden" name="IdSortieMedMal<?php echo $i; ?>" value="<?php echo $row['IdSortieMedMal']; ?>">
											<input type="hidden" name="IdMedicament<?php echo $i; ?>" value="<?php echo $ligne['IdMedicament']; ?>" required>
											<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span>Qte livrée</span>
											<input type="text" class="form-control" name="QteLivreeMedMal<?php echo $i; ?>" value="<?php echo $ligne['QteLivreeMedMal']; ?>" placeholder="La quantité livrée" required>											
										</div>
								<?php 
									}
								?>
										<label style="color:red;">Mot de passe d'autorisation (Pour AG ou MD)</label>
										<div class="form-group input-group">
											<span class="input-group-addon"><span class="fa fa-lock">*</span></span>
											<input type="password" class="form-control" name="MotPasse" placeholder="Mot de passe pour l'autorisation" required >
										</div>
											<center><button type="submit" class="btn btn-success" name="ModifResulat"><span class="glyphicon glyphicon-edit"></span> Enregistrer les modifications</button></center>
									</div>
									<div class="col-lg-4">
										<div class="panel panel-red">
											<div class="panel-body">
												<center><img src="IMA/help.png" /></center><br>
												<p align="justify"><strong>Pour enregistrer les modifications, aucun champ pour la quantité ne doit pas être vide.</strong></p>
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
<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& ($_SESSION['Fonction']=='MEDECIN' OR $_SESSION['Fonction']=='MD' OR $_SESSION['Fonction']=='AG')){
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
				<?php if ($_SESSION['Fonction']=='MD' OR $_SESSION['Fonction']=='AG')
							require_once ("Ajout/menu.php");
					  elseif ($_SESSION['Fonction']=='MEDECIN')
							require_once ("Ajout/menuMedecin.php");
				?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : FICHE D'HOSPITALISATION DE MALADE</small> 
				  <img src="IMA/dep.jpg" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           RECHERCHE DE DU MALADE CONCERNE PAR LA FICHE
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>Le Code ou Nom du Malade Hospitalisé</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour rechercher" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-success" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
								</div>
							 <div class="col-lg-6">
								<div class="panel panel-primary">
									<div class="panel-body">
										<p> Un mot suffit pour votre recherche, vous pouvez saisir un code ou un 
											nom du malade à rechercher dans la base de données.</p>
									</div>
										
								</div>
                             </div>
                            </div>
                        
							 <?php
								if(isset($_POST['Rechercher'])){
									$Mot=$_POST['Mot'];
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM Hospitalisations, Patients, Services WHERE (Patients.CodePatient LIKE '%$Mot%' OR Patients.Noms LIKE '%$Mot%') AND Hospitalisations.Idauto_Patient=Patients.Idauto_Patient AND Hospitalisations.CodeService=Services.CodeService") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){
										
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) TROUVEES POUR [ \" $Mot \"]</font></center>
														<br/>
													<table class='table'>														
														<thead>
															<tr>
																<th>CODE HOSP</th>
																<th>DATE HOSP</th>
																<th>CODE MALADE</th>
																<th>PHOTO </th>
																<th>NOMS COMPLETS</th>
																<th>SEXE</th>
																<th>SALLE</th>
																<th>LIT</th>
																<th>SERVICES</th>
																<th>ETAT</th>
																<th>ACTION ENVISAGEE</th>																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['CodeHosp'];?></td>
                                            <td><?php echo $row['DateHosp'];?></td>
                                            <td><?php echo $row['CodePatient'];?></td>
											<td><?php echo "<img  width=\"80\" height=\"80\" src=";
														echo '"Patients/';
														echo $row["Photo"];
														echo '"/>';?></td>
                                            <td><?php echo $row['Noms'];?></td>                                          
                                            <td><?php echo $row['Sexe'];?></td>                                          
                                            <td><?php echo $row['SalleHosp'];?></td>                                          
                                            <td><?php echo $row['NumLit'];?></td>                                          
                                            <td><?php echo $row['DesignService'];?></td>                                          
                                            <td><?php echo $row['Etat'];?></td>                                          
                                            <td><?php
													echo "<a href='AffichFicheHospitalisation.php?id=".$row['Idauto_Patient']."&idhosp=".$row['Idauto_Hosp']."' title='Afficher la fiche hospitalisation'><span class='fa fa-list'></span> Afficher</a>";	
												?>
											</td>                                           
                                        </tr>                                      
                                    </tbody>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune fiche d'hospitalisation trouvée dans la liste pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>
						</div>
                    </div>
					<?php 
						if(isset($_GET['id']) && isset($_GET['idhosp'])){
							require_once("BDD/connect.php");
							$sql=mysql_query("SELECT * FROM Hospitalisations, Patients, Services WHERE Hospitalisations.Idauto_Hosp='".$_GET['idhosp']."' AND Hospitalisations.Idauto_Patient=Patients.Idauto_Patient AND Hospitalisations.CodeService=Services.CodeService") or die(mysql_error());
								while($row=mysql_fetch_array($sql)){
								$DateHospit = $row['DateHosp'];
								
					?>
					
			
				<div class="panel panel-primary">
					<div class="panel-body">
							<center><h2>FICHE D'HOSPITALISATION</h2></center>
							<br/>
						<div class="col-lg-5">					
							<p><strong>CODE DU MALADE :</strong> <?php echo $row['CodePatient']; ?></p>
							<p><strong>NOMS DU MALADE :</strong> <?php echo $row['Noms']; ?></p>
							<p><strong>SEXE :</strong> <?php echo $row['Sexe']; ?></p>
							<p><strong>AGE :</strong> <?php echo $row['Age']; ?></p>
						</div>
                        <div class="col-lg-4">	
							<p><strong>NUM. HOSPITALISATION :</strong> <?php echo $row['CodeHosp']; ?></p>
							<p><strong>DATE D'HOSPITALISATION :</strong> <?php $DateHosp= new DateTime($row['DateHosp']); echo Date_Format($DateHosp,'d-m-Y'); ?></p>
							<p><strong>SALLE D'HOSP.:</strong> <?php echo $row['SalleHosp']; ?></p>
							<p><strong>N° DU LIT :</strong> <?php echo $row['NumLit']; ?></p>
							<p><strong>SERVICE D'HOSP :</strong> <?php echo $row['DesignService']; ?></p>
						</div>
                       
						<div class="col-lg-3">
							<p><strong>PHOTO DU MALADE</strong></p>
							<img src="Patients/<?php echo $row['Photo']; ?>" width="100px" height="100px">
                        </div>
					<?php 
						} 
					?>
						<?php
							require_once("BDD/connect.php");
							$sql=mysql_query("SELECT * FROM PrescExamens, ResultExamens, Hospitalisations, Patients WHERE Hospitalisations.Idauto_Hosp='".$_GET['idhosp']."' 
							AND Patients.Idauto_Patient='".$_GET['id']."' AND PrescExamens.Idauto_Patient=Patients.Idauto_Patient 
							AND PrescExamens.IdPrescription=ResultExamens.IdPrescription AND Hospitalisations.Idauto_Patient=Patients.Idauto_Patient") or die(mysql_error());
								if(mysql_num_rows($sql)>0){								
						?>					
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<div class="panel-body">
							<h4 style="color:blue;">LES EXAMENS DU LABORATOIRES</h4>
							<div class='panel-body'>
								<div class='table-responsive'>													
									<table class='table'>														
										<thead>
											<tr>
												<th>DATE</th>
												<th>EXAMEN</th>
												<th>RESULTAT EXAMEN</th>
																																																	
											</tr>
										</thead>
						<?php							
								while($row=mysql_fetch_array($sql)){
								require_once("BDD/connect.php");
								$rech=mysql_query("SELECT * FROM ResultExamens, ResultExamensCompose, Examens WHERE ResultExamens.IdResultat='".$row['IdResultat']."' 
									 AND ResultExamensCompose.IdExamen=Examens.IdExamen AND ResultExamens.DateResultat >= '".$DateHospit."' 
									 AND ResultExamens.IdResultat=ResultExamensCompose.IdResultat") or die(mysql_error());
									if(mysql_num_rows($sql)>0){	
									while($ligne=mysql_fetch_array($rech)){
						?>	
									<tbody>
                                        <tr>
                                            <td><?php $DateResultat=new DateTime($row['DateResultat']); echo Date_Format($DateResultat,'d-m-Y') ;?></td>
                                            <td><?php echo $ligne['DesignExamen'];?></td>
                                            <td><?php echo $ligne['ResultatPropre'];?></td>											
                                              
                                        </tr>                                      
                                    </tbody>
															
			
					<?php 
						} 
						} 
					} 
					
					?>
								</table>				
								</div>				
							</div>				
						</div>				
					</div>				
				</div>
			<?php 
				} 										
			?>
			<?php
				require_once("BDD/connect.php");
				$sql=mysql_query("SELECT * FROM TourSalles, Patients WHERE TourSalles.Idauto_Patient='".$_GET['id']."' AND DateTour  >= '".$DateHospit."'
					AND TourSalles.Idauto_Patient=Patients.Idauto_Patient") or die(mysql_error());
					if(mysql_num_rows($sql)>0){								
			?>					
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<div class="panel-body">
							<h4 style="color:blue;">LES SUIVIS (TOUR DES SALLES)</h4>
							<div class='panel-body'>
								<div class='table-responsive'>													
									<table class='table'>														
										<thead>
											<tr>
												<th>DATE</th>
												<th>HEURE</th>
												<th>TA</th>																																																	
												<th>PLS</th>																																																	
												<th>POIDS</th>																																																	
												<th>FR</th>																																																	
												<th>FC</th>																																																	
												<th>EVOLUTION</th>																																																	
											</tr>
										</thead>
						<?php							
							while($ligne=mysql_fetch_array($sql)){
						?>	
									<tbody>
                                        <tr>
                                            <td><?php $DateTour=new DateTime($ligne['DateTour']); echo Date_Format($DateTour,'d-m-Y') ;?></td>
                                            <td><?php echo $ligne['HeureTour'];?></td>
                                            <td><?php echo $ligne['Ta'];?></td>											
                                            <td><?php echo $ligne['Pouls'];?></td>											
                                            <td><?php echo $ligne['Poids'];?></td>											
                                            <td><?php echo $ligne['Fr'];?></td>											
                                            <td><?php echo $ligne['Fc'];?></td>											
                                            <td><?php echo $ligne['Evolution'];?></td>					
                                        </tr>                                      
                                    </tbody>
															
			
					<?php 
						} 
					
					?>
								</table>				
								</div>				
							</div>				
						</div>				
					</div>				
				</div>
			<?php 
				} 									
			?>
			<?php
				require_once("BDD/connect.php");
				$sql=mysql_query("SELECT * FROM PrescMedicaments, Patients WHERE PrescMedicaments.Idauto_Patient='".$_GET['id']."' AND PrescMedicaments.Idauto_Patient=Patients.Idauto_Patient") or die(mysql_error());
					if(mysql_num_rows($sql)>0){						
			?>
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<div class="panel-body">
							<h4 style="color:blue;">LES MEDICAMENTS PRIS A LA PHARMACIE</h4>
							<div class='panel-body'>
								<div class='table-responsive'>													
									<table class='table'>														
										<thead>
											<tr>
												<th>DATE</th>																																																												
												<th>MEDICAMENTS</th>																																																	
												<th>DOSAGE</th>																																																	
												<th>QTE LIVREE</th>																																																	
											</tr>
										</thead>
						<?php							
							while($ligne=mysql_fetch_array($sql)){
								$sp=mysql_query("SELECT * FROM SortieMedMalades, Medicaments WHERE IdPrescMed='".$ligne['IdPrescMed']."' AND DateSortieMedMal >= '".$DateHospit."'
								AND SortieMedMalades.IdMedicament=Medicaments.IdMedicament");
								if(mysql_num_rows($sp)>0){
									while($lg=mysql_fetch_array($sp)){
						?>	
										<tbody>
											<tr>
												<td><?php $DateSortieMedMal=new DateTime($lg['DateSortieMedMal']); echo Date_Format($DateSortieMedMal,'d-m-Y') ;?></td>
												<td><?php echo $lg['DesignMedicament'];?></td>
												<td><?php echo $lg['Dosage'];?></td>											
												<td><?php echo $lg['QteLivreeMedMal'];?></td>			
											</tr>                                      
										</tbody>
															
			
						<?php 
									} 
								} 
							} 
						
						
						?>
								</table>				
								</div>				
							</div>				
						</div>				
					</div>				
				</div>			
			<?php 
				} 
			} 					 					
			?>
			
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
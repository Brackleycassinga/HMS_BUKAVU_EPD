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
                 Gestion des Malades en ligne <small>  : FICHE DE CONSULTATION</small> 
				  <img src="IMA/dep.jpg" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           RECHERCHE DU MALADE CONCERNE PAR LA FICHE DE CONSULTATION
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">                                       											
										<label>Le Code ou Nom du Malade Hospitalisé</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour rechercher" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-primary" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
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
									
									$sqlSearch=mysql_query("SELECT * FROM Utilisateurs, Consultations, Patients WHERE (Patients.CodePatient LIKE '%$Mot%' OR Patients.Noms LIKE '%$Mot%') 
										AND Consultations.Idauto_Patient=Patients.Idauto_Patient AND Consultations.IdUtilisateur=Utilisateurs.IdUtilisateur") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){
										
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) TROUVEES POUR [ \" $Mot \"]</font></center>
														<br/>
													<table class='table'>														
														<thead>
															<tr>
																
																<th>DATE CONSULTATION</th>
																<th>CODE MALADE</th>
																<th>PHOTO </th>
																<th>NOMS COMPLETS</th>
																<th>SEXE</th>
																<th>MEDECIN CONSULTANT</th>																
																<th>ACTION ENVISAGEE</th>																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            
                                            <td><?php $DateConsultation= new DateTime($row['DateConsultation']);
														echo Date_Format($DateConsultation,'d-m-Y');
												?></td>
                                            <td><?php echo $row['CodePatient'];?></td>
											<td><?php echo "<img  width=\"80\" height=\"80\" src=";
														echo '"Patients/';
														echo $row["Photo"];
														echo '"/>';?></td>
                                            <td><?php echo $row['Noms'];?></td>                                          
                                            <td><?php echo $row['Sexe'];?></td>                                          
                                            <td><?php echo $row['NomsUtil'];?></td>                                          
                                                                       
                                            <td><?php
													echo "<a href='AffichFicheConsultation.php?id=".$row['IdConsultation']."' title='Afficher la fiche de consultation'><span class='fa fa-list'></span> Afficher</a>";	
												?>
											</td>                                           
                                        </tr>                                      
                                    </tbody>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune fiche de consultation trouvée dans la liste pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>
						</div>
                    </div>
					<?php 
						if(isset($_GET['id'])){
							require_once("BDD/connect.php");
							$sql=mysql_query("SELECT * FROM Consultations, Patients WHERE Consultations.IdConsultation='".$_GET['id']."' 
								AND Consultations.Idauto_Patient=Patients.Idauto_Patient") or die(mysql_error());
								while($row=mysql_fetch_array($sql)){
								$med=mysql_query("SELECT * FROM Utilisateurs WHERE IdUtilisateur='".$row['IdUtilisateur']."'");
								$NomMed=mysql_fetch_array($med);
					?>
					
			
				<div class="panel panel-primary">
					<div class="panel-body">
							<center><h2>FICHE DE CONSULTATION</h2></center>
							<br/>
						<div class="col-lg-5">					
							<p><strong>CODE DU MALADE :</strong> <?php echo $row['CodePatient']; ?></p>
							<p><strong>NOMS DU MALADE :</strong> <?php echo $row['Noms']; ?></p>
							<p><strong>SEXE :</strong> <?php echo $row['Sexe']; ?></p>
							<p><strong>AGE :</strong> <?php echo $row['Age']; ?></p>
						</div>
                        <div class="col-lg-4">	
							<p><strong>NUM. CONSULTATION :</strong> <?php echo $row['IdConsultation']; ?></p>
							<p><strong>DATE DE CONSULTATION :</strong> <?php $DateConsultation= new DateTime($row['DateConsultation']); echo Date_Format($DateConsultation,'d-m-Y'); ?></p>
							<p><strong>MEDECIN CONSULTANT :</strong> <?php echo $NomMed['NomsUtil']; ?></p>
						</div>
                       
						<div class="col-lg-3">
							<p><strong>PHOTO DU MALADE</strong></p>
							<img src="Patients/<?php echo $row['Photo']; ?>" width="100px" height="100px">
							
                        </div>
						<br/>
						
						<div class="col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-body">
									<div class='table-responsive'>													
										<table class='table'>														
											<tbody>
													
												<tr><th style="color:blue">PLAINTE GENERALE DU PATIENT :</th><td><?php echo $row['PlainteMal'];?></td></tr>
												<tr><th style="color:blue">HISTORIQUE DU MALADIE </th><td><?php echo $row['HistoireMal'];?></td></tr>									
												
											</tbody>
										</table>						
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="panel panel-primary">
								<div class="panel-body">
									
									<h4 style="color:blue;">LES ANTECEDENTS PERSONNELS</h4>
									<div class='panel-body'>
										<div class='table-responsive'>													
											<table class='table'>														
												<tbody>
													
													<tr><th>TARE :</th><td><?php echo $row['Tare'];?></td></tr>
													<tr><th>ALERGIE</th><td><?php echo $row['Alergie'];?></td></tr>
													<tr><th>VACCINATION</th><td><?php echo $row['Vaccination'];?></td></tr>	
													<tr><th>HOSP. ANT.</th><td><?php echo $row['HospitAnterieure'];?></td></tr>
													<tr><th>CAUSE HOSP.</th><td><?php echo $row['CauseHospitAnt'];?></td></tr>																															
													
												</tbody>
											</table>						
										</div>				
									</div>				
								</div>				
							</div>				
						</div>	
						<div class="col-lg-6">
							<div class="panel panel-primary">
								<div class="panel-body">
									<h5 style="color:blue;">LES ANTECEDENTS HEREDITAIRE</h5>									
										<p><?php echo $row['Heredite'];?></p></tr>																																											
										<hr/>
												
									<h5 style="color:blue;">LES ANTECEDENTS FAMILIAUX</h5>
										<p><?php echo $row['AtcdFamille'];?></p></tr>																																											
										<hr/>
									<h5 style="color:blue;">LES ANTECEDENTS COLATERAUX</h5>
										<p><?php echo $row['AtcdColateraux'];?></p></tr>																																											
										<hr/>
									<h5 style="color:blue;">COMPLEMENT D'ANAMNESE</h5>
										<p><?php echo $row['CompAnamnese'];?></p></tr>																																											
										<hr/>
												
								</div>				
							</div>				
						</div>
						<div class="col-lg-6">
							<div class="panel panel-primary">
								<div class="panel-body">
									<h4 style="color:blue;">LES EXAMENS PHYSIQUES</h4>
									<div class='panel-body'>
										<div class='table-responsive'>													
											<table class='table'>														
												<tbody>
													<tr><th>ETAT GENERAL :</th><td><?php echo $row['EtatGen'];?></td></tr>
													<tr><th>TENSION ARTERIELLE :</th><td><?php echo $row['Ta'];?></td></tr>
													<tr><th>FREQUENCE RESPIRATOIRE :</th><td><?php echo $row['Fr'];?></td></tr>
													<tr><th>FREQUENCE CARDIAQUE :</th><td><?php echo $row['Fc'];?></td></tr>	
													<tr><th>POULS :</th><td><?php echo $row['Pls'];?></td></tr>
													<tr><th>POIDS :</th><td><?php echo $row['Poids'];?></td></tr>																															
													<tr><th>IMC :</th><td><?php echo $row['imc'];?></td></tr>																															
													<tr><th></th><td>&nbsp;</td></tr>
													
												</tbody>
											</table>						
										</div>				
									</div>				
								</div>				
							</div>				
						</div>
						<div class="col-lg-6">
							<div class="panel panel-primary">
								<div class="panel-body">
									<h5 style="color:blue;">EXAMENS DE TETE</h5>									
										<p><?php echo $row['ExamenTete'];?></p></tr>																																											
										<hr/>
												
									<h5 style="color:blue;">EXAMENS DE THORAX</h5>
										<p><?php echo $row['Thorax'];?></p></tr>																																											
										<hr/>
									<h5 style="color:blue;">EXAMENS D'ABDOMEN</h5>
										<p><?php echo $row['Abdomen'];?></p></tr>																																											
										<hr/>
									<h5 style="color:blue;">LES MEMBRES INFERIEURS</h5>
										<p><?php echo $row['MembreInf'];?></p></tr>																																											
										<hr/>
									<h5 style="color:blue;">LES MEMBRES SUPERIEURS</h5>
										<p><?php echo $row['MembreSup'];?></p></tr>																																											
										<hr/>
									<h5 style="color:blue;">EXAMEN GYNECO-OBSTETRICAL</h5>
										<p><?php echo $row['ExamenGyneco'];?></p></tr>																																											
										<hr/>
									<h5 style="color:blue;">LES HYPOTHESES DIAGNOSTIQUES</h5>
										<p><?php echo $row['Hypothese'];?></p></tr>																																											
										<hr/>
												
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
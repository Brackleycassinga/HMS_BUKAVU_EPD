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
                 Gestion des Malades en ligne <small>  : SUPPRESSION DES CONSULTATIONS </small> 
				  <img src="IMA/defPatient.jpg" width="120px" height="80px"/><img src="IMA/11.jpg" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-red">
                        <div class="panel-heading">
                           RECHERCHE ET MODIFICATION D'UNE CONSULTATION EFFECTUEE
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>Le Code ou Nom du Malade concerné par la consultation à modifier</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour rechercher" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-danger" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
								</div>
							 <div class="col-lg-6">
								<div class="panel panel-success">
									<div class="panel-body">
										<p> Un mot suffit pour votre recherche, vous pouvez saisir un code ou un 
											nom du malade concerné par la consulation à modifier.</p>
									</div>
										
								</div>
                             </div>
                            </div>
                        
							 <?php
								if(isset($_POST['Rechercher'])){
									$Mot=$_POST['Mot'];
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM Consultations, Patients WHERE Patients.Idauto_Patient=Consultations.Idauto_Patient AND (Patients.CodePatient LIKE '%$Mot%' OR Patients.Noms LIKE '%$Mot%')") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){
										
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) TROUVEES POUR [ \" $Mot \"]</font></center>
														<br/>
													<table class='table'>
														
														<thead>
															<tr>
																<th>DATE CONSULT.</th>
																<th>MEDECIN CONSULTANT</th>
																<th>CODE MALADE.</th>
																<th>PHOTO </th>
																<th>NOMS COMPLETS DU MALADE</th>
																<th>SEXE</th>																
																<th>ACTION ENVISAGEE</th>
																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php 
												$DateConsultation=new DateTime($row['DateConsultation']);
												echo date_format($DateConsultation,'d-m-Y');
												?>
											</td>
                                            <td><?php
												$sel=mysql_query("SELECT * FROM Utilisateurs WHERE IdUtilisateur='".$row['IdUtilisateur']."'");
												$li=mysql_fetch_array($sel);
												echo $li['NomsUtil'];
												?>
											</td>
                                            <td><?php echo $row['CodePatient'];?></td>
											<td><?php echo "<img  width=\"80\" height=\"80\" src=";
														echo '"Patients/';
														echo $row["Photo"];
														echo '"/>';?></td>
                                            <td><?php echo $row['Noms'];?></td>                                          
                                            <td><?php echo $row['Sexe'];?></td>                                                                                   
                                            <td><?php echo "<a href='SuppConsultations.php?id=".$row['IdConsultation']."' title='Afficher les resultats de la consultation'><span class='fa fa-list'></span> Afficher les détails</a>";?></td>                                           
                                        </tr>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune consultation trouvée pour le Malade [".$Mot."], vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>
						</div>
                    </div>
					<?php 
						if(isset($_GET['id'])){
						require_once("BDD/connect.php");
						$sql=mysql_query("SELECT * FROM Consultations, Patients, Utilisateurs WHERE Consultations.IdConsultation='".$_GET['id']."' and Consultations.Idauto_Patient=Patients.Idauto_Patient and Consultations.IdUtilisateur=Utilisateurs.IdUtilisateur");
						while($row=mysql_fetch_array($sql)){
					?>
					
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
				<div class="panel panel-red">
					<div class="panel-body">
						<div class="col-lg-4">					
							<label style="color:red;">Code et noms complets du Patient</label>
                            <div class="form-group input-group"> 
								<input type="hidden" name="IdConsultation" value="<?php echo $row['IdConsultation']; ?>"></tr>		
								<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>                                       
								<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly >
								<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" readonly >
                            </div>
							<label style="color:green;">Médecin ayant effectué la consultation</label>
                            <div class="form-group input-group"> 									
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                       
								<input type="text" class="form-control" name="NomsUtil" value="<?php echo $row['NomsUtil']; ?>" readonly >
                            </div>
							
							<label>LES ANTECEDENTS PERSONNELS</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon">Tare</span>                                        
								<input type="text" class="form-control" name="Tare" value="<?php echo $row['Tare']; ?>" placeholder="Maladies chroniques (Tare)" readonly >
							</div>
							<div class="form-group input-group"> 
								<span class="input-group-addon">Alergies</span>                                        
								<input type="text" class="form-control" name="Alergie" value="<?php echo $row['Alergie']; ?>" placeholder="Les Alergies" readonly >
							</div>
							<div class="form-group input-group"> 
								<span class="input-group-addon">Vaccin</span>                                        
								<input type="text" class="form-control" name="Vaccination" value="<?php echo $row['Vaccination']; ?>" placeholder="Vaccination reçu" readonly >
							</div>
							<div class="form-group input-group"> 
								<span class="input-group-addon">Hosp. ant.</span>                                        
								<input type="text" class="form-control" name="HospitAnt" value="<?php echo $row['HospitAnterieure']; ?>" placeholder="Hospitalisation antérieure" readonly>	
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon">Cause</span> 
								<textarea  name="CauseHospitAnt" placeholder="Cause de l'hospitalisation antérieure" style="width:320px" readonly><?php echo $row['CauseHospitAnt']; ?></textarea>
							</div>
							<label>LES ANTECEDENTS HEREDITAIRES</label>
							<div class="form-group input-group"> 
								<textarea  name="Heredite" placeholder="Les antécédents héréditaires" style="width:390px" readonly><?php echo $row['Heredite']; ?></textarea>
							</div>
							<label>LES ANTECEDENTS FAMILIAUX</label>
							<div class="form-group input-group"> 
								<textarea  name="AtcdFamille" placeholder="Les antécédents familiaux" style="width:390px" readonly><?php echo $row['AtcdFamille']; ?></textarea>
							</div>
														
                        </div>
						
						<div class="col-lg-4">
							<label>LES ANTECEDENTS COLATERAUX</label>
							<div class="form-group input-group"> 
								<textarea  name="AtcdColateraux" placeholder="Les antécédents Colatéraux (entre frères et soeurs)" style="width:390px" readonly><?php echo $row['AtcdColateraux']; ?></textarea>
							</div>
							
							<label>COMPLEMENT D'ANAMNESE</label>
							<div class="form-group input-group"> 
								<textarea  name="CompAnamnese" placeholder="Le Complément d'anamnèse" style="width:390px" readonly><?php echo $row['CompAnamnese']; ?></textarea>
							</div>
							
							<label>LES EXAMENS PHYSIQUES (Paramètres vitaux)</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon">TA</span>                                           
								<input type="text" class="form-control" value="<?php echo $row['Ta']; ?>" name="ta" placeholder="La tension artérielle" readonly>
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon">FR</span>                                        
								<input type="text" class="form-control" value="<?php echo $row['Fr']; ?>" name="fr" placeholder="La Fréquence Respiratoire" readonly>
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon">FC</span>                                           
								<input type="text" class="form-control" value="<?php echo $row['Fc']; ?>" name="fc" placeholder="La Fréquence C" readonly>
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon">PLS</span>                                           
								<input type="text" class="form-control" value="<?php echo $row['Pls']; ?>" name="Pls" placeholder="Pouls (PLS)" readonly>
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon">Poids</span>                                           
								<input type="text" class="form-control" value="<?php echo $row['Poids']; ?>" name="Poids" placeholder="Le Poids (en Kgs)" readonly>
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon">IMC</span>                                           
								<input type="text" class="form-control" value="<?php echo $row['imc']; ?>" name="imc" placeholder="L'indice de masse corporel (IMC)" readonly>
                            </div>
							<label>EXAMEN DE TETE</label>
							<div class="form-group input-group"> 
								<textarea  name="ExamenTete" placeholder="Examen de la tête" style="width:390px" readonly><?php echo $row['ExamenTete']; ?></textarea>
							</div>
                        </div>
						<div class="col-lg-4">
							
							<label>EXAMEN DE THORAX</label>
							<div class="form-group input-group"> 
								<textarea  name="Thorax" placeholder="Examen de la Thorax" style="width:390px" readonly><?php echo $row['Thorax']; ?></textarea>
							</div>
							<label>EXAMEN DE L'ABDOMEN</label>
							<div class="form-group input-group"> 
								<textarea  name="Abdomen" placeholder="Examen de l'Abdomen" style="width:390px" readonly><?php echo $row['Abdomen']; ?></textarea>
							</div>
							<label>LES MEMBRES INFERIEURS</label>
							<div class="form-group input-group"> 
								<textarea  name="MembreInf" placeholder="Les Membres inférieurs" style="width:390px" readonly><?php echo $row['MembreInf']; ?></textarea>
							</div>
							<label>LES MEMBRES SUPERIEURS</label>
							<div class="form-group input-group"> 
								<textarea  name="MembreSup" placeholder="Les membres supérieurs" style="width:390px" readonly><?php echo $row['MembreSup']; ?></textarea>
							</div>
							<label> EXAMEN GYNECO-OBSTETRICAL</label>
							<div class="form-group input-group"> 
								<textarea  name="Gyneco" placeholder="Les examens gynéco-obstrétricaux" style="width:390px" readonly><?php echo $row['ExamenGyneco']; ?></textarea>
							</div>
							<label> LES HYPOTHESES DU DIAGNOSTIC</label>
							<div class="form-group input-group"> 
								<textarea  name="Hypothese" placeholder="Les hupothèses du diagnostic effectué" style="width:390px" readonly><?php echo $row['Hypothese']; ?></textarea>
							</div>
							<label style="color:red;">Mot de passe d'autorisation (Pour AG ou MD)</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><span class="fa fa-lock">*</span></span>
                                <input type="password" class="form-control" name="MotPasse" placeholder="Mot de passe pour l'autorisation" required >
                            </div>
                        </div>
                       						
                        <div class="col-lg-12">						
							<center><button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer définitivement cette consultation ?');" class="btn btn-danger" name="Supprimer"><span class="glyphicon glyphicon-edit"></span> Supprimer la consultation</button></center>
						</div>					
					</div>					
				</div>										
			</form>
				
					<?php } }?>

							
<?php
		if(isset($_POST['Supprimer'])){

			$IdConsultation=$_POST['IdConsultation'];
			$MotPasse=$_POST['MotPasse'];
			
			require_once("BDD/connect.php");
				$rqt=mysql_query("SELECT * FROM Utilisateurs WHERE MotPasse LIKE BINARY '".$MotPasse."' AND (Fonction='MD' OR Fonction='AG')");
				if(mysql_num_rows($rqt)>0){
						$req="DELETE FROM Consultations WHERE IdConsultation='".$IdConsultation."'";
						$result=mysql_query($req);
							if (!$result){
								echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										<span class='glyphicon glyphicon-remove'></span>Echec de suppression! Veuillez réessayer!<br>".mysql_error()."</div></div>";
							}
							else{ 
								echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										<span class='glyphicon glyphicon-ok'></span>Suppression de la consultation effectué avec succès!</div></div>";
							}
				}
				else{
					echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-remove'></span>Impossible de supprimer, car le mot de passe pour l'autorisation est incorrect!!!</div></div>";
				}
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
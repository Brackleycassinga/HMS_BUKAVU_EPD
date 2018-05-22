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
                 Gestion des Malades en ligne <small>  : AJOUT DES CONSULTATIONS </small> 
				  <img src="IMA/defPatient.jpg" width="120px" height="80px"/><img src="IMA/16.jpg" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           AJOUT D'UNE NOUVELLE CONSULTATION EFFECTUEE
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>Le Code ou Nom du Malade à consulter</label>
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
									
									$sqlSearch=mysql_query("SELECT * FROM Patients WHERE Patients.CodePatient LIKE '%$Mot%' OR Patients.Noms LIKE '%$Mot%'") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){
										
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) TROUVEES POUR [ \" $Mot \"]</font></center>
														<br/>
													<table class='table'>
														
														<thead>
															<tr>
																<th>CODE</th>
																<th>DATE D'ARRIVEE</th>
																<th>PHOTO DU MALADE</th>
																<th>NOMS COMPLETS DU MALADE</th>
																<th>SEXE</th>
																<th>AGE</th>
																<th>PROFESSION</th>
																<th>ACTION ENVISAGEE</th>
																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											$DateArrive = new DateTime($row['DateArrive']);
											$DateArrive = Date_Format($DateArrive,'d-m-Y');
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['CodePatient'];?></td>
											<td><?php echo $DateArrive ;?></td> 
											<td><?php echo "<img  width=\"80\" height=\"80\" src=";
														echo '"Patients/';
														echo $row["Photo"];
														echo '"/>';?></td>                                                                                     
                                            <td><?php echo $row['Noms'];?></td>                                          
                                            <td><?php echo $row['Sexe'];?></td>                                          
                                            <td><?php echo $row['Age'];?></td>                                          
                                            <td><?php echo $row['Profession'];?></td>                                          
                                            <td><?php echo "<a href='AjoutConsultations.php?id=".$row['Idauto_Patient']."' title='Effectuer la consultation'><span class='fa fa-eye'></span> Consulter</a>";?></td>                                           
                                        </tr>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune suggestion trouvée pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>
						</div>
                    </div>
					<?php 
						if(isset($_GET['id'])){
						require_once("BDD/connect.php");
						$sql=mysql_query("SELECT * FROM Patients WHERE Idauto_Patient='".$_GET['id']."'");
						while($row=mysql_fetch_array($sql)){
					?>
					
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
				<div class="panel panel-primary">
					<div class="panel-body">
						<div class="col-lg-4">					
							<label style="color:red;">Code et noms complets du Patient</label>
                            <div class="form-group input-group"> 
								<input type="hidden" name="Idauto_Patient" value="<?php echo $row['Idauto_Patient']; ?>"></tr>		
								<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>                                       
								<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly >
								<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" readonly >
                            </div>
							<label>Date de la consultation </label>
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
							<label>PLAINTE PRINCIPALE</label>
							<div class="form-group input-group"> 
								<textarea  name="Plainte" placeholder="Plainte principale donnée par le patient" style="width:390px"></textarea>
							</div>
							<label>HISTOIRE DE LA MALADIE</label>
							<div class="form-group input-group"> 
								<textarea  name="HistMal" placeholder="Historique du maladie du patient" style="width:390px"></textarea>
							</div>
							
							<label>LES ANTECEDENTS PERSONNELS</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                        
								<input type="text" class="form-control" name="Tare" placeholder="Maladies chroniques (Tare)" required >
							</div>
							<div class="form-group input-group"> 
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                        
								<input type="text" class="form-control" name="Alergie" placeholder="Les Alergies" required >
							</div>
							<div class="form-group input-group"> 
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                        
								<input type="text" class="form-control" name="Vaccination" placeholder="Vaccination reçu" required >
							</div>
							<div class="form-group input-group"> 
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                        
								<input type="text" class="form-control" name="HospitAnt" placeholder="Hospitalisation antérieure" required >	
							</div>
							<div class="form-group input-group"> 
								<textarea  name="CauseHospitAnt" placeholder="Cause de l'hospitalisation antérieure" style="width:390px"></textarea>
							</div>
							<label>LES ANTECEDENTS HEREDITAIRES</label>
							<div class="form-group input-group"> 
								<textarea  name="Heredite" placeholder="Les antécédents héréditaires" style="width:390px"></textarea>
							</div>			
                        </div>
						
						<div class="col-lg-4">
							<label>LES ANTECEDENTS FAMILIAUX</label>
							<div class="form-group input-group"> 
								<textarea  name="AtcdFamille" placeholder="Les antécédents familiaux" style="width:390px"></textarea>
							</div>
									
							<label>LES ANTECEDENTS COLATERAUX</label>
							<div class="form-group input-group"> 
								<textarea  name="AtcdColateraux" placeholder="Les antécédents Colatéraux (entre frères et soeurs)" style="width:390px"></textarea>
							</div>
							
							<label>COMPLEMENT D'ANAMNESE</label>
							<div class="form-group input-group"> 
								<textarea  name="CompAnamnese" placeholder="Le Complément d'anamnèse" style="width:390px"></textarea>
							</div>
							
							<label>LES EXAMENS PHYSIQUES (Paramètres vitaux)</label>
							<div class="form-group input-group"> 
								<textarea  name="EtatGen" placeholder="Etat général" style="width:390px"></textarea>
							</div>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span> </span>                                           
								<input type="text" class="form-control" name="ta" placeholder="La tension artérielle" >
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span> </span>                                           
								<input type="text" class="form-control" name="fr" placeholder="La Fréquence Respiratoire" >
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span> </span>                                           
								<input type="text" class="form-control" name="fc" placeholder="La Fréquence C" >
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span> </span>                                           
								<input type="text" class="form-control" name="Pls" placeholder="Pouls (PLS)" >
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span> </span>                                           
								<input type="text" class="form-control" name="Poids" placeholder="Le Poids (en Kgs)" >
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span> </span>                                           
								<input type="text" class="form-control" name="imc" placeholder="L'indice de masse corporel (IMC)" >
                            </div>
							
                        </div>
						<div class="col-lg-4">
							<label>EXAMEN DE TETE</label>
							<div class="form-group input-group"> 
								<textarea  name="ExamenTete" placeholder="Examen de la tête" style="width:390px"></textarea>
							</div>
							<label>EXAMEN DE THORAX</label>
							<div class="form-group input-group"> 
								<textarea  name="Thorax" placeholder="Examen de la Thorax" style="width:390px"></textarea>
							</div>
							<label>EXAMEN DE L'ABDOMEN</label>
							<div class="form-group input-group"> 
								<textarea  name="Abdomen" placeholder="Examen de l'Abdomen" style="width:390px"></textarea>
							</div>
							<label>LES MEMBRES INFERIEURS</label>
							<div class="form-group input-group"> 
								<textarea  name="MembreInf" placeholder="Les Membres inférieurs" style="width:390px"></textarea>
							</div>
							<label>LES MEMBRES SUPERIEURS</label>
							<div class="form-group input-group"> 
								<textarea  name="MembreSup" placeholder="Les membres supérieurs" style="width:390px"></textarea>
							</div>
							<label> EXAMEN GYNECO-OBSTETRICAL</label>
							<div class="form-group input-group"> 
								<textarea  name="Gyneco" placeholder="Les examens gynéco-obstrétricaux" style="width:390px"></textarea>
							</div>
							<label> LES HYPOTHESES DU DIAGNOSTIC</label>
							<div class="form-group input-group"> 
								<textarea  name="Hypothese" placeholder="Les hupothèses du diagnostic effectué" style="width:390px"></textarea>
							</div>
							
                        </div>
                       						
                        <div class="col-lg-12">						
							<center><button type="submit" class="btn btn-primary" name="Enregistrer"><span class="glyphicon glyphicon-save"></span> Enregistrer la consultation effectuée</button></center>
						</div>					
					</div>					
				</div>										
			</form>
				
					<?php } }?>

							
<?php
		if(isset($_POST['Enregistrer'])){
		
			$Idauto_Patient=$_POST['Idauto_Patient'];
			$Jour=$_POST['Jour'];
			$Mois=$_POST['Mois'];
			$Annee=$_POST['Annee'];
			$DateConsultation = $Annee."-".$Mois."-".$Jour;
			$Plainte=$_POST['Plainte'];
			$HistMal=$_POST['HistMal'];
			$Tare=$_POST['Tare'];
			$Alergie=$_POST['Alergie'];
			$Vaccination=$_POST['Vaccination'];
			$HospitAnt=$_POST['HospitAnt'];
			$CauseHospitAnt=$_POST['CauseHospitAnt'];
			$Heredite=$_POST['Heredite'];
			$AtcdFamille=$_POST['AtcdFamille'];
			$AtcdColateraux=$_POST['AtcdColateraux'];
			$CompAnamnese=$_POST["CompAnamnese"];
			$EtatGen=$_POST["EtatGen"];
			$ta=$_POST["ta"];
			$fr=$_POST["fr"];
			$fc=$_POST["fc"];
			$Pls=$_POST["Pls"];
			$Poids=$_POST["Poids"];
			$imc=$_POST["imc"];
			$ExamenTete=$_POST["ExamenTete"];
			$Thorax=$_POST["Thorax"];
			$Abdomen=$_POST["Abdomen"];
			$MembreInf=$_POST["MembreInf"];
			$MembreSup=$_POST["MembreSup"];
			$Gyneco=$_POST["Gyneco"];
			$Hypothese=$_POST["Hypothese"];
			$IdUtilisateur=$_SESSION['IdUtilisateur'];
			
			require_once("BDD/connect.php");
			
						$req="INSERT INTO Consultations VALUES('','".$DateConsultation."','".$Plainte."','".$HistMal."','".$Tare."','".$Alergie."',
															   '".$Vaccination."','".$HospitAnt."','".$CauseHospitAnt."',
															   '".$Heredite."','".$AtcdFamille."','".$AtcdColateraux."',
															   '".$CompAnamnese."','".$EtatGen."','".$ta."','".$fr."','".$fc."','".$Pls."',
															   '".$Poids."','".$imc."','".$ExamenTete."','".$Thorax."','".$Abdomen."',
															   '".$MembreInf."','".$MembreSup."','".$Gyneco."','".$Hypothese."',
															   '".$Idauto_Patient."','".$IdUtilisateur."')";
						$result=mysql_query($req);
							if (!$result){
								echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										<span class='glyphicon glyphicon-remove'></span>Echec d'enregistrement! Veuillez réessayer!</div></div>";
							}
							else{
								mysql_query("UPDATE Patients SET Etat='CONSULTE' WHERE Idauto_Patient='".$Idauto_Patient."'") or die(mysql_error());
								echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										<span class='glyphicon glyphicon-ok'></span>Enregistrement de la consultation effectué avec succès!</div></div>";
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
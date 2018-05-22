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
                 Gestion des Malades en ligne <small>  : SUIVI DES MALADES (TOUR DES SALLES)</small> 
				  <img src="IMA/lit.png" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           RECHERCHE DU MALADE CONCERNE PAR LE SUIVI
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>Le Code ou Nom du Malade concerné par le suivi</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour rechercher" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-primary" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
								</div>
							
                            </div>
                        
							 <?php
								if(isset($_POST['Rechercher'])){
									$Mot=$_POST['Mot'];
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM Hospitalisations, Patients, Services WHERE (Patients.CodePatient LIKE '%$Mot%' OR Patients.Noms LIKE '%$Mot%') 
										AND Hospitalisations.Idauto_Patient=Patients.Idauto_Patient AND Hospitalisations.CodeService=Services.CodeService
										AND Patients.Etat='HOSPITALISE'") or die(mysql_error());
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
																<th>NOMS DU MALADE</th>
																<th>SEXE</th>
																<th>SALLE</th>
																<th>LIT</th>
																<th>SERVICES</th>
																<th>ACTION ENVISAGEE</th>																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['CodeHosp'];?></td>
                                            <td><?php $DateHosp = new DateTime($row['DateHosp']);
													echo Date_Format($DateHosp,'d-m-Y');
												?>
											</td>
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
                                            <td><?php
													echo "<a href='AjoutTourSalles.php?id=".$row['Idauto_Hosp']."' title='Cliquez ici pour effectuer le suivi'><span class='fa fa-list'></span> Effectuer le suivi</a>";	
												?>
											</td>                                           
                                        </tr>                                      
                                    </tbody>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune hospitalisation trouvée dans la liste pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>
						</div>
                    </div>
					<?php 
						if(isset($_GET['id'])){
							require_once("BDD/connect.php");
							$sql=mysql_query("SELECT * FROM Hospitalisations, Patients, Services WHERE Idauto_Hosp='".$_GET['id']."' AND Hospitalisations.Idauto_Patient=Patients.Idauto_Patient AND Hospitalisations.CodeService=Services.CodeService") or die(mysql_error());
								while($row=mysql_fetch_array($sql)){
					?>
					
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
				<div class="panel panel-primary">
					<div class="panel-body">
										
						<div class="col-lg-12">
							<center><h3> INFORMATIONS SUR L'HOSPITALISATION </h3></center>
							<br/>
						</div>					
						<div class="col-lg-4">					
							<label style="color:red;">Code et noms complets du Patient hospitalisé</label>
                            <div class="form-group input-group"> 
								<input type="hidden" name="Idauto_Patient" value="<?php echo $row['Idauto_Patient']; ?>"></tr>		
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                       
								<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly >
								<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" readonly >
                            </div>
							<label style="color:red;">Code de l'Hospitalisation</label>							
                            <div class="form-group input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span>
                                <input type="hidden" class="form-control" name="Idauto_Hosp" value="<?php echo $row['Idauto_Hosp']; ?>">
                                <input type="text" class="form-control" name="CodeHosp" value="<?php echo $row['CodeHosp']; ?>" readonly >
                            </div>
                            
                        </div>
						<div class="col-lg-4">
							<label style="color:red;">Salle et Num du lit de l'hospitalisation</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span> </span>                                           
								<input type="text" class="form-control" name="Salle" value="<?php echo $row['SalleHosp']; ?>" placeholder="Veuillez préciser la salle de l'hospitalisation" readonly >
								<input type="text" class="form-control" name="NumLit" value="<?php echo $row['NumLit']; ?>" placeholder="Veuillez préciser le numéro du lit" readonly>
                            </div>
							<label style="color:red;">Date de l'hospitalisation</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span> </span>
									<?php $DateHosp = new DateTime($row['DateHosp']); $DateHosp = Date_Format($DateHosp,'d-m-Y');?>
								<input type="text" class="form-control" name="DateHosp" value="<?php echo $DateHosp; ?>" readonly>
                            </div>
                        </div>
						<div class="col-lg-4">							
							<label style="color:red;">Service de l'hospitalisation</label>
                           <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span> </span>                                           
								<input type="text" class="form-control" name="NumLit" value="<?php echo $row['DesignService']; ?>" placeholder="Veuillez préciser le numéro du lit" readonly>
                            </div>
							<label style="color:red;">Photo du Malade</label></br>
							<span><?php 	echo "<img  width=\"80\" height=\"80\" src=";
										echo '"Patients/';
										echo $row["Photo"];
											echo '"/>';
								?>
							</span>	
                        </div>
						<div class="col-lg-12">
							<hr style="border: solid 1px blue;">
							<center><h3> DONNEES DU SUIVI (TOUR DE SALLE) EFFECTUE</h3></center>
								<br/>
						</div>
						<div class="col-lg-4">
							<div class="form-group"> 								
								<label>Date de suivi </label>	
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
							<div class="form-group"> 								
								<label>Heure de suivi </label>	
								<table>                                          
                                    <tr><td><select class="form-control" name="Heure" required >
										<option value="">Heure</option>												
											<?php 
												for($i=0; $i<=23; $i++){
													echo "<option value=".$i.">".$i."</option>";
												}
											?>
									</select></td><td>
									
									<select class="form-control" name="Minute" required >
										<option value="">Minute</option>												
										<?php 
											for($i=1; $i<=60; $i++){
												echo "<option value=".$i.">".$i."</option>";
											}
										?>
									</select></td></tr>
								</table> 	
                            </div>
							
							<label>Plainte du Malade</label>
                            <div class="form-group input-group"> 								                  
								<textarea class="form-control" name="Plainte"  placeholder="La plainte donnée par le malade" style="width:380px"  ></textarea>
                            </div>
							<label>Prescription faite de Médicaments</label>
                            <div class="form-group input-group"> 								                  
								<textarea class="form-control" name="Prescription"  placeholder="Précisez les médicaments prescrits et le dosage" style="width:380px"  ></textarea>
                            </div>							
                        </div>
						
						<div class="col-lg-4">						
						<label>Les signes vitaux</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span> </span>                                           
								<input type="text" class="form-control" name="Ta"  placeholder="Tension artérière" required >
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span> </span>                                           
								<input type="text" class="form-control" name="Pouls"  placeholder="Pouls" required >
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span> </span>                                           
								<input type="text" class="form-control" name="Poids"  placeholder="Poids en Kilogramme" required >
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span> </span>                                           
								<input type="text" class="form-control" name="FR"  placeholder="Fréquence Respiratoire" required >
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span> </span>                                           
								<input type="text" class="form-control" name="FC"  placeholder="Fréquence Cardiaque" required >
                            </div>
							
						</div>
						<div class="col-lg-4">
							<label>Evolution de la santé</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span> </span>                                           
								<input type="text" class="form-control" name="Evolution"  placeholder="Exemple: BIEN, ASSEZ BIEN, MAUVAIS, ..." required >
                            </div>
							<label>Observation faite</label>
                            <div class="form-group input-group"> 								                  
								<textarea class="form-control" name="Observation"  placeholder="Parlez en bref de l'observation constatée" style="width:380px" required ></textarea>
                            </div>
							
							<label>Médecin accompagnant</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span> </span>                                           
								<input type="text" class="form-control" name="Accompagnant"  placeholder="Nom du Médecin accompagnant" required >
                            </div>
						</div>
						<div class="col-lg-12">
								<center><button type="submit" class="btn btn-primary" name="EnregHosp"><span class="glyphicon glyphicon-floppy-disk"></span> Enregistrer les informations </button></center>
                        </div>										
					</div>					
				</div>										
			</form>
				
					<?php 
						} 
					}
					?>
			 
					</div>                           
                </div>
<?php
	if(isset($_POST['EnregHosp'])){
		
		$Idauto_Patient=$_POST['Idauto_Patient'];
		$Jour=$_POST['Jour'];
		$Mois=$_POST['Mois'];
		$Annee=$_POST['Annee'];
		$DateTour=$Annee."-".$Mois."-".$Jour;
		$Heure=$_POST['Heure'];
		$Minute=$_POST['Minute'];
		$HeureTour=$Heure.":".$Minute;
		
		$Plainte=$_POST['Plainte'];
		$Prescription=$_POST['Prescription'];
		$Ta=$_POST['Ta'];
		$Pouls=$_POST['Pouls'];
		$FR=$_POST['FR'];
		$FC=$_POST['FC'];
		$Poids=$_POST['Poids'];
		$Evolution=$_POST['Evolution'];
		$Observation=$_POST['Observation'];
		$Accompagnant=$_POST['Accompagnant'];
		$IdUtilisateur=$_SESSION['IdUtilisateur'];
		
			require_once("BDD/connect.php");
			
			$req="INSERT INTO TourSalles VALUES('','".$DateTour."','".$HeureTour."','".$Plainte."','".$Prescription."','".$Evolution."','".$Observation."', '".$Ta."', '".$Pouls."', '".$Poids."', '".$FR."', '".$FC."', '".$Idauto_Patient."', '".$IdUtilisateur."', '".$Accompagnant."')";
			$result=mysql_query($req) or die(mysql_error());
				if (!$result){
					echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-remove'></span>Echec d'enregistrement, <br/>".mysql_error()."</div></div>";
				}
				else{ 					
					echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-ok'></span> Le suivi du malade ".$_POST['Noms']." a été effectuée avec succès </div></div>";
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
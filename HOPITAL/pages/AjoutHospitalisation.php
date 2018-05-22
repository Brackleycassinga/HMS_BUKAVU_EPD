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
                 Gestion des Malades en ligne <small>  : HOSPITALISATION DES MALADES</small> 
				  <img src="IMA/lit.png" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           RECHERCHE DU MALADE A HOSPITALISER
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>Le Code ou Nom du Malade à Hospitaliser</label>
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
																<th>PHOTO DU MALADE</th>
																<th>NOMS COMPLETS DU MALADE</th>
																<th>SEXE</th>
																<th>AGE</th>
																<th>PROFESSION</th>
																<th>ACTION ENVISAGEE</th>																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['CodePatient'];?></td>
											<td><?php echo "<img  width=\"80\" height=\"80\" src=";
														echo '"Patients/';
														echo $row["Photo"];
														echo '"/>';?></td>
                                            <td><?php echo $row['Noms'];?></td>                                          
                                            <td><?php echo $row['Sexe'];?></td>                                          
                                            <td><?php echo $row['Age'];?></td>                                          
                                            <td><?php echo $row['Profession'];?></td>                                          
                                            <td><?php 
												if($row['Etat']=='HOSPITALISE'){
													echo "<span class='glyphicon glyphicon-ok'></span> DEJA HOSPITALISE";
												}
												elseif($row['Etat']=='SORTIE'){
													echo "<span class='glyphicon glyphicon-warning'></span> DEJA SORTIE";
												}
												else{
													echo "<a href='AjoutHospitalisation.php?id=".$row['Idauto_Patient']."' title='Confirmer le malade à hospitaliser'><span class='fa fa-plus'></span> Hospitaliser</a>";
												}
												?>
											</td>                                           
                                        </tr>                                      
                                    </tbody>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune suggestion trouvée dans la liste des malades pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
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
					
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
				<div class="panel panel-primary">
					<div class="panel-body">
										
						<div class="col-lg-6">					
							<label style="color:red;">Code et noms complets du Patient à hospitaliser</label>
                            <div class="form-group input-group"> 
								<input type="hidden" name="Idauto_Patient" value="<?php echo $row['Idauto_Patient']; ?>"></tr>		
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                       
								<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly >
								<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" readonly >
                            </div>
												
							<label>Code de l'Hospitalisation</label>
							<?php
								require_once("BDD/Connect.php");
								$select = mysql_query("SELECT max(Idauto_Hosp) FROM Hospitalisations") or die(mysql_error());
								$res=mysql_fetch_array($select);
								$max=$res[0]+1;
							?>
                            <div class="form-group input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span>
                                <input type="text" class="form-control" name="CodeHosp" value="<?php echo "00".$max."/".date("Y")."/HOSP/CHAHI"; ?>" readonly >
                            </div>
							<label>Date de l'hospitalisation</label>
                          
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
                        </div>
						<div class="col-lg-6">
							<label>Salle de l'hospitalisation</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span> </span>                                           
								<input type="text" class="form-control" name="Salle" placeholder="Veuillez préciser la salle de l'hospitalisation" required >
                            </div>
							<label>Numéro du lit</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span> </span>                                           
								<input type="text" class="form-control" name="NumLit" placeholder="Veuillez préciser le numéro du lit" required>
                            </div>
							<label>Service de l'hospitalisation</label>
								<div class="form-group input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
                                        <select class="form-control" name="CodeService" style="width:550px;" required >
											<option value="">----Veuillez s&eacute;lectionner ici----</option>
											<?php
												require_once("BDD/Connect.php");
												$sel=mysql_query("SELECT * FROM Services");
												if(mysql_num_rows($sel)>0){
													while($row=mysql_fetch_array($sel)){
														echo "<option value='".$row['CodeService']."'>".$row['DesignService']."</option>";
													}
												}
											?>											
										</select>
                                </div>
                        </div>
						<div class="col-lg-12">
								<center><button type="submit" class="btn btn-primary" name="EnregHosp"><span class="glyphicon glyphicon-ok"></span> Confirmer l'hospitalisation</button></center>
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
		$CodeHosp=$_POST['CodeHosp'];
		$Jour=$_POST['Jour'];
		$Mois=$_POST['Mois'];
		$Annee=$_POST['Annee'];
		$DateHosp = $Annee."-".$Mois."-".$Jour;
		$NumLit=$_POST['NumLit'];
		$Salle=$_POST['Salle'];
		$CodeService=$_POST['CodeService'];
		$IdUtilisateur=$_SESSION['IdUtilisateur'];
		
			require_once("BDD/connect.php");
			
			$req="INSERT INTO Hospitalisations VALUES('','".$CodeHosp."','".$DateHosp."','".$Salle."','".$NumLit."','".$CodeService."', '".$Idauto_Patient."', '".$IdUtilisateur."')";
			$result=mysql_query($req) or die(mysql_error());
				if (!$result){
					echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-remove'></span>Impossible d'enregistrement cette hospitalisation, verifiez vos données</div></div>";
				}
				else{ 
					mysql_query("UPDATE Patients SET Etat='HOSPITALISE' WHERE Idauto_Patient='".$Idauto_Patient."'");
					echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-ok'></span> L'hospitalisation du malade ".$_POST['Noms']." a été effectuée avec succès </div></div>";
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
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
                 Gestion des Malades en ligne <small>  : MODIFICATION D'HOSPITALISATION </small> 
				  <img src="IMA/lit.png" width="120px" height="80px"/><img src="IMA/ref.png" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                           RECHERCHE DE L'HOSPITALISATION A MODIFIER
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
																<th>NOMS COMPLETS DU MALADE</th>
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
                                            <td><?php
													echo "<a href='ModifHospitalisation.php?id=".$row['Idauto_Hosp']."' title='Modifier les données'><span class='fa fa-edit'></span> Modifier</a>";	
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
										
						<div class="col-lg-6">					
							<label style="color:red;">Code et noms complets du Patient hospitalisé</label>
                            <div class="form-group input-group"> 
								<input type="hidden" name="Idauto_Patient" value="<?php echo $row['Idauto_Patient']; ?>"></tr>		
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                       
								<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly >
								<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" readonly >
                            </div>
												
							<label>Code de l'Hospitalisation</label>
							
                            <div class="form-group input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span>
                                <input type="hidden" class="form-control" name="Idauto_Hosp" value="<?php echo $row['Idauto_Hosp']; ?>">
                                <input type="text" class="form-control" name="CodeHosp" value="<?php echo $row['CodeHosp']; ?>" readonly >
                            </div>
							<label>Date de l'hospitalisation</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span> </span>                                           
								<input type="text" class="form-control" name="DateHosp" value="<?php echo $row['DateHosp']; ?>" readonly>
                            </div>
                        </div>
						<div class="col-lg-6">
							<label>Salle de l'hospitalisation</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span> </span>                                           
								<input type="text" class="form-control" name="Salle" value="<?php echo $row['SalleHosp']; ?>" placeholder="Veuillez préciser la salle de l'hospitalisation" required >
                            </div>
							<label>Numéro du lit</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span> </span>                                           
								<input type="text" class="form-control" name="NumLit" value="<?php echo $row['NumLit']; ?>" placeholder="Veuillez préciser le numéro du lit" required>
                            </div>
							<label>Service de l'hospitalisation</label>
								<div class="form-group input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
                                        <select class="form-control" name="CodeService" style="width:550px;" required >
											<option value="<?php echo $row['CodeService']; ?>"><?php echo $row['DesignService']; ?></option>
											<?php
												require_once("BDD/Connect.php");
												$sel=mysql_query("SELECT * FROM Services WHERE CodeService !='".$row['CodeService']."'");
												if(mysql_num_rows($sel)>0){
													while($row=mysql_fetch_array($sel)){
														echo "<option value='".$row['CodeService']."'>".$row['DesignService']."</option>";
													}
												}
											?>											
										</select>
                                </div>
							<label style="color:red;">Mot de passe d'autorisation (Pour AG ou MD)</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><span class="fa fa-lock">*</span></span>
                                <input type="password" class="form-control" name="MotPasse" placeholder="Mot de passe pour l'autorisation" required >
                            </div>
                        </div>
						<div class="col-lg-12">
								<center><button type="submit" class="btn btn-success" name="ModifHosp"><span class="glyphicon glyphicon-edit"></span> Enregistrer les modifications</button></center>
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
	if(isset($_POST['ModifHosp'])){
		
		$Idauto_Hosp=$_POST['Idauto_Hosp'];
		$CodeHosp=$_POST['CodeHosp'];
		$NumLit=$_POST['NumLit'];
		$Salle=$_POST['Salle'];
		$CodeService=$_POST['CodeService'];
		$MotPasse=$_POST['MotPasse'];
		$IdUtilisateur=$_SESSION['IdUtilisateur'];
		
			require_once("BDD/connect.php");
			$rqt=mysql_query("SELECT * FROM Utilisateurs WHERE MotPasse LIKE BINARY '".$MotPasse."' AND (Fonction='MD' OR Fonction='AG')");
			if(mysql_num_rows($rqt)>0){
				$req="UPDATE Hospitalisations SET SalleHosp='".$Salle."', NumLit='".$NumLit."', CodeService='".$CodeService."' WHERE Idauto_Hosp='".$Idauto_Hosp."'";
				$result=mysql_query($req) or die(mysql_error());
					if (!$result){
						echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-remove'></span>Impossible d'enregistrement les modifications.<br/>".mysql_error()."</div></div>";
					}
					else{ 
						echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-ok'></span> La modification de l'hospitalisation du malade ".$_POST['Noms']." a été effectuée avec succès </div></div>";
					}
			}
			else{
				echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<span class='glyphicon glyphicon-remove'></span>Impossible de modifier, car le mot de passe pour l'autorisation est incorrect!!!</div></div>";
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
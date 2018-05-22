<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']=='COMPTABLE'){
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
				
				<?php require_once ("Ajout/menuCompt.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : FACTURATION DES MALADES </small> 
				  <img src="Image/im38.jpg" width="180px" height="80px"/><img src="IMA/ok.png" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           FACTURATION EFFECTIVE DES MALADES
                        </div>
                        <div class="panel-body">
                            <div class="row">
                         
					<?php 
						if(isset($_GET['EnregFacturation'])){
							$Idauto_Patient = $_GET['Idauto_Patient'];
							require_once("BDD/connect.php");
							$sql=mysql_query("SELECT * FROM Hospitalisations, Patients, Services WHERE Patients.Idauto_Patient='".$_GET['Idauto_Patient']."'
									 AND Hospitalisations.Idauto_Patient=Patients.Idauto_Patient AND Hospitalisations.CodeService=Services.CodeService");
								while($row=mysql_fetch_array($sql)){
					?>
					
					<form action="save_facturation.php" method="GET" >							
						<div class="col-lg-4">					
							<label style="color:red;">Code du Patient </label>
                            <div class="form-group input-group"> 
								<input type="hidden" name="Idauto_Patient" value="<?php echo $row['Idauto_Patient']; ?>"></tr>		
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                       
								<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly >
                            </div>
							<label style="color:red;">Noms complets du Patient </label>
                            <div class="form-group input-group">								
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" readonly >
                            </div>
													
                        </div>
						
						<div class="col-lg-4">					
							<label>Code de l'Hospitalisation</label>							
                            <div class="form-group input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span>
                                <input type="hidden" class="form-control" name="Idauto_Hosp" value="<?php echo $row['Idauto_Hosp'];?>" readonly >
                                <input type="text" class="form-control" name="CodeHosp" value="<?php echo $row['CodeHosp'];?>" readonly >
                            </div>	
							<label>Date de l'hospitalisation</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span> </span>
									<?php $DateHosp=new DateTime($row['DateHosp']); $DateHosp=Date_Format($DateHosp,'d-m-Y') ;?>
								<input type="text" class="form-control" name="DateHosp" value="<?php echo $DateHosp; ?>" readonly>
                            </div>
							
                        </div>
						<div class="col-lg-4">
							<label>Salle de l'hospitalisation</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span> </span>                                           
								<input type="text" class="form-control" name="Salle" value="<?php echo $row['SalleHosp'];?>" readonly >
                            </div>
							<label>Numéro du lit</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span> </span>                                           
								<input type="text" class="form-control" name="NumLit" value="<?php echo $row['NumLit'];?>" readonly>
                            </div>							
                        </div>
						<div class="col-lg-12">
							<hr style="border:solid 1px blue;">
						</div>
						<div class="col-lg-3">
						</div>
						<div class="col-lg-6">
							<label>Date de la facturation </label>
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
							<label>Montant total facturé</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="fa fa-dollar"></span></span>                                           
								<input type="text" class="form-control" name="MontantFacture" placeholder="Entrez le montant total à payer par le malade" required>
                            </div>
							
						</div>
						<div class="col-lg-12">
								<center><button type="submit" class="btn btn-primary" name="Enregistrer"><span class="glyphicon glyphicon-ok"></span> Enregistrer la facturation </button></center>
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
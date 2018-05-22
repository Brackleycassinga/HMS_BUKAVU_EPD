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
                 Gestion des Malades en ligne <small>  : MODIFICATION DES MEDICAMENTS </small> 
				 <img src="IMA/medicaments.png" width="120px" height="80px" /><img src="IMA/upcube.jpg" width="120px" height="80px" />
             </h1>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            RECHERCHE ET MODIFICATION DES MEDICAMENTS
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>L'appellation de l'médicament à rechercher</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour votre rechercher" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-success" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
								</div>
							 <div class="col-lg-6">
								<div class="panel panel-success">
									<div class="panel-body">
										<p> Un mot suffit pour votre recherche, vous pouvez saisir une partie ou l'appellation 
											complète de l'médicament à rechercher dans la base de données.</p>
									</div>
										
								</div>
                             </div>
							 <?php
								if(isset($_POST['Rechercher'])){
									$Mot=$_POST['Mot'];
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM Medicaments, CategoriesMed WHERE Medicaments.DesignMedicament LIKE '%$Mot%' AND Medicaments.IdCategorieMed=CategoriesMed.IdCategorieMed") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){
										
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) DU MOT \" $Mot \"</font></center>
														<br/>
													<table class='table'>														
														<thead>
															<tr>
																<th>NUM.</th>
																<th>DESIGNATION DU MEDICAMENT</th>																
																<th>DOSAGE</th>											
																<th>STOCK ALERTE</th>																
																<th>PRIX PREVU</th>																
																<th>CATEGORIE</th>																
																<th>ACTION ENVISAGEE</th>
																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['IdMedicament'];?></td>
                                            <td><?php echo $row['DesignMedicament'];?></td>                                          
                                            <td><?php echo $row['Dosage'];?></td>                                     
                                            <td><?php echo $row['StockAlerte'];?></td>                                           
                                            <td><?php echo $row['ValeurUnit'];?></td>                                          
                                            <td><?php echo $row['DesignCategorieMed'];?></td>                                          
                                            <td><?php echo "<a href='ModifMedicaments.php?id=".$row['IdMedicament']."' title='Modifier médicament'><span class='glyphicon glyphicon-edit'></span> Modifier</a>";?></td>                                           
                                        </tr>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune suggestion trouvée dans la liste des médicaments pour le mot $Mot, vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>

					<?php 
						if(isset($_GET['id'])){
						require_once("BDD/connect.php");
						$sql=mysql_query("SELECT * FROM Medicaments, CategoriesMed WHERE Medicaments.IdMedicament='".$_GET['id']."' AND Medicaments.IdCategorieMed=CategoriesMed.IdCategorieMed");
						while($row=mysql_fetch_array($sql)){
					?>
					
								<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">                               
									<div class="col-lg-6"> 
										<input type="hidden" class="form-control" name="IdMedicament" value="<?php echo $row['IdMedicament'];?>" readonly >
										
										<label>Désignation du médicament</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="Designation" value="<?php echo $row['DesignMedicament'];?>" placeholder="Nom en toutes lettres" required >
                                        </div>
										<label>Dosage</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="Dosage" value="<?php echo $row['Dosage'];?>" placeholder="Dosage du médicament" required >
                                        </div>
										
										<label>Stock d'alerte prévu</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-file"></span></span>
                                            <input type="text" class="form-control" name="StockAlerte" value="<?php echo $row['StockAlerte'];?>" placeholder="Stock d'alerte prévu pour le médicament" required >
                                        </div>
										
                                    </div>
									<div class="col-lg-6"> 
										<label>Prix de vente Unitaire prévu </label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-dollar"></span></span>
                                            <input type="text" class="form-control" name="Prix" value="<?php echo $row['ValeurUnit'];?>" placeholder="Chiffre en dollars (sans le signe dollars)" required >
                                        </div>
										<label>Sélectionnez la catégorie d'appartenance</label>
										 <div class="form-group input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
                                            <select class="form-control" name="IdCategorieMed" style="width:580px;" required >
												<option value="<?php echo $row['IdCategorieMed'];?>"><?php echo $row['DesignCategorieMed'];?></option>
												<?php
												require_once("BDD/Connect.php");
												$sel=mysql_query("SELECT * FROM CategoriesMed WHERE IdCategorieMed !='".$row['IdCategorieMed']."'");
												if(mysql_num_rows($sel)>0){
													while($row=mysql_fetch_array($sel)){
														echo "<option value='".$row['IdCategorieMed']."'>".$row['DesignCategorieMed']."</option>";
													}
												}
												?>											
											</select>
                                        </div>
                                    </div>
									<div class="col-lg-12">
                                            <center><button type="submit" class="btn btn-success" name="Modifier"><span class="glyphicon glyphicon-edit"></span> Enregistrer les modifications </button></center>                                   									
									</div>
								</form>
				
					<?php } }?>

							
<?php
	if(isset($_POST['Modifier'])){
		
		$IdMedicament=$_POST['IdMedicament'];
		$Designation=$_POST['Designation'];
		$Dosage=$_POST['Dosage'];
		$StockAlerte=$_POST['StockAlerte'];
		$Prix=$_POST['Prix'];
		$IdCategorieMed=$_POST['IdCategorieMed'];

			require_once("BDD/connect.php");
			
			$req="UPDATE Medicaments SET DesignMedicament='".$Designation."', Dosage='".$Dosage."', 
				StockAlerte='".$StockAlerte."', ValeurUnit='".$Prix."', IdCategorieMed='".$IdCategorieMed."' 
				WHERE IdMedicament='".$IdMedicament."'";
			$result=mysql_query($req) or die(mysql_error());
				if (!$result){
					echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-remove'></span>Echec de modification. <br>".mysql_error()."</div></div>";
				}
				else{ 
					echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-ok'></span> &nbsp; Modification du médicament ".$Designation." effectuée avec succès. </div></div>";
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
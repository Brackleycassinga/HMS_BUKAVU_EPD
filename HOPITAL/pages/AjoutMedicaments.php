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
                 Gestion des Malades en ligne <small>  : AJOUT DE NOUVEAUX MEDICAMENTS</small> 
				  <img src="IMA/medicaments.png" width="200px" height="100px" />
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ENREGISTREMENT DE NOUVEAUX EXAMENS ET/OU TESTS
                        </div>
                        <div class="panel-body">
                            <div class="row"> 
								<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">                               
									<div class="col-lg-6"> 
										<label>Désignation du médicament</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="Designation" placeholder="Nom en toutes lettres" required >
                                        </div>
										<label>Dosage</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="Dosage" placeholder="Dosage du médicament" required >
                                        </div>
										
										<label>Stock d'alerte prévu</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-file"></span></span>
                                            <input type="text" class="form-control" name="StockAlerte" placeholder="Stock d'alerte prévu pour le médicament" required >
                                        </div>
										
                                    </div>
									<div class="col-lg-6"> 
										
										<label>Prix de vente Unitaire prévu </label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">FC</span>
                                            <input type="text" class="form-control" name="Prix" placeholder="Chiffre en Franc congolais (sans le signe FC)" required >
                                        </div>
										<label>Sélectionnez la forme galénique</label>
										 <div class="form-group input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
                                            <select class="form-control" name="IdCategorieMed" style="width:580px;" required >
												<option value="">----Veuillez s&eacute;lectionner ici----</option>
												<?php
												require_once("BDD/Connect.php");
												$sel=mysql_query("SELECT * FROM CategoriesMed");
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
                                            <center><button type="submit" class="btn btn-primary" name="Enregistrer"><span class="glyphicon glyphicon-floppy-disk"></span> Enregistrer le médicament </button></center>                                   									
									</div>
								</form>
							</div>
					<br/>
							 
<?php
	if(isset($_POST['Enregistrer'])){
		
		$Designation=$_POST['Designation'];
		$Dosage=$_POST['Dosage'];
		$StockAlerte=$_POST['StockAlerte'];
		$Prix=$_POST['Prix'];
		$IdCategorieMed=$_POST['IdCategorieMed'];

			require_once("BDD/connect.php");
			$search=mysql_query("SELECT * FROM Medicaments WHERE DesignMedicament='".$Designation."' and IdCategorieMed='".$IdCategorieMed."'");
			
			if (mysql_num_rows($search)>0){
				$kap=mysql_fetch_array($search);
				$nom=$kap['DesignMedicament'];
				echo "<div class='col-lg-10'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <span class='glyphicon glyphicon-alert'></span>  Attention!!!, le médicament ayant le même nom et la même catégorie existe déjà !</div></div>";
			}
			else{
			$req="INSERT INTO Medicaments VALUES('', '".$Designation."','".$Dosage."','".$StockAlerte."','0', '".$Prix."','".$IdCategorieMed."' )";
				$result=mysql_query($req) or die(mysql_error());
					if (!$result){
						echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-remove'></span>Impossible d'enregistrer. <br>".mysql_error()."</div></div>";
					}
					else{ 
						echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-ok'></span> &nbsp; Enregistrement effectué avec succès <br> Nouveau médicament ajouté à la base de données </div></div>";
					}
			}
		}
?>
						 
							</div>
                            <!-- /.row (nested) -->
                        </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    </div>
    <!-- /#wrapper -->


	
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
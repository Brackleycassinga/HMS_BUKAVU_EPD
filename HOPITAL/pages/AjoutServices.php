<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& ($_SESSION['Fonction']=='MD' OR $_SESSION['Fonction']=='AG')){
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
				
				<?php require_once ("Ajout/menu.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : LES SERVICES</small> 
				  <img src="IMA/services.png" width="120px" height="80px" margin-right:20px; border-radius:20px"/>
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            AJOUT DES NOUVEAUX SERVICES DU NEW HOPE HOSPITAL
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       	<label>Sigle ou code du service </label>									
										<div class="form-group input-group">
										    <span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
                                            <input type="text" class="form-control" name="CodeService" placeholder="Exemple : MI" required >
                                        </div>
										
										<label>Appellation en toutes lettres</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="Designation" placeholder="Exemple: MEDECINE INTERNE" required >
                                        </div>
									
                                            <center><button type="submit" class="btn btn-primary" name="Enregistrer"><span class="glyphicon glyphicon-floppy-disk"></span> Enregistrer le nouveau service </button></center>                                   									
                                </div>
							 </form>
					<br/>
							 
<?php
	if(isset($_POST['Enregistrer'])){
		
		$CodeService=$_POST['CodeService'];
		$Designation=$_POST['Designation'];

			require_once("BDD/connect.php");
			$search=mysql_query("SELECT * FROM Services WHERE Services.CodeService='".$CodeService."'");
			
			if (mysql_num_rows($search)>0){
				$kap=mysql_fetch_array($search);
				$nom=$kap['DesignService'];
				echo "<div class='col-lg-10'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <span class='glyphicon glyphicon-alert'></span>  Attention, ce sigle est déjà utilisé par un autre service (le service $nom ) !</div></div>";
			}
			else{
			$req="INSERT INTO Services VALUES('$CodeService', '$Designation')";
				$result=mysql_query($req) or die(mysql_error());
					if (!$result){
						echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-remove'></span>Impossible d'enregistrement le service, verifiez vos données</div></div>";
					}
					else{ 
						echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-ok'></span> Nouveau service ajoutée à la base de données </div></div>";
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
<?php 
	session_start();
		if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])){
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
					elseif ($_SESSION['Fonction']=='LABORANTIN')
							require_once ("Ajout/menuLabo.php");
					elseif ($_SESSION['Fonction']=='RECEPTIONNISTE')
						require_once ("Ajout/menuRecept.php");
					elseif ($_SESSION['Fonction']=='CAISSIER')
						require_once ("Ajout/menuCaissier.php");
					elseif ($_SESSION['Fonction']=='PHARMACIEN')
						require_once ("Ajout/menuPharmacie.php");
					elseif ($_SESSION['Fonction']=='COMPTABLE')
						require_once ("Ajout/menuCompt.php");
					elseif ($_SESSION['Fonction']=='MEDECIN')
						require_once ("Ajout/menuMedecin.php");						
				?>
				
            </div>
            <?php if ($_SESSION['Fonction']=='ENSEIGNANT')
						require_once ("Ajout/navDroitEns.php");
					else
						require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : COMPTE D'UTILISATEUR</small>
					 <img src="IMA/5.jpg" width="100px" height="80px"/>
             </h1>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            MODIFICATION DU COMPTE DE [ <?php echo $_SESSION['Noms'];?> ]
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form action="" method="POST">
									<div class="col-lg-6">      
										<label>Mot de passe actuel</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                            <input type="password" class="form-control" name="Ancienmotpasse" placeholder="Ancien mot de passe" required >
                                        </div>
                                      
                                        <div class="form-group">
                                            <label>Nouveau mot de passe</label>
                                            <input type="password" class="form-control" name="MotPasse" placeholder="Nouveau mot de passe" required >
                                        </div>
										<div class="form-group">
                                            <label>Confirmez le nouveau mot de passe</label>
                                            <input type="password" class="form-control" name="confirmation" placeholder="Confirmer nouveau mot de passe" required >
                                        </div>                                                                               									
									</div>
  
								<div class="col-lg-6">
                                    <div class="panel panel-danger">
										<div class="panel-heading">
											<span class="glyphicon glyphicon-warning-sign"></span> Attention : 
										</div>
										<div class="panel-body">
											<p>N.B: Pour modifier votre nom d'utilisateur et/ou mot de passe, vous devez connaître les anciens nom et mot de passe; sachant que ce dernier respecte la casse.<br/>
												Une fois votre nom et/ou mot de passe et changé, vous serez obligé de vous reconnecter pour continuer à utiliser cette application.</p>
										</div>										
									</div>
                                </div>
								<div class="col-lg-6">
									<center><button type="submit" class="btn btn-success" name="Modifier"><span class="glyphicon glyphicon-edit"></span> Modifier le compte <span class="glyphicon glyphicon-user"></span> </button></center>
								</div>								
							 </form>
					<br/>
							 
							 
<?php
	if(isset($_POST['Modifier'])){
		$IdUtilisateur = $_SESSION['IdUtilisateur'];
		$Ancienmotpasse=$_POST['Ancienmotpasse'];
		require_once("BDD/connect.php");
	  
		$req1="SELECT * FROM Utilisateurs WHERE Utilisateurs.IdUtilisateur='".$IdUtilisateur."' AND MotPasse='".$_POST['Ancienmotpasse']."'";
		$res1=mysql_query($req1);
		if(mysql_num_rows($res1)>0){
			if($_POST['MotPasse'] == $_POST['confirmation']){
				$MotPasse=$_POST['MotPasse'];					
				$req2="UPDATE Utilisateurs SET MotPasse='".$MotPasse."' WHERE IdUtilisateur='".$IdUtilisateur."' AND MotPasse='".$_POST['Ancienmotpasse']."'";
					$res2=mysql_query($req2);
						if (!$res2){
							echo "<div class='col-lg-6'><div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									Echec de modification de votre mot de passe </div></div>";
						}
						else{ 
							echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'>
									Votre mot de passe est modifié avec succès. Pour continuer, vous devez vous reconnecter pour prendre en considération les modifications. <a href='deconnect.php'><button type='button' style='float: right;'>&times;</button></a></div></div>";
								
						}
			}else{
				echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									Vous avez mal confirme le nouveau mot de passe </div> </div>";
				
			}
		}else{
				echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									Impossible de modifier, car le mot de passe entré est incorrect.</div></div>";
					
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
		 header("Location:index.php");
	}
 ?>
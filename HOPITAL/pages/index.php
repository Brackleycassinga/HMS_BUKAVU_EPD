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
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header"> 
				<?php require_once ("Ajout/entete.php");?>
            </div>
            <!-- /.navbar-header -->

             <div class="navbar-default sidebar" role="navigation" style="margin-top:150px;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">                       
                        <li>
                            <a href="index.php"><span class="fa fa-book fa-fw"></span> Présentation</a>
                        </li>
                        <li>
                            <a data-toggle="modal" href="#infos" data-backdrop="true"> <span class="glyphicon glyphicon-cog"></span> Connexion </a>
                        </li>
						
                    </ul>
                </div>
                <br/>
				
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">CONCEPTEUR :</h3>
					</div>
					<div class="panel-body" style="text-align:justify;">
						AFRICA BEST <br/>
						<img src="image/afri.png" style="height:120px; weight:100px"/>
					</div>					
				</div>
		</div>
            </div>
        </nav>

    <div id="page-wrapper">		
 <div class="container-fluid"> 
  
<div class="row">
   <div class="col-lg-16">
   
	<div class="panel panel-primary" style="margin-top:180px">
		<div class="panel-heading">
			<h3 class="panel-title">APPLICATION DE GESTION DES PATIENTS POUR NEW HOPE HOSPITAL</h3>
		</div>
			<div class="panel-body" style="text-align:justify;">
				<div class="col-lg-12" style="background-image:url(image/hopital.png); background-repeat:no-repeat; background-position:center center;background-size:contain;">
					<div class="col-lg-3">
						<img src="image/medicament1.jpg" width="300px" height="250px" style="float:left; margin-right:20px; border-radius:20px"/>
					
					</div>
					<div class="col-lg-6">
						<p>Cette application permet de gérer les différents mouvements effectués par les malades
						au sein de New Hope Hospital depuis son entrée jusqu'à la phase de sa 
						sortie y compris la facturation et le paiement.<p>
						<p>Cette application gère : </p>
						<span class="glyphicon glyphicon-arrow-right"></span> La liste de tous les malades du New Hope Hospital ;<br/>
						<span class="glyphicon glyphicon-arrow-right"></span> La consultation effectuée par les médecins à ces malades ;<br/>
						<span class="glyphicon glyphicon-arrow-right"></span> L'hospitalisation de ces malades ;<br/>
						<span class="glyphicon glyphicon-arrow-right"></span> Le suivi de l'évolution de la santé de malades par les tours de salles ;<br/>
						<span class="glyphicon glyphicon-arrow-right"></span> La facturation des soins médicaux ;<br/>
						<span class="glyphicon glyphicon-arrow-right"></span> Les payements effectués par les malades pour les soins médicaux ;<br/>
						<span class="glyphicon glyphicon-arrow-right"></span> Le stock de médicaments de la pharmacie.<br/>
					</div>
					<div class="col-lg-3">						
						<img src="image/microscope.jpg" width="250px" height="250px" style="border-radius:20px"/>
					</div>					
				</div>
				<div class="col-lg-12" style="background-image:url(image/logo_pharma.jpg); background-repeat:no-repeat; background-position:center center;background-size:contain;">
					<center><h3>PHARMACIE </h3></center>
					<div class="col-lg-3">			
						<img src="image/pharmacie.jpg" width="250px" height="150px" style="float:left; margin-right:20px; border-radius:20px"/>
					</div>
					<div class="col-lg-6">
						
						<p>Etant une institution oeuvrant dans le dommaine de la santé et équipée d'une pharmacie,
						il est nécessaire de gérer le stock de médicament de celle-ci, notamment par: <br/><br/>
						<span class="glyphicon glyphicon-hand-right"></span> L'enregistrement de la liste de tous les médicaments disponibles dans la pharmacie selon les catégories;<br/>
						<span class="glyphicon glyphicon-hand-right"></span> L'enregistrement de toutes les entrées des médicamennts en stock ; <br/>
						<span class="glyphicon glyphicon-hand-right"></span> La sauvegarde de toutes les sorties des médicamennts effectuées en faveur des malades ; <br/>
						<p>
					</div>
					<div class="col-lg-3">					
						<img src="image/medicament.png" width="250px" height="150px" style="float:right; margin-left:20px; border-radius:20px"/>
					</div>
				</div>
			</div>
		</div>
	</div>
 </div>
<div class="modal fade" id="infos">
<div class="modal-dialog">
<div class="modal-content panel-primary">
<div class="panel-heading">
<button type="button" class="close" data-dismiss="modal">x</button>
<h4 class="modal-title"><img src="IMA/users.jpg" width="50px" height="30px" style="float:left; margin-right:20px; border-radius:20px"/>Page de connexion des utilisateus</h4>
</div>
<div class="modal-body">
	<center>
		<fieldset style="border:double; color:blue; border-radius:20px">
		<br/>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<table width="500px" height="80px">
								<tr><td>Login (Nom d'utilisateur)</td><td><input type="text" name="Login" class="form-control" placeholder="Nom utilisateur" required /></td></tr>
								<tr><td>Mot de Passe</td><td><input type="Password" name="Pass" class="form-control" placeholder="Mot de passe" required /></td></tr>
				</table>
				<br/>
				<button class="btn btn-primary" type="submit" name="valider"><span class="glyphicon glyphicon-user"></span> Connexion</button>
			</form>
			<br/>
		</fieldset>
	</center>
		<?php
		if (isset($_POST['valider'])){
			require_once("BDD/connect.php");
			$Login = $_POST['Login'];
			$Pass = $_POST['Pass'];
			
			$sql=mysql_query("SELECT * FROM Utilisateurs WHERE Login='".$_POST['Login']."' AND MotPasse LIKE BINARY '".$_POST['Pass']."'");
			if(mysql_num_rows($sql)>0){	
				while($ligne=mysql_fetch_array($sql)){
					if($ligne['Etat']=='AUTORISE'){
						session_start();
						$_SESSION['Login']=$ligne['Login'];
						$_SESSION['MotPasse']=$ligne['MotPasse'];
						$_SESSION['IdUtilisateur']=$ligne['IdUtilisateur'];
						$_SESSION['Fonction']=$ligne['Fonction'];
						$_SESSION['Noms']=$ligne['NomsUtil'];
						header('Location:accueil.php');
					}else{
						echo "<center><span class='glyphicon glyphicon-warning-sign' style='color:red'> votre compte est bloqué, veuillez contacter l'administrateur </span></center>";
					}
				}
			}else{
				echo "<center><span class='glyphicon glyphicon-warning-sign' style='color:red'> votre Login et/ou mot de passe est (sont) incorrect(s) </span></center>";
				}	
		}
	?>
</div>
<div class="modal-footer">
<img src="IMA/nouser.jpg" width="50px" height="30px" style="float:center; margin-right:20px; border-radius:20px"/>
<button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Fermer</button>
</div>
</div>
</div>
</div>	

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

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

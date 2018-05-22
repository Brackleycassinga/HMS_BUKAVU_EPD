<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']=='RECEPTIONNISTE'){
		require_once("BDD/Connect.php");
		
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

<script type="text/javascript">
	var start = new Date();
	start = Date.parse(start)/1000;
	var seconds = 5;
	function CountDown(){
		var now = new Date();
		now = Date.parse(now)/1000;
		var counter = parseInt(seconds-(now-start),10);
		document.getElementById('countdown').innerHTML = counter;
		if(counter > 0){
			timerID = setTimeout("CountDown()", 100)
		}else
			{
			window.params = function(){
				var params = {};
				var param_array = window.location.href.split('?')[1].split('&');
				for(var i in param_array){
					x = param_array[i].split('=');
					params[x[0]] = x[1];
				}
				return params;
			}();
			location.href = "AjoutPatients.php";
		}
	}
	window.setTimeout('CountDown()',100);
</script>
</head>

<body>

    <div IdUtilisateur="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header"> 
				<?php require_once ("Ajout/entete.php");?>
				
				<?php require_once ("Ajout/menuRecept.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : AJOUT DES NOUVEAUX PATIENTS</small> 
				  <img src="IMA/defPatient.jpg" width="80px" height="60px" margin-right:20px; border-radius:20px"/>
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            AJOUT DES NOUVEAUX PATIENTS
                        </div>
                        <div class="panel-body">
                            <div class="row">
								
			
			<?php
	if(isset($_POST['Enregistrer'])){
			$IdUtilisateur=$_SESSION['IdUtilisateur'];
			$CodePatient=$_POST['CodePatient'];
			$IndexMal=$_POST['IndexMal'];
			$Noms=$_POST['Noms'];
			$Sexe=$_POST['Sexe'];
			$Age=$_POST['Age'];
			$Profession=$_POST['Profession'];
			$EtatCivil=$_POST['EtatCivil'];
			$NumTel=$_POST['NumTel'];
			$Adresse=$_POST['Adresse'];
			$Photo=$_FILES["Photo"]["name"];
			$Jour=$_POST['Jour'];
			$Mois=$_POST['Mois'];
			$Annee=$_POST['Annee'];
			$DateArrive = $Annee."-".$Mois."-".$Jour;
			
			require_once("BDD/connect.php");
			$search=mysql_query("SELECT * FROM Patients WHERE Patients.CodePatient='$CodePatient'");
			
			if (mysql_num_rows($search)>0){
				echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <span class='glyphicon glyphicon-alert'></span>  Attention, ce malade est déjà enregistré! veuillez réessayer.</div></div>";
			}
			else{
				$select = mysql_query("SELECT max(Idauto_Patient) FROM Patients");
				$donnees = mysql_fetch_array($select);
				$numero = $donnees[0]+1;

				$dossier = 'Patients/';
				$taille_maxi = 10000000;
				$taille = filesize($_FILES['Photo']['tmp_name']);
				$extensions = array('.png', '.gif', '.jpg', '.jpeg','.PNG', '.GIF', '.JPG', '.JPEG');
				
				if ( basename($_FILES['Photo']['name'])!=""){
					$Photo = basename($_FILES['Photo']['name']); // indique le nom du Photo local
					$extension = strrchr($_FILES['Photo']['name'], '.'); // séparation de l'extension ex : .jpg du nom du Photo local

					$Photo = "imgpatient000".$numero.$extension; // renomme $Photo par le nom souhaité en rajoutant $extension
					
					
					//Début des vérifications de sécurité...
					if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
					{

						 $erreur = "Vous devez uploader un Photo de type png, gif, jpg, jpeg";

					}
					if($taille>$taille_maxi)
					{
						 $erreur = "Le Photo est trop gros...";
					}
					if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
					{
						 //On formate le nom du Photo ici...
						 $Photo = strtr($Photo, 
							  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
							  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
						 $Photo = preg_replace('/([^.a-z0-9]+)/i', '-', $Photo);
						 if(move_uploaded_file($_FILES['Photo']['tmp_name'], $dossier . $Photo)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
						 {	
							$req="INSERT INTO Patients VALUES('','$CodePatient','$IndexMal','$Noms','$Age','$Sexe','$Profession','$EtatCivil','$Adresse','$NumTel','$DateArrive','$Photo','$IdUtilisateur','ATTENTE')";
							$result=mysql_query($req);
								if (!$result){
									echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-remove'></span>Echec d'enregistrement du nouveau malade! Veuillez réessayer!</div></div>";
								}
								else{ 
									echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-ok'></span> Nouveau malade ajouté avec sa photo</div></div>";
								}
						}
						else{
							if($Sexe=='MASCULIN'){
								$req="INSERT INTO Patients VALUES('','$CodePatient','$IndexMal','$Noms','$Age','$Sexe','$Profession','$EtatCivil','$Adresse','$NumTel','$DateArrive','DefaultPatientMal.png','$IdUtilisateur','ATTENTE')";
								$result=mysql_query($req);
							}
							else{
								$req="INSERT INTO Patients VALUES('','$CodePatient','$IndexMal','$Noms','$Age','$Sexe','$Profession','$EtatCivil','$Adresse','$NumTel','$DateArrive','DefaultPatientFem.png','$IdUtilisateur','ATTENTE')";
								$result=mysql_query($req);
							}
								if (!$result){
									echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-remove'></span>Echec d'enregistrement </div></div>";
								}
								else{ 
									echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-ok'></span> Nouveau malade ajouté sans aucune photo</div></div>";
								}
						}
					}else{
						echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-ok'></span>".$erreur."</div></div>";
					}
				}
				else{
					if($Sexe=='MASCULIN'){
						$req="INSERT INTO Patients VALUES('','$CodePatient','$IndexMal','$Noms','$Age','$Sexe','$Profession','$EtatCivil','$Adresse','$NumTel','$DateArrive','DefaultPatientMal.png','$IdUtilisateur','ATTENTE')";
						$result=mysql_query($req);
					}
					else{
						$req="INSERT INTO Patients VALUES('','$CodePatient','$IndexMal','$Noms','$Age','$Sexe','$Profession','$EtatCivil','$Adresse','$NumTel','$DateArrive','DefaultPatientFem.png','$IdUtilisateur','ATTENTE')";
						$result=mysql_query($req);
					}
					if (!$result){
						echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-remove'></span>Echec d'enregistrement </div></div>";
					}
					else{ 
						echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-ok'></span> Nouveau malade ajouté sans aucune photo</div></div>";
					}
				}
			}
	?>
	
	<div class='col-lg-12'>
		<center><p style="font-size:20px; color:green">Veuillez patienter <strong id="countdown">5</strong> secondes.</p></center>
	</div>
	<?php
	}
?>					</div>
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
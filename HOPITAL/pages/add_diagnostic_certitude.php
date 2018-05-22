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
			location.href = "ModifConsultations.php";
		}
	}
	window.setTimeout('CountDown()',100);
</script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header"> 
				<?php require_once ("Ajout/entete.php");?>
				
				<?php if ($_SESSION['Fonction']=='MD')
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
                 Gestion des Malades en ligne <small>  : CONSULTATIONS DES MALADES</small> 
				  <img src="IMA/defPatient.jpg" width="120px" height="80px"/><img src="IMA/5.jpg" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          AJOUT DU DIAGNOSTIQUE DE CERTITUDE A UNE CONSULTATION DEJA FAITE
                        </div>
                        <div class="panel-body">
                            <div class="row"> 
                                 
					<?php 
						if(isset($_GET['id'])){
						require_once("BDD/connect.php");
						$sql=mysql_query("SELECT * FROM Consultations, Patients, Utilisateurs WHERE Consultations.IdConsultation='".$_GET['id']."' and Consultations.Idauto_Patient=Patients.Idauto_Patient and Consultations.IdUtilisateur=Utilisateurs.IdUtilisateur");
						while($row=mysql_fetch_array($sql)){
					?>
					
			<form action="add_diagnostic_certitude.php?save=diagn_cert" method="post">
				<div class="panel panel-green">
					<div class="panel-body">
					 <div class="col-lg-3">
                     </div>
						<div class="col-lg-6">					
							<label style="color:red;">Code et noms complets du Patient</label>
                            <div class="form-group input-group"> 
								<input type="hidden" name="IdConsultation" value="<?php echo $row['IdConsultation']; ?>"></tr>		
								<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>                                       
								<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly >
								<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" readonly >
                            </div>
							<label style="color:green;">Médecin ayant effectué la consultation</label>
                            <div class="form-group input-group"> 									
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                       
								<input type="text" class="form-control" name="NomsUtil" value="<?php echo $row['NomsUtil']; ?>" readonly >
                            </div>
							
							<label>Diagnostique de certitude</label>
							<div class="form-group input-group"> 
								<textarea  name="DiagnCertitude" placeholder="Veuillez préciser le diagnostique retenu"></textarea>
							</div>
							
                        </div>
						
                        <div class="col-lg-12">						
							<center><button type="submit" class="btn btn-success" name="Modifier"><span class="glyphicon glyphicon-edit"></span> Enregistrer le diagnostique</button></center>
						</div>					
					</div>					
				</div>										
			</form>
				
					<?php } }?>

							
<?php
		if(isset($_POST['Modifier'])){

			$IdConsultation=$_POST['IdConsultation'];
			$DiagnCertitude=$_POST['DiagnCertitude'];
			
			require_once("BDD/connect.php");
			$req="UPDATE Consultations SET DiagnCertitude='".$DiagnCertitude."' WHERE IdConsultation='".$IdConsultation."'";
			$result=mysql_query($req);
				if (!$result){
					echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-remove'></span>Echec d'enregistrement du diagnostique! Veuillez réessayer!<br>".mysql_error()."</div></div>";
				}
				else{ 
					echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-ok'></span>Le diagnostique de certitude a été ajouté à la fiche de consultation avec succès!</div></div>";
				}
?>		
		<div class='col-lg-12'>
			<center><p style="font-size:20px;">Veuillez patienter <strong id="countdown">5</strong> secondes.</p></center>
		</div>
<?php				
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
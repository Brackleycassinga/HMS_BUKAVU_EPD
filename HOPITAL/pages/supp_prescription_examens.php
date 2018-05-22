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
			location.href = "SuppPrescriptionExamens.php";
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
					  Gestion des Malades en ligne <small>: SUPPRESSION DES PRESCRIPTION DES EXAMENS</small> 
					  <img src="IMA/setup.jpg" width="120px" height="80px"/>
				 </h1>
				<div class="panel panel-green">
					<div class="panel-heading">
						SUPPRESSION DES PRESCRIPTIONS DES EXAMENS ET/OU TESTS 
					</div>
					<div class="panel-body">
						<div class="row">                                
							<?php
								if(isset($_GET['SuppPrescription'])){
									$message="";									
									$IdPrescription = $_GET['IdPrescription'];
									$MotPasse = $_GET['MotPasse'];
									$NbreRes = $_GET['NbreRes'];
									
									$rqt=mysql_query("SELECT * FROM Utilisateurs WHERE MotPasse LIKE BINARY '".$MotPasse."' AND (Fonction='MD' OR Fonction='AG')");
									if(mysql_num_rows($rqt)>0){
										$res=mysql_query("SELECT * FROM ResultExamens WHERE IdPrescription='".$IdPrescription."'");
										if(mysql_num_rows($res)==0){
											$del=mysql_query("DELETE FROM PrescExamensCompose WHERE IdPrescription='".$IdPrescription."'");									
												if($del){																		
													mysql_query("DELETE FROM PrescExamens WHERE IdPrescription='".$IdPrescription."'");													
												
													$message = "<div class='col-lg-12'><div class='alert alert-success alert-dismissable'>
																<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
																<center><img src='IMA/ok.png'/><br><br>
																<span class='glyphicon glyphicon-ok'></span> &nbsp; Suppression de la Prescription <strong> N° '".$IdPrescription."'</strong> a été effectué avec succès</center></div></div>";
												}
												else{
													$message = "<div class='col-lg-12'><div class='alert alert-danger alert-dismissable'>
																<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
																<center><img src='IMA/error.png'/><br><br>
																<span class='glyphicon glyphicon-alert'></span>".mysql_error()."</center></div></div>";
												}
										}
										else{
											$message = "<div class='col-lg-12'><div class='alert alert-danger alert-dismissable'>
														<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
														<center><img src='IMA/error.png'/><br><br>
														<span class='glyphicon glyphicon-alert'></span> Impossible de supprimer, car cette prescription a déjà de resultat!! </center></div></div>";
										
										}
									}
										
									else{
										$message = "<div class='col-lg-12'><div class='alert alert-danger alert-dismissable'>
													<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
													<center><img src='IMA/error.png'/><br><br>
													<span class='glyphicon glyphicon-alert'></span> Impossible de modifier, car le mot de passe pour l'autorisation est incorrect!!!</center></div></div>";
									
									}
										echo $message;
								}
							?>
							<br><br>
							<div class='col-lg-12'>
								<center><p style="font-size:20px;">Vous serez rederiger dans <strong id="countdown">5</strong> secondes.</p></center>
							</div>                           
						</div>                           
					</div>                           
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
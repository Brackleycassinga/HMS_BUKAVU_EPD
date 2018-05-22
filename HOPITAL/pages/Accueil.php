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

#conteneur{
		margin:0px auto;
		width:550px;
		height:300px;
		border:solid 0px black;
		position:relative;
		perspective:800px;
		perspective-origin:10% 50%;
		-webkit-perspective:600px;
		-webkit-perspective-origin:10% 50%;
		-moz-perspective:800px;
		-moz-perspective-origin:10% 50%;
		-o-perspective:800px;
		-o-perspective-origin:10% 50%;
	}

	.diapositive{
		position:absolute;
		height:200px;
		width:250px;
		opacity:0.9;
		border:transparent;
		border-radius:8px;
		top:75px;
		left:250px;
		background-size:cover;
		
		transform-origin:0% 50%;
		-webkit-transform-origin:0% 50%;
		-moz-transform-origin:0% 50%;
		-o-transform-origin:0% 50%;
	}

	.diapo1{
		transform:rotateY(0deg);
		-webkit-transform:rotateY(0deg);
		-moz-transform:rotateY(0deg) translateZ(1px);
		-o-transform:rotateY(0deg);
		background-image:url(image/medicament1.jpg);
	}
	.diapo2{
		transform:rotateY(45deg);
		-webkit-transform:rotateY(45deg);
		-moz-transform:rotateY(45deg) translateZ(2px);
		-o-transform:rotateY(45deg);
		background-image:url(image/logo_pharma2.jpg);
	}
	.diapo3{
		transform:rotateY(90deg);
		-webkit-transform:rotateY(90deg);
		-moz-transform:rotateY(90deg) translateZ(3px);
		-o-transform:rotateY(90deg);
		background-image:url(image/medicament.png);
	}
	.diapo4{
		transform:rotateY(135deg);
		-webkit-transform:rotateY(135deg);
		-moz-transform:rotateY(135deg) translateZ(4px);
		-o-transform:rotateY(135deg);
		background-image:url(image/test_medical.png);
	}
	.diapo5{
		transform:rotateY(180deg);
		-webkit-transform:rotateY(180deg);
		-moz-transform:rotateY(180deg) translateZ(-4px);
		-o-transform:rotateY(180deg);
		background-image:url(image/pres.png);
	}
	.diapo6{
		transform:rotateY(225deg);
		-webkit-transform:rotateY(225deg);
		-moz-transform:rotateY(225deg) translateZ(-3px);
		-o-transform:rotateY(225deg);
		background-image:url(image/im38.jpg);
	}
	.diapo7{
		transform:rotateY(270deg);
		-webkit-transform:rotateY(270deg);
		-moz-transform:rotateY(270deg) translateZ(-2px);
		-o-transform:rotateY(270deg);
		background-image:url(image/icons.jpg);
	}
	.diapo8{
		transform:rotateY(315deg);
		-webkit-transform:rotateY(315deg);
		-moz-transform:rotateY(315deg) translateZ(-1px);
		-o-transform:rotateY(315deg);
		background-image:url(image/im30.jpg);
	}

	#parent{
		position:absolute;
		animation:tourne 8s linear infinite;
		transform-origin:250px 50%;
		transform-style: preserve-3d; 
		-webkit-animation:tourne 8s linear infinite;
		-webkit-transform-origin:250px 50%;
		-webkit-transform-style: preserve-3d; 
		-moz-animation:tourne 8s linear infinite;
		-moz-transform-origin:250px 50%;
		-moz-transform-style: preserve-3d; 
		-o-animation:tourne 8s linear infinite;
		-o-transform-origin:250px 50%;
		-o-transform-style: preserve-3d; 
	}

	@keyframes tourne{
		from{transform:rotateY(0deg); }
		to{transform:rotateY(360deg); }
	}
	@-webkit-keyframes tourne{
		from{-webkit-transform:rotateY(0deg); }
		to{-webkit-transform:rotateY(360deg); }
	}
	@-moz-keyframes tourne{
		from{-moz-transform:rotateY(0deg);}
		to{-moz-transform:rotateY(360deg); }
	}
	@-o-keyframes tourne{
		from{-o-transform:rotateY(0deg); }
		to{-o-transform:rotateY(360deg); }
	}
</style>

<script type='text/javascript'>
	function PauseAnim() 
	   { 
		  document.getElementById('parent').style.animationPlayState='paused'; 
		  document.getElementById('parent').style.MozAnimationPlayState='paused'; 
		  document.getElementById('parent').style.WebkitAnimationPlayState='paused'; 
		  document.getElementById('parent').style.OAnimationPlayState='paused'; 
	   } 

	   function LectureAnim() 
	   { 
		  document.getElementById('parent').style.animationPlayState='running'; 
		  document.getElementById('parent').style.MozAnimationPlayState='running'; 
		  document.getElementById('parent').style.WebkitAnimationPlayState='running'; 
		  document.getElementById('parent').style.OAnimationPlayState='running'; 
	   } 
	</script>

</head>

<body>

    <div id="wrapper">
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
			<?php require_once ("Ajout/navDroit.php");?>	
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : ACCUEIL </small>
				  <img src="IMA/ts.jpg" width="80px" height="50px" margin-right:20px; border-radius:20px"/>
            </h1>
		<div class="panel panel-primary">
                 <div class="panel-heading">
                     ACCUEIL
                 </div>
			<div class="panel-body">
                <div class="row">
                     <div class="col-lg-6">
						<div id='conteneur'>
							<div id='parent' onmouseover='PauseAnim();' onmouseout='LectureAnim();'>
								<div class='diapositive diapo1'></div>
								<div class='diapositive diapo2'></div>
								<div class='diapositive diapo3'></div>
								<div class='diapositive diapo4'></div>
								<div class='diapositive diapo5'></div>
								<div class='diapositive diapo6'></div>
								<div class='diapositive diapo7'></div>
								<div class='diapositive diapo8'></div>
							</div>
						</div>
					</div>
		
					<div class="col-lg-1">
					</div>
					<div class="col-lg-5">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<span class="glyphicon glyphicon-eye-open"></span> GESTION DES MALADES DU NEW HOPE HOSPITAL
							</div>
							<div class="panel-body">
								<center><img src="image/clavier_pharma.jpg" style="widht:250px; height:250px;"/></center>
								
							</div>										
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
 </div>
 </div>
 </div>
    </div>
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php
	}else{
		header('Location:index.php');
	}
?>
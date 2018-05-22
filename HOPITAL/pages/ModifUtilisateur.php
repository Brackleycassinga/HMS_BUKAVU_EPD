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

    <div IdUtilisateur="wrapper">

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
                 Gestion des Malades en ligne <small>  : AJOUT DES UTILISATEURS</small> 
				  <img src="IMA/users.jpg" width="80px" height="60px" margin-right:20px; border-radius:20px"/>
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            MODIFICATION DES UTILISATEURS
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            
					<?php 
						if(isset($_GET['idut'])){
						require_once("BDD/connect.php");
						$sql=mysql_query("SELECT * FROM Utilisateurs, Services WHERE IdUtilisateur='".$_GET['idut']."' AND Utilisateurs.CodeService=Services.CodeService");
						while($row=mysql_fetch_array($sql)){
					?>
					
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
						<div class="col-lg-4">
							
							<label>Matricule de l'utilisateur</label>
                            <div class="form-group input-group"> 
								<input type="hidden" name="IdUtilisateur" value="<?php echo $row['IdUtilisateur']; ?>"></tr>		
								<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>                                       
								<input type="text" class="form-control" name="NumMatricule" value="<?php echo $row['NumMatricule']; ?>"  >
                            </div>
							
							<label>Noms de l'utilisateur</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                        
								<input type="text" class="form-control" name="NomsUtil" value="<?php echo $row['NomsUtil']; ?>"  >
                            </div>
							
							<label>Sexe</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="fa fa-male"></span><span class="fa fa-female"></span></span>                                        
								<select class="form-control" name="Sexe" required >
									<option><?php echo $row['Sexe']; ?></option>
									<option>MASCULIN</option>
									<option>FEMININ</option>
								</select>
                            </div>
                        </div>
                       	
						<div class="col-lg-4">
							
							<label>Etat Civil</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="fa fa-male"></span></span></span>                                        
								<select class="form-control" name="Etatcivil" required >
									<option><?php echo $row['Etatcivil']; ?></option>
									<option>CELIBATAIRE</option>
									<option>MARIE(E)</option>
									<option>DIVORCE(E)</option>
									<option>VEUF(VE)</option>
								</select>
                            </div>
							
							<label>Adresse de Résidence</label>
							<div class="form-group input-group">							
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>                                       
								<input type="text" class="form-control" name="Adresse" value="<?php echo $row['Adresse']; ?>" />
                            </div>
							
							<label>Numéro de Téléphone</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="fa fa-phone"></span></span>                                          
								<input type="text" class="form-control" name="NumTel" value="<?php echo $row['NumTel']; ?>" >
                            </div>
							
                        </div>
						<div class="col-lg-4">
							<label>Titre académique</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="fa fa-file"></span></span>                                          
								<input type="text" class="form-control" name="Titre" value="<?php echo $row['Titre']; ?>" >
                            </div>
							<div class="form-group"> 
								<label>Service d'appartenance de l'utilisateur</label>                                           
                                <select class="form-control" name="CodeService" required >
									<option value="<?php echo $row['CodeService']; ?>"><?php echo $row['DesignService']; ?></option>
									<?php
										require_once("BDD/Connect.php");
										$sel=mysql_query("SELECT * FROM Services WHERE CodeService !='".$row['CodeService']."'");
										if(mysql_num_rows($sel)>0){
											while($li=mysql_fetch_array($sel)){
												echo "<option value='".$li['CodeService']."'>".$li['DesignService']."</option>";
											}
										}
									?>											
								</select>
                            </div>
							<div class="form-group"> 
								<label>Fonction du Nouvel utilisateur</label>                                           
                                <select class="form-control" name="Fonction" required >
									<option value="<?php echo $row['Fonction']; ?>"><?php echo $row['Fonction']; ?></option>
									<option value="MD">MEDECIN DIRECTEUR</option>
									<option value="AG">AG</option>
									<option>MEDECIN</option>
									<option>COMPTABLE</option>
									<option>CAISSIER</option>
									<option>LABORANTIN</option>												
									<option>RECEPTIONNISTE</option>												
									<option>PHARMACIEN</option>												
								</select>
                            </div>
                        </div>
						
                        <br/>
						
                        </div>
                       					
                        <div class="col-lg-12">						
							<center><button type="submit" class="btn btn-success" name="Modifier"><span class="glyphicon glyphicon-edit"></span> Enregistrer les modifications</button></center>
						</div>					
					</form>
				
					<?php } }?>

							
<?php
		if(isset($_POST['Modifier'])){
		
			$IdUtilisateur=$_POST['IdUtilisateur'];
			$NumMatricule=$_POST['NumMatricule'];
			$NomsUtil=$_POST['NomsUtil'];
			$Sexe=$_POST['Sexe'];
			$Etatcivil=$_POST['Etatcivil'];
			$NumTel=$_POST['NumTel'];
			$Adresse=$_POST['Adresse'];
			$Titre=$_POST['Titre'];
			$CodeService=$_POST['CodeService'];
			$Fonction=$_POST['Fonction'];
			
			require_once("BDD/connect.php");
			$req="UPDATE Utilisateurs SET NumMatricule='".$NumMatricule."', NomsUtil='".$NomsUtil."', Sexe='".$Sexe."', Etatcivil='".$Etatcivil."', Titre='".$Titre."', 
				Adresse='".$Adresse."', NumTel='".$NumTel."', CodeService='".$CodeService."', Fonction='".$Fonction."' WHERE IdUtilisateur='".$IdUtilisateur."'";
			$result=mysql_query($req);
				if (!$result){
					header("location:BloquerAccesUtilisateurs.php?err=tr&ret=false");
				}
				else{ 
					header("location:BloquerAccesUtilisateurs.php?edit=tr&ret=true");
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
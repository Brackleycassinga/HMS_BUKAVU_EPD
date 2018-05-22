<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['Password'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']=='ADMINISTRATEUR'){
		require_once("BDD/connexion.php");		
			$sqlSearch=mysql_query("SELECT * FROM USERS") or die(mysql_error());
				if (mysql_num_rows($sqlSearch)>0){
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
                 Gestion des Malades en ligne <small>  : LES UTILISATEURS </small> 
				 <img src="IMA/3.jpg" width="100px" height="80px"/> <img src="IMA/users.jpg" width="100px" height="80px"/>
             </h1>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                           LISTE DES UTILISATEURS DU NEW HOPE HOSPITAL V2.1
                        </div>
                        <div class="panel-body">
                            <div class="row">                               
                
							 <?php
							
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI LES UTILISATEURS DU NEW HOPE HOSPITAL V2.1</font></center>
														<br/>
													<table class='table'>
														
														<thead>
															<tr>
																<th>NUM. D'ORDRE</th>
																<th>LOGIN DE L'UTILISATEUR</th>
																<th>FONCTION</th>																
																<th>ACTION</th>
																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['IdUtilisateur'];?></td>
                                            <td><?php echo $row['Login'];?></td>
                                            <td><?php echo $row['Fonction'];?></td>                                            
                                            <td><?php echo "<a href='ModifAccesUtilisateurs.php?id=".$row['IdUtilisateur']."' title='Modifier Accès'><span class='glyphicon glyphicon-edit'></span> Modifier</a>";?></td>                                           
                                        </tr>               
    
							<?php
										}	
									echo"</tbody>";									
								}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucun Utilisateur trouvé </div></div>";
									}
								
							?>

					<?php 
						if(isset($_GET['id'])){
						require_once("BDD/connexion.php");
						$sql=mysql_query("SELECT * FROM USERS WHERE USERS.IdUtilisateur='".$_GET['id']."'");
						while($row=mysql_fetch_array($sql)){
					?>
					
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="col-lg-6">
						<input type="text" class="hidden" name="IdUtilisateur" value="<?php echo $row['IdUtilisateur']; ?>" required >
												
						<label>Login de l'utilisateur</label>
                            <div class="form-group input-group"> 
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span> </span>                                           
								<input type="text" class="form-control" name="Noms" value="<?php echo $row['Login']; ?>" disabled >
                            </div>
							

						<div class="form-group"> 
							<label>Fonction du Nouvel utilisateur</label>                                           
                                <select class="form-control" name="Fonction" required >
									<option value="<?php echo $row['Fonction']; ?>"><?php echo $row['Fonction']; ?></option>
									<option>ADMINISTRATEUR</option>
									<option>COMPTABLE</option>
									<option>CAISSIER</option>
									<option>PERCEPTEUR</option>
									<option>ENSEIGNANT</option>
								</select>
                        </div>	
					<center><button type="submit" class="btn btn-success" name="Modifier"><span class="glyphicon glyphicon-pencil"></span> Modifier l'accès de l'utilisateur</button></center>
            								
					</div>
								
					</div>
				
					</form>
				
					<?php } }?>

							
<?php
	if(isset($_POST['Modifier'])){
		
		$IdUtilisateur=$_POST['IdUtilisateur'];
		$Fonction=$_POST['Fonction'];
			
			require_once("BDD/connexion.php");
			
			$req=mysql_query("UPDATE USERS SET Fonction='$Fonction' WHERE USERS.IdUtilisateur='$IdUtilisateur'")or die(mysql_error());
				
					if (!$req){
						echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-remove'></span>Echec de modification de la fonction </div></div>";
					}
					else{ 
						header("location:ModifAccesUtilisateurs.php");
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
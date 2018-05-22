<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['Password'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']='COMPTABLE'){
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
				
				<?php require_once ("Ajout/menuCompt.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : RETRAIT EN BANQUE </small> 
				  <img src="IMA/im20.jpg" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            CONSTATATION DE SORTIE DES FONDS EN BANQUE
                        </div>
                        <div class="panel-body">
                            <div class="row">			
                                <div class="col-lg-6">														
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="POST">
                                      								
										<div class="form-group"> 								
										 	<label>Date de retrait en banque </label>	
										<table>                                          
                                            <tr><td><select class="form-control" name="Jour" required >
												<option value="">Jour</option>												
													<?php 
														for($i=1; $i<=31; $i++){
															echo "<option value=".$i.">".$i."</option>";
														}
													?>
											</select></td><td>&nbsp;</td><td>
											
											<select class="form-control" name="Mois" style="width:150px;">
												<option value="">Mois</option>
												<option value="01">Janvier</option>
												<option value="02">Fevrier</option>
												<option value="03">Mars</option>
												<option value="04">Avril</option>
												<option value="05">Mai</option>
												<option value="06">Juin</option>
												<option value="07">Juillet</option>
												<option value="08">Aout</option>
												<option value="09">Septembre</option>
												<option value="10">Octobre</option>
												<option value="11">Novembre</option>
												<option value="12">Decembre</option>
											</select></td><td>&nbsp;</td><td>
											
											<select class="form-control" name="Annee" required >
												<option value="">Année</option>												
												<?php 
													for($i=date('Y'); $i>=1900; $i--){
														echo "<option value=".$i.">".$i."</option>";
													}
												?>
											</select></td></tr>
											</table> 	
                                        </div>
										<label>Montant rétiré en banque (dollars)</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
                                            <input type="text" class="form-control" name="MontantSortie" placeholder=" sans symbole de dollar" required >
                                        </div>
										
										<label>Motif de retrait de fonds</label>
                                        <div class="form-group input-group"> 
										
											<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span> </span>                                           
                                            <input type="text" class="form-control" name="Motif" placeholder="En bref" required >
                                        </div>									    
                                     </div>	
								    
									 <div class="col-lg-6">									
										
									<label>Banque de retrait</label>
                                        <div class="form-group input-group ">
											<span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span> 
                                            <select class="form-control" name="IdBanque" required >
												<option value="">Sélectionnez ici</option>
												<?php
													require_once("BDD/connexion.php");
													$search=mysql_query("SELECT * FROM BANQUES");
														if (mysql_num_rows($search)>0){
															while($kap=mysql_fetch_row($search)){
																$Id=$kap[0];
																$Ap=$kap[1];
																echo"<option value='$Id'>$Ap </option>";
															}
														}
												?>
											</select>
                                        </div>
										
										<label>Numéro du bordereau de retrait</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span>
                                            <input type="text" class="form-control" name="NumBord" placeholder="Noms complets" required >
                                        </div>
										
										<div class="form-group">
											<label>Image du bordereau de retrait</label>											 
                                            <input type="file"  name="Image" class="form-control" required />												
                                        </div>

										</div>
										<div class="col-lg-12">
									<center><button type="submit" class="btn btn-success" name="Enregistrer"><span class="glyphicon glyphicon-share"></span> Enregistrer le retrait </button></center>			
								</div>											 
						</form>
		 </div>
		 														
 <?php
	if(isset($_POST['Enregistrer'])){
        $repertoireDestination = "PIECES/";
        $nomDestination        = $_FILES["Image"]["name"];
       
        if (is_uploaded_file($_FILES["Image"]["tmp_name"])) {
            if (rename($_FILES["Image"]["tmp_name"],
                       $repertoireDestination.$nomDestination)) {
             
				$MontantSortie=$_POST['MontantSortie'];				
				$Motif = $_POST['Motif'];
				$Jour=$_POST['Jour'];
				$Mois=$_POST['Mois'];
				$Annee=$_POST['Annee'];
				$IdBanque=$_POST['IdBanque'];
				$NumBord=$_POST['NumBord'];
				$DateSortie=$Annee."-".$Mois."-".$Jour;
				$Image = $_FILES["Image"]["name"];
				$IdUtilisateur=$_SESSION['IdUtilisateur'];
			
				require_once("BDD/connexion.php");
				$rechSld=mysql_query("SELECT * FROM BANQUES WHERE BANQUES.IdBanque='$IdBanque'");
					 
						$AncSld=mysql_fetch_array($rechSld);
						$Nvlsld=$AncSld['SoldeBanque']; 
						$Nvlsld2=$Nvlsld - $MontantSortie;
					 if($Nvlsld2 > 0){ 
						$requete = mysql_query("INSERT INTO SortiesFondsBq values('\N','$DateSortie','$MontantSortie','$NumBord','$Image','$Motif','$IdBanque','$IdUtilisateur','$DateSortie','$IdUtilisateur')");
					 if($requete){
						 $sld=mysql_query("UPDATE BANQUES SET SoldeBanque='$Nvlsld2'");						 					
						 echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-ok'></span> La sortie en caisse du montant de  $MontantSortie a été enregistré(e) avec succès </div></div>";								 
					 }
					 else {
						echo "<br>";
						echo "<b>";
						echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-remove'></span>Echec d'enregistrement, vérifier les donnnées entrées! </div></div>";		
					}
				}
				else {
				echo "<br>";
				echo "<b>";
				echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<span class='glyphicon glyphicon-remove'></span>Impossible car le montant de sortie est supérieur au montant en caisse </div></div>";		
				}
			mysql_close();
		}		 

			else {
        echo "<br>";
        echo "<b>";
				echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<span class='glyphicon glyphicon-remove'></span>L'enregistrement du fichier a échoué </div></div>";
					
           }         
        } else {
			echo "<br>";
			echo "<b>";
			echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<span class='glyphicon glyphicon-remove'></span>Le fichier est trop grand </div></div>";		
        }
	}
    ?>
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
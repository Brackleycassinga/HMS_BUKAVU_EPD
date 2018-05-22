<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']=='LABORANTIN'){
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
				
				<?php require_once ("Ajout/menuLabo.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : CATEGORIES D'EXAMENS</small> 
				  <img src="IMA/labo.jpg" width="120px" height="80px" style="margin-right:20px; border-radius:20px"/><img src="IMA/16.jpg" width="120px" height="80px" />
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            AJOUT DES NOUVELLES CATEGORIES D'EXAMENS ET/OU TESTS
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       
										<label>Dénomination de la catégorie</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="Designation" placeholder="Exemple: BIOLOGIE" required >
                                        </div>									
                                            <center><button type="submit" class="btn btn-primary" name="Enregistrer"><span class="glyphicon glyphicon-floppy-disk"></span> Enregistrer la nouvelle catégorie </button></center>                                   									
                                </div>
							 </form>
					<br/>
							 
<?php
	if(isset($_POST['Enregistrer'])){
		
		$Designation=$_POST['Designation'];

			require_once("BDD/connect.php");
			$search=mysql_query("SELECT * FROM CategoriesExamens WHERE CategoriesExamens.DesignCategorie='".$Designation."'");
			
			if (mysql_num_rows($search)>0){
				$kap=mysql_fetch_array($search);
				$nom=$kap['DesignCategorie'];
				echo "<div class='col-lg-10'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <span class='glyphicon glyphicon-alert'></span>  Attention!!!, la catégorie ayant le même nom existe déjà !</div></div>";
			}
			else{
			$req="INSERT INTO CategoriesExamens VALUES('', '".$Designation."')";
				$result=mysql_query($req) or die(mysql_error());
					if (!$result){
						echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-remove'></span>Impossible d'enregistrement la catégorie, verifiez vos données. <br>".mysql_error()."</div></div>";
					}
					else{ 
						echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-ok'></span> &nbsp; Enregistrement effectué avec succès <br> Nouvelle catégorie d'examens ajoutée à la base de données </div></div>";
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
<?php
require_once "php/db_connect.php";
require_once "php/functions.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<title>Image filtering</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style.css">
	
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body onload="initialize();">
    
     <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="../">Portal</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="postcard.php">Picture Wall</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php">POST</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
	<div class="container">    
		<div class="row">
			<div id="formParent" class="col-md-6 col-md-offset-3">
				<form id="form" class="form-horizontal" method="post" action="postcard.php" enctype="multipart/form-data">
                    <h3>Post a Picture</h3>
                    <div class="form-group">
                        <label for="name" class="control-label col-xs-1">Name</label>
                        <div class="col-xs-11">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-user fa-fw"></span></span>
                                <input type="text" class="form-control" id="name" name="name" 
                            maxlength="20" size="20" value="" required placeholder="Johnny" autofocus>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="title" class="control-label col-xs-1">Title</label>
                        <div class="col-xs-11">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-header fa-fw"></span></span>
                                <input type="text" class="form-control" id="title" name="title" 
                            maxlength="20" size="20" value="" required placeholder="Summer Vacation" autofocus>
                            </div>
                        </div>
                    </div>
                      
                    <div class="form-group">
                        <label for="text" class="control-label col-xs-1">Text</label>
                        <div class="col-xs-11">
                            <textarea class="form-control" id="text" name="text" maxlength="140" placeholder="140 characters" required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="sr-only" for="image">Original Image</label>
                        <img id="image" name="image" src="users/nopicture.png" width="100%">
                        <input type="file" id="upload" name="upload" accept="image/*">
                    </div>
                    
                    
                    <div class="form-group">
                        <h3>Filter Photo</h3>
                        <div class="checkbox-inline">
                            <label for="myNostalgia">My Nostalgia</label>
                            <input type="radio" name="filter" id="1" value="1" onclick="applyMyNostalgiaFilter();">
                        </div>
                        <div class="checkbox-inline">
                            <label for="grayscale">Grayscale</label>
                            <input type="radio" name="filter" id="2" value="2" onclick="applyGrayscaleFilter();">
                        </div>
                        <div class="checkbox-inline">
                            <label for="grayscale">Sepia</label>
                            <input type="radio" name="filter" id="3" value="3" onclick="applySepiaFilter();">
                        </div>
                        
                        <div class="checkbox-inline">
                            <label for="grayscale">Sad Puppy</label>
                            <input type="radio" name="filter" id="4" value="4" onclick="applyHueFilter();">
                        </div>
                        
                        <div class="checkbox-inline">
                            <label for="grayscale">Invert</label>
                            <input type="radio" name="filter" id="5" value="5" onclick="applyInvertFilter();">
                        </div>
                        
                        <div class="checkbox-inline">
                            <label for="grayscale">Blur</label>
                            <input type="radio" name="filter" id="6" value="6" onclick="applyBlurFilter();">
                        </div>
                        
                        <div class="checkbox-inline">
                            <label for="original">Revert to Original</label>
                            <input type="radio" name="filter" id="lomo" value="lomo" onclick="revertToOriginal();">
                        </div>
                    </div>
                    </div>
                
                    
                    <div class="form-group">
                        <div class="row">
                               
                        </div>
                    </div>
                    <input type="submit" value="Post a picture" class="btn btn-primary col-md-offset-1">
				</form>
			</div>
		</div>
	</div>

    
    
	<!-- JavaScript placed at bottom for faster page loadtimes. -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	
	<script src="functions.js"></script>
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

    

</body>
</html>
<?php $db->close(); ?>
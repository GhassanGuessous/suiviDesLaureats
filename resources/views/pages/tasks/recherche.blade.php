<!DOCTYPE html>
<html>
<head>
	<title>{{$title}}</title>
        <link rel="stylesheet prefetch" href="assets/rechercheTemplate/css/style1.css">	            
		<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="assets/rechercheTemplate/css/style.css">
</head>
<body>
	<section>
        <div class="container">
            <div class="fun-cube"><i class="fa fa-cube"></i></div>
			<h1>Recherche par nom ou prénom d'utilisateur</h1>

			<div id="cuboid">
				<form>
					<!-- #1 hover button -->
					<div>
						<p class="cuboid-text">zone de recherche</p>
					</div>
					<!-- #2 text input -->
					<div>
						<!-- Label to trigger #submit -->
						<label for="submit" class="submit-icon">
							<i class="fa fa-chevron-right"></i>
						</label>
						<input type="text" id="email" class="cuboid-text" placeholder="utilisateur" autocomplete="off"/>
						<!-- hidden submit button -->
						<input type="submit" id="submit" />
					</div>
					<!-- #3 loading message -->
					<div>
						<p class="cuboid-text loader">Just a moment</p>
					</div>
					<!-- #4 success message -->
					<div>
						<!-- reset/retry button -->
						<span class="reset-icon"><i class="fa fa-refresh"></i></span>
						<p class="cuboid-text">le résultat s'affiche plus bas !</p>
					</div>
				</form>
			</div>
        </div><!--/.container-->
    </section><!--/#recherche-->

    <script src='assets/rechercheTemplate/js/index1.js'></script>
    <script src="assets/rechercheTemplate/js/index.js"></script>
</body>
</html>
    

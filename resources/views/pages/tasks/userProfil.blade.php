<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
     <!-- chargement de tempalte styles -->
    <link rel="stylesheet" href="assets/monProfilTemplate/css/style1.css">
    <link rel='stylesheet prefetch' href='assets/monProfilTemplate/css/style2.css'>
    <link rel="stylesheet" href="assets/monProfilTemplate/css/style3.css">
    <!-- end chargement de tempalte styles -->
    <!--  auth styles  -->
    <link rel="stylesheet" type="text/css" href="assets/css/mesStyles.css">
</head>
<body>
    <div class="container"><br><br> 
        <div class='box'>
            <div class='box-form'>
                <div class='box-login-tab'></div>
                <div class='box-login-title'>
                  <div class='i i-login'></div><h2>Profil</h2>
                </div>

                <div class='box-login'>
                  <div class='fieldset-body' id='login_form'>
                    <button onclick="openLoginInfo();" class='b b-form i i-more' title='Actions'></button>

                    <img src="assets/images/users/user.2.jpg" class="monProfilImg">

                    <p class='field'><label for='user'>nom prénom (25 ans)</label></p>
                    <p class='field'><label for='pass'>Lauréat G.INFO</label></p>
                    <p class='field'><label for='pass'>nomprenom@gmail.com</label></p>
                    <p class='field'><label for='pass'>Tel: 11.22.33.44.55</label></p>
                    <p class='field'><label for='pass'>Adresse XxXxX, ville</label></p>
                    <br><br>

                  </div>
                </div>
            </div>

            <div class='box-info'>
              <p><button onclick="closeLoginInfo();" class='b b-info i i-left' title='Back to Infos'></button><h3>Actions</h3></p>

                <div class='line-wh'></div>
                <button onclick="" class='b-support'>Voir le CV</button>
                <button onclick="" class='b-support'>Contacter</button>
                <div class='line-wh'></div>
            </div>
        </div>
    </div><!--/.container-->
    

    <!-- chargement de tempalte scripts -->
    <script src='assets/monProfilTemplate/js/index1.js'></script>
    <script src='assets/monProfilTemplate/js/index2.js'></script>
    <script src="assets/monProfilTemplate/js/index3.js"></script>
    <!-- end chargement de tempalte scripts -->
</body>
</html>
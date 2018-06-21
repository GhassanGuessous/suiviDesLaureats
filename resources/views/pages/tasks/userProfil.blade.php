<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
     <!-- chargement de tempalte styles -->
    <link rel="stylesheet" href="../assets/monProfilTemplate/css/style1.css">
    <link rel='stylesheet prefetch' href='../assets/monProfilTemplate/css/style2.css'>
    <link rel="stylesheet" href="../assets/monProfilTemplate/css/style3.css">
    <!-- end chargement de tempalte styles -->
    <!--  auth styles  -->
    <link rel="stylesheet" type="text/css" href="../assets/css/mesStyles.css">
    <style type="text/css">
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 45%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .inputDiv{
            width: 500px;
        }
        .txtZone{         
           margin-bottom: 20px;   
        }
        </style>
    </style>
    <link rel="stylesheet" type="text/css" href="../assets/sweetAlert/sweetalert.min.css">
    <script src="../assets/sweetAlert/sweetalert.min.js"></script>
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

                    <img src="../assets/images/users/user.2.jpg" class="monProfilImg">

                    <p class='field'><label for='user'>{{$targetUser[0]->nom}} {{$targetUser[0]->prenom}} ({{$age}} ans)</label></p>
                    <p class='field'><label for='pass'>{{$targetUser[0]->libelle}} {{$targetUser[0]->filiereName}}</label></p>
                    <p class='field'><label for='pass'>{{$targetUser[0]->email}}</label></p>
                    <p class='field'><label for='pass'>Tel: 11.22.33.44.55</label></p>
                    <p class='field'><label for='pass'>Nombre publications : {{$nombrePubs}}</label></p>
                    <br><br>

                  </div>
                </div>
            </div>

            <div class='box-info'>
              <p><button onclick="closeLoginInfo();" class='b b-info i i-left' title='Back to Infos'></button><h3>Actions</h3></p>

                <div class='line-wh'></div>

                <button onclick="window.open('../documents_cvs/cvExmplaire.pdf'); return true;" class='b-support'>Voir le CV</button>
                <button id="myBtn" class='b-support'>Contacter</button>
                <div class='line-wh'></div>
            </div>
        </div>
    </div><!--/.container-->
    

    <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <p>Envoi de mail..</p><br>

        <form action="/contact" method="POST">
            {{ csrf_field() }}
            <label>Objet</label>
            <div class="inputDiv">
                <input type="text" name="objet" class="txtZone" />
            </div>
            <br/><br/>

            <label>Message</label>
            <textarea name="message" rows="5" cols="65" ></textarea>

            <input type="Hidden" name="from" value="{{$targetUser[0]->nom}} {{$targetUser[0]->prenom}}" />
            <input type="Hidden" name="mailAdresse" value="{{$targetUser[0]->email}}" />
            <input type="Hidden" name="idProfil" value="{{$idProfil}}" />

            <br>
            <button type="submit" class='b-support' style="width: 100px;">Envoyer</button>
        </form>
      </div>

    </div>


    @if ($etat == 'done')
        <script type="text/javascript">
            swal("l'email a été envoyé", "Alumni ENSA Safi", "success");
        </script>
    @elseif ($etat == 'erreur')
        <script type="text/javascript">
            swal("erreur de connexion", "réessayer plus tard", "error");
        </script>
    @endif


    <!-- chargement de tempalte scripts -->
    <script src='../assets/monProfilTemplate/js/index1.js'></script>
    <script src='../assets/monProfilTemplate/js/index2.js'></script>
    <script src="../assets/monProfilTemplate/js/index3.js"></script>
    <!-- end chargement de tempalte scripts -->
    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>

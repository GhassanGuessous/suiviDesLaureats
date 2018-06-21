<br><br>

    <section id="monProfil">
        <div class="container"><br><br>

            <!-- chargement de tempalte styles -->
            <link rel="stylesheet" href="assets/monProfilTemplate/css/style1.css">
            <link rel='stylesheet prefetch' href='assets/monProfilTemplate/css/style2.css'>
            <link rel="stylesheet" href="assets/monProfilTemplate/css/style3.css">
            <!-- end chargement de tempalte styles -->
            
            <!--  auth styles  -->
            <link rel="stylesheet" type="text/css" href="assets/css/mesStyles.css">
            <link rel="stylesheet" type="text/css" href="assets/sweetAlert/sweetalert.min.css">
            <script src="assets/sweetAlert/sweetalert.min.js"></script>


            <div class='box'>
                <div class='box-form'>
                    <div class='box-login-tab'></div>
                    <div class='box-login-title'>
                      <div class='i i-login'></div><h2>Mon.Profil</h2>
                    </div>

                    <div class='box-login'>
                      <div class='fieldset-body' id='login_form'>
                        <button onclick="openLoginInfo();" class='b b-form i i-more' title='Authentification.Infos'></button>

                        <img src="assets/images/users/{{strtoupper($targetUser[0]->url_photo)}}" class="monProfilImg">

                        <p class='field'><label for='user'>{{strtoupper($targetUser[0]->nom)}} {{ucfirst($targetUser[0]->prenom)}} ({{$age}} ans)</label></p>
                        <p class='field'><label for='pass'>{{$description}}</label></p>
                        <p class='field'><label for='pass'>{{$targetUser[0]->email}}</label></p>
                        <p class='field'><label for='pass'>Tel: 11.22.33.44.55</label></p>
                        <p class='field'><label for='pass'>Nombre publication : {{$nombrePubs}}</label></p>

                            <input type='submit' id='myBtn' value='M O D I F I E R' />
                      </div>
                    </div>
                </div>

                <div class='box-info'>
                  <p><button onclick="closeLoginInfo();" class='b b-info i i-left' title='Back to Infos'></button><h3>Authentification.Infos</h3></p>

                    <div class='line-wh'></div>
                    <button id="myBtnAuth" class='b-support'>Modifier infos d'auth</button>
                    <button id="myBtnCV" class='b-support'>Ajouter votre CV</button>
                    <!--<button onclick="" class='b-support'>Changement de Statut</button>-->
                    <div class='line-wh'></div>
                    <!--<button id="" class='b-cta'>MODIFIER</button>-->
                </div>
            </div>



            <!-- chargement de tempalte scripts -->
            <script src='assets/monProfilTemplate/js/index1.js'></script>
            <script src='assets/monProfilTemplate/js/index2.js'></script>
            <script src="assets/monProfilTemplate/js/index3.js"></script>
            <!-- end chargement de tempalte scripts -->

        </div><!--/.container-->
    </section><!--/#publication-->
    <br/><br/><br/>



    <!-- modification infos modal -->
    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <p>Modifier vous infos</p><br>

        <form action="/modifierInfos" method="POST">
            {{ csrf_field() }}
            <label>Nom</label>
            <div class="inputDiv">
                <input type="text" name="nom" class="txtZone" value="{{$targetUser[0]->nom}}" required />
            </div>
            <br/><br/>
            <label>Prénom</label>
            <div class="inputDiv">
                <input type="text" name="prenom" class="txtZone" value="{{$targetUser[0]->prenom}}" required />
            </div>
            <label>CNE</label>
            <div class="inputDiv">
                <input type="text" name="cne" class="txtZone" value="{{$targetUser[0]->cne}}" required />
            </div>
            <label>Date Naissance</label>
            <div class="inputDiv">
                <input type="text" name="dateNaissance" class="txtZone" value="{{$targetUser[0]->date_naissance}}" required placeholder="YYYY-MM-DD HH:mm:ss" />
            </div>
            <input type="Hidden" name="idUserToAlter" value="{{$targetUser[0]->id}}" />
            <br>
            <button type="submit" class='b-support' style="width: 100px;">Envoyer</button>
        </form>
      </div>
    </div>


    <!-- modification infos auth -->
        <div id="modelAuth" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <p>Modifier vous infos d'authentification</p><br>

            <form action="/modifierInfosAuth" method="POST">
                {{ csrf_field() }}
                <label>Adresse mail</label>
                <div class="inputDiv">
                    <input type="text" name="email" class="txtZone" value="{{$targetUser[0]->email}}" required />
                </div>
                <br/><br/>
                <label>Nouveau mot de passe</label>
                <div class="inputDiv">
                    <input type="password" name="motdepasse" class="txtZone" value="" required minlength="8" />
                </div>
                <input type="Hidden" name="idUserToAlter" value="{{$targetUser[0]->id}}" />
                <br>
                <button type="submit" class='b-support' style="width: 100px;">Envoyer</button>
            </form>
          </div>
        </div>
    

    <!-- modification infos auth -->
    <div id="modelCV" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <p>Ajouter votre CV</p><br>

        <form action="/ajouterCV" method="POST" ENCTYPE="multipart/form-data">
            {{ csrf_field() }}
            <label>Document</label>
            <div class="inputDiv">
                <input type="file" name="documentCV" id="documentCV" class="txtZone" required />
            </div>
            <input type="Hidden" name="idUserToAlter" value="{{$targetUser[0]->id}}" />
            <br>
            <button type="submit" class='b-support' style="width: 100px;">Envoyer</button>
        </form>
      </div>
    </div>



    @if ($etat == 'done')
        <script type="text/javascript">
            swal("votre profil à bien été modifier", "Alumni ENSA Safi", "success");
        </script>
    @elseif ($etat == 'erreur')
        <script type="text/javascript">
            swal("erreur de connexion", "réessayer plus tard", "error");
        </script>
    @elseif ($etat == 'done auth')
        <script type="text/javascript">
            swal("votre infos d'authentification ont bien été modifié", "Alumni ENSA Safi", "success");
        </script>
    @elseif ($etat == 'done cv')
        <script type="text/javascript">
            swal("votre CV à bien été ajouté", "Alumni ENSA Safi", "success");
        </script>
    @endif


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
            width: 95%;
        }
        .txtZone{         
           margin-bottom: 20px;   
        }
    </style>

    <script>
        var modal = document.getElementById('myModal');
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];

        var modelAuth = document.getElementById('modelAuth');
        var btnAuth = document.getElementById("myBtnAuth");
        var spanAuth = document.getElementsByClassName("close")[1];
        
        var modelCV = document.getElementById('modelCV');
        var btnCV = document.getElementById("myBtnCV");
        var spanCV = document.getElementsByClassName("close")[2];


        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }

        btnAuth.onclick = function() {
            modelAuth.style.display = "block";
        }
        spanAuth.onclick = function() {
            modelAuth.style.display = "none";
        }

        btnCV.onclick = function() {
            modelCV.style.display = "block";
        }
        spanCV.onclick = function() {
            modelCV.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            else if (event.target == modelAuth) {
                modelAuth.style.display = "none";
            }
            else if (event.target == modelCV) {
                modelCV.style.display = "none";
            }
        }
    </script>
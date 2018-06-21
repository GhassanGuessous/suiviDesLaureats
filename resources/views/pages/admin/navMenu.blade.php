      <!--  MAIN SIDEBAR MENU -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><img src="assets/images/users/{{ $photo }}" class="img-circle" width="60"></p>
              	  <h5 class="centered">{{ $nom_admin }}</h5>
              	  	
                  <li class="mt">
                      <a>
                          <i class="fa fa-dashboard"></i>
                          <span>Tableau de bord</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/admin?targetView=validerInscriptions" >
                          <i class="fa fa-desktop"></i>
                          <span>Nouvelles Inscriptions</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="?targetView=activerDesactiverCompte" >
                          <i class="fa fa-cogs"></i>
                          <span>Activer/désactiver comptes</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="?targetView=validerPublications" >
                          <i class="fa fa-book"></i>
                          <span>Valider les publications</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="?targetView=chengementStatut" >
                          <i class="fa fa-tasks"></i>
                          <span>Changement de statut</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="deconnexion" >
                          <i class="fa fa-tasks"></i>
                          <span>Déconnexion</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
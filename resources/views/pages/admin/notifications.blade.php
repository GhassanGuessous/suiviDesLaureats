<!-- MAIN CONTENT  -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">                  
                  	<div class="row mtbox">

                  		<div class="col-md-2 col-sm-2 col-md-offset-2 box0">
                  			<div class="box1">
        					  			<span class="li_news"></span>
        					  			<h3>{{$data_notif['nbrNewInsc'][0]->nbr}}</h3>
                        </div>
        					  			<p>{{$data_notif['nbrNewInsc'][0]->nbr}} nouvelles inscriptions n'a pas encors évaluées </p>
                  		</div>

                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
        					  			<span class="li_stack"></span>
        					  			<h3>{{$data_notif['nbrComptesDesactives'][0]->nbr}}</h3>
                          			</div>
        					  			<p>{{$data_notif['nbrComptesDesactives'][0]->nbr}} comptes sont désactiver !</p>
                  		</div>

                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
        					  			<span class="li_news"></span>
        					  			<h3>{{$data_notif['nbrPubAEvaluer'][0]->nbr}}</h3>
                          			</div>
        					  			<p>{{$data_notif['nbrPubAEvaluer'][0]->nbr}} nouvelles publications n'a pas encors évaluées !</p>
                  		</div>

                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
        					  			<span class="li_data"></span>
        					  			<h3>{{$data_notif['nbrDemandesChgt'][0]->nbr}}</h3>
                        </div>
        					  			<p>{{$data_notif['nbrDemandesChgt'][0]->nbr}} demander de changement de status !</p>
                  		</div>
                  	
                  	</div><!-- /row mt -->	                            
                      
                  </div><!-- /col-lg-3 -->
              </div><!-- /row -->
          </section>
      </section>

      <!--main content end-->

	<br/><br/><br/><br/><br/><br/><br/><br/><br/>

	<section id="inscription" >
        <div class="container">
 
 			<div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Création d'un Compte Utilisateur</h2>
            </div>
            
            @if 	($targetView == 'etudiant')		@include('pages/tasks/inscriptionForms/etudiant')
            @elseif ($targetView == 'laureat')		@include('pages/tasks/inscriptionForms/etudiant')
            @elseif ($targetView == 'enseignant')	@include('pages/tasks/inscriptionForms/enseignant')
            @else

            <div class="container" style="margin-top:100px;">
	        	<form class="form-horizontal" method="POST" action="inscription">
	         		<fieldset><center>	
			            <div class="col-md-4">
							<input type="submit" name="targetView" value="Etudiant" class="mesStyles btnOne"/>	
						</div>
						 <div class="col-md-4">
							<input type="submit" name="targetView" value="Enseignant" class="mesStyles btnTwo"/>
						</div>	  
						<div class="col-md-4">
							<input type="submit" name="targetView" value="Laureat" class="mesStyles btnOne"/>	
						</div>	
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
	          		</center></fieldset>
	        	</form>
	      	</div>	      	
    		<br/><br/><br/><br/><br/><br/><br/><br/><br/>
    
            @endif
    		
        </div>
    </section>

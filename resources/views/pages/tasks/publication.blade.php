 <span id="publier"></span><br/><br/><br/><br/><br/><br/>

    <section  class="publierSection">
        <div class="container">            

            <link rel="stylesheet" href="assets/publicationTemplate/css/pubTemplateCssTwo.css">
            <link rel="stylesheet" href="assets/publicationTemplate/css/pubTemplateCssOne.css">
            
            <div id="stage" class="stage"></div>
            
            <script src='assets/publicationTemplate/js/pubTemplateJsTwo.min.js'></script>
            <script src="assets/publicationTemplate/js/pubTemplateJsOne.js"></script>

    
		    @if ($etat == 'done')
		        <script type="text/javascript">
		            swal("votre publication à été enregistre", "attendre que l'administrateur lui validé", "success");
		        </script>
		    @elseif ($etat == 'erreur')
		        <script type="text/javascript">
		            swal("erreur de connexion", "réessayer plus tard", "error");
		        </script>
		    @endif

        </div><!--/.container-->
    </section><!--/#publication-->
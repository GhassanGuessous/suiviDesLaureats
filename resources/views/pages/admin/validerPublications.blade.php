<section id="main-content">
    <section class="wrapper">
        <div class="row">

            <div class="col-lg-12 main-chart">                  
                <div class="row mtbox">
                    <div class="col-md-12 col-sm-12 col-md-offset-0">                        
                        <center><h2>VALIDER LES PUBLICATIONS</h2></center>    
                        <br/><br/><br/>
                    </div>

                    <div class="col-md-10 col-sm-12 col-md-offset-1">                        
                        <table class="table">
                            <tr>
                                <th>Prénom & Nom</th>
                                <th>statut</th>
                                <th>Publication Contenu</th>
                                <th>Actions</th>
                            </tr>
                            <tr>
                                <td>prenom1 nom 1</td>
                                <td>Etudiant</td>
                                <td>txt txt txt txt</td>
                                <td>
                                    <button class="btn btn-success">Valider</button>
                                    <button class="btn btn-danger">Retirer</button>
                                </td>
                            </tr>
                            <tr>
                                <td>prenom2 nom 2</td>
                                <td>Etudiant</td>
                                 <td>txt--txt</td>
                                <td>
                                    <button class="btn btn-success">Valider</button>
                                    <button class="btn btn-danger">Retirer</button>
                                </td>
                            </tr>
                        </table> 
                        <br/><br/><br/>
                    </div>
                </div>    
            </div>
        </div>  
    </section><!--/#validerInscriptions-->
</section>

<script type="text/javascript">
    $('.bordered tr').mouseover(function(){
        $(this).addClass('highlight');
    }).mouseout(function(){
        $(this).removeClass('highlight');
    });

    $(".zebra tbody tr:even").addClass('alternate');

</script>
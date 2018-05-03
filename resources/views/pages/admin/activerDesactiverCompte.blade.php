<section id="main-content">
    <section class="wrapper">
        <div class="row">

            <div class="col-lg-12 main-chart">                  
                <div class="row mtbox">
                    <div class="col-md-12 col-sm-12 col-md-offset-0">                        
                        <center><h2>ACTIVER / DESACTIVER COMPTES</h2></center>    
                        <br/><br/><br/>
                    </div>

                    <div class="col-md-10 col-sm-12 col-md-offset-1">                        
                        <table class="table">
                            <tr>
                                <th>Utilisateur</th>
                                <th>statut</th>
                                <th>Actions</th>
                            </tr>
                            <tr>
                                <td>prenom1 nom 1</td>
                                <td>Etudiant</td>
                                <td>
                                    <button class="btn btn-success">Activer</button>
                                </td>
                            </tr>
                            <tr>
                                <td>prenom2 nom 2</td>
                                <td>Etudiant</td>
                                <td>
                                    <button class="btn btn-danger">Desactiver</button>
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
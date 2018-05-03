<section id="main-content">
    <section class="wrapper">
        <div class="row">

            <div class="col-lg-12 main-chart">                  
                <div class="row mtbox">
                    <div class="col-md-12 col-sm-12 col-md-offset-0">                        
                        <center><h2>CHANGEMENT DE STATUT</h2></center>    
                        <br/><br/><br/>
                    </div>

                    <div class="col-md-10 col-sm-12 col-md-offset-1">                        
                        <table class="table">
                            <tr>
                                <th>CNE</th>
                                <th>CIN</th>
                                <th>Prénom & Nom</th>
                                <th>statut actuel</th>
                                <th>Nouveau statut</th>
                                <th>Actions</th>
                            </tr>
                            <tr>
                                <td>1412000001</td>
                                <td>JA000001</td>
                                <td>prenom1 nom 1</td>
                                <td>Etudiant</td>
                                <td>Lauréat</td>
                                <td>
                                    <button class="btn btn-success">Accepter</button>
                                    <button class="btn btn-danger">Refuser</button>
                                </td>
                            </tr>
                            <tr>
                                <td>1412000002</td>
                                <td>JA000002</td>
                                <td>prenom2 nom 2</td>
                                <td>Etudiant</td>
                                <td>Lauréat</td>
                                <td>
                                    <button class="btn btn-success">Accepter</button>
                                    <button class="btn btn-danger">Refuser</button>
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
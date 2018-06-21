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
                            @foreach($params[0] as $pub)
                            <tr>
                                <td>{{ $pub->prenom }} {{ $pub->nom }}</td>
                                <td>{{ $pub->libelle }}</td>
                                <td>{{ $pub->contenu }}</td>
                                <td>
                                    <form methode="" action="">
                                        <input type="submit" class="btn btn-success" value="Accepter"/>
                                        <input type="submit" class="btn btn-danger" value="Refuser"/>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
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
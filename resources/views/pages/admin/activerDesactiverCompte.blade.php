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
                                <th>Statut</th>
                                <th>Etat du compte</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($params[0] as $compte)
                            <tr>
                                <td>{{ $compte->prenom }} {{ $compte->nom }}</td>
                                <td>{{ $compte->libelle }}</td>
                                @if($compte->etat_compte == 1)
                                    <td>Débloqué</td>
                                @else
                                    <td>Bloqué</td>
                                @endif
                                <td>
                                    <form methode="" action="">
                                        <input type="submit" class="btn btn-success" value="Bloquer"/>
                                        <input type="submit" class="btn btn-danger" value="Débloquer"/>
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
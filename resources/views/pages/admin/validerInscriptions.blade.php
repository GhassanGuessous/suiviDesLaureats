<section id="main-content">
    <section class="wrapper">
        <div class="row">

            <div class="col-lg-12 main-chart">                  
                <div class="row mtbox">
                    <div class="col-md-12 col-sm-12 col-md-offset-0">                        
                        <center><h2>VALIDER LES INSCRIPTIONS</h2></center>    
                        <br/><br/><br/>
                    </div>

                    <div class="col-md-10 col-sm-12 col-md-offset-1">                        
                        <table class="table">
                            <tr>
                                <th>CNE</th>
                                <th>CIN</th>
                                <th>Prénom & Nom</th>
                                <th>Statut</th>
                                <th>Etat</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($params[0] as $insc)
                            <tr>
                                @if($insc->status_id == 3)
                                    <td>----</td>
                                @else
                                    <td>{{ $insc->cne }}</td>
                                @endif
                                <td>{{ $insc->id }}</td>
                                <td>{{ $insc->prenom }} {{ $insc->nom }}</td>
                                <td>{{ $insc->libelle }}</td>
                                @if($insc->etat == 0)
                                    <td>En attente</td>
                                @elseif($insc->etat == 1)
                                    <td>Acceptée</td>
                                @else
                                    <td>Refusée</td>
                                @endif
                                <td>
                                    <form method="post" action="/admin/evaluerInscription">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <input type="hidden" name="idUser" value="{{$insc->id}}">
                                        <input type="submit" name="accepter" class="btn btn-success" value="Accepter"/>
                                        <input type="submit" name="refuser" class="btn btn-danger" value="Refuser"/>
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
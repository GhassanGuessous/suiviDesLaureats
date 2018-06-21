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
                                <th>Prénom & Nom</th>
                                <th>Statut</th>
                                <th>Date d'envoie</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($params[0] as $chgt)
                            <tr>
                                <td>{{ $chgt->cne }}</td>
                                <td>{{ $chgt->prenom }} {{ $chgt->nom }}</td>
                                <td>{{ $chgt->libelle }}</td>
                                <td>{{ $chgt->date }}</td>
                                <td>
                                    <form method="post" action="/admin/evaluerDemandes">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <input type="hidden" name="idDemande" value="{{$chgt->id}}">
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
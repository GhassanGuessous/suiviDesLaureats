<br><br>

    <section id="nouveautes" class="publicationsBackgroundColor">
        <div class="container"><br><br>

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Nouveautés</h2>
                <p class="text-center wow fadeInDown NewColor">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>


            @foreach ($allPublications as $item)
                <div class="row">
                    <div class="col-md-2 offset-md-3"></div>
                    <div class="col-md-7 offset-md-3">
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="assets/images/users/user.1.jpg" class="publicationImg">
                                            </div>
                                            <div class="col-md-10 publicationUserInfoDiv">
                                                <a href="/profil" target="_blanck"><span class="PublicationUserName">{{$item->nom}}.{{$item->prenom}}</span></a>
                                                <span class="PublicationUserStatut">{{$item->libelle}} {{$item->promo}} {{$item->fillereName}}</span>   
                                                <span class="PublicationUserStatut" style="float: right;">{{$item->date}}</span>  
                                            </div>
                                        </div>                                    
                                    </div><!--end user-infos-->

                                    <div class="panel-body">                               
                                        <div class="row">  
                                            <div class="col-md-2"></div>
                                            <div class="col-md-10 publicationContent">
                                                {{$item->contenu}}
                                            </div>
                                        </div>
                                    </div><!--end panel-Body-->

                                    <div class="panel-footer publicationFooter">
                                        @foreach ($allLikes as $likeItem)
                                            @if ($likeItem->id_publication == $item->id && $likeItem->id_user == $_SESSION['currentUser']['id'])  
                                                <a href="/dislikedPublication/{{$item->id}}" class="publicationLike">J'aime</a>
                                                @php $found = 'true' @endphp
                                            @endif
                                        @endforeach
                                        @if ($found == 'false')
                                            <a  href="/likedPublication/{{$item->id}}" class="publicationDislike">J'aime</a>
                                        @else
                                            @php $found = 'false' @endphp
                                        @endif
                                        <span class="publicationNbrLikes">
                                            <i class="glyphicon glyphicon-heart"></i> <span class="nbrLikes">({{$item->nombreJaime}})</span>
                                        </span>
                                   </div><!--end publication-footer-->    
                                </div><!--end panel-->
                            </div>
                        </div><!--end row-content-->
                    </div> 
                </div><!--/row-->            
            @endforeach




            <br/><br/>
        </div><!--/.container-->
    </section><!--/#publication-->
    <br/><br/><br/>
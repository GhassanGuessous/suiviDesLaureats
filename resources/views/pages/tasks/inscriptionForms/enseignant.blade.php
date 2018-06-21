<br><br>

			<div class="row">
				<div class="col-md-3 offset-md-3"></div>
				<div class="col-md-6 offset-md-3">
		    		<div class="row justify-content-center">
		    			<div class="col-4">

					      	<div class="panel panel-success">
							  <div class="panel-heading">Formulaire d'inscription pour les enseignants</div>
							  <div class="panel-body">
							   
							  <form action="inscrireEnseignant" method="POST" id="formInscrireEnseignant" ENCTYPE="multipart/form-data">
								  <input type="hidden" name="_token" value="{!! csrf_token() !!}">

									<div class="row">
											<label class="col-md-12 control-label" for="sms">Nom</label>
											<div class="col-md-12">
												<div class="input-group">
													<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
													</span>
													<input type="text" id="nom" name="nom" class="form-control" />
												</div>
											</div>
										</div>

										<div class="row">
											<label class="col-md-12 control-label" for="sms">Prenom</label>
											<div class="col-md-12">
												<div class="input-group">
													<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
													</span>
													<input type="text" id="prenom" name="prenom" class="form-control" />
												</div>
											</div>
										</div>

										<div class="row">
											<label class="col-md-12 control-label" for="sms">Email</label>
											<div class="col-md-12">
												<div class="input-group">
													<span class="input-group-addon">
													<i class="glyphicon glyphicon-envelope"></i>
													</span>
													<input type="text" id="email" name="email" class="form-control" />
												</div>
											</div>
										</div>
										
										<div class="row">
											<label class="col-md-12 control-label" for="sms">Login</label>
											<div class="col-md-12">
												<div class="input-group">
													<span class="input-group-addon">
													<i class="glyphicon glyphicon-log-in"></i>
													</span>
													<input type="text" id="login" name="login" class="form-control" />
												</div>
											</div>
										</div>

										<div class="row">			
											<label class="col-md-12 control-label" for="sms">Password</label>
											<div class="col-md-12">
												<div class="input-group">
													<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
													</span>
													<input type="password" id="pass" name="pass" class="form-control" />
												</div>
											</div>
										</div>

										<div class="row">			
											<label class="col-md-12 control-label" for="sms">Confirmer Password</label>
											<div class="col-md-12">
												<div class="input-group">
													<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
													</span>
													<input type="password" id="passConfirm" name="passConfirm" class="form-control" />
												</div>
											</div>
										</div>

										<div class="row">
											<label class="col-md-12 control-label" for="sms">Photo</label>
											<div class="col-md-12">
												<div class="input-group">
													<span class="input-group-addon">
													<i class="glyphicon glyphicon-list"></i>
													</span>
													<input type="file" class="custom-file-input" id="photo" name="photo">
												</div>
											</div>           
										</div>

										<div class="row" style="margin-top : 10px">
											<div class="col-md-12">
												<div class="input-group">
													<input type="submit" class="btn btn-primary" name="submit"/>
													<input type="reset" class="btn btn-primary" name="cancel"/>
												</div>
											</div>
										</div>
									</form>

							  </div>
							</div><!-- end panel -->

						</div>
					</div>
				</div>	
			</div>

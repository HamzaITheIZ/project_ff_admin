<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Login</title>
    </head>
    <body>
        <div>
            <br>
            <br>
           
        </div>
        <div class="card mx-auto border-0" style="width: 20rem;">
		  <img class="card-img-top mx-auto" style="width:60%;margin-top:5%; " src="./icons/user.png" alt="Login Icon">
		  <div class="card-body">
		    <form id="form_login" onsubmit="return false">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" name="log_email" id="log_email" placeholder="Entrer Votre Email">
			    <small id="e_error" class="form-text text-muted"></small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Mot de passe</label>
			    <input type="password" class="form-control" name="log_password" id="log_password" placeholder="Entre Le Mot de Passe">
			  	<small id="p_error" class="form-text text-muted"></small>
			  </div>
			  <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>Connexion</button>
			</form>
		    
		  </div>
		  <div class="card-footer border-0"><a href="#">Mot de passe oublié ?</a></div>
		</div>
    </body>
   

</html>

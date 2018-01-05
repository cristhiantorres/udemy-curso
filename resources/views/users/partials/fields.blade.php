<div class="form-group">

  <label for="inputName" class="col-sm-2 control-label">Nombre:</label>

  <div class="col-sm-10">

    <input type="text" name="name" id="inputName" class="form-control" value="{{ $user->name ? $user->name : old('name') }}" required="required">

  </div>

</div>

<div class="form-group">

  <label for="inputEmail" class="col-sm-2 control-label">Correo Electronico:</label>

  <div class="col-sm-10">

    <input type="email" name="email" id="inputEmail" class="form-control" value="{{ $user->email ? $user->email : old('email') }}" required="required">

  </div>

</div>

<div class="form-group">

  <label for="inputPassword" class="col-sm-2 control-label">Contrasena:</label>

  <div class="col-sm-10">

    <input type="password" name="password" id="inputPassword" class="form-control" required="required">

  </div>

</div>  


<div class="form-group">

  <div class="col-sm-10 col-sm-offset-2">

    <button type="submit" class="btn btn-primary">Enviar</button>

  </div>

</div>
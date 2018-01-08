<div class="form-group {{ $errors->has('name') ? 'has-error' : ' ' }}">

  <label for="inputName" class="col-sm-2 control-label">Nombre:</label>

  <div class="col-sm-10">

    <input type="text" name="name" id="inputName" class="form-control" value="{{ $user->name ? $user->name : old('name') }}">

    @if ($errors->has('name'))
    
    <span class="help-block">

      <strong>{{ $errors->first('name') }}</strong>

    </span>

    @endif

  </div>

</div>


<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

  <label for="inputEmail" class="col-sm-2 control-label">Correo Electronico:</label>
  
  <div class="col-sm-10">

    <input type="email" name="email" id="inputEmail" class="form-control" value="{{ $user->email ? $user->email : old('email')  }}">

    @if ($errors->has('email'))
    
    <span class="help-block">

      <strong>{{ $errors->first('email') }}</strong>

    </span>

    @endif

  </div>

</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">

  <label for="inputPassword" class="col-sm-2 control-label">Contrasena:</label>
  
  <div class="col-sm-10">

    <input type="password" name="password" id="inputPassword" class="form-control">

    @if ($errors->has('password'))
    
    <span class="help-block">

      <strong>{{ $errors->first('password') }}</strong>

    </span>

    @endif


  </div>

</div>
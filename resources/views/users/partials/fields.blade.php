<div class="form-group {{ $errors->has('name') ? 'has-error' : ' ' }}">

  <label for="inputName" class="col-sm-2 control-label">Nombre:</label>

  <div class="col-sm-10">

    <input type="text" name="name" id="inputName" class="form-control" value="{{ $user->name ?? old('name') }}">

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

    <input type="email" name="email" id="inputEmail" class="form-control" value="{{ $user->email ?? old('email')  }}">

    @if ($errors->has('email'))
    
    <span class="help-block">

      <strong>{{ $errors->first('email') }}</strong>

    </span>

    @endif

  </div>

</div>

@unless ($user->id)

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


<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">

  <label for="inputConfirmPassword" class="col-sm-2 control-label">Confirmar Contrasena:</label>
  
  <div class="col-sm-10">

    <input type="password" name="password_confirmation" id="inputConfirmPassword" class="form-control">

    @if ($errors->has('password_confirmation'))
    
    <span class="help-block">

      <strong>{{ $errors->first('password_confirmation') }}</strong>

    </span>

    @endif

  </div>

</div>


@endunless

<div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}"">

  <div class="col-sm-10 col-sm-offset-2">

    <div class="checkbox">

      @foreach ($roles as $id => $name)

      <label>

        <input 
        type="checkbox" 

        name="roles[]"

        {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}

        value="{{ $id }}"> 

        {{ $name }}

      </label>

      @endforeach


    </div>

    @if ($errors->has('roles'))
    
    <span class="help-block">

      <strong>{{ $errors->first('roles') }}</strong>

    </span>

    @endif
    
  </div>

</div>


<div class="form-group">

  <div class="col-sm-10 col-sm-offset-2">

    <button type="submit" class="btn btn-primary">Crear</button>

  </div>

</div>
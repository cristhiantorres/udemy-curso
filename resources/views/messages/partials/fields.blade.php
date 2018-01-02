<div class="form-group {{ $errors->has('name') ? 'has-error' : ' ' }}">

  <label for="inputName" class="col-sm-2 control-label">Nombre:</label>

  <div class="col-sm-10">

    <input type="text" name="name" id="inputName" class="form-control" value="{{ $message->name ? $message->name : old('name')  }}" required="required">

    @if ($errors->has('name'))
    
    <span class="help-block">
      
      <strong>{{ $errors->first('name') }}</strong>
      
    </span>

    @endif

  </div>
  

</div>


<div class="form-group {{ $errors->has('email') ? 'has-error' : ' ' }}">

  <label for="inputEmail" class="col-sm-2 control-label">Correo Electronico:</label>

  <div class="col-sm-10">

    <input type="email" name="email" id="inputEmail" class="form-control" value="{{ $message->email ? $message->email : old('email')  }}" required="required">

    @if ($errors->has('email'))
    
    <span class="help-block">

      <strong>{{ $errors->first('email') }}</strong>

    </span>

    @endif

  </div>


</div>


<div class="form-group {{ $errors->has('text') ? 'has-error' : ' ' }}">

  <label for="textareaText" class="col-sm-2 control-label">Mensaje:</label>

  <div class="col-sm-10">

    <textarea name="text" id="textareaText" class="form-control" rows="3" required="required">{{ $message->text ? $message->text : old('text') }}</textarea>

    @if ($errors->has('text'))
    
    <span class="help-block">

      <strong>{{ $errors->first('text') }}</strong>

    </span>

    @endif
    
  </div>


</div>


<div class="form-group">

  <div class="col-sm-10 col-sm-offset-2">

    <button type="submit" class="btn btn-primary">Enviar</button>

  </div>

</div>
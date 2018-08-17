@extends('layouts.backend.index')

@section('content')

<div class="content" >
  <div class="container-fluid"">
    <div class="row">
      @include('include.mensajes')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">Cambio de Contraseña</h4>
                    <p class="category">Cambio de Contraseña para el ingreso al Sistema.</p>
                </div>
                <div class="card-content">
                    <div class="col-md-5 col-md-offset-3"> 
                        <form action="{{route('config.updatepass')}}"  method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group {{ $errors->has('rut') ? ' has-error' : '' }}"> 
                                <label for="pass1" class="form-control">Nueva Clave</label>
                                <input type="text" class="form-control" id="pass1" name="pass1" maxlength="10">
                                @if ($errors->has('pass1'))
                                <span class="help-block">
                                   <strong>{{ $errors->first('pass1', 'Ingrese una Contraseña Válida') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('rut') ? ' has-error' : '' }}"> 
                                <label for="pass2" class="form-control">Nueva Clave</label>
                                <input type="text" class="form-control" id="pass2" name="pass2" maxlength="10">
                                @if ($errors->has('pass1'))
                                <span class="help-block">
                                   <strong>{{ $errors->first('pass2', 'Ingrese una Contraseña Válida') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                               <button type="submit" class="btn btn-primary pull-left">Actualizar</button>
                               <button type="button" class="btn btn-secondary pull-left">Cancelar</button> 
                            </div>
                        </form>
                    </div>
                </div>                    
            </div>
        </div>
    </div>
</div>
  <!-- /.col-md-5 -->

@endsection
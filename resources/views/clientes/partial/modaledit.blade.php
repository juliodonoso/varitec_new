<div class="modal fade" id="editcli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Editar Cliente</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
      <div class="modal-body">
          <form id="formEditCli" role="" action="" method="post">
              {{csrf_field()}}
             <input type="hidden" name="_method" value="PUT">
             <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                   <div class="form-group {{ $errors->has('clRut') ? ' has-error' : '' }}">
                        <label class="form-control" for="clRut">Rut</label>
                        <input type="text" class="form-control" id="rut" maxlength="9" name="clRut" required>
                       @if ($errors->has('clRut'))
                        <span class="help-block">
                           <strong>{{ $errors->first('clRut', 'Ingrese un Rut Válido') }}</strong>
                        </span>
                       @endif
                   </div>  

                   <div class="form-group {{ $errors->has('clNombre') ? ' has-error' : '' }}">
                        <label class="form-control" for="clNombre">Nombre</label>
                        <input type="text" class="form-control" id="name" maxlength="50" name="clNombre" required>
                       @if ($errors->has('clNombre'))
                        <span class="help-block">
                           <strong>{{ $errors->first('clNombre', 'Ingrese un Nombre Válido') }}</strong>
                        </span>
                       @endif
                   </div>  

                   <div class="form-group {{ $errors->has('clDireccion') ? ' has-error' : '' }}">
                        <label class="form-control" for="clDireccion">Direccion</label>
                        <input type="text" class="form-control" id="dir" maxlength="25" name="clDireccion" required>
                       @if ($errors->has('clDireccion'))
                        <span class="help-block">
                           <strong>{{ $errors->first('clDireccion', 'Ingrese una Direccion Válida') }}</strong>
                        </span>
                       @endif
                   </div>    

                   <div class="form-group {{ $errors->has('clComuna') ? ' has-error' : '' }}">
                        <label class="form-control" for="clComuna">Comuna</label>
                        <input type="text" class="form-control" id="com" maxlength="20" name="clComuna" required>
                       @if ($errors->has('clComuna'))
                        <span class="help-block">
                           <strong>{{ $errors->first('clComuna', 'Ingrese una Comuna Válida') }}</strong>
                        </span>
                       @endif
                   </div>    

                   <div class="form-group {{ $errors->has('clCiudad') ? ' has-error' : '' }}">
                        <label class="form-control" for="clCiudad">Ciudad</label>
                        <input type="text" class="form-control" id="ciu" maxlength="15" name="clCiudad" required>
                       @if ($errors->has('clCiudad'))
                        <span class="help-block">
                           <strong>{{ $errors->first('clCiudad', 'Ingrese una Ciudad Válida') }}</strong>
                        </span>
                       @endif
                   </div>                                                                                                

                   <div class="form-group {{ $errors->has('clTelefono') ? ' has-error' : '' }}">
                        <label class="form-control" for="clTelefono">Telefono</label>
                        <input type="text" class="form-control" id="tlf" maxlength="9" name="clTelefono" required>
                       @if ($errors->has('clTelefono'))
                        <span class="help-block">
                           <strong>{{ $errors->first('clTelefono', 'Ingrese un Telefono Válido') }}</strong>
                        </span>
                       @endif
                   </div>     

                   <div class="form-group {{ $errors->has('clEmail') ? ' has-error' : '' }}">
                        <label class="form-control" for="clEmail">E-mail</label>
                        <input type="text" class="form-control" id="mai" maxlength="25" name="clEmail" required>
                       @if ($errors->has('clEmail'))
                        <span class="help-block">
                           <strong>{{ $errors->first('clEmail', 'Ingrese un E-mail Válido') }}</strong>
                        </span>
                       @endif
                   </div>          

               <div class="modal-footer">   
                <button type="submit" class="btn btn-primary pull-left">Actualizar</button>
                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cancelar</button> 
               </div> 
          </form>
      </div>
  </div>
</div>


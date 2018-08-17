<div class="modal fade" id="editpro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Editar Bodega</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
      <div class="modal-body">
          <form id="formEditPro" role="" action="" method="post">
              {{csrf_field()}}
             <input type="hidden" name="_method" value="PUT">
             <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                   <div class="form-group {{ $errors->has('pvrut') ? ' has-error' : '' }}">
                        <label class="form-control" for="pvrut">Rut</label>
                        <input type="text" class="form-control" id="rut" maxlength="9" name="pvrut" required>
                       @if ($errors->has('pvrut'))
                        <span class="help-block">
                           <strong>{{ $errors->first('pvrut', 'Ingrese un Rut Válido') }}</strong>
                        </span>
                       @endif
                   </div>  

                   <div class="form-group {{ $errors->has('pvnombre') ? ' has-error' : '' }}">
                        <label class="form-control" for="pvnombre">Nombre</label>
                        <input type="text" class="form-control" id="name" maxlength="50" name="pvnombre" required>
                       @if ($errors->has('pvnombre'))
                        <span class="help-block">
                           <strong>{{ $errors->first('pvnombre', 'Ingrese un Nombre Válido') }}</strong>
                        </span>
                       @endif
                   </div>  

                   <div class="form-group {{ $errors->has('pvdireccion') ? ' has-error' : '' }}">
                        <label class="form-control" for="pvdireccion">Direccion</label>
                        <input type="text" class="form-control" id="dir" maxlength="25" name="pvdireccion" required>
                       @if ($errors->has('pvdireccion'))
                        <span class="help-block">
                           <strong>{{ $errors->first('pvdireccion', 'Ingrese una Direccion Válida') }}</strong>
                        </span>
                       @endif
                   </div>    

                   <div class="form-group {{ $errors->has('pvcomuna') ? ' has-error' : '' }}">
                        <label class="form-control" for="pvcomuna">Comuna</label>
                        <input type="text" class="form-control" id="com" maxlength="20" name="pvcomuna" required>
                       @if ($errors->has('pvcomuna'))
                        <span class="help-block">
                           <strong>{{ $errors->first('pvcomuna', 'Ingrese una Comuna Válida') }}</strong>
                        </span>
                       @endif
                   </div>    

                   <div class="form-group {{ $errors->has('pvciudad') ? ' has-error' : '' }}">
                        <label class="form-control" for="pvciudad">Ciudad</label>
                        <input type="text" class="form-control" id="ciu" maxlength="15" name="pvciudad" required>
                       @if ($errors->has('pvciudad'))
                        <span class="help-block">
                           <strong>{{ $errors->first('pvciudad', 'Ingrese una Ciudad Válida') }}</strong>
                        </span>
                       @endif
                   </div>                                                                                                

                   <div class="form-group {{ $errors->has('pvtelefono') ? ' has-error' : '' }}">
                        <label class="form-control" for="pvtelefono">Telefono</label>
                        <input type="text" class="form-control" id="tlf" maxlength="9" name="pvtelefono" required>
                       @if ($errors->has('pvtelefono'))
                        <span class="help-block">
                           <strong>{{ $errors->first('pvtelefono', 'Ingrese un Telefono Válido') }}</strong>
                        </span>
                       @endif
                   </div>     

                   <div class="form-group {{ $errors->has('pvemail') ? ' has-error' : '' }}">
                        <label class="form-control" for="pvemail">E-mail</label>
                        <input type="text" class="form-control" id="mai" maxlength="25" name="pvemail" required>
                       @if ($errors->has('pvemail'))
                        <span class="help-block">
                           <strong>{{ $errors->first('pvemail', 'Ingrese un E-mail Válido') }}</strong>
                        </span>
                       @endif
                   </div>      
                   
               <div class="modal-footer">   
                <button type="submit" class="btn btn-primary pull-left">Actualizar</button>
                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cancelar</button> 
               </div> 
          </form>
    <hr>
      </div>
  </div>
</div>


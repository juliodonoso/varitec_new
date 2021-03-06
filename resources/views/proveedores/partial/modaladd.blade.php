<div class="modal fade" id="createpro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Registrar Proveedor</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

          <div class="modal-body">
              <form id="formCeatePro" role="" action="" method="POST"> 
                    {{csrf_field()}}
                    <div class="form-group {{ $errors->has('pvrut') ? ' has-error' : '' }}">
                        <label class="form-control" for="pvrut">Rut</label>
                        <input type="text" class="form-control" id="pvrut" maxlength="9" name="pvrut" required>
                       @if ($errors->has('pvrut'))
                        <span class="help-block">
                           <strong>{{ $errors->first('pvrut', 'Ingrese un Rut Válido') }}</strong>
                        </span>
                       @endif
                   </div>  

                   <div class="form-group {{ $errors->has('pvnombre') ? ' has-error' : '' }}">
                        <label class="form-control" for="pvnombre">Nombre</label>
                        <input type="text" class="form-control" id="pvnombre" maxlength="50" name="pvnombre" required>
                       @if ($errors->has('pvnombre'))
                        <span class="help-block">
                           <strong>{{ $errors->first('pvnombre', 'Ingrese un Nombre Válido') }}</strong>
                        </span>
                       @endif
                   </div>  

                   <div class="form-group {{ $errors->has('pvdireccion') ? ' has-error' : '' }}">
                        <label class="form-control" for="pvdireccion">Direccion</label>
                        <input type="text" class="form-control" id="pvdireccion" maxlength="25" name="pvdireccion" required>
                       @if ($errors->has('pvdireccion'))
                        <span class="help-block">
                           <strong>{{ $errors->first('pvdireccion', 'Ingrese una Direccion Válida') }}</strong>
                        </span>
                       @endif
                   </div>    

                   <div class="form-group {{ $errors->has('pvcomuna') ? ' has-error' : '' }}">
                        <label class="form-control" for="pvcomuna">Comuna</label>
                        <input type="text" class="form-control" id="pvcomuna" maxlength="20" name="pvcomuna" required>
                       @if ($errors->has('pvcomuna'))
                        <span class="help-block">
                           <strong>{{ $errors->first('pvcomuna', 'Ingrese una Comuna Válida') }}</strong>
                        </span>
                       @endif
                   </div>    

                   <div class="form-group {{ $errors->has('pvciudad') ? ' has-error' : '' }}">
                        <label class="form-control" for="pvciudad">Ciudad</label>
                        <input type="text" class="form-control" id="pvciudad" maxlength="20" name="pvciudad" required>
                       @if ($errors->has('pvciudad'))
                        <span class="help-block">
                           <strong>{{ $errors->first('pvciudad', 'Ingrese una Ciudad Válida') }}</strong>
                        </span>
                       @endif
                   </div>                                                                                                

                   <div class="form-group {{ $errors->has('pvtelefono') ? ' has-error' : '' }}">
                        <label class="form-control" for="pvtelefono">Telefono</label>
                        <input type="text" class="form-control" id="pvtelefono" maxlength="9" name="pvtelefono" required>
                       @if ($errors->has('pvtelefono'))
                        <span class="help-block">
                           <strong>{{ $errors->first('pvtelefono', 'Ingrese un Telefono Válido') }}</strong>
                        </span>
                       @endif
                   </div>     

                   <div class="form-group {{ $errors->has('pvemail') ? ' has-error' : '' }}">
                        <label class="form-control" for="pvemail">E-mail</label>
                        <input type="text" class="form-control" id="pvemail" maxlength="25" name="pvemail" required>
                       @if ($errors->has('pvemail'))
                        <span class="help-block">
                           <strong>{{ $errors->first('pvemail', 'Ingrese un E-mail Válido') }}</strong>
                        </span>
                       @endif
                   </div>                 

                    <input type="hidden" id="pvestado" name="pvestado" value="1">

          </div>
             <div class="modal-footer">   
              <button type="submit" class="btn btn-primary pull-left">Registrar</button>
              <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cancelar</button> 
             </div> 
            </form>

          <hr>
    </div>
  </div>
</div>


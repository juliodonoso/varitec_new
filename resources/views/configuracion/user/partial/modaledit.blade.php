<div class="modal fade" id="editeUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Editar Usuario</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
      <div class="modal-body">
          <form id="formEdituser" role="" action="" method="post">
              {{csrf_field()}}
             <input type="hidden" name="_method" value="PUT">
             <input type="hidden" name="_token" value="{!! csrf_token() !!}">  
                   <div class="form-group {{ $errors->has('rut') ? ' has-error' : '' }}">
                        <label class="form-control" for="rut">Rut</label>
                        <input type="text" class="form-control" id="rut" name="rut" maxlength="9" required>
                       @if ($errors->has('rut'))
                        <span class="help-block">
                           <strong>{{ $errors->first('rut', 'Ingrese un Rut Válido') }}</strong>
                        </span>
                       @endif
                   </div>

                   <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="name" class="form-control">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name" maxlength="20" required>
                       @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name' , 'Ingrese un Nombre Válido') }}</strong>
                        </span>
                       @endif
                   </div>

                   <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="form-control">Email</label>
                      <input type="email" class="form-control" id="email" name="email" maxlength="30" required>                     
                      @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email' , 'Ingrese un Email Válido') }}</strong>
                        </span>
                      @endif
                   </div>

                   <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                      <label for="phone" class="form-control">Telefono</label>
                      <input type="text" class="form-control" id="phone" name="phone" maxlength="9" required>                     
                      @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone' , 'Ingrese un Telefono Válido') }}</strong>
                        </span>
                      @endif
                   </div>  
                   <input type="hidden" id="rol" name="rol" value="1">
               <div class="modal-footer">   
                <button type="submit" class="btn btn-primary pull-left">Actualizar</button>
                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cancelar</button> 
               </div> 
          </form>
      </div>
  </div>
</div>


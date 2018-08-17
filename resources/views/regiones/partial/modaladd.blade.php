<div class="modal fade" id="createreg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Agregar Regiones</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
          <div class="modal-body">
              <form id="formCeateReg" role="" action="" method="POST"> 
                    {{csrf_field()}}
                   <div class="form-group {{ $errors->has('rgnombre') ? ' has-error' : '' }}">
                        <label class="form-control" for="rgnombre">Nombre de Region</label>
                        <input type="text" class="form-control" id="rgnombre" maxlength="18" name="rgnombre" required>
                       @if ($errors->has('rgnombre'))
                        <span class="help-block">
                           <strong>{{ $errors->first('rgnombre', 'Ingrese un Nombre Válido') }}</strong>
                        </span>
                       @endif
                   </div>       
                   <div class="form-group {{ $errors->has('rgordinal') ? ' has-error' : '' }}">
                        <label class="form-control" for="rgordinal">Numero Ordinal</label>
                        <input type="text" class="form-control" id="rgordinal" maxlength="4" name="rgordinal" required>
                       @if ($errors->has('rgordinal'))
                        <span class="help-block">
                           <strong>{{ $errors->first('rgordinal', 'Ingrese un Numero Válido') }}</strong>
                        </span>
                       @endif
                   </div>                                            
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


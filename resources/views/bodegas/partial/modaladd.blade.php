<div class="modal fade" id="createBod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Agregar Bodega</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
          <div class="modal-body">
              <form id="formCeateBod" role="" action="" method="POST"> 
                    {{csrf_field()}}
                   <div class="form-group {{ $errors->has('bgNombre') ? ' has-error' : '' }}">
                        <label class="form-control" for="bgNombre">Nombre de Bodega</label>
                        <input type="text" class="form-control" id="bgNombre" maxlength="50" name="bgNombre" required>
                       @if ($errors->has('bgNombre'))
                        <span class="help-block">
                           <strong>{{ $errors->first('bgNombre', 'Ingrese un Nombre Válido') }}</strong>
                        </span>
                       @endif
                   </div>                             
          </div>
          <br>
             <div class="modal-footer">   
              <button type="submit" class="btn btn-info pull-left">Registrar</button>
              <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cancelar</button> 

             </div> 
        </form>

          <hr>
    </div>
  </div>
</div>


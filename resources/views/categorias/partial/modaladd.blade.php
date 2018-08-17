<div class="modal fade" id="createcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Agregar Categoria</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
          <div class="modal-body">
              <form id="formCeateCat" role="" action="" method="POST"> 
                    {{csrf_field()}}
                   <div class="form-group {{ $errors->has('ctnombre') ? ' has-error' : '' }}">
                        <label class="form-control" for="ctnombre">Nombre de Categoria</label>
                        <input type="text" class="form-control" id="ctnombre" maxlength="50" name="ctnombre" required>
                       @if ($errors->has('ctnombre'))
                        <span class="help-block">
                           <strong>{{ $errors->first('ctnombre', 'Ingrese un Nombre Válido') }}</strong>
                        </span>
                       @endif
                   </div>           

                   <div class="form-group {{ $errors->has('ctdescripcion') ? ' has-error' : '' }}">
                        <label class="form-control" for="ctdescripcion">Descripción de Categoria</label>
                        <input type="text" class="form-control" id="ctdescripcion" maxlength="50" name="ctdescripcion" required>
                       @if ($errors->has('ctdescripcion'))
                        <span class="help-block">
                           <strong>{{ $errors->first('ctdescripcion', 'Ingrese una Descripción Válido') }}</strong>
                        </span>
                       @endif
                   </div>              

                   <input type="hidden" id="ctestado" name="ctestado" value="1">

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


<div class="modal fade" id="editecat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Editar Categoria</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
      <div class="modal-body">
          <form id="formEditCat" role="" action="" method="post">
              {{csrf_field()}}
             <input type="hidden" name="_method" value="PUT">
             <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                   <div class="form-group {{ $errors->has('ctnombre') ? ' has-error' : '' }}">
                        <label class="form-control" for="ctnombre">Nombre de Categoria</label>
                        <input type="text" class="form-control" id="name" maxlength="50" name="ctnombre" required>
                       @if ($errors->has('ctnombre'))
                        <span class="help-block">
                           <strong>{{ $errors->first('ctnombre', 'Ingrese un Nombre Válido') }}</strong>
                        </span>
                       @endif
                   </div>           

                   <div class="form-group {{ $errors->has('ctdescripcion') ? ' has-error' : '' }}">
                        <label class="form-control" for="ctdescripcion">Descripción de Categoria</label>
                        <input type="text" class="form-control" id="descripcion" maxlength="50" name="ctdescripcion" required>
                       @if ($errors->has('ctdescripcion'))
                        <span class="help-block">
                           <strong>{{ $errors->first('ctdescripcion', 'Ingrese una Descripción Válido') }}</strong>
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


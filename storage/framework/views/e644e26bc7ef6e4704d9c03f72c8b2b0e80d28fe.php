<div class="modal fade" id="createprod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Registrar Producto</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

          <div class="modal-body">
              <form id="formCeateProd" role="" action="" method="POST"> 
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group <?php echo e($errors->has('prBarcode') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="prBarcode">Código de Barra</label>
                        <input type="text" class="form-control" id="prBarcode" maxlength="20" name="prBarcode" required>
                       <?php if($errors->has('prBarcode')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('prBarcode', 'Ingrese un Cod. de Barra Válido')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>  

                   <div class="form-group <?php echo e($errors->has('prInterno') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="prInterno">Código Interno</label>
                        <input type="text" class="form-control" id="prInterno" maxlength="9" name="prInterno" required>
                       <?php if($errors->has('prInterno')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('prInterno', 'Ingrese un Cod. Interno Válido')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>  

                   <div class="form-group <?php echo e($errors->has('prNombre') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="prNombre">Nombre</label>
                        <input type="text" class="form-control" id="prNombre" maxlength="25" name="prNombre" required>
                       <?php if($errors->has('prNombre')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('prNombre', 'Ingrese un Cod. Interno Válido')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>    

                   <div class="form-group <?php echo e($errors->has('prDescripcion') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="prDescripcion">Descripción</label>
                        <input type="text" class="form-control" id="prDescripcion" maxlength="50" name="prDescripcion" required>
                       <?php if($errors->has('prDescripcion')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('prDescripcion', 'Ingrese una Descripción Válida')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>    

                   <div class="form-group <?php echo e($errors->has('prCritico') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="prCritico">Stock Crítico</label>
                        <input type="text" class="form-control" id="prCritico" maxlength="9" name="prCritico" required>
                       <?php if($errors->has('prCritico')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('prCritico', 'Ingrese un Stock Crítico Válida')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>                                                                                                

                   <div class="form-group <?php echo e($errors->has('prInicial') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="prInicial">Stock Inicial</label>
                        <input type="text" class="form-control" id="prInicial" maxlength="9" name="prInicial" required>
                       <?php if($errors->has('prInicial')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('prInicial', 'Ingrese un Stock Inicial Válido')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>     

                   <div class="form-group <?php echo e($errors->has('prValorizado') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="prValorizado">Valorizado</label>
                        <input type="text" class="form-control" id="prValorizado" maxlength="25" name="prValorizado" required>
                       <?php if($errors->has('prValorizado')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('prValorizado', 'Ingrese un Stock Inicial Válido')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>            

                   <div class="form-group <?php echo e($errors->has('prUnidad') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="prUnidad">Unidad</label>
                          <select id="prUnidad" name="prUnidad" class="form-control">
                             <option value="">Selecciona Unidad</option>
                             <option value ="1">Unidad</option>
                             <option value ="5">Kilogramo</option>
                             <option value ="6">Metros</option>
                          </select>
                       <?php if($errors->has('prUnidad')): ?>
                        <span class="help-block">
                           <strong><?php echo e($errors->first('prUnidad', 'Ingrese una Unidad Válida')); ?></strong>
                        </span>
                       <?php endif; ?>
                   </div>       

                  <div class="form-group <?php echo e($errors->has('prCategoria') ? ' has-error' : ''); ?>">
                      <?php echo Form::label('prCategoria', '* Categoria:'); ?>

                      <?php echo e(Form::select('prCategoria',$categorias , null, ['placeholder' => 'Seleccionar Categoria', 'class' => 'form-control'])); ?>

                      <?php if($errors->has('prCategoria')): ?>
                      <span class="help-block">
                          <strong><?php echo e($errors->first('prCategoria', ' Seleccione una Categoria')); ?></strong>
                      </span>
                      <?php endif; ?>
                  </div>          

                  <div class="form-group <?php echo e($errors->has('prBodega') ? ' has-error' : ''); ?>">
                      <?php echo Form::label('prBodega', '* Bodega:'); ?>

                      <?php echo e(Form::select('prBodega', $bodegas , null, ['placeholder' => 'Seleccionar Bodega', 'class' => 'form-control'])); ?>

                      <?php if($errors->has('prBodega')): ?>
                      <span class="help-block">
                          <strong><?php echo e($errors->first('prBodega', ' Seleccione una Bodega')); ?></strong>
                      </span>
                      <?php endif; ?>
                  </div>                            

                   <input type="hidden" id="prEstado" name="prEstado" value="1">

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


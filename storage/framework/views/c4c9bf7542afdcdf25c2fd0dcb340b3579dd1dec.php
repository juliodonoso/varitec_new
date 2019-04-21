<div class="modal fade" id="viewprod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Detalle de Producto</label>
      </div>
      <div class="modal-body">
          <form id="formViewProd">
              <?php echo e(csrf_field()); ?>

             <input type="hidden" name="_method">
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-control" for="prBarcode">Código de Barra</label>
                        <input type="text" class="form-control" id="cod" readonly>
                   </div>  

                   <div class="form-group col-md-6">
                        <label class="form-control" for="prInterno">Código Interno</label>
                        <input type="text" class="form-control" id="int"  readonly>
                   </div>  

                </div>                  
                    
                <div class="row">

                  <div class="form-group col-md-6">
                        <label class="form-control" for="prUnidad">Categoria</label>
                        <input type="text" class="form-control" id="cat" readonly>
                  </div>     
                  
                  <div class="form-group col-md-6">
                        <label class="form-control" for="prNombre">Nombre</label>
                        <input type="text" class="form-control" id="name"  readonly>
                  </div>  

                </div>    

                   <div class="form-group <?php echo e($errors->has('prDescripcion') ? ' has-error' : ''); ?>">
                        <label class="form-control" for="prDescripcion">Descripción</label>
                        <input type="text" class="form-control" id="desc"  readonly>
                   </div>  

                <div class="row">
                   <div class="form-group col-md-4">
                        <label class="form-control" for="prInicial">Stock Inicial</label>
                        <input type="text" class="form-control" id="ini" readonly>
                   </div> 

                   <div class="form-group col-md-4">
                        <label class="form-control" for="prCritico">Stock Crítico</label>
                        <input type="text" class="form-control" id="cri"  readonly>
                   </div> 

                   <div class="form-group col-md-4">
                        <label class="form-control" for="prUnidad">Bodega</label>
                        <input type="text" class="form-control" id="bod" readonly>
                   </div>    

                </div>   

                <div class="row">
                   <div class="form-group col-md-6">
                        <label class="form-control" for="prValorizado">Valorizado</label>
                        <input type="text" class="form-control" id="val"  readonly>
                   </div>            

                   <div class="form-group col-md-6">
                        <label class="form-control" for="prUnidad">Unidad</label>
                        <input type="text" class="form-control" id="uni" readonly>
                   </div>                       
                </div>

               <div class="modal-footer">   
                <button type="button" class="btn btn-danger pull-rigth" data-dismiss="modal">Cerrar</button> 
               </div> 
          </form>
      </div>
  </div>
</div>


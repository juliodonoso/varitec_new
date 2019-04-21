
<!-- Modal -->
<div class="modal fade" id="deleteprov" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Eliminar Bodega</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
     
      <div class="modal-body">
          <p style="font-size: 20px;">¿Desea eliminar la Bodega <strong><span style="font-size: 20px;" id="name"></span></strong>, del sistema?</p>      
      </div>


      <div class="modal-footer">
        <form id="formDeleteProv" role="form" action="" method="post">
               
          <?php echo e(csrf_field()); ?>

          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
                   
          <button type="submit" class="btn btn-danger" >Eliminar</button>  
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          
        </form>
      </div>

    </div>
  </div>
</div>
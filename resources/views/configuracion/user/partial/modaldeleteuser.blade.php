<!-- Modal -->
<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Eliminar Usuario</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
     
      <div class="modal-body">
      
          <p style="font-size: 20px;">¿Desea eliminar a  <strong><span style="font-size: 20px;" id="name"></span></strong>, del sistema?</p>      
    
      </div>

      <div class="modal-footer">

        <form id="formDeleteUser" role="" action="" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">             

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger" >Eliminar</button>  
        </form>
        
      </div>

    </div>
  </div>
</div>


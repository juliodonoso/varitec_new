<div class="modal fade" id="blockpro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">Bloquear/Desbloquear Proveedor</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
          <div class="modal-body">


           <p style="font-size: 20px;">¿Desea Bloquear/Desbloquear a <strong><span style="font-size: 20px;" id="nom"></span></strong>, en el sistema?
           </p>     

            <form id="formblockPro" role="" action="" method="GET"> 
                      {{csrf_field()}}

                 <input type="hidden" name="id" id="id">
                 <input type="hidden" name="nom" id="nom">
                 <input type="hidden" name="_token" value="{!! csrf_token() !!}">    
         
                <br>
               <div class="modal-footer">   
                  <button type="submit" class="btn btn-danger pull-left">Bloquear</button>
                  <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
               </div> 
            </form>
          </div>
          <hr>
    </div>
  </div>
</div>

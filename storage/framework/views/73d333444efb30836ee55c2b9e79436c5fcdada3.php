<?php $__env->startSection('content'); ?>

 <?php $__env->startPush('js'); ?> 
<script>
      $(document).on("click", ".createprod", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCeateProd').attr('action',ruta);
      });

      $(document).on("click", ".viewprod", function () {
        var ruta = $(this).data('ruta');
        var cod = $(this).data('cod');
        var int = $(this).data('int');
        var name = $(this).data('name');
        var desc = $(this).data('desc'); 
        var cri = $(this).data('cri');
        var ini = $(this).data('ini'); 
        var val = $(this).data('val'); 
        var uni = $(this).data('uni');
        var cat = $(this).data('cat');
        var bod = $(this).data('bod');
        var est = $(this).data('est');  
        var id = $(this).data('id');
        $(".modal-body #cod").val(cod);
        $(".modal-body #int").val(int);
        $(".modal-body #name").val(name);
        $(".modal-body #desc").val(desc);
        $(".modal-body #cri").val(cri);
        $(".modal-body #ini").val(ini);
        $(".modal-body #val").val(val);
        $(".modal-body #uni").val(uni);
        $(".modal-body #cat").val(cat);
        $(".modal-body #bod").val(bod);
        $(".modal-body #est").val(est);
        $('.modal-body #id').val(id);
        $('.modal-body  #formViewProd').attr('action',ruta);
      });       

      $(document).on("click", ".blockprod", function() {
        var ruta   = $(this).data('ruta');
        var id  = $(this).data('id');
        var nom  = $(this).data('nom');
        $('.modal-body #id').val(id);
        $(".modal-body #nom").text(nom);
        $('.modal-body  #formblockProd').attr('action',ruta);
      });            

      $(document).on("click", ".editprod", function () {
        var ruta = $(this).data('ruta');
        var cod = $(this).data('cod');
        var int = $(this).data('int');
        var name = $(this).data('name');
        var desc = $(this).data('desc'); 
        var cri = $(this).data('cri');
        var ini = $(this).data('ini'); 
        var val = $(this).data('val'); 
        var uni = $(this).data('uni');
        var cat = $(this).data('cat');
        var bod = $(this).data('bod');
        var est = $(this).data('est');  
        var id = $(this).data('id');
        $(".modal-body #cod").val(cod);
        $(".modal-body #int").val(int);
        $(".modal-body #name").val(name);
        $(".modal-body #desc").val(desc);
        $(".modal-body #cri").val(cri);
        $(".modal-body #ini").val(ini);
        $(".modal-body #val").val(val);
        $(".modal-body #uni").val(uni);
        $(".modal-body #cat").val(cat);
        $(".modal-body #bod").val(bod);
        $(".modal-body #est").val(est);
        $('.modal-body #id').val(id);
        $('.modal-body #formEditProd').attr('action', ruta);
      });      

      $(document).on("click", ".deleteprod", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeleteProd').attr('action', ruta);
      });

</script>
<?php $__env->stopPush(); ?>

<div class="content" >
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
      <?php echo $__env->make('include.mensajes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">Productos</h4>
                    <p class="category">Lista de Productos</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="<?php echo e(url('Productos/')); ?>" class="btn btn-primary btn-sm createprod" data-toggle="modal" data-target="#createprod" title="Add">   <i class="fa fa-plus"></i>
                              Registrar
                          </a>
                    </div>

                        <table class="table table-hover table-condensed">
                                <thead>
                                   <tr>
                                    <th>Cod. Barra</th>
                                    <th>Cod. Interno</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Estado</th>                                    
                                    <th>Opciones</th>
                                   </tr>   
                                </thead>

                                <tbody>
                                   <?php $__currentLoopData = $qryProd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                    <tr>
                                      <td><?php echo e($pro->prBarcode); ?></td> 
                                      <td><?php echo e($pro->prInterno); ?></td> 
                                      <td><?php echo e($pro->prNombre); ?></td> 
                                      <td><?php echo e($pro->prDescripcion); ?></td> 
                                      <td></td> 
                                      <td></td> 
                                      <td></td> 
                                      <td></td> 
                                      <td> 
                                        <span class="
                                             <?php if($pro->prEstado == 1): ?> label label-success
                                             <?php elseif($pro->prEstado == 0): ?> label label-danger
                                             <?php endif; ?> ">
                                            </span> 
                                      </td>
                                      <td>

                                       <a href="" data-ruta="" data-id="<?php echo e($pro->id); ?>" data-cod="<?php echo e($pro->prBarcode); ?>" data-int="<?php echo e($pro->prInterno); ?>" data-name="<?php echo e($pro->prNombre); ?>" data-desc="<?php echo e($pro->prDescripcion); ?>" data-cri="<?php echo e($pro->prCritico); ?>" data-ini="<?php echo e($pro->prInicial); ?>" data-val="<?php echo e($pro->prValorizado); ?>" data-uni="<?php echo e($pro->prUnidad); ?>" data-cat="<?php echo e($pro->Categoria->ctdescripcion); ?>" data-bod="<?php echo e($pro->Bodega->bgNombre); ?>" data-est="<?php echo e($pro->prEstado); ?>" class="btn btn-primary btn-xs viewprod" data-toggle="modal" data-target="#viewprod" title="Ver">  
                                          <i class="fa fa-eye"></i>
                                       </a>                                        

                                       <a href="" data-id="<?php echo e($pro->id); ?>" data-nom="<?php echo e($pro->prNombre); ?>" data-ruta="<?php echo e(url('Productos/block/'.$pro->id)); ?>" class="btn btn-danger btn-xs blockprod" data-toggle="modal" data-target="#blockprod" title="Block">  
                                          <i class="fa fa-lock"></i>
                                       </a> 

                                       <a href="" data-ruta="<?php echo e(url('Productos/'.$pro->id)); ?>" data-id="<?php echo e($pro->id); ?>" data-cod="<?php echo e($pro->prBarcode); ?>" data-int="<?php echo e($pro->prInterno); ?>" data-name="<?php echo e($pro->prNombre); ?>" data-desc="<?php echo e($pro->prDescripcion); ?>" data-cri="<?php echo e($pro->prCritico); ?>" data-ini="<?php echo e($pro->prInicial); ?>" data-val="<?php echo e($pro->prValorizado); ?>" data-uni="<?php echo e($pro->prUnidad); ?>" data-cat="<?php echo e($pro->prCategoria); ?>" data-bod="<?php echo e($pro->prBodega); ?>" data-toggle="modal" data-target="#editprod" class="btn btn-info btn-xs editprod" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        <a  href="" data-ruta="<?php echo e(url('Productos/'.$pro->id)); ?>" data-id="<?php echo e($pro->id); ?>" data-name="<?php echo e($pro->prNombre); ?>" data-toggle="modal" data-target="#deleteprod"  class="btn btn-xs btn-danger deleteprod" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                        </a>
                                        
                                      </td>  

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>   
                        </table>    
                    </div>                    
                </div>


            </div>
        </div>
        <?php echo $__env->make('productos.partial.modaldelete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
        <?php echo $__env->make('productos.partial.modalview', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

<?php echo $__env->make('productos.partial.modalblock', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('productos.partial.modaladd', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

<?php echo $__env->make('productos.partial.modaledit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 



  </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
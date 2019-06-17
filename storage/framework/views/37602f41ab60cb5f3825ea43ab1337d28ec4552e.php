<?php $__env->startSection('content'); ?>



<div class="content" >
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
      <?php echo $__env->make('include.mensajes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Laboratorio</h4>
                    <p class="category"><?php echo e($titulo); ?></p>

                </div>
                <div class="card-content">


                       <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Numero laboratorio</th>
                                    <th>Cliente</th>
                                    <th>Codigo Equipo</th>
                                    <th>Descripción Equipo</th>
                                    <th>Trabajo</th>
                                    <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $__currentLoopData = $laboratorio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td><?php echo e($lab->numeroLaboratorio); ?></td>
                                      <td><?php echo e($lab->clNombre); ?></td>
                                      <td><?php echo e($lab->prBarcode); ?></td>
                                      <td><?php echo e($lab->prNombre); ?></td>
                                      <td><?php echo e($lab->tipoTrabajo); ?></td>
                                      <td>

                                       <?php if($lab->estadoLab == 0): ?>
                                        <a href="<?php echo e(route('Laboratorio.gestion',['id'=>$lab->id ])); ?>"  class="btn btn-success btn-xs editereg" title="Gestionar">
                                          <i class="fa fa-share-square-o"></i>
                                       </a>
                                       <?php elseif($lab->estadoLab == 1): ?>
                                        <a href="<?php echo e(route('Laboratorio.work',['id'=>$lab->id ])); ?>"  class="btn btn-success btn-xs editereg" title="Trabajar">
                                          <i class="fa fa-briefcase"></i>
                                       </a>
                                       <?php elseif($lab->estadoLab == 2): ?>
                                        <a href="<?php echo e(route('Laboratorio.borrador',['id'=>$lab->id ])); ?>"  class="btn btn-success btn-xs editereg" title="Retomar">
                                          <i class="fa fa-pencil-square"></i>
                                       </a>

                                       <?php endif; ?>
                                        <a href="<?php echo e(route('pdfLaboratorio',['download'=>'pdf','id'=> $lab->idRes])); ?>" style="background-color:red"  class="btn btn-error btn-xs editereg" title="PDF">
                                          <i class="fa fa-file-pdf-o"></i>
                                       </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                      </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


  </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
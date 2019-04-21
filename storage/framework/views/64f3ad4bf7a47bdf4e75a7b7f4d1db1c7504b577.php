<?php $__env->startSection('content'); ?>

 <?php $__env->startPush('js'); ?>
<script src="<?php echo e(URL::asset('js/jquery.Rut.js')); ?>" type="text/javascript"></script>

<script type="text/javascript">


</script>
<?php $__env->stopPush(); ?>

<div class="content" >
  <?php echo e(csrf_field()); ?>

  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
      <?php echo $__env->make('include.mensajes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Cotizaciones</h4>
                    <p class="category">Terminadas</p>
                </div>
                <div class="card-content">
                    <div class="col-md-12 ">
                         <a href="<?php echo e(route('cotizaciones.index')); ?>"  class="btn btn-primary btn-sm"  title="Add">   
                             <i class=" fa fa-sign-in"></i>
                             Activas 
                          </a>
                          <a href="<?php echo e(route('cotizaciones.pendientes')); ?>"  class="btn btn-success btn-sm"  title="Add">   
                              <i class="fa fa-list-alt"></i>
                             Pendientes
                          </a>

                          <a href="#"  class="btn btn-secondary btn-sm"  title="Add">   
                              <i class="fa fa-id-badge"></i>
                              Terminadas
                          </a>

                    </div>
                       <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Número Cotizacion</th>
                                    <th>Número Laboratorio</th>
                                    <th>Número </th>
                                    <th>Cliente</th>
                                    <th>Tipo de trabajo</th>
                                    <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <tr>
                                      <td>11</td>
                                      <td>22</td>
                                      <td>33</td>
                                      <td>44</td>
                                      <td>55</td>
                                      <td> 
                                        <a href="#"  class="btn btn-success btn-xs editereg" title="Traspaso">
                                          <i class="fa fa-check-square-o"></i>
                                       </a>

                                        <a href=""  class="btn btn-error btn-xs editereg" title="mail">
                                          <i class="fa fa-envelope"></i>
                                       </a>
                                        </td>
                                    </tr>
                                    
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
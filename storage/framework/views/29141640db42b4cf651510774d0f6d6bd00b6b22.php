<div class="sidebar" data-active-color="blue" data-background-color="black" data-image="<?php echo e(URL::asset('tim/img/sidebar-1.jpg')); ?>">

            <div class="logo">
                <a href="#" class="simple-text logo-mini">
                    
                </a>
                <a href="#" class="simple-text logo-normal">
                   Veritec
                </a>
            </div>
            <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y">
                <div class="user">
                    <div class="photo">
                        <img src="<?php echo e(URL::asset('img/user.png')); ?>">
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed" aria-expanded="false">
                            <span>
                                <?php echo e(Auth::user()->name); ?>

                                <b class="caret"></b>
                            </span>
                        </a>
                       
                        <div class="clearfix"></div>
<?php if(1 == 1 ): ?>                            
                        <div class="collapse" id="collapseExample" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                               
                                <li>
                                    <a href="<?php echo e(route('config.resetpass')); ?>">
                                        <span class="sidebar-mini"> CP </span>
                                        <span class="sidebar-normal"> Cambiar Password </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
<?php endif; ?>                       
                    </div>
                </div>

                <ul class="nav">
<?php if(1 == 2 ): ?>                        
                    <li class="<?php echo e(( $menu == "m_dashboard" )? "active" : ""); ?>">
                        <a href="<?php echo e(route('home')); ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>                   
<?php endif; ?>                    
<?php if( Auth::user()->rol_id == 1 ): ?>  

                    <li class="">
                        <a data-toggle="collapse" aria-expanded="" href="#menuInformes">
                            <i class="material-icons">content_paste</i>
                            <p> Tablas
                                <b class="caret"></b>
                            </p>
                        </a>
                        <!--
                        <div class="collapse " id="menuInformes" style="margin-left: 30px;">
                            <ul class="nav">
                                <li class="">
                                    <a href="<?php echo e(route('informe.vendedores')); ?>">
                                        <span class="sidebar-mini">IV</span>
                                        <span class="sidebar-normal">Vendedores </span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav" >
                                <li class="">
                                    <a href="<?php echo e(route('informe.pivot')); ?>">
                                        <span class="sidebar-mini">ID</span>
                                        <span class="sidebar-normal">Dinamico</span>
                                    </a>
                                </li>
                            </ul>
                        </div>    
                        -->                    
                    </li>

                    <li  ">
                        <a data-toggle="collapse" aria-expanded="  " href="#menuTablas">
                            <i class="material-icons">settings</i>
                            <p> Configuración
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="menuTablas" style="margin-left: 30px;">
                            <ul class="nav">
                                <li class="" >
                                    <a href="  <?php echo e(route('config.listadmin')); ?> ">
                                        <span class="sidebar-mini"> MA </span>
                                        <span class="sidebar-normal">M. Administradores </span>
                                    </a>
                                </li>
                                <li class="" >
                                    <a href="<?php echo e(route('config.listuser')); ?>">
                                        <span class="sidebar-mini"> MU</span>
                                        <span class="sidebar-normal">M. Usuarios </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>



<?php endif; ?>                         



                </ul>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 587px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 530px;"></div></div></div>
        <div class="sidebar-background" style="background-image: url('<?php echo e(URL::asset('tim/img/sidebar-1.jpg')); ?>') "></div></div>
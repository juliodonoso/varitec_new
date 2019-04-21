<div class="sidebar" data-active-color="blue" data-background-color="black" data-image="<?php echo e(secure_asset('tim/img/sidebar-1.jpg')); ?>">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="#" class="simple-text logo-mini">
                    :)
                </a>
                <a href="#" class="simple-text logo-normal">
                    Jebien
                </a>
            </div>
            <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y">
                <div class="user">
                    <div class="photo">
                        <img src="../assets/img/faces/avatar.jpg">
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed" aria-expanded="false">
                            <span>
                                <?php echo e(Auth::user()->name); ?>

                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="clearfix"></div>                            
                        <div class="collapse" id="collapseExample" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li>
                                    <a href="<?php echo e(route('perfil.cambio_clave')); ?>">
                                        <span class="sidebar-mini"> CC </span>
                                        <span class="sidebar-normal"> Cambio de Clave </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('perfil.email_adicional')); ?>">
                                        <span class="sidebar-mini"> CA </span>
                                        <span class="sidebar-normal"> Correo Adicional </span>
                                    </a>
                                </li>

                            </ul>
                        </div>                      
                    </div>
                </div>

                <ul class="nav">
                    <li class="<?php echo e(( $menu == "m_dashboard" )? "active" : ""); ?>">
                        <a href="<?php echo e(route('home')); ?>">
                            <i class="material-icons">home</i>
                            <p>Home</p>
                        </a>
                    </li> 
                    <!-- menu crear reserva -->                  
                    <li class="<?php echo e(( $menu == "m_crear_reserva" )? "active" : ""); ?>">
                        <a href="<?php echo e(route('reserva.pasos')); ?>">
                            <i class="material-icons">room_service</i>
                            <p>Crear Reserva</p>
                        </a>
                    </li> 
                    <!-- menu consultar reserva -->                  
                    <li class="<?php echo e(( $menu == "m_consulta_reserva" )? "active" : ""); ?>">
                        <a href="<?php echo e(route('reserva.listado')); ?>">
                            <i class="material-icons">content_paste</i>
                            <p>Consultar Reserva</p>
                        </a>
                    </li>
                    <!-- menu anular reserva -->                  
                    <li class="<?php echo e(( $menu == "m_anular_reserva" )? "active" : ""); ?>">
                        <a href="<?php echo e(route('reserva.listadoanular')); ?>">
                            <i class="material-icons">cancel</i>
                            <p>Anular Reserva</p>
                        </a>
                    </li>                                                            

                </ul>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
            <div class="ps-scrollbar-y-rail" style="top: 0px; height: 587px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 530px;"></div></div></div>
        <div class="sidebar-background" style="background-image: url('<?php echo e(secure_asset('tim/img/sidebar-1.jpg')); ?>') "></div></div>
<div class="sidebar" data-active-color="blue" data-background-color="black" >

            <div class="logo">
                <a href="#" class="simple-text logo-mini">

                </a>
                <a href="#" class="simple-text logo-normal">
                   Panel Varitec
                </a>
            </div>
            <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y">
                <div class="user">
                    <div class="photo">
                        <img src="{{URL::asset('img/user.png')}}">
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed" aria-expanded="false">
                            <span>
                                {{ Auth::user()->name }}
                                <b class="caret"></b>
                            </span>
                        </a>

                        <div class="clearfix"></div>
@if (1 == 1 )
                        <div class="collapse" id="collapseExample" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                               {{-- <li>
                                    <a href="#">
                                        <span class="sidebar-mini"> VP </span>
                                        <span class="sidebar-normal">Ver Perfil </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sidebar-mini"> EP </span>
                                        <span class="sidebar-normal"> Editar Perfil </span>
                                    </a>
                                </li>
                                --}}
                                <li>
                                    <a href="{{route('config.resetpass')}}">
                                        <span class="sidebar-mini"> CP </span>
                                        <span class="sidebar-normal"> Cambiar Password </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
@endif
                    </div>
                </div>

                <ul class="nav">
@if (1 == 2 )
                    <li class="{{ ( $menu == "m_dashboard" )? "active" : "" }}">
                        <a href="{{ route('home') }}">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
@endif
@if ( Auth::user()->rol_id == 1 )
                    <li class="{{-- ( $menu == "m_Iven") ? "active" : "" --}}">

                        <a data-toggle="collapse" aria-expanded="{{-- ( $menu == "m_Iven") ? "true" : "false" --}}" href="#menuInformes">
                            <i class="material-icons">content_paste</i>
                            <p> Tablas
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse {{-- ( $menu == "m_Iven")? "in" : ""--}}" id="menuInformes" style="margin-left: 30px;">
                            <ul class="nav" >
                                <li class="{{-- ( $menu == "m_Idin")? "active" : "" --}}">
                                    <a href="{{Route('suministros.index')}}">
                                        <span class="sidebar-mini">B</span>
                                        <span class="sidebar-normal">Suministros</span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav">
                                <li class="{{-- ( $menu == "m_Iven")? "active" : "" --}}">
                                    <a href="#">
                                        <span class="sidebar-mini">C</span>
                                        <span class="sidebar-normal">Categorias</span>
                                    </a>
                                </li>
                            </ul>


                            <ul class="nav">
                                <li class="{{-- ( $menu == "m_Iven")? "active" : "" --}}">
                                    <a href="{{route('Clientes.index')}}">
                                        <span class="sidebar-mini">CL</span>
                                        <span class="sidebar-normal">Clientes</span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav">
                                <li class="{{-- ( $menu == "m_Iven")? "active" : "" --}}">
                                    <a href="{{route('Productos.index')}}">
                                        <span class="sidebar-mini">P</span>
                                        <span class="sidebar-normal">Productos</span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav">
                                <li class="{{-- ( $menu == "m_Iven")? "active" : "" --}}">
                                    <a href="{{route('Proveedores.index')}}">
                                        <span class="sidebar-mini">P</span>
                                        <span class="sidebar-normal">Proveedores</span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav">
                                <li class="{{-- ( $menu == "m_Iven")? "active" : "" --}}">
                                    <a href="{{route('Provincias.index')}}">
                                        <span class="sidebar-mini">PR</span>
                                        <span class="sidebar-normal">Provincia</span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav">
                                <li class="{{-- ( $menu == "m_Iven")? "active" : "" --}}">
                                    <a href="{{route('Regiones.index')}}">
                                        <span class="sidebar-mini">R</span>
                                        <span class="sidebar-normal">Regiones</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </li>
                    <li>
                        <a href="{{route('Recepcion.index')}}">
                            <i class="material-icons">input</i>
                            <p> Recepcion </p>
                        </a>
                    </li>

                     <li>
                        <a href="{{route('Laboratorio.index')}}">
                            <i class="material-icons"  >group_work</i>
                            <p> Laboratorio </p>
                        </a>
                    </li>

                     <li>
                        <a  href="{{route('cotizaciones.index')}}">
                            <i class="material-icons">import_contacts</i>
                            <p> Cotizaciòn</p>
                        </a>
                    </li>




                    <li {{--class="{{ ( $menu == "m_uadm" || $menu == "m_user") ? "active" : "" }} --}} >
                        <a data-toggle="collapse" aria-expanded="{{-- ( $menu == "m_uadm" || $menu == "m_user") ? "true" : "false" --}}  " href="#menuTablas">
                            <i class="material-icons">settings</i>
                            <p> Configuración
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse {{--($menu == "m_uadm" || $menu == "m_user")? "in" : ""--}}" id="menuTablas" style="margin-left: 30px;">
                            <ul class="nav">
                                <li class="{{-- ($menu == "m_uadm" )? "active" : "" --}}" >
                                    <a href="  {{route('config.listadmin')}} ">
                                        <span class="sidebar-mini"> MA </span>
                                        <span class="sidebar-normal">M. Administradores </span>
                                    </a>
                                </li>
                                <li class="{{--($menu == "m_user")? "active" : "" --}}" >
                                    <a href="{{route('config.listuser')}}">
                                        <span class="sidebar-mini"> MU</span>
                                        <span class="sidebar-normal">M. Usuarios </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


@else

<li>
                        <a href="{{route('Recepcion.index')}}">
                            <i class="material-icons">input</i>
                            <p> Recepcion </p>
                        </a>
                    </li>

                     <li>
                        <a href="{{route('Laboratorio.index')}}">
                            <i class="material-icons"  >group_work</i>
                            <p> Laboratorio </p>
                        </a>
                    </li>

                     <li>
                        <a  href="{{route('cotizaciones.index')}}">
                            <i class="material-icons">import_contacts</i>
                            <p> Cotizaciòn</p>
                        </a>
                    </li>

@endif



                </ul>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 587px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 530px;"></div></div></div>
</div>
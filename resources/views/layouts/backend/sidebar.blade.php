    <div class="sidebar" data-color="blue" data-image="{{ secure_asset('tim/img/sidebar-1.jpg') }}">
<!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
<div class="logo">
    <a href="#" class="simple-text">
        Varitec
    </a>
</div>
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="{{ ( $menu == "m_dashboard" )? "active" : "" }}">
            <a href="dashboard.html">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="{{ ( $menu == "m_funcionario" )? "active" : "" }}">
            <a href="./user.html">
                <i class="material-icons">supervisor_account</i>
                <p>Funcionarios</p>
            </a>
        </li>
        <li class="{{ ( $menu == "m_resumen" )? "active" : "" }}">
            <a href="{{ route('informeresumen.index') }}">
                <i class="material-icons">assessment</i>
                <p>Resumen</p>
            </a>
        </li>
        <li class="{{ ( $menu == "m_prueba" )? "active" : "" }}">
            <a href="./typography.html">
                <i class="material-icons">library_books</i>
                <p>Prueba</p>
            </a>
        </li>
        <li class="{{ ( $menu == "m_dinamico" )? "active" : "" }}">
            <a href="./icons.html">
                <i class="material-icons">bubble_chart</i>
                <p>Dinamico</p>
            </a>
        </li>
        <li class="{{ ( $menu == "m_centro" )? "active" : "" }}">
            <a href="./maps.html">
                <i class="material-icons">business</i>
                <p>Centros</p>
            </a>
        </li>
        <li class="{{ ( $menu == "m_cabana" )? "active" : "" }}">
            <a href="./notifications.html">
                <i class="material-icons">hotel</i>
                <p>Cabañas</p>
            </a>
        </li>
    </ul>
</div>
</div>
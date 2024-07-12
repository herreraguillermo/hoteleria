<?php 
$productos_medicos_diagnostico = [ // Array de objetos
    // parametro_url no debe tener espacios
    // El valor de parametro_url es usado en el switch de productos_medicos_diagnostico.php
    [
        "nombre" => "Proteínas",
        "parametro_url" => "proteinas"
    ],  
    [
        "nombre" => "Inmunodeficiencias",
        "parametro_url" => "inmunoDeficiencias"
    ],  
    [
        "nombre" => "Microbiología",
        "parametro_url" => "adadadfadf"
    ],  
    [
        "nombre" => "Biología Molecular",
        "parametro_url" => "aladadfdfdfgo"
    ],
    [
        "nombre"=>"Autoinmunidad",
        "parametro_url"=>"asd"
    ]  
];
?>

<div class="topbar-one">
    <div class="container-fluid">
        <div class="topbar-one__inner">
            <ul class="list-unstyled topbar-one__info">
                <li class="topbar-one__info__item">
                    <i class="icon-pin topbar-one__info__icon"></i>
                    <span class="topbar-one__info__item__location">Dr. Adolfo Dickman 990</span>
                </li>
                <li class="topbar-one__info__item">
                    <i class="icon-email topbar-one__info__icon"></i>
                    <a class="topbar-one__info__item__email" href="mailto:needhelp@company.com">ventas@onyva.com.ar</a>
                </li>
            </ul><!-- /.list-unstyled topbar-one__info -->
            <div class="topbar-one__right">
                <p class="topbar-one__text">
                    <i class="icon-clock1 topbar-one__right__icon"></i>
                    <span>Lunes-Viernes 9:00 a 18:00</span>
                </p><!-- /.topbar-one__text -->
                <div class="topbar-one__social">
                    <a href="https://api.whatsapp.com/send?phone=5491155938774&amp;text=%C2%A1Hola%21+Estoy+en+la+web+de+ONYVA+y+quiero+pedir+m%C3%A1s+informaci%C3%B3n."> <i class="fab fa-whatsapp" aria-hidden="true"></i> <span class="sr-only">Facebook</span> </a>
                    <a href="https://www.facebook.com/onyvaenargentina"> <i class="fab fa-facebook-f" aria-hidden="true"></i> <span class="sr-only">Facebook</span> </a>
                    <a href="https://www.linkedin.com/company/onyva-srl/"> <i class="fab fa-linkedin-in" aria-hidden="true"></i> <span class="sr-only">Facebook</span> </a>
                    <a href="https://www.instagram.com/onyvasrl"> <i class="fab fa-instagram" aria-hidden="true"></i> <span class="sr-only">Instagram</span></a>
                </div><!-- /.topbar-one__social -->
            </div><!-- /.topbar-one__right -->
        </div><!-- /.topbar-one__inner -->
    </div><!-- /.container-fluid -->
</div><!-- /.topbar-one -->

<header class="main-header sticky-header sticky-header--normal">
    <div class="container-fluid">
        <div class="main-header__inner">
            <div class="main-header__logo logo-laboix">
                <a href="./index.php">
                    <img src="assets/images/onyva-logo/logo-onyva.png" alt="Laboix HTML" width="133">
                </a>
            </div><!-- /.main-header__logo -->
            <nav class="main-header__nav main-menu">
                <ul class="main-menu__list">
                    <li class="dropdown megamenu"><!-- Institucional -->
                        <a href="institucional.php">Institucional</a>
                    </li>
                    <li class="dropdown"><!-- Productos Médicos de Diagnóstico -->
                        <a href="#">Productos Médicos de Diagnóstico</a>
                        <ul class="sub-menu">
                            <?php foreach ($productos_medicos_diagnostico as $item) { ?>
                                <li>
                                    <a href='productos_medicos_diagnostico.php?parametro=<?php echo $item["parametro_url"];?>'>
                                            <?php echo $item["nombre"]; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Otros Productos Médicos</a>
                        <ul class="sub-menu">
                            <li><a href="./comfort-in.php">Sistema de inyección sin agúja</a></li>
                            <li><a href="./rayosXPortatil.php">Rayos X Portátil</a></li>
                            <li class="./dropdown"><a href="./oxigeno_medicinal.php">Oxígeno Medicinal</a>
                            <ul class="sub-menu">
                                <li><a href="./oxigenoMedicinalOxus.php">OXUS</li>
                                <li><a href="./oxigenoMedicinalMoss.php">MOSS</a></li>
                        </ul>
                    </li>
                    <li><a href="./medicinaEstetica.php">Medicina estética</a></li>
                    <li><a href="./miscelaneas.php">Miscelaneas</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Inteligencia Artificial</a>
                        <ul class="sub-menu">
                            <li><a class="dropdown-item" href="./inteligencia_artificial.php">Inteligencia Artificial</a></li>
                            <li><a class="noclick" href="">Presentación</a></li>
                            <li><a class="noclick" href="">Cerebro</a></li>
                            <li><a class="noclick" href="">Mama</a></li>
                            <li><a class="noclick" href="">Tórax</a></li>
                            <li><a class="noclick" href="">Próstata</a></li>
                            <li><a class="noclick" href="">Oclusión venosa profunda</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Capacitación</a>
                        <ul class="sub-menu">
                            <li class="dropdown"><a href="#">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-grid.html">No Sidebar</a></li>
                                    <li><a href="blog-grid-left.html">Left Sidebar</a></li>
                                    <li><a href="blog-grid-right.html">Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog List</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-list.html">No Sidebar</a></li>
                                    <li><a href="blog-list-left.html">Left Sidebar</a></li>
                                    <li><a href="blog-list-right.html">Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="blog-carousel.html">Blog Carousel</a></li>
                            <li class="dropdown"><a href="#">Blog Details</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-details.html">No Sidebar</a></li>
                                    <li><a href="blog-details-left.html">Left Sidebar</a></li>
                                    <li><a href="blog-details-right.html">Right Sidebar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.html">Contacto</a>
                    </li>
                </ul>
            </nav><!-- /.main-header__nav -->

            <div class="main-header__right">
                <div class=""><!-- main-header__link -->
                    <a href="contact.html" class="laboix-btn main-header__btn">Appoinment</a>
                </div>

                <!-- Icónos -->
                <!-- <div class="mobile-nav__btn mobile-nav__toggler">
                    <span></span><span></span><span></span>
                    <i class="icon-search" aria-hidden="true"></i> <span class="sr-only">Search</span> 
                    <i class="icon-trolley" aria-hidden="true"></i> <span class="sr-only">Search</span> 
                    <i class="icon-telephone-call-1"></i>
                </div> --><!-- /.mobile-nav__toggler -->

            </div><!-- /.main-header__right -->
        </div><!-- /.main-header__inner -->
    </div><!-- /.container-fluid -->
</header><!-- /.main-header -->
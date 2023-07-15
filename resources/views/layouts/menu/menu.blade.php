<div class="sb-nav-fixed time-new-rooman">
    <nav class="sb-topnav navbar navbar-expand menu-color ">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 text-uppercase gras text-font " style="color:burlywood" >Eau Dounia</a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars menu-btn"></i>
        </button>

        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></form>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle menu-btn" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw menu-btn"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item text-lg" href="#!">profil</a></li>
                    <li>
                        @auth
                            <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion menu-color " id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <!-- Etablissement -->
                        @can('accès_à_entreprise')
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseEtablissement" aria-expanded="false" aria-controls="collapseEtablissement">
                                <span class="text-uppercase text-white gras"> Entreprise </span>
                                <div class="sb-sidenav-collapse-arrow menu-btn"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseEtablissement" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav menu">
                                    @can('voir_entreprise_information')
                                        <a class="nav-link gras menu-text"  href="{{ route('get_structure_data') }}"> Information</a>
                                    @endcan
                                    @can('voir_entreprise_telephone')
                                        <a class="nav-link menu-text gras" href="{{ route('get_structure_phone') }}"> Telephone</a> 
                                    @endcan
                                    @can('voir_entreprise_roles')
                                        <a class="nav-link gras menu-text" href="{{ route('get_role_to_list_permission') }}">Role</a>
                                    @endcan
                                </nav>
                            </div>
                        @endcan

                        <!-- Secretaires -->
                        @can('accès_aux_agents')
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSecretaire"
                                aria-expanded="false" aria-controls="collapseSecretaire">
                                <span class="text-uppercase text-white gras"> Agent </span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down menu-btn"></i></div>
                            </a>
                            <div class="collapse" id="collapseSecretaire" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav menu">
                                    @can('creer_des_agents')
                                        <a class="nav-link menu-text gras" href="{{ route('user_create_form') }}">Creer</a> 
                                    @endcan
                                    @can('voir_des_agents')
                                        <a class="nav-link menu-text gras" href="{{ route('get_role') }}">Voir</a> 
                                    @endcan
                                </nav>
                            </div>
                        @endcan
                        
                        
                        <!-- Client -->
                        @can('accès_aux_clients')
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseClient"
                                aria-expanded="false" aria-controls="collapseClient">
                                <span class="text-uppercase text-white gras"> Client </span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down menu-btn"></i></div>
                            </a>
                            <div class="collapse" id="collapseClient" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav menu">
                                    @can('voir_des_clients')
                                        <a class="nav-link menu-text gras" href="">Voir</a>
                                    @endcan
                                    @can('creer_des_clients')
                                        <a class="nav-link menu-text gras" href="">Créer</a>
                                    @endcan
                                </nav>
                            </div>
                        @endcan
                        

                        <!-- Commande -->
                        @can('accès_aux_commandes')
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCommande"
                                aria-expanded="false" aria-controls="collapseCommande">
                                <span class="text-uppercase text-white gras"> Commande </span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down menu-btn"></i></div>
                            </a>
                            <div class="collapse" id="collapseCommande" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav menu">
                                    @can('voir_des_commandes')
                                        <a class="nav-link menu-text gras" href="">Voir</a>
                                    @endcan
                                    @can('creer_des_commandes')
                                        <a class="nav-link menu-text gras" href="">Créer</a>
                                    @endcan
                                </nav>
                            </div>
                        @endcan
                        

                        <!-- Payment -->
                        @can('accès_aux_paiements')
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePayment"
                                aria-expanded="false" aria-controls="collapsePayment">
                                <span class="text-uppercase text-white"> Paiement </span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down menu-btn"></i></div>
                            </a>
                            <div class="collapse" id="collapsePayment" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav menu">
                                    @can('voir_des_paiements')
                                        <a class="nav-link menu-text gras" href="">Voir</a>
                                    @endcan
                                    @can('creer_des_paiements')
                                        <a class="nav-link menu-text gras" href="">Créer</a>
                                    @endcan
                                </nav>
                            </div>
                        @endcan
                        
                    </div>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid pt-4">
                    @yield('content')
                </div>
            </main>
            <footer class="py-4 mt-auto">
                <div class="container-fluid px-4"></div>
            </footer>
        </div>
    </div>
</div>
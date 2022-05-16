<nav class="navbar custom-navbar navbar-expand-lg py-2">
    <div class="container-fluid px-0">
        <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
        <a href="{{ url('/dashboard') }}" class="navbar-brand"><img src="{{ asset('front/icon/Favicon.png') }}" alt="BigBucket" />
            <strong>Consalti</strong> Assurance</a>
        <div id="navbar_main">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item hidden-xs">
                    <form class="form-inline main_search">
                        <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Search..."
                            aria-label="Search">
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="main_content" id="main-content">
    <div class="left_sidebar">
        <nav class="sidebar">
            <ul id="main-menu" class="metismenu mt-3">
                <li><a href="{{ url('/dashboard') }}"><i class="ti-user"></i><span>Mon Profile</span></a></li>
                <li><a href="{{ url('/dashboard/beneficiaires')}}"><i class="fa fa-group"></i><span>Beneficiaires</span></a></li>
                <li><a href="{{ url('/dashboard/dossiers')}}"><i class="ti-book"></i><span>Dossiers Medicaux</span></a></li>
                <li><a href="{{ url('/dashboard/accidents-de-travail')}}"><i class="ti-ticket"></i><span>Accidents de travail</span></a></li>
                <li><a href="{{ url('/dashboard/prise-en-charge')}}"><i class="ti-clipboard"></i><span>Prise en charge</span></a></li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                        Deconnexion
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
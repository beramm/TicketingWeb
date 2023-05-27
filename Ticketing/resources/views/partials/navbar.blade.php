<nav class="navbar navbar-expand-lg bg-dark">

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg"
        aria-controls="navbarOffcanvasLg" style="margin-left: 15px;">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand me-auto text-white" href="/home"
        style="text-align: left; margin-left: 15px; margin-right: 50px;">
        <img src="/img/logo1.png" style="width: 95px; margin-right: 20px" id="pictAll">
        <span class="diss">TicketVerse</span>
    </a>
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="navbarOffcanvasLg"
        aria-labelledby="navbarOffcanvasLgLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ">
            <ul class="navbar-nav justify-content-center justify-content-lg-end flex-grow-1 pe-3 "
                style="margin-right: 10px;">
                <li class="nav-item " style="margin-right: 10px;">
                    <a class="nav-link" title="Click to see HomePage" href="/home">HomePage</a>
                </li>


                <li class="nav-item dropdown" style="margin-right: 10px;">

                    <a class="nav-link dropdown-toggle" href="#" id="kegiatan-link" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu dropdown-hover" data-bs-auto-close="false">
                        <li><a class="dropdown-item" href="">Jass</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Pop</a>
                        </li>
                        {{-- <li>
                            <hr class="dropdown-divider">
                        </li> --}}
                        <li><a class="dropdown-item" href="#">K-Pop
                            </a></li>
                        <li><a class="dropdown-item" href="#">R&B</a></li>
                        <li><a class="dropdown-item" href="#">Rock
                            </a></li>
                        <li><a class="dropdown-item" href="#">Hip-Hop</a></li>
                    </ul>
                </li>
                <li class="nav-item text-white " style="margin-right: 20px;">
                    <a class="nav-link" href="about" id="contact-link" title="Click to see Contact Person">About
                        Us</a>
                </li>
                <li class="nav-item text-white" style="margin-right: 15px;">
                    @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    <li class="m-3"><a href="{{ route('profile') }}">Profile</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @endguest
                </li>
            </ul>

        </div>
    </div>
</nav>

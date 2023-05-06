<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">

        <ul class="navbar-nav">
            <li class="nav-item">
                <form action="/logout" method="post" id="logout">
                    @csrf
                <a href="javascript:logout();" class="btn btn-dark"><i class="me-2 icon-md" data-feather="log-out"></i> Logout</a>
                </form>
            </li>
            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle" src="{{ url('https://via.placeholder.com/30x30') }}"
                         alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle" src="{{ url('https://via.placeholder.com/80x80') }}"
                                 alt="">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">Amiah Burton</p>
                            <p class="tx-12 text-muted">amiahburton@gmail.com</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="{{ url('/general/profile') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <form action="/logout" method="post" id="logout">
                                @csrf
                                <a href="javascript:logout();" class="text-body ms-0"><i class="me-2 icon-md"
                                                                                         data-feather="log-out"></i><span>Logout</span></a>
                            </form>
                        </li>
                    </ul>
                </div>
            </li> --}}
        </ul>
    </div>
</nav>

<script>
    function logout() {
        document.getElementById("logout").submit();
    }
</script>

<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 header-shadow">
                <div class="container">
                    <div class="row">
                        <div class="logo-wrapper"><a href="/"><span>Túasist.es</span></a></div>
                        <div class="mainMenu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/about">About</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                        <div class="links">
                            @if (Auth::user())
                                welcome, <a href="/profile">{{ Auth::user()->name }}</a> <a class="loginn hvr-fade" href="/auth/logout">Logout</a>
                            @else
                                <a class="loginn hvr-fade" href="/auth/login">Login</a>
                                <a class="registerr hvr-fade" href="/register">Register</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="height90"></div>
        </div>
    </div>
</header>
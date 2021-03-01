<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Manage Shorturl
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-10"><i class="fas fa-tasks"></i>Url Menu</a>
                        <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('urlshort.user')}}">Make a short url</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('allshort')}}">All short url list</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('customurl')}}">Make custom short url</a>
                                </li>



                            </ul>
                        </div>
                    </li>


                    <li class="nav-divider">
                        Url Analysis
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-10"><i class="fas fa-table"></i>Analysis Menu</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('urldata')}}">Url Data</a>
                                </li>


                            </ul>
                        </div>
                    </li>
                    <li class="nav-divider">
                        Control
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-10"><i class="fas fa-cog"></i>Control Menu</a>
                        <div id="submenu-3" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('rule.url')}}">Set rule</a>
                                </li>


                            </ul>
                        </div>
                    </li>
                    <li class="nav-divider">
                        Url Tools
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-10"><i class="fas fa-bars"></i>Tool Menu</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('qrcode')}}">Get QRCode</a>
                                </li>


                            </ul>
                        </div>
                    </li>



                </ul>
            </div>
        </nav>
    </div>
</div>

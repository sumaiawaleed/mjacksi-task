<div class="header">
    <nav class="navbar py-4">
        <div class="container-xxl">

            <!-- header rightbar icon -->
            <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">

                @auth
                <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                    <div class="u-info me-2">
                        <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold"></span></p>
                        <small>{{ auth()->user()->name }}</small>
                    </div>
                    <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                        <img class="avatar lg rounded-circle img-thumbnail" src="{{ auth()->user()->getImageSize(100,100) }}" alt="profile">
                    </a>
                    <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                        <div class="card border-0 w280">
                            <div class="card-body pb-0">
                                <div class="d-flex py-1">
                                    <img class="avatar rounded-circle" src="{{ auth()->user()->getImageSize(100,100) }}" alt="profile">
                                    <div class="flex-fill ms-3">
                                        <p class="mb-0"><span class="font-weight-bold">{{ auth()->user()->name }}</span></p>
                                        <small class="">{{ auth()->user()->email }}</small>
                                    </div>
                                </div>

                                <div><hr class="dropdown-divider border-dark"></div>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                            <div class="list-group m-2 ">
                                <a href="#" class="list-group-item list-group-item-action border-0 "><i class="fa fa-user fs-6 me-3"></i>@lang('site.profile')</a>
                                <a href="#" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" style="cursor: pointer" class="list-group-item list-group-item-action border-0 "><i class="fa fa-close fs-5 me-3"></i>@lang('site.logout')</a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                 <a href="{{ route('login')}}">Login</a>
                @endauth
            </div>

            <!-- menu toggler -->
            <button class="navbar-toggler p-0 border-0 menu-toggle order-3 ms-1" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                <span class="fa fa-bars"></span>
            </button>

            <!-- main menu Search-->
            <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                <div class="input-group flex-nowrap input-group-lg">
                    <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
                    <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping">

                </div>
            </div>

        </div>
    </nav>
</div>

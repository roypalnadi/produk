<div class="container sidebar py-5" style="background-color: #F13B2F; z-index: 1;" id="sidebar">
    <div class="row align-items-center mb-5">
        <div class="text-white nowrap col-9">
            <img src="{{ asset('assets/Handbag.png') }}" class="pr-2" alt="">
            <span class="logo-text">
                SIMS Web App
            </span>
        </div>
        <div class="col-auto" style="padding-left: 15px;">
            <a href="#" id="button-toggle"><i class="fa-solid fa-bars" style="color: white;"></i></a>
        </div>
    </div>
    <a class="row pb-2 pt-2 mb-4 selected-hover @if(Route::currentRouteName() == 'produk.index') selected-menu @endif" href="{{ route('produk.index') }}">
        <div class="col-12">
            <div class="text-white nowrap">
                <img src="{{ asset('assets/Package.png') }}" class="pr-2" alt="">
                <span class="logo-text">
                    Produk
                </span>
            </div>
        </div>
    </a>
    <a class="row pb-2 pt-2 mb-4 selected-hover @if(Route::currentRouteName() == 'profil.index') selected-menu @endif"  href="{{ route('profil.index') }}">
        <div class="col-12">
            <div class="text-white nowrap">
                <img src="{{ asset('assets/User.png') }}" class="pr-2" alt="">
                <span class="logo-text">
                    Profil
                </span>
            </div>
        </div>
    </a>
    <a class="row pb-2 pt-2 mb-4 selected-hover @if(Route::currentRouteName() == 'logout') selected-menu @endif" href="{{ route('logout') }}">
        <div class="col-12">
            <div class="text-white nowrap">
            <img src="{{ asset('assets/SignOut.png') }}" class="pr-2" alt="">
                <span class="logo-text">
                    Logout
                </span>
            </div>
        </div>
    </a>
</div>

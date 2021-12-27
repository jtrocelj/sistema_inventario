@auth()
    @include('layouts.navbars.navs.auth2')
@endauth
    
@guest()
    @include('layouts.navbars.navs.guest')
@endguest
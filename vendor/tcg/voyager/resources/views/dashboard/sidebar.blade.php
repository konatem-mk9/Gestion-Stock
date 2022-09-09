
<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header" style="background: #fff;">
                <a class="goTo" href="{{ route('voyager.dashboard') }}">
                    <div class="logo-content">
                      
                            <img src="{{url('public/kamab.JPG')}}" style="width: 100%;" alt="Logo Icon">
                      
                    </div>
                    <!-- <div class="title">{{Voyager::setting('admin.title', 'BIENVENU(E)')}}</div> -->
                </a>
            </div><!-- .navbar-header -->

            <div class="panel widget center bgimage"
                 style=" background-size: cover; background-position: 0px;">
                <div class="dimmer"></div>
                <div class="panel-content">
                    <img src="{{ $user_avatar }}" class="avatar" alt="{{ Auth::user()->name }} avatar">
                    <h4>{{ ucwords(Auth::user()->name) }}</h4>
                    <p>{{ Auth::user()->email }}</p>

                    <a href="{{ route('voyager.profile') }}" class="btn btn-primary">{{ __('voyager::generic.profile') }}</a>
                    <div style="clear:both"></div>
                </div>
            </div>

        </div>
        <div id="adminmenu">
            <admin-menu :items="{{ menu('admin', '_json') }}"></admin-menu>
        </div>
    </nav>
</div>

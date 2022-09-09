<style>
.notif_container{
    display: flex;
    justify-content: space-between;
    height: 29px;
}
.code_prod{
    display: flex;
    align-items: center;
    display: flex;
    align-items: center;
    flex-direction: column
}
.state_prod{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.list_prods_notif{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}
.number_notif{
    margin-top: 7px;
    /* margin-right: 12px; */
    font-size: 12px;
    margin-left: -10px;
    /* padding-right: 5px; */
    position: absolute;
}

</style>
<nav class="navbar navbar-default navbar-fixed-top navbar-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="hamburger btn-link">
                <span class="hamburger-inner"></span>
            </button>
            @section('breadcrumbs')
            <ol class="breadcrumb hidden-xs">
                @php
                $segments = array_filter(explode('/', str_replace(route('voyager.dashboard'), '', Request::url())));
                $url = route('voyager.dashboard');
                @endphp
                @if(count($segments) == 0)
                    <li class="active"><i class="voyager-boat"></i> {{ __('voyager::generic.dashboard') }}</li>
                @else
                    <li class="active">
                        <a href="{{ route('voyager.dashboard')}}"><i class="voyager-boat"></i> {{ __('voyager::generic.dashboard') }}</a>
                    </li>
                    @foreach ($segments as $segment)
                        @php
                        $url .= '/'.$segment;
                        @endphp
                        @if ($loop->last)
                            <li>{{ ucfirst(urldecode($segment)) }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}">{{ ucfirst(urldecode($segment)) }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ol>
            
            @show
        
          
        </div>
        <ul class="nav navbar-nav navbar-right notif" style="margin-right: 74px;">

        <li class="dropdown profile">
                <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                   aria-expanded="false" style="margin-top: 2px;"> <i class="voyager-bell" style="font-size: 21px;"> <span class="badge badge-danger number_notif">{{sizeof(getProdEnRupture())}}</span></i> <span
                            class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-animated" style="overflow-y: auto; max-height: 600px;width: 300px;">
                    <div class="profile-img">
                    <p> {{sizeof(getProdEnRupture())}} - Produits en rupture  </p>
                    </div>
                   
                    <li class="divider"></li>  
                   
                    <div class="notif_container" style="border-bottom: 1px solid rgba(0,0,0,.125)" >
                            <div class="code_prod">
                            <span style="font-weight:600;font-size: 12px;">Produit</span>
                            </div>
                            <div class="state_prod">
                                <span  style="font-weight:600;font-size: 12px;">En Stock</span>
                            </div>
                    </div>   
                     @foreach(getProdEnRupture() as $prodRupture)
                    <li style="border-bottom: 1px solid rgba(0,0,0,.125)">           
                        <a href="{{route('voyager.products.show',$prodRupture->product_id )}}">         
                          <div class="list_prods_notif">
                            <div>
                            <span style="font-size: 13px;">{{$prodRupture->code}}</span>
                            </div>
                            <div>
                                <span class="badge badge-danger" style="font-size: 13.5px;">{{$prodRupture->difference}}</span>
                            </div> 
                          </div>
                        </a>                   
                    </li>
                    @endforeach

                   
                   
           

                    
                </ul>
            </li>
            </ul>
        <ul class="nav navbar-nav @if (__('voyager::generic.is_rtl') == 'true') navbar-left @else navbar-right @endif">

        
        
            <li class="dropdown profile">
                <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                   aria-expanded="false"><img src="{{ $user_avatar }}" class="profile-img"> <span
                            class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-animated">
                    <li class="profile-img">
                        <img src="{{ $user_avatar }}" class="profile-img">
                        <div class="profile-body">
                            <h5>{{ Auth::user()->name }}</h5>
                            <h6>{{ Auth::user()->email }}</h6>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <?php $nav_items = config('voyager.dashboard.navbar_items'); ?>
                    @if(is_array($nav_items) && !empty($nav_items))
                    @foreach($nav_items as $name => $item)
                    <li {!! isset($item['classes']) && !empty($item['classes']) ? 'class="'.$item['classes'].'"' : '' !!}>
                        @if(isset($item['route']) && $item['route'] == 'voyager.logout')
                        <form action="{{ route('voyager.logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-block">
                                @if(isset($item['icon_class']) && !empty($item['icon_class']))
                                <i class="{!! $item['icon_class'] !!}"></i>
                                @endif
                                {{__($name)}}
                            </button>
                        </form>
                        @else
                        <a href="{{ isset($item['route']) && Route::has($item['route']) ? route($item['route']) : (isset($item['route']) ? $item['route'] : '#') }}" {!! isset($item['target_blank']) && $item['target_blank'] ? 'target="_blank"' : '' !!}>
                            @if(isset($item['icon_class']) && !empty($item['icon_class']))
                            <i class="{!! $item['icon_class'] !!}"></i>
                            @endif
                            {{__($name)}}
                        </a>
                        @endif
                    </li>
                    @endforeach
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</nav>

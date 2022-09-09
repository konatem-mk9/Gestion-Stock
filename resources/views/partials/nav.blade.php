<header>
    <div class="top-nav container">
        <div class="top-nav-left">
            <div class="logo"><a href="{{ url('/') }}">Bijouterie-Obiang</a></div>
                @if (! (request()->is('checkout') || request()->is('guestCheckout')))
                {{menu('main', 'partials.menus.main') }}
                @else
                <ul> 
                  <li>
                     <a href="{{route('shop.index')}}">
                      Catalogue  
                    </a>
                  </li>    
                </ul>
                @endif
            </div>
        
                 <div class="top-nav-right">
                 @if (! (request()->is('checkout') || request()->is('guestCheckout')))
                     @include('partials.menus.main-right')
                @endif
                 </div>
          

    
        </div>
                  
                 
     
</header>

<ul>
    @guest
    <li><a href="{{ route('register') }}"><p class="item-nav"> Créer compte </p></a></li>
    <li><a href="{{ route('login') }}"><p class="item-nav">Connexion</p></a></li>
    @else
    <li>
        <a href="{{ route('users.edit') }}"><p class="item-nav">Mon compte</p></a>
    </li>
    <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            
            <p class="item-nav">Déconnexion</p>
        </a>
    </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endguest
    <li><a href="{{ route('cart.index') }}"><p class="item-nav"><i class="fa fa-shopping-cart" style="font-size:20px;"></i>
    @if (Cart::instance('default')->count() > 0)
    <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
    @endif
    </p>
    </a></li>
    {{-- @foreach($items as $menu_item)
        <li>
            <a href="{{ $menu_item->link() }}">
                {{ $menu_item->title }}
                @if ($menu_item->title === 'Cart')
                    @if (Cart::instance('default')->count() > 0)
                    <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
                    @endif
                @endif
            </a>
        </li>
    @endforeach --}}
</ul>

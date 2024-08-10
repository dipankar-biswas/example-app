<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="{{ Route('home') }}">LOGO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ Route('home') }}">Home</a>
                    </li>
                    @if(Session::get('id'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('product.list') }}">Product Add</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('logout') }}">Logout</a>
                    </li>
                    @endif
                    @if(!Session::get('id'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('register') }}">Register</a>
                    </li>
                    @endif
                </ul>
                
                <div class="cart-list">
                    <div class="dropdown">
                        @php
                        $carts = \App\Models\Cart::where('session_id',Session::getId())->get();
                        @endphp
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cart({{ $carts->sum('quantity') }})
                        </a>
                        @if(count($carts) > 0)
                        <ul class="dropdown-menu" style="right:0;left:auto;width:300px">
                            @if(isset($carts) && $carts != null)
                            @foreach($carts as $key=>$item)
                            <li class="item d-flex gap-2 p-2">
                                <img src="" class="card-img-top" alt="Image" style="width:50px;height:40px">
                                <div class="content" style="width:calc(100% - 50px)">
                                    <a href="{{ route('cart.delete',$item->id) }}" class="text-danger fs-5 float-end text-decoration-none">X</a>
                                    <div class="title text-secondary" style="font-size: 14px;"><strong>{{ $item->name }}</strong></div>
                                    <div class="price fs-6 text-danger">${{ $item->price }} x {{ $item->quantity }}</div>
                                </div>
                            </li>
                            @endforeach
                            @endif
                            <li class="item mt-1 pb-1 text-center">
                                <strong>Total Price: ${{$carts->sum(function($product){ return $product->price * $product->quantity; })}}</strong>
                            </li>
                            <li class="item mt-2 text-center">
                                <a href="{{ Route('checkout') }}" class="btn btn-sm btn-success">Checkout</a>
                            </li>
                        </ul>
                        @else
                        <ul class="dropdown-menu" style="right:0;left:auto;width:300px">
                            <li class="item text-center">Not Cat Data!!</li>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
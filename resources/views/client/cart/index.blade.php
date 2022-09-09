@extends('client.layouts.master')
@section('extra-css')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="col-md-12 d-flex justify-content-between">
  
    <div> 
    <h1>Mon panier</h1>  
    </div>
    <div>
    <a href="{{route('products.index')}}" class="btn btn-success rounded-pill py-2 btn-block goto">  Page Produits</a>
    </div>
</div>
@if (Cart::count() > 0)
<style>
.achat{
    width:50%;
    margin:0 auto;
}
</style>
<div class="col-md-12">
    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5  bg-white rounded shadow-sm mb-5">
                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col" class="border-0 bg-light">
                                <div class="p-2 px-3 text-uppercase">Produit</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Prix</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Quantité</div>
                            </th>
                            <th scope="col" class="border-0 bg-light text-center">
                                <div class="py-2 text-uppercase">Supprimer</div>
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                      
                            @foreach (Cart::content() as $product)
                            <tr>
                                <th scope="row" class="border-0">
                                    <div class="p-2">
                                        <!-- <img src="{{ $product->model->image }}" alt="" width="70" class="img-fluid rounded shadow-sm"> -->
                                        <div class="ml-3 d-inline-block align-middle">
                                            <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{ $product->model->nom }}</a></h5><span class="text-muted font-weight-normal font-italic d-block">Category:</span>
                                        </div>
                                    </div>
                                </th>
                                <td class="border-0 align-middle"><strong>{{ $product->model->getPrice() }}</strong></td>
                                <td class="border-0 align-middle">
                                <select class="quantity custom-select" data-id="{{ $product->rowId }}" data-productQuantity="{{ $product->model->quantity }}">
                                @for ($i = 1; $i < 5 + 1 ; $i++)
                                    <option {{ $product->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                                </td>
                                <td class="border-0 align-middle">
                                <div class="action text-center">
                               
                                    <form action="{{ route('stockcart.destroy', $product->rowId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        <div class="p-4">
                        <ul class="list-unstyled mb-4">
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted"></strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                            <h5 class="font-weight-bold">{{ getPrice(Cart::subtotal())}}</h5>
                        </li>
                        </ul>
                        <form action="{{ route('stockcheckout.store') }}" method="POST">
                        {{ csrf_field() }}
                        @if (auth()->user())
                            <input type="text" class="form-control" id="name" name="name" value="{{  auth()->user()->name }}" hidden>

                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" hidden>
                        @endif
                    </div>
                   

                            @if(Cart::count()>0)
                            
                                <button type="submit" class="btn btn-dark rounded-pill py-2 btn-block achat">
                                Commander
                                </button>
                                @endif
                        </form>

                            
                          
                            

                          
                        </div>
                    </div>
                    </div>
                    <!-- End -->
                </div>
            </div>
           

            
        </div>
    </div>
</div>
@else
    <div class="col-md-12">
        <p>Votre panier est vide.</p>
    </div>
@endif
@endsection
@section('extra-js')

<script src="{{ url('public/js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                  
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')
                    
                       
                    axios.patch(`panier/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                        
                    }
                   )
                    .then(function (response) {
                        console.log(response);         
                        //  window.location.href = '{{ route('stockcart.index') }}'
                    })
                    .catch(function (error) {
                        console.log(error);
                        // window.location.href = '{{ route('stockcart.index') }}'
                    });
                })
            })
        })();
    </script>
@endsection
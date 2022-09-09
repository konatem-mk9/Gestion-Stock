@extends('client.layouts.master')
@section('content')
    @foreach ($products as $product)
      <div class="col-md-6" >
      <div class="card w-100 mb-2 ">
        <div class="card-body">
        <div class="row">
         <div class="col-md-6">
         <h6 class="card-title">
            <!-- <strong class="d-inline-block mb-2 text-success">Catégorie 1</strong> -->
            </h6>
            <h5 class="mb-0">{{ $product->nom }}</h5>
            <p class="mb-auto text-muted">{{ $product->designation }}</p>
         </div>
         <div class="col-md-4 d-flex justify-content-around align-items-center">
          <div><strong class="mb-auto font-weight-bold text-danger">{{ $product->getPrice()}}</strong></div>
         </div>
         <div class="col-md-2 d-flex justify-content-around align-items-center">
  
         <div>
         <form action="{{route('stockcart.store')}}" method="POST">
            @csrf 
            <input type="hidden" name="product_id" value="{{$product->id}}" />
           

             <button type="submit" class="btn btn-success">ajouter</button> 
         </form>
         </div>
           
           

         </div>

        </div>
           
            

           
        </div>
        </div>
      </div>
      
    @endforeach
  @endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

use App\Product;
class StockCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('client.cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id == $request->product_id;
        });

        if ($duplicata->isNotEmpty()) {
            return  back()->with([
                'message'    =>'Produit existe déjà dans le panier',
                'alert-type' => 'error',
            ]);
        }

        $product = Product::find($request->product_id);
        // dd($product);

        Cart::add($product->id, $product->code, 1, $product->prix_ht_vente,  ['categorie'=>$product->categorie,'quantité'=>$product->quantité ])
            ->associate('App\Product');
      
            return  back()->with([
                'message'    =>'Produit ajouté avec succès',
                'alert-type' => 'success',
            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        dd($id);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        dd($request->ajax());
        $data = $request->json()->all();
        dd($data);

        $validates = Validator::make($request->all(), [
            'quantity' => 'numeric|required|between:1,10',
        ]);

        if ($validates->fails()) {
            Session::flash('error', 'La quantité doit est comprise entre 1 et 5.');
            return response()->json(['error' => 'Cart Quantity Has Not Been Updated']);
        }

        Cart::update($rowId, $data['quantity']);

        Session::flash('success', 'La quantité du produit est passée à ' . $data['quantity'] . '.');
        return response()->json(['success' => 'Cart Quantity Has Been Updated']);
    }

  
   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {   
        Cart::remove($rowId);

        return  back()->with([
            'message'    =>'Produit supprimé avec succès',
            'alert-type' => 'success',
        ]);

    }
}

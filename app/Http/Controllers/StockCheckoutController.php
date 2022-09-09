<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Stock;
use App\OrderProduct;
use App\Client;
use App\Vente;
use App\Compte;
use App\Type;
use App\VenteProduit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Gloudemans\Shoppingcart\Facades\Cart;

class StockCheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       
      
        try {
            
            if( $request->isUpdate==1) 
            {   
                // dd($request->all());
                $selected_client = $request->client_id;
                Cart::update($request->rowId, $request->newqty);
                return back()->with([
                    'message'    =>'Quantité modifier avec succès, nouvelle quantité = '. $request->newqty . '.',
                    'alert-type' => 'success',
                    'selectedClient' => $request->client_id,
                   
                    
                ]);
                // withSuccess('success! ' . 'La quantité du produit est passée à ' . $request->newqty . '.');

            }else if ($request->isNewclientAdd == 1)

            {   
                $client = new Client();
                // $commande = new Commande();
                // dd($request->all());
                $client->code_client = $request->new_client_code;
                $client->nom =  $request->new_client_nom;
                $client->téléphone =  $request->new_client_contact;
                $client->email =  $request->new_client_mail;
                if($request->new_client_type){
                    $type =  Type::find($request->new_client_type);
                    $client->type =  $type->dénomination;
                    $client->type_id =  $type->id;
                }
                
             
               
                $client->adresse =  $request->new_client_adresse;
                $client->pays =  $request->new_client_pays;
                $client->ville =  $request->new_client_ville;
                $client->save();  

                return back()->with([
                    'message'    =>'CLient ajouté avec succès',
                    'alert-type' => 'success',
                    
                ]);
            }
            else  //comande
            {   $client =Client::find($request->client_id);
               

                $commande = new Vente();

                if($request->customRadio=="virement"){
                   
                    $compte = Compte::find($request->numCompte);
                    // numero_compte
                    $commande->paiement=$request->mode_paiement;
                    $commande->compte=$compte->numero_compte;                 
                }else{
                    $commande->paiement=$request->mode_paiement;

                }
                if($client->type_id){
                    $type = Type::find($client->type_id);
                   
                    if($type->tva==1){
                        $commande->total =  getPrice(getNumbers()->get('newTotal'),true,true,true);
                        $commande->restant = getRestantPrice(getNumbers()->get('newTotal'),$request->paye_form, true);
                    }else{
                        $commande->total =  getPrice(getNumbers()->get('newTotal'),false,true,true);
                        $commande->restant = getRestantPrice(getNumbers()->get('newTotal'),$request->paye_form, false);

                    }
                  
                }else{
                    $commande->total =  getPrice(getNumbers()->get('newTotal'),true,true,true);
                    $commande->restant = getRestantPrice(getNumbers()->get('newTotal'),$request->paye_form, true);

                }
              
                $commande->user_id =auth()->user() ? auth()->user()->id : null;
                $commande->initiateur = auth()->user() ? auth()->user()->name : null;
                $commande->client_id = $request->client_id;
                $commande->nom_client =  $request->client;
                $commande->téléphone =  $client->téléphone;
                $commande->quantité =  Cart::instance('default')->count();
                $commande->payé= $request->paye_form;
                // dd($commande->total,  $commande->payé, $commande->restant);
                // dd( $commande->payé -2 ,getNumbers()->get('newTotal')-1, getNumbers()->get('newTotal')  );
                // $commande->restant= $commande->total - $commande->payé;
                $commande->date_vente = $this->getCreatedAtAttribute(Carbon::now());


                $commande->save();
                foreach (Cart::content() as $item) {
                   $vente_produit =new VenteProduit();
                   $vente_produit->client_id =  $request->client_id;
                   $vente_produit->nom_client =  $request->client;
                   $vente_produit->code_produit =  $item->model->code;
                   $vente_produit->libellé =  $item->model->libellé;
                   $vente_produit->vente_id = $commande->id;
                   $vente_produit->product_id =  $item->model->id;
                   $vente_produit->quantité = $item->qty;
                   $vente_produit->prix =  $item->model->prix_ht_vente;
                   $vente_produit->total =  $this->formaqtyPerProd( $item->model->prix_ht_vente* $item->qty);
                  
                   $vente_produit ->save();
                }
                $this->updateQty();

                Cart::instance('default')->destroy();
                // dd($commande);
             
                return back()->with([
                    'message'    =>'Commande effectuée avec succès',
                    'alert-type' => 'success',
                    'generate_facture'=>1,
                    'vente_id'=>$commande->id
                ]);;
            }
            

           
        } catch (CardErrorException $e) {
           
            return back()->withErrors('Error! ' . $e->getMessage());
        }

    }
    protected function formaqtyPerProd($price){
      
        return number_format($price, 0, ',', ' ');

    }
    protected function updateQty()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            $stock = Stock::where('product_id', $item->model->id)->first();
            
            //decrease qty ['quantity' => $product->quantity - $item->qty]
            // $product->quantité = $product->quantité - $item->qty;

            

            $stock->sortie = $item->qty + $stock->sortie;
            $stock->difference = $stock->stock - $stock->sortie;
            if($stock->difference<= $stock->seuil){
                $product->rupture=1;
            }else{
                $product->rupture=0;
            }

            $stock->save();
            $product->save();
        }
    }
    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('Y-m-d');
    }

    protected function addToOrdersTables($request, $error)
    {
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_phone' => $request->phone,
            'billing_total' => getNumbers()->get('newTotal'),
            'error' => $error,
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'stock_initial' => $item->qty,
            ]);
        }

        return $order;
    }

    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            $product->stock_initial = $product->stock_initial - $item->qty;
           
            // decrease qty ['quantity' => $product->quantity - $item->qty]
            $product->save();
        }
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

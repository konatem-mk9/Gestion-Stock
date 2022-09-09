<?php
use Carbon\Carbon;
use App\Vente;
use App\Product;
use App\Stock;

 function presentPrice($value){

    // return money_format('$%i', $this->price/100);
    if ($value<0) return "-".asDollars(-$value);
    return  number_format($value, 2) . ' fcfa' ;
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function productImage($path)
{
    return $path && file_exists('public/storage/'.$path) ? url('public/storage/'.$path) : url('public/img/not-found.jpg');
}

function getNumbers()
{
    $tax = config('cart.tax') / 100;
    $discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;
    $newSubtotal = (Cart::subtotal() - $discount);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTax = $newSubtotal * $tax;
    $newTotal = $newSubtotal * (1 + $tax);

    return collect([
        'tax' => $tax,
        'discount' => $discount,
        'code' => $code,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
    ]);
}

function presentDate($date)
{
    return Carbon::parse($date)->format('M d, Y');
}

function getPrice($priceInDecimals,$tva,$isTotal,$isSaving)
{   
    if($tva){
        $valeur_tva= 18;
    }else{
        $valeur_tva= 0;
    }

    if($isTotal){
        $price = ($priceInDecimals*$valeur_tva)/100 + $priceInDecimals;
    }else{
        $price = ($priceInDecimals*$valeur_tva)/100;
    }

    if($isSaving){
        return $price;
    }
  
    return number_format($price, 0, ',', ' ');
}

function getRestantPrice($tot,$paye,$tva){
    if($tva){
        $valeur_tva= 18;
    }else{
        $valeur_tva= 0;
    }
    
   
    $price = ($tot*$valeur_tva)/100 + $tot;
    $p=$price - $paye;
   
    return $p;

    // return number_format($price, 0, ',', ' ');
}

function getTvaPrice($priceTotal,$tva){
    if($tva){
        $valeur_tva= 18;
    }else{
        $valeur_tva= 0;
    }
  
    $price =($priceTotal*$valeur_tva)/100;

    return number_format($price, 0, ',', ' ');
}
/*deux chiffres après virgules
 return number_format($price, 2, ',', ' ') . ' f';
 */


 function getCountProd(){
     return  \App\Product::count();
  
 }
 function getCountFour(){
    return  \App\Fournisseur::count();
 }

function getCountVente(){
    return   \App\Vente::count();
         
}

function getCountClient(){
    return \App\Client::count();        
}

function getCountCat(){
    return \App\Category::count();
}

function getSales(){

    $sales = Vente::select(DB::raw('count(*) as nb_vente, date_vente'))
              ->groupBy('date_vente')
              ->orderBy('date_vente', 'DESC')
              ->limit(7)
              ->get();
    
    foreach($sales as $el){
        
        $vals = explode("-", $el->date_vente);
        $vals[1] = getMonthToLetters($vals[1]);
        $el->date_graph =  implode(" ",array_slice(array_reverse($vals),0,2) );
    }
   
    return $sales;
}

function getProdEnRupture(){
    

    $prods = Stock::whereRaw('difference < seuil')->get();
   
    return $prods;
}

function getAllProdCode(){
    $prods = Product::where('en_stock', '=', 1)->get();
    return $prods;
}

function getProdonReadCode($id){
    return $id +1;
}

function getLastSales(){
    $lastSales= Vente::orderBy('id', 'DESC')->limit(6)->get();
    foreach($lastSales as $el){
        if($el->payé == 0 || is_null($el->payé)){
            $el->pricing =getPrice( $el->restant,false,true,false);
            $el->status = 'Dû';
        }elseif($el->payé==$el->total ){
            $el->pricing = $el->total;
            $el->status = 'Payé';
        }else{
            $el->pricing = $el->payé;
            $el->status = 'Avance';
        }
    }
    return $lastSales;
}
function getStatusVentes(){
    $statusVentes= Vente::all();
    foreach($statusVentes as $el){
        if($el->payé == 0 || is_null($el->payé)){
            $el->status = 'Dû';
        }elseif($el->payé==$el->total ){
            $el->status = 'Payé';
        }else{
            $el->status = 'Avance';
        }
    }
    return $statusVentes;
    
}

function rolesNames($val){
    $tab = explode(" ", $val);
    if($tab[1]=="Admin"){
        $tab[0]="Voir Dashboard";
    }
   
    switch ($tab[0]) {
         
        case 'Browse':
            $tab[0] = 'Acceder';  
            break;
        case 'Read':
            $tab[0] = 'Voir detail';  
            break;
        case 'Edit':
            $tab[0] = 'Modifier';
            break;
        case 'Add':
            $tab[0] = 'Ajouter'; 
            break;
        case 'Delete':
            $tab[0] = 'Supprimer'; 
            break;
       

    }
    return   $tab[0];
}

function getMonthToLetters($el){
        switch ($el) {
         
            case '1':
                return 'Jan';  
                break;
            case '2':
                return 'Fév';  
                break;
            case '3':
                return 'Mars'; 
                break;
             case '4':
                return 'Avr'; 
                break;
            case '5':
                return 'Mai';    
                break;
             case '6':
                return 'Juin'; 
                break;
            case '7':
                return 'Juil';   
                break; 
            case '8':
                return 'Août';   
                break;
            case '9':
                return 'Sept';   
                break;
            case '10':
                return 'Oct';
                break;
            case '11':
                return 'Nov';
                break;
            case '12':
                return 'Déc';
                break;
                

        }
    }

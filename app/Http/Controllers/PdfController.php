<?php

namespace App\Http\Controllers;

use App\VenteProduit;
use App\Vente;
use App\Fournisseur;
use App\Compte;
use App\Product;
use Illuminate\Http\Request;
use App\Client;
use App\Type;
use Redirect;
use PDF;
use DB;
use Carbon\Carbon;

class PdfController extends Controller
{
    //
    public function pdfForm()
    {
        return view('stock.pdf_form');
    }
 
    public function pdfDownload(Request $request){

        $vente_idd = $request->vente_prec_id;
        $sous_total=0;
        $isTva=0;
        $isVirement=0;
        $compte=[];
        
        $client = Client::where('id', $request->client_prec_id)->first();
        // dd($client);
       
       
        // dd($client, $type);
        $vente = Vente::where('id', $vente_idd)->first();
        if(is_null($vente->compte)){
            $isVirement=0;
        }else{
            $compte = Compte::where('numero_compte', $vente->compte)->first();
            $isVirement=1;
        }
       

        $lignes = VenteProduit::where([
                                    'vente_id' => $vente_idd,
                                    'client_id' => $request->client_prec_id,   
                                ])->get();
                               
            $val= Carbon::parse($lignes[0]->created_at)->format('Y-m-d');
            $vals = explode("-", $val);
            $vals[1] = $this->getMonthinLetters($vals[1]);
            $formated_date = implode(" ", array_reverse($vals));

        if( is_null($vente->payé)){
            $vente->payé = 0;
        }
        $vente->total = number_format($vente->total, 0, ',', ' ');
        $vente->payé = number_format($vente->payé, 0, ',', ' ');
        $vente->restant = number_format($vente->restant, 0, ',', ' ');

        if(is_null($client->type_id)){
            $isTva=1;
            $sous_total = $this->getSousTotal($lignes);
            $montant_tva = $this->getMontantTva($lignes);
        }else {
            $type =Type::where('id', $client->type_id)->first();
            if($type->tva==1){
                $isTva=1;
                $sous_total = $this->getSousTotal($lignes);
                $montant_tva = $this->getMontantTva($lignes);
            }else{
                $isTva=0;
                $montant_tva = 0;
            }
        }
      
         $data = 
         [
            'facture_num'=>$vente_idd,
            'date'=>$formated_date,
            'client'=>$client,
            'lignes'=>$lignes,
            'vente' =>$vente,
            // 'type_tva'=>$type->tva,
            'sous_total'=>$sous_total,
            'isTva'=> $isTva,
            'compte'=>$compte,
            'isVirement'=>$isVirement,
            'montant_tva'=>$montant_tva
          
         
         ];
        //  dd($data );
       $pdf=PDF::loadView('stock.invoice', $data);
   
       return $pdf->download('facture-'.$client->nom.'.pdf');
    }
// ->
    protected function getSousTotal($tab){
        $sous_tot = 0;
        foreach ($tab as $el) {
            $sous_tot =  $sous_tot + ($el->quantité* $el->prix);
        }
        return  number_format($sous_tot, 0, ',', ' ');
    }
    protected function getMontantTva($tab){
        $sous_tot = 0;
        foreach ($tab as $el) {
            $sous_tot =  $sous_tot + ($el->quantité* $el->prix);
        }
        $price =  ($sous_tot*18)/100;
        return round($price) ;
    }

    protected function getMonthinLetters($el){
        switch ($el) {
         
            case '1':
                return 'Janvier';  
                break;
            case '2':
                return 'Février';  
                break;
            case '3':
                return 'Mars'; 
                break;
             case '4':
                return 'Avril'; 
                break;
            case '5':
                return 'Mai';    
                break;
             case '6':
                return 'Juin'; 
                break;
            case '7':
                return 'Juillet';   
                break; 
            case '8':
                return 'Août';   
                break;
            case '9':
                return 'Septembre';   
                break;
            case '10':
                return 'Octobre';
                break;
            case '11':
                return 'Novembre';
                break;
            case '12':
                return 'Décembre';
                break;
                

        }
    }


    public function pdfSupplierDownload(Request $request){
        
        // dd($request->all());
        $isTva=0;
        $sous_total=0;
        $total =0;
        $id = $request->prod_prec_id;
        $product = Product::find($id);
        $fournisseur = Fournisseur::where('id',  $product->fournisseur_id)->first();
        if(is_null($fournisseur->type_id)){
            $isTva=1;
            $sous_total = $product->quantité * $product->prix_ht_achat;
            $montant_tva =round(($sous_total*18)/100);
            $total = $sous_total + $montant_tva;
        }else {
            $type =Type::where('id', $fournisseur->type_id)->first();
            if($type->tva==1){
                $isTva=1;
                $sous_total =  $product->quantité * $product->prix_ht_achat;
                $montant_tva = round(($sous_total*18)/100);
                $total = $sous_total + $montant_tva;

            }else{
                $isTva=0;
                $montant_tva = 0;
                $sous_total =  $product->quantité * $product->prix_ht_achat;
                $total = $sous_total;

            }
        }

        $val= Carbon::parse($product->created_at)->format('Y-m-d');
        $vals = explode("-", $val);
        $vals[1] = $this->getMonthinLetters($vals[1]);
        $formated_date = implode(" ", array_reverse($vals));

        $data = 
        [
            'facture_num'=>$id,
            'sous_total'=>$sous_total,
            'isTva'=> $isTva,    
            'date'=>$formated_date,
            'montant_tva'=>$montant_tva,
            'product' => $product,
            'total'=>$total,
            'fournisseur'=>$fournisseur
        
        ];
        $pdf=PDF::loadView('stock.invoiceSupplier', $data);
   
        return $pdf->download('facture-achat-'.$fournisseur->nom.'.pdf');

    }
  
}

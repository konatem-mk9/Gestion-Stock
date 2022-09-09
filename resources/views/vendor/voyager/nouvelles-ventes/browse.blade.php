
@extends('stock.layouts.masterAdmin')

@section('page_title', __('voyager::generic.viewing').' '.$dataType->getTranslatedAttribute('display_name_plural'))

@section('page_header')
    <!-- <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->getTranslatedAttribute('display_name_plural') }}
        </h1>
    </div> -->
@stop

@section('css')

<link rel="stylesheet" href="{{url('public/adminlte')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{url('public/adminlte')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
   
      .content_{
          display:flex;
          justify-content: space-between;
          width:100%;
      }
      .right_{
          width:57%;
      }
      .left_{
        width:42%;
        margin-bottom: 12px;
      }
      .select_{
        margin-top: 7px;
      }
      .btn_{
        font-size: 12px;
      }
      .info_paiement{
        display: flex;
        justify-content: space-between;
        margin-top: 8px;
    border-bottom: 1px solid
      }
      .text__{
        font-weight: bold;
      }
      .total_{
          font-size:large;
          font-weight: bold;
          margin-top: 1px;
      }

      .achat{
        width: 60%;
        margin: 0 auto;
        padding: 10px;
        margin-top: -14px;
    margin-bottom: 20px;
}
      }
      .paye_{
         /* display:none; */
         opacity:0;
         transition: opacity 1s ease-out;
      }
      .restant_{
         /* display:none; */
         opacity:0;
         transition: opacity 1s ease-out;
      }

    .custom-control-input{
        cursor:pointer;
    }
     

      @media(max-width: 768px){
            .content_{
           flex-direction:column;
           align-items: center;
        }
       
      }

    </style>
@stop
@section('content')

    <div class="page-content browse container-fluid" >
    
        @include('voyager::alerts')
       <div class="content_">
            <div class="left_">
                <div class="card" >
               
               
              
                    <div class="card-body">
                        <div class="row header_">
                            <div class="col-md-8 select_">
                            <select id="choice-client" onchange="checkTyp({{$clients}},{{$types}},$(this).val(),{{ Cart::total()}})" class= "selected-client form-control select2 select2-hidden-accessible" name="client" tabindex="-1" placeholder=" choisir client" style="font-size:12px; width:100%; z-index:999;" data-select2-id="20000" aria-hidden="true">
                                <option value=" " selected disabled hidden><p class="text-muted"> <small> -- Choisir un client existant -- </small></p></option>
                                @foreach( $clients as $client)
                                    <option value="{{$client->id}}" {{$client->id== Session::get('selectedClient')? 'selected':''  }} >{{$client->nom}} </option>
                                @endforeach
                            </select>
                            <span class="error" id="error-client"><i class="fa fa-info-circle" style="color:#dc3545; margin-left:5px"> </i> <small style="color:#dc3545;letter-spacing: 0.7px;">Client obligatoire</small>  </span> 


                            </div>
                            <div class="col-md-4 button_">
                                <button type="button"    data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn_"><i class="voyager-plus"></i>Nouveau client</button>
                                <div class="modal bd-example-modal-lg fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ajout d'un nouveau client</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="row">                                        
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="codeClient" name="codeClient" placeholder="Code Client">
                                                    </div>
                                                    <div class="col-md-6">
                                                    <input class="form-control nomClient" id="nomClient" onchange="nomChange(this.value)" name="nomClient"  type="text" placeholder="nom">
                                                <span class="error" id="error-client-new"><i class="fa fa-info-circle" style="color:#dc3545; margin-left:5px"> </i> <small style="color:#dc3545;letter-spacing: 0.7px;">nom obligatoire  </small>  </span> 
                                                    </div>                                              
                                                </div>                                                
                                                <div class="row">                                        
                                                    <div class="col-md-6">
                                                        <input type="number" class="form-control" id="contactClient" name="contactClient" placeholder="contact">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="texte" class="form-control" id="emailClient" name="emailClient" placeholder="email">
                                                    </div>                                              
                                                </div>
                                                <div class="row">                                        
                                                    <div class="col-md-12">
                                                        <select class="form-control custom-select" style="cursor:pointer; font-size:18px;" name="typeClient" id="typeClient">
                                                            <option value=" " selected disabled hidden>Type de client</option>
                                                            @forEach($types as $type)
                                                            <option value="{{$type->id}}"> {{$type->dénomination}}  </option>
                                                            @endforeach                                             
                                                        </select>                                                    
                                                    </div>                                                                                        
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="adresseClient" id="adresseClient"  placeholder="adresse">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"  name="paysClient" id="paysClient" placeholder="pays">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="villeClient" id="villeClient" placeholder="ville">
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <button type="button" id="newClientButton" onclick="addNewClient()"  data-dismiss=""  class="btn btn-primary">Ajouter</button>
                                            </div>

                                        </div>
                                    
                                    </div>

                                </div>
                            </div>

                        </div>
        <!-- panier -->
                            <div class="card">
                                    <div class="card-header">
                                       <div class="panier_client"
                                            style="
                                                display:flex;
                                                justify-content:space-between;
                                                background-color: #e3e2ec77;
                                                height: 44px;
                                                align-items: center;
                                            "
                                       >
                                            <div style="margin-left: 15px;"><i class="voyager-basket"></i> </div>
                                            <div style="margin-right: 15px;"><i class="voyager-user"></i>  <span style="font-weight:bold"> <i class="voyager-person"> </i> :</span> <span id="client-name" style="font-weight: 500"> </span> </div> 
                                       </div>
                                    </div>
                                    <div class="card-body"style="overflow-x: hidden">
                                        <div class="table-responsive" >
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
                                                                    <div class="p-0">
                                                                        <!-- <img src="{{ $product->model->image }}" alt="" width="70" class="img-fluid rounded shadow-sm"> -->
                                                                        <div class="ml-3 d-inline-block align-middle">
                                                                            <h5 class="mb-0">{{ $product->model->code }}</h5><span style="color: mediumseagreen;font-style: oblique" class="text-muted font-weight-normal font-italic d-block"> {{ $product->options->categorie }}</span>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td class="border-0 align-middle"><div style="margin-top: 7px"> <strong style="font-weight: bold">{{ getPrice($product->subtotal,false,true,false)  }}</strong></div></td>
                                                                <td class="border-0 align-middle">
                                                                
                                                                    
                                                                    <div class="input-group">
                                                                    
                                                                        <input style="width:70%" type="number" tva="1" data-id="{{ $product->rowId }}" data-cart="{{ json_encode(Cart::content(),TRUE)}}" name="quantity" class="quantity form-control input-number" value="{{ $product->qty}}" min="1"  >
                                                                    
                                                                    </div>
                                                                                                    
                                                                                            
                                            
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
                                            <div class="p-4" style="padding: 13px;">
                                            <ul class="list-unstyled mb-4" style="margin-bottom: 5px;" >
                                            <li class="d-flex justify-content-between py-2 border-bottom info_paiement"><strong class="text-muted text__">Sous total</strong>
                                            <h6 class="font-weight-normal subtotal_">  {{ getPrice(Cart::total(),false,true,false) }} </h6>
                                            </li>
                                            <li class="d-flex justify-content-between py-2 border-bottom info_paiement"><strong class="text-muted text__" >Tva</strong>
                                                <h6 class="font-weight-normal" id="tva_">--</h6>
                                            </li>
                                            <li class="d-flex justify-content-between py-2 border-bottom info_paiement"><strong class="text-muted text__" >Montant Tva</strong>
                                                <h6 class="font-weight-normal" id="montant_tva_">--</h6>
                                            </li>
                                            
                                            <li class="d-flex justify-content-between py-2 border-bottom info_paiement"><strong class="text-muted text__">Total</strong>
                                                <h5 class="font-weight-bold total_" id="total_">--</h5>
                                            </li>
                                            <li class="d-flex justify-content-between py-2 border-bottom info_paiement"><strong class="text-muted text__">Nom Client</strong>
                                                <h5 class="font-weight-bold client__" id="client__"><i class="voyager-user"></i>  <span style="font-weight:bold">  </span> <span id="client-name-fac" style="font-weight: 500"> </span></h5>
                                            </li>
                                            </ul>

                                            <form id="myformm" action="{{ route('stockcheckout.store') }}" method="POST">
                                         
                                            {{ csrf_field() }}
                                            <input type="hidden" class="form-control rowId" id ="rowId" name="rowId" value="" hidden>
                                            <input type="hidden" class="form-control newqty" id ="newqty" name="newqty" value="" hidden>
                                            <input type="hidden" class="form-control update" id ="isUpdate" name="isUpdate" value="0" hidden>
                                            <input type="hidden" class="form-control update" id ="isNewclientAdd" name="isNewclientAdd" value="0" hidden>
                                            <input type="hidden" class="form-control client" id ="client" name="client" value="" hidden required>
                                            <input type="hidden" class="form-control client_id" id ="client_id" name="client_id" value="" hidden>
                                            <input type="hidden" class="form-control new_client_code" id ="new_client_code" name="new_client_code" value="" hidden>

                                            <input type="hidden" class="form-control new_client_nom" id ="new_client_nom" name="new_client_nom" value="" hidden>
                                            <input type="hidden" class="form-control new_client_contact" id ="new_client_contact" name="new_client_contact" value="" hidden>
                                            <input type="hidden" class="form-control new_client_mail" id ="new_client_mail" name="new_client_mail" value="" hidden>
                                            <input type="hidden" class="form-control new_client_type" id ="new_client_type" name="new_client_type" value="" hidden>
                                            <input type="hidden" class="form-control new_client_adresse" id ="new_client_adresse" name="new_client_adresse" value="" hidden>
                                            <input type="hidden" class="form-control new_client_pays" id ="new_client_pays" name="new_client_pays" value="" hidden>
                                            <input type="hidden" class="form-control new_client_ville" id ="new_client_ville" name="new_client_ville" value="" hidden>
                                            <input type="hidden" class="form-control totaux" id ="totaux" name="totaux" value="" hidden>
                                            <input type="hidden" class="form-control" id ="paye_form" name="paye_form" value="" hidden>
                                            <input type="hidden" class="form-control " id ="restant_form" name="restant_form" value="" hidden>
                                            <input type="hidden" class="form-control " id ="mode_paiement" name="mode_paiement" value="" hidden>
                                            <input type="hidden" class="form-control " id ="form_compte" name="form_compte" value="" hidden>







                                            
                                            @if (auth()->user())
                                                <input type="hidden" class="form-control" id="name" name="name" value="{{  auth()->user()->name }}" hidden>
                                            @endif
                                        </div> 
                                        <div class="row" id ="row_" style="padding: 11px; display:none"> 
                                            <!-- <div class="col-md-4">
                                                <input type="checkbox"  id="checky"   style="width: 20px;cursor: pointer;height: 20px;"/> 
                                                <label style=" font-weight: bold;margin-left: 5px">Reste Impayé ? </i> </label>
                                            </div>                                        -->
                                            <div class="col-md-6"  >
                                                <input type="number" style="width:100%;height: 42px;border: 4px solid;font-size: small;color: #2ecc71;" class="form-control paye_" id="paye" name="paye" placeholder="montant payé">
                                            </div> 
                                        </div>
                                        
                                                <div class="row" id="mode_paiement" style="padding: 11px;margin-top:-20px;"> 
                                                    <div class="col-md-6"  >
                                                         <label for=""><b> Mode de paiement</b></label>
                                                         <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="virement">
                                                            <label class="custom-control-label" for="customRadio1">Virement</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input"  value="Chèque">
                                                            <label class="custom-control-label" for="customRadio2">Chèque</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" value="Espèces">
                                                            <label class="custom-control-label" for="customRadio3">Espèces</label>
                                                        </div>
                                                        <!-- <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input" value="Orange Money">
                                                            <label class="custom-control-label" for="customRadio4">Orange Money</label>
                                                        </div> -->
                                                    </div>
                                                    <div class="col-md-6" id="compte" style="display:none" >
                                                        <label for=""><b> Choisir un compte</b></label>
                                                        <select class="form-control custom-select choix_compte" style="cursor:pointer; font-size:15px;" name="numCompte" id="numCompte">
                                                            <option value=" " selected disabled hidden>-- --</option>
                                                            @forEach($comptes as $compte)
                                                            <option value="{{$compte->id}}"> {{$compte->titulaire}}  </option>
                                                            @endforeach                                             
                                                        </select>  

                                                    </div>
                                                </div>

                                        
                                        @if(Cart::count()>0)
                                        <button type="submit" id="submitting_" onclick="finall()" class="btn btn-primary rounded-pill  btn-block achat">
                                            Commander
                                            </button>
                                            @endif
                                    </form>
                                    <button type="button" style="opacity:0" id="modl" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
               
               </button>

               <!-- Modal -->
               <div class="modal modal-warning fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="voyager-download"></i> Télécharger la Facture ? </h4>
                            </div>
                    
                            <div class="modal-footer">   
                            
                                <button type="button" id="downloadButton" data-dismiss="" onclick="download()" class="btn btn-success">Maintenant</button>
                              
                                <button type="button" class="btn btn-danger pull-right " onclick="notdownload()" data-dismiss="modal">Plus tard</button>
                            </div>
                        </div>
                    </div>
               </div>
               <form action="{{ route('form-store') }}" id="downloadForm" method="post" accept-charset="utf-8">
                   {{ csrf_field() }}
                   <input type="hidden" class="form-control " id ="client_prec_id" name="client_prec_id" value="" hidden>
                   <input type="hidden" class="form-control " id ="vente_prec_id" name="vente_prec_id" value="" hidden>

                </form>
                                        </div>
                                    </div>
                            </div>
        <!-- fin panier -->
                    </div>
                </div>
            </div>
            <div class="right_">
                <div class="card" >
                <div id="search-input" style="margin-bottom: 1px;margin-top: 15px;width: 93%;margin-left: 20px;">
                                <div class="input-group col-md-4" style="border-right:0.7px double">
                                        <input type="text" id="myInput" onkeyup="myFunction(this.value)" class="form-control" placeholder="  Code" name="s" value="">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-lg" type="button">
                                             
                                            </button>
                                        </span>
                                    </div>
                                    <div class="input-group col-md-4" style="border-right:0.7px double">
                                        <input type="text" id="myInput2" onkeyup="myFunction2()" class="form-control" placeholder="  Libellé" name="s" value="">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-lg" type="button">
                                             
                                            </button>
                                        </span>
                                    </div>
                                    <div class="input-group col-md-4">
                                        <input type="text" id="myInput3" onkeyup="myFunction3()" class="form-control" placeholder="  Prix" name="s" value="">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-sm" type="button">
                                                <i class="voyager-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>

                <div class="card-body" style="    overflow: auto;max-height: 853px;">
                    <!-- <form method="get" class="form-search"> -->
                            
                            
                <table class="table" id="myTable">
                  <thead>
                    <tr>
                    
                      <th >code</th>
                      <th>Libellé</th>
                      <th>Prix</th>
                      <th style="width: 15px">Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  @foreach( $products as $product)
                    <tr style="border-bottom: 0.4px groove">
                      <td style="transform:translateX(-8%) scale(0.65);"><svg id="p{{$product->code}}" > </svg></td>
                      <td style="vertical-align: middle">{{$product->libellé}}</td>
                      <td style=" vertical-align: middle">
                      <span style="background-color:#ec9940;" class="badge">{{getPrice($product->prix_ht_vente,false,true,false) }}</span>
                      </td>
                      <td style=" vertical-align: middle"> 
                      <form action="{{route('stockcart.store')}}" method="POST">
                            @csrf 

                            <input type="hidden" name="product_id" value="{{$product->id}}" />
                            <button type="submit" class="btn btn-primary btn-sm">Ajouter</button></td>
                        </form>
                    </tr>
                    @endforeach
                  
                  </tbody>
                </table>
                
                <!-- /.card-body -->
                
              
            
            </div> 
                    <!-- </form> -->
                    
                </div>
                </div>
            </div>

  
       
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="{{ __('voyager::generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('css')
@if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
    <link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@endif
@stop

@section('javascript')

    <!-- integreating lte -->
<script src="{{url('public/js/JsBarcode.all.min.js')}}"></script>
  
<script src="{{url('public/adminlte')}}/plugins/select2/js/select2.full.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()


    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>

<script>
    function finall(){

        sessionStorage.removeItem("SelItem");

    }

    function download() {     
        var isDownloadClientId= sessionStorage.getItem("downloadItem");  
        
        document.getElementById('client_prec_id').value = isDownloadClientId;
        document.getElementById("downloadForm").submit();
        $("#downloadButton").attr("data-dismiss", 'modal');
        sessionStorage.removeItem("isDownload");
    }

    function notdownload(){
        sessionStorage.removeItem("isDownload");
        document.getElementById("vente_prec_id").value = 0;
    }
   
    window.onload = function() {
  
    // console.log('down stat',pdfItem) 
   
    var selItem = sessionStorage.getItem("SelItem");  
    $('#choice-client').val(selItem);
   
    checkTyp(<?php echo $clients ?>,<?php echo $types ?>,$('#choice-client').val(),<?php echo Cart::total() ?>)
       
    }
    var barecode=''
function transform(event,val){
           if(event.key.length === 1 && event.code.toLowerCase().includes('digit') || (event.keyCode > 47 && event.keyCode  < 58) ){
               var digit =  event.code.substr( event.code.length - 1);
               barecode =barecode + digit
               document.getElementById('myInput').value = barecode;  
           }else{
            barecode=''
           }
}
function myFunction(val) {
    var e = window.event || e;
        transform(e,val)
  

    var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
function myFunction2() {
    var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function myFunction3() {
    var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}



$(document).ready(function(){
    var sess = <?php echo Session::get('generate_facture')?> +0;
    var vente_idd = <?php echo Session::get('vente_id')?> +0;
    

    //barecode
    var allProds = <?php echo getAllProdCode()?>;
    // console.log(allProds)
    for (i = 0; i<allProds.length;i++){
        id = '#p'+allProds[i].code     
        JsBarcode(id, allProds[i].code);
    }
    
    //end


    if(sess==1){
        document.getElementById("vente_prec_id").value =  vente_idd
        document.getElementById('modl').click();
    }
    var val = document.getElementById("client_id").value;
    var val_nom = document.getElementById("client").value;
    if(val=='' || val_nom==''){
        document.getElementById("submitting_").disabled=true;

        
    }else{
        document.getElementById("submitting_").disabled=false;
    }
    
    
    $("#customRadio1").click( function(){
   if( $(this).is(':checked') ){
    
    document.getElementById("mode_paiement").value =  "Virement"

    document.getElementById("compte").style.display="block";

   };
   });

   $("#customRadio2").click( function(){
   if( $(this).is(':checked') ) {
    document.getElementById("mode_paiement").value =  "Chèque"
    document.getElementById("compte").style.display="none";

   };
   });

   $("#customRadio3").click( function(){
   if( $(this).is(':checked') ){
    document.getElementById("mode_paiement").value =  "Espèces"
    document.getElementById("compte").style.display="none";

   };
   });

//    $("#customRadio4").click( function(){
//    if( $(this).is(':checked') ){
//     document.getElementById("mode_paiement").value =  "Orange Money"
//     document.getElementById("compte").style.display="none";

//    };
//    });

   $('.choix_compte').on('change', function() {
    
    document.getElementById("form_compte").value = this.value ;

});
//  Maj impayé


 $("#paye").on('input', function(){
     
     document.getElementById("paye_form").value = document.getElementById("paye").value
    //  document.getElementById("restant").value =document.getElementById("totaux").value - document.getElementById("paye").value
    //  document.getElementById("restant_form").value = document.getElementById("restant").value
});


const classname = document.querySelectorAll('.quantity')
Array.from(classname).forEach(function(element) {
    element.addEventListener('change', function(e) {
        e.preventDefault();
        var priceTotal = 0
        var formatedPrix = 0
        const id = element.getAttribute('data-id')
        const tva = element.getAttribute('tva')
        const instance =JSON.parse(element.getAttribute('data-cart'))
       
        
        Object.values(instance).forEach(val => {
            if(val.rowId==id) {
                
                val.qty = this.value
            }
            priceTotal = priceTotal +  val.qty*val.price
            });
            // console.log(instance)
        document.getElementById("rowId").value = id;
        document.getElementById("newqty").value = this.value;
        document.getElementById("isUpdate").value = 1;
        document.getElementById("myformm").submit();
           
    
    })
})
    
    
});

function nomChange(val){
    if(val!== ''){
        document.getElementById("error-client-new").innerHTML = '';

    }
}

function checkTyp(client,type,el,total){
  var selected = client.find(c=>(c.id==el));
  
  var typ = type.find(t=>(t.id==selected.type_id))

    
  
  if(typ){
    if(typ.tva){
        document.getElementById("tva_").innerHTML="18 %";
        
        document.getElementById("montant_tva_").innerHTML= "<?php echo getTvaPrice(Cart::total(),true)  ?>"

       
        document.getElementById("total_").innerHTML= "<?php echo getPrice(Cart::total(),true,true,false) ?>"

        document.getElementById("totaux").value= "<?php echo getPrice(Cart::total(),true,true,false)  ?>"
        document.getElementById("row_").style.display="flex"
        // document.getElementById("row_").style.justify-content="space-between"
     
        document.getElementById("paye_form").value = document.getElementById("paye").value
        // document.getElementById("restant").value =document.getElementById("totaux").value - document.getElementById("paye").value
        // document.getElementById("restant_form").value = document.getElementById("restant").value
            
        

    }else{
        document.getElementById("tva_").innerHTML="0 %"
        document.getElementById("montant_tva_").innerHTML= 0;
        document.getElementById("total_").innerHTML= "<?php echo getPrice(Cart::total(),false,true,false)  ?>"
        document.getElementById("totaux").value= "<?php echo getPrice(Cart::total(),false,true,false)  ?>"
        document.getElementById("row_").style.display="block"
        document.getElementById("paye_form").value = document.getElementById("paye").value
        // document.getElementById("restant").value =document.getElementById("totaux").value - document.getElementById("paye").value
        // document.getElementById("restant_form").value = document.getElementById("restant").value


    }
  }else{
    document.getElementById("tva_").innerHTML="18 %";
    document.getElementById("montant_tva_").innerHTML= "<?php echo getTvaPrice(Cart::total(),true)  ?>"
    document.getElementById("total_").innerHTML= "<?php echo getPrice(Cart::total(),true,true,false)  ?>"
    document.getElementById("totaux").value= "<?php echo getPrice(Cart::total(),true,true,false)  ?>"
    document.getElementById("row_").style.display="block"
    document.getElementById("paye_form").value = document.getElementById("paye").value
    // document.getElementById("restant").value =document.getElementById("totaux").value - document.getElementById("paye").value
    // document.getElementById("restant_form").value = document.getElementById("restant").value


  }
  document.getElementById("client_id").value =el

  document.querySelectorAll('.client_on_add').value = '100';
  document.getElementById("client-name").innerHTML = selected.nom;
  document.getElementById("client-name-fac").innerHTML = selected.nom

  document.getElementById("client").value = selected.nom;
  document.getElementById("error-client").innerHTML="";
  

  if(document.getElementById("client_id").value=='' ||  document.getElementById("client").value ==''){
        document.getElementById("submitting_").disabled=true;
    }else{
        document.getElementById("submitting_").disabled=false;
    }
    document.getElementById("paye").style.opacity=1;
    document.getElementById("paye").focus();

    sessionStorage.setItem("downloadItem", el);
    sessionStorage.setItem("SelItem", el);
  

}

function addNewClient(){
    var nomClient = document.getElementById("nomClient").value;

    if(nomClient==''){
            $("#newClientButton").attr("data-dismiss", '');
        }else{             
            
            document.getElementById("new_client_nom").value =  nomClient;
            document.getElementById("new_client_code").value = document.getElementById("codeClient").value;
            document.getElementById("new_client_contact").value = document.getElementById("contactClient").value;
            document.getElementById("new_client_mail").value = document.getElementById("emailClient").value;
            document.getElementById("new_client_type").value = document.getElementById("typeClient").value;
            document.getElementById("new_client_adresse").value = document.getElementById("adresseClient").value;
            document.getElementById("new_client_pays").value =document.getElementById("paysClient").value;
            document.getElementById("new_client_ville").value = document.getElementById("villeClient").value;
            document.getElementById("client-name").innerHTML = nomClient;
            document.getElementById("client").value = nomClient;
            document.getElementById("error-client").innerHTML="";
            document.getElementById("isNewclientAdd").value = 1;

            $("#newClientButton").attr("data-dismiss", 'modal');
            document.getElementById("myformm").submit();
          
        }
}
</script>


    <!-- DataTables -->
    @if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
        <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
    @endif
    <script>
        $(document).ready(function () {
            @if (!$dataType->server_side)
                var table = $('#dataTable').DataTable({!! json_encode(
                    array_merge([
                        "order" => $orderColumn,
                        "language" => __('voyager::datatable'),
                        "columnDefs" => [['targets' => -1, 'searchable' =>  false, 'orderable' => false]],
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true) !!});
            @else
                $('#search-input select').select2({
                    minimumResultsForSearch: Infinity
                });
            @endif

            @if ($isModelTranslatable)
                $('.side-body').multilingual();
                //Reinitialise the multilingual features when they change tab
                $('#dataTable').on('draw.dt', function(){
                    $('.side-body').data('multilingual').init();
                })
            @endif
            $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked')).trigger('change');
            });
        });


        var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = '{{ route('voyager.'.$dataType->slug.'.destroy', '__id') }}'.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });

        @if($usesSoftDeletes)
            @php
                $params = [
                    's' => $search->value,
                    'filter' => $search->filter,
                    'key' => $search->key,
                    'order_by' => $orderBy,
                    'sort_order' => $sortOrder,
                ];
            @endphp
            $(function() {
                $('#show_soft_deletes').change(function() {
                    if ($(this).prop('checked')) {
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 1]), true)) }}"></a>');
                    }else{
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 0]), true)) }}"></a>');
                    }

                    $('#redir')[0].click();
                })
            })
        @endif
        $('input[name="row_id"]').on('change', function () {
            var ids = [];
            $('input[name="row_id"]').each(function() {
                if ($(this).is(':checked')) {
                    ids.push($(this).val());
                }
            });
            $('.selected_ids').val(ids);
        });
    </script>

    
@stop

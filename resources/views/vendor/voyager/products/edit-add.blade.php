@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
        .scan{
            display:flex;
            justify-content:flex-end;
        }
    </style>
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
   
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
   
        <div class="row">
       
            <div class="col-md-12">
            
                <div class="panel panel-bordered">
                    <!-- form start -->
                    <div class="row" style="padding:10px;margin-bottom: 25px">
                        <div class="col-md-3" style="margin-bottom: 0px;padding: 0 35px;">
                            <input type="text" id="myInputScanner" onkeyup="myFunction(this.value)" value="" style="border:4px dashed #eea236;font-style: oblique;width:100%; margin-top: 10px; height:50px"  placeholder="Scannez un code-barres">
                        </div>
                        <div class="col-md-3" id="barColumn" style="margin-bottom: 0px;padding: 0 35px; display:none;    margin-bottom: 20px; height:107px">
                            <svg id="barcod" > </svg>
                          
                        </div>
                        <div class="col-md-3" class="frais_totaux"  style="padding: 25px; margin-bottom: -23px;">
                         <span class="title_frais" style="font-size: 14px;font-weight: 600;margin-left: 10px;"> Prix total : </span>
                            <span class="content_frais" id ="content_prix_tot" style="font-size: 16px;color:#f39c12;font-weight: 600;letter-spacing: .5px;"> 0 </span> <span style="font-size: 16px;color:#f39c12;font-weight: 600;letter-spacing: .5px;">GNF</span>
                            <br>
                            <span class="title_frais" style="font-size: 14px;font-weight: 600;margin-left: 10px;"> Frais totaux : </span>
                            <span class="content_frais" id ="content_frais_value" style="font-size: 16px;color:#f39c12;font-weight: 600;letter-spacing: .5px;"> 0 </span> <span style="font-size: 16px;color:#f39c12;font-weight: 600;letter-spacing: .5px;">GNF</span>
                            <br>
                            <span class="title_frais" style="font-size: 14px;font-weight: 600;margin-left: 10px;"> Dépenses : </span>
                            <span class="content_frais" id ="content_depenses" style="font-size: 16px;color:#fa2a00;font-weight: 600;letter-spacing: .5px;">  </span> <span style="font-size: 16px;color:#fa2a00;font-weight: 600;letter-spacing: .5px;">GNF</span>
                          
                        </div>
                        <div class="col-md-3" class="frais_totaux"  style="padding: 25px;">
                         <span class="title_frais" style="font-size: 13px;font-weight: 600;margin-left: 10px;"> Frais totaux / Qté ~ </span>
                            <span class="content_frais" id ="content_frais_qte" style="font-size: 16px;color:#f39c12;font-weight: 600;letter-spacing: .5px;"> 0 </span> <span style="font-size: 16px;color:#f39c12;font-weight: 600;letter-spacing: .5px;">GNF</span>
                            <br>
                            <span class="title_frais" style="font-size: 13px;font-weight: 600;margin-left: 10px;"> Dépenses / Qté ~ </span>
                            <span class="content_frais" id ="content_depenses_qte" style="font-size: 16px;color:#f39c12;font-weight: 600;letter-spacing: .5px;"> 0 </span> <span style="font-size: 16px;color:#f39c12;font-weight: 600;letter-spacing: .5px;">GNF</span>
                            <br>
                            
                          
                        </div>
                    </div>
                    <form role="form"
                    id="myform"
                            class="form-edit-add"
                            action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if($edit)
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                            @endphp
                            @foreach($dataTypeRows as $row)
                                <!-- GET THE DISPLAY OPTIONS -->
                                @php
                                    $display_options = $row->details->display ?? NULL;
                                    if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                        $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                    }
                                @endphp
                                @if (isset($row->details->legend) && isset($row->details->legend->text))
                                    <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                @endif
                                
                                <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 3 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    {{ $row->slugify }}
                                    <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    @if (isset($row->details->view))
                                        @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add'), 'view' => ($edit ? 'edit' : 'add'), 'options' => $row->details])
                                    @elseif ($row->type == 'relationship')
                                        @include('voyager::formfields.relationship', ['options' => $row->details])
                                    @else
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                    @endif

                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                    @if ($errors->has($row->field))
                                        @foreach ($errors->get($row->field) as $error)
                                            <span class="help-block">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                            <div class="row d-flex justify-content-between" style="padding:10px;">
                            <div class="col-md-3">
                                    <div class="form-group" style="">
                                            <label>Catégorie</label>
                                            <select class="form-control custom-select" name="categorie">
                                                        <option value="" selected disabled hidden>-- Choisir Catégorie --</option>

                                                        @foreach ($allCategories as $category)
                                                        <option style="margin-bottom:5px;" value="{{ $category->id }}" {{ $categoriesForProduct->contains($category) ? 'selected' : '' }}>{{ $category->nom }}</option>
                                                        @endforeach
                                                    </select>

                                        </div> <!-- end form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" style="">
                                            <label>Fournisseur</label>
                                            <select class="form-control custom-select"   name="fournisseur">
                                                        <option value="" selected disabled hidden>-- Choisir Fournisseur --</option>

                                                        @foreach ($allFournisseurs as $fr)
                                                        <option style="margin-bottom:5px " value="{{ $fr->id }}" {{ $fournisseurForProduct->contains($fr) ? 'selected' : '' }}>{{ $fr->nom }}</option>
                                                        @endforeach
                                                    </select>

                                        </div> <!-- end form-group -->
                                </div>
                        
                               
                                <div class="col-md-2">
                                    <div class="form-group" style="">
                                            <label>Moyen de Transport</label>
                                            <select class="form-control custom-select" name="transport">
                                                <option value="" selected disabled hidden>-- Choisir Moyen --</option>
                                                <option style="margin-bottom:5px;" value="ROUTIER">Routier</option>
                                                <option style="margin-bottom:5px;" value="DHL">Dhl</option>
                                                <option style="margin-bottom:5px;" value="MARITIME">Maritime</option>
                                                <option style="margin-bottom:5px;" value="AERIEN">Aérien</option>


                                            </select>

                                    </div> <!-- end form-group -->
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" >
                                            <label>Frais de Transport</label>
                                            <input type="number" class="form-control" id="frais_transport" onkeyup="fraisTransport(this.value)" name="frais_transport" />

                                    </div> <!-- end form-group -->
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" >
                                            <label>Moyen de Paiement</label>
                                            <select class="form-control custom-select" name="paiement">
                                                <option value="" selected disabled hidden>-- Choisir Moyen --</option>
                                                <option style="margin-bottom:5px;" value="VIREMENT">Virement</option>
                                                <option style="margin-bottom:5px;" value="TRANSFERT">Transfert</option>
                                            
                                            </select>

                                    </div> <!-- end form-group -->
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" >
                                            <label>Frais de Paiement</label>
                                            <input type="number" name="frais_paiement" id="frais_paiement" class="form-control" onkeyup="fraisPaiement(this.value)"  />

                                    </div> <!-- end form-group -->
                                </div>          
                            </div>

                       

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            @section('submit-buttons')
                                <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                            @stop
                            @yield('submit-buttons')
                        </div>
                    </form>
                    
                    

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script src="{{url('public/js/JsBarcode.all.min.js')}}"></script>
    <!-- <script src="{{url('public/js/JsBarcode.code128.min.js')}}"></script> -->
    <!-- <script src="{{url('public/js/JsBarcode.upc.min.js')}}"></script> -->


    <script>
   
    

  
  

    $(document).ready(function(){
       

        document.getElementById("myInputScanner").focus();
        var qty_on_update = $('input[name=quantité]').val();
        var prix_achat_on_update = $('input[name=prix_ht_achat]').val();

        if(qty_on_update!=='' && prix_achat_on_update!==''){
          
  
            document.getElementById('content_prix_tot').innerHTML = parseInt(qty_on_update) * parseInt(prix_achat_on_update) ;
              
        }

       

        // console.log(document.getElementById("myform").elements["quantité"])
        $('input[name=quantité]').on('keyup', function() {
            document.getElementById('frais_transport').value = '';
            document.getElementById('frais_paiement').value = '';
            document.getElementById('content_frais_value').innerHTML = 0 
            document.getElementById('content_frais_qte').innerHTML = 0  
            document.getElementById('content_depenses_qte').innerHTML = 0                                      
            document.getElementById('content_depenses').innerHTML = ''          
            var qty =  $('input[name=prix_ht_achat]').val();
            var val = this.value;
            var tot = 0
            if(qty==null || isNaN(qty) || qty==''){
                qty = 0;
              
            }
            if(val==null || isNaN(val) || val==''){
                val = 0;
               
            }
           
            var tot = parseInt(val) * parseInt(qty);
           
            document.getElementById('content_prix_tot').innerHTML = tot ;
            // document.getElementById('content_depenses').innerHTML = tot + parseInt(dep);

        });

        $('input[name=prix_ht_achat]').on('keyup', function() {
            document.getElementById('frais_transport').value = '';
            document.getElementById('frais_paiement').value = ''
            document.getElementById('content_frais_qte').innerHTML = 0                    
            document.getElementById('content_depenses_qte').innerHTML = 0                    

            document.getElementById('content_frais_value').innerHTML = '';


            var qty =  $('input[name=quantité]').val();
            var val = this.value;
            if(qty==null || isNaN(qty) || qty==''){
                qty = 0;
            }
            if(val==null || isNaN(val) || val==''){
                val = 0;
            }
           
            document.getElementById('content_prix_tot').innerHTML = parseInt(val) * parseInt(qty);
            

        });

        
    });

    function fraisTransport(val){
        // console.log(val) 
        
        var qty =  $('input[name=quantité]').val();
        var totaux =  document.getElementById('content_prix_tot').innerHTML;
        var frais_p =  document.getElementById('frais_paiement').value;

        if(totaux==null || isNaN(totaux) || totaux==''){
            totaux = 0;
            }

        if(frais_p==null || isNaN(frais_p) || frais_p==''){
            frais_p = 0;
        }
        if(val==null || isNaN(val) || val==''){
            val = 0;
        }
        if(qty==null || isNaN(qty) || qty==''){
            qty = 0;
            }
        var tot_frais = parseInt(frais_p) + parseInt(val)
        var depp = tot_frais +  parseInt(totaux);
        document.getElementById('content_frais_value').innerHTML = tot_frais;
        document.getElementById('content_depenses').innerHTML =depp ;
        if(qty!==0){
            document.getElementById('content_frais_qte').innerHTML = Math.round(tot_frais/qty)
            document.getElementById('content_depenses_qte').innerHTML = Math.round(depp/qty);

        }
       


    }

    function fraisPaiement(val){
        var qty =  $('input[name=quantité]').val();

        var frais_t =  document.getElementById('frais_transport').value;
        var totaux =  document.getElementById('content_prix_tot').innerHTML;
        if(totaux==null || isNaN(totaux) || totaux==''){
            totaux = 0;
            }
        if(frais_t==null ||  isNaN(frais_t)|| frais_t==''){
            frais_t = 0;
        }
        if(val==null || isNaN(val) || val==''){
            val = 0;
        }
        if(qty==null || isNaN(qty) || qty==''){
            qty = 0;
            }
        var tot_frais = parseInt(frais_t) + parseInt(val)
        var depp = tot_frais + parseInt(totaux);
        document.getElementById('content_frais_value').innerHTML = tot_frais
        document.getElementById('content_depenses').innerHTML =depp ;
        if(qty!==0){
            document.getElementById('content_frais_qte').innerHTML = Math.round(tot_frais/qty)
            document.getElementById('content_depenses_qte').innerHTML = Math.round(depp/qty);

        }

    }

    var barecode = ''
    function myFunction(val){
        var e = window.event || e;
        transform(e,val)
       
    }
    function transform(event,val){
           if(event.key.length === 1 && event.code.toLowerCase().includes('digit') || (event.keyCode > 47 && event.keyCode  < 58) ){
               var digit =  event.code.substr( event.code.length - 1);
               barecode =barecode + digit
               document.getElementById('myInputScanner').value = barecode;
               document.getElementById("myform").elements["code"].value=barecode
               document.getElementById("barColumn").style.display="block"   
               JsBarcode("#barcod",barecode);           
            //    JsBarcode(".barcode").init();
             
               

              
           }else{
            barecode=''
           }
        
        
    }
    
    </script>
    <script>
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                } else if (elt.type != 'date') {
                    elt.type = 'text';
                    $(elt).datetimepicker({
                        format: 'L',
                        extraFormats: [ 'YYYY-MM-DD' ]
                    }).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();

            // var price = $('input[name="price"').val();
            // $('input[name="price"').val(price / 100);
        });
    </script>
@stop

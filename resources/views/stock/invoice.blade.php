<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Facture-fournisseur</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        .text-right {
            text-align: right;
        }

    </style>

</head>
<body class="login-page" style="background: white">

    <div>
        <div class="row">
            <div class="col-xs-8">
                <img src="{{url('public/kamab.JPG')}}" style="width: 50%;margin-left:-9px" alt="logo">

            </div>
            <div class="col-xs-4"  >
                <!-- <strong>Company Inc.</strong><br> -->
               
                <span style="font-size:12px;"> <i class="fa fa-phone" style="color: #ca0101;margin-right: 5px;"></i> +(224) 622 21 43 74</span><br>
                <span style="font-size:12px"> <i class="fa fa-phone" style="color: #ca0101;margin-right: 5px;"></i> +(224) 657 21 63 36</span> <br>
                <span style="font-size:12px"> <i class="fa fa-envelope" style="color: #ca0101;margin-right: 5px;"></i> bkamab@yahoo.fr</span> <br>
                <span style="font-size:12px"> <i class="fa fa-map-marker" style="color: #ca0101;margin-right: 6px;"></i> Guinée-Conakry</span> <br>
                <span style="font-size:12px"> B.P.:2424</span> <br>

                <br>
            </div>

           
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>
        <br>
        <br>
        <div class="row">
            <div class="col-xs-6">
                <h4>Client:</h4>
                <address>
                    <strong>{{$client->nom}}</strong><br>
                    <span>{{$client->téléphone}}</span> <br>
                    <span>{{$client->email}}</span> <br>
                    <span>{{$client->adresse}}</span>
                </address>
            </div>

            <div class="col-xs-5">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <th>Facture #:</th>
                            <td class="text-right">{{$facture_num}}</td>
                        </tr>
                        <tr>
            
         
                            <th> Date Facture: </th>
                            <td class="text-right">{{$date}}</td>
                        </tr>
                    </tbody>
                </table>

                <div style="margin-bottom: 0px">&nbsp;</div>

                <table style="width: 100%; margin-bottom: 20px">
                    <tbody>
                        <tr class="well" style="padding: 5px">
                            <th style="padding: 5px"><div> Montant Dû</div></th>
                            <td style="padding: 5px" class="text-right"><strong> {{$vente->restant}} GNF</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
                <br>
                <br>
               
        <table class="table ">
  <thead>
    <tr>
      <th scope="col">Libllé</th>
      <th scope="col">Prix</th>
      <th scope="col">Quantité</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
 
  <tbody>
 
 
  @for ($i = 0; $i < sizeof($lignes) ; $i++)
    <tr>
      <td> {{$lignes[$i]->libellé}}</td>
      <td>{{getPrice( $lignes[$i]->prix,false,true,false)}} </td>
      <td> {{$lignes[$i]->quantité}}</td>
      <td>{{$lignes[$i]->total}}</td>
    </tr>
@endfor

   
  </tbody>
</table>
<br/>
<br/>

            <div class="row" style="">
                <div class="col-xs-4">  
                
                    <table style="width: 100%">
                        <tbody>
                            <tr>
                                <th>Paiment:</th>
                                <td class="text-right"  style="font-size:13px">{{$vente->paiement}}</td>
                            </tr>
                            
                            @if($isVirement==1)
                            <tr>
                                <th> Titulaire compte: </th>
                                <td class="text-right" style="font-size:13px">{{$compte->titulaire}}</td>
                            </tr>
                            <tr>
                                <th> Banque: </th>
                                <td class="text-right" style="font-size:13px">{{$compte->banque}}</td>
                            </tr>
                            <tr>
                                <th> N° Compte: </th>
                                <td class="text-right" style="font-size:13px">{{$vente->compte}}</td>
                            </tr>
                            @endif
                        
                                
                        </tbody>
                    </table>
               
                </div>
                <div class="col-xs-1">
                </div>
                <div class="col-xs-5">
                    <table style="width: 100%">
                        <tbody>
                        @if($isTva==1)
                           <tr class="well" style="padding: 5px">
                                <th style="padding: 5px"><div> Sous Total </div></th>
                                <td style="padding: 5px" class="text-right"><strong> {{$sous_total}} GNF</strong></td>
                            </tr>
                            <tr class="well" style="padding: 5px">
                                <th style="padding: 5px"><div> Tva(%)</div></th>
                                <td style="padding: 5px" class="text-right"><strong> 18</strong></td>
                            </tr>
                            <tr class="well" style="padding: 5px">
                                <th style="padding: 5px"><div> Montant Tva</div></th>
                                <td style="padding: 5px" class="text-right"><strong> {{$montant_tva}} GNF</strong></td>
                            </tr>
                            
                        @endif
                            
                            <tr class="well" style="padding: 5px">
                                <th style="padding: 5px"><div> Montant payé </div></th>
                              
                                    <td style="padding: 5px" class="text-right"><span> {{$vente->payé}} GNF</span></td>
                               
                            </tr>
                            <tr class="well" style="padding: 5px">
                                <th style="padding: 5px"><div> Montant Dû </div></th>
                                <td style="padding: 5px" class="text-right"><span> {{$vente->restant}} GNF</span></td>
                            </tr>
                            <tr class="well" style="padding: 5px">
                                <th style="padding: 5px"><div> Total </div></th>
                                <td style="padding: 5px" class="text-right"><strong> {{$vente->total}} GNF</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="margin-bottom: 0px">&nbsp;</div>
            <div style="margin-bottom: 0px">&nbsp;</div>

            <div class="row">
                <div class="col-xs-12 invbody-terms">
                <p style="">Au plaisir de vous revoir.</p> <br>
                    <br>
                   
                </div>
                <br/>
                <!-- <h4>Termes du paiement</h4>
                    <small style="font-style:oblic">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eius quia, aut doloremque, voluptatibus quam ipsa sit sed enim nam dicta. Soluta eaque rem necessitatibus commodi, autem facilis iusto impedit!</small> -->
            </div>
        </div>

    </body>
    </html>
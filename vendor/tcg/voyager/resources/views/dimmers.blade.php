

<style>
.info-box {
  box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
  border-radius: 0.25rem;
  background: #ffffff;
  display: flex;
  margin-bottom: 1rem;
  min-height: 80px;
  padding: .5rem;
  position: relative;
  
}


.info-box .info-box-icon {
  border-radius: 0.25rem;
  -ms-flex-align: center;
  align-items: center;
  display: flex;
  font-size: 1.875rem;
  -ms-flex-pack: center;
  justify-content: center;
  text-align: center;
  width: 70px;
}

.info-box .info-box-icon > img {
  max-width: 100%;
}

.info-box .info-box-content {
  -ms-flex: 1;
  flex: 1;
  padding: 5px 10px;
}

.info-box .info-box-number {
  display: block;
  font-weight: 700;
}

.info-box .progress-description,
.info-box .info-box-text {
  display: block;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.info-box .bg-info {
  background-color: #17a2b8 !important;
}
.info-box .bg-danger {
  background-color: #dc3545 !important;
}
.info-box .elevation-1 {
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24) !important;
}

.graph_container{
  display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
.chart_vents{
  /* flex-grow:1; */
}
.recent_paid{
  flex-basis:auto;
}
.item{
  padding:10px;
  text-align:center
}
.users-list{
  list-style: none;
  margin: 0;
  padding: 0px 18px;
}

.user-item{
  border-radius: 0;
    /* border-bottom: 1px solid rgba(0,0,0,.125); */
    margin-bottom: 16px;
}

.user-info{
  display: flex;
  justify-content: space-between;
}
.user-image{
  width: 46px;
  height: 46px;
  display: flex;
  justify-content: center;
  align-items: center;
  border: 1px solid rgba(0,0,0,0.05);
  background-color: #fefefefe;
  border-radius: 50%;
  
}
.user-image i{
  font-size: 22px;
}
.user-name{
  flex-grow: 1;
    /* padding-right: 10px; */
    padding: 0 25px;
    text-align: left;
}
.user-pricing{
    display: flex;
    align-items: center;
}
.price{
  font-weight: 600;
    
}
.user_name_text{
  margin-bottom:0px;
  text-transform:capitalize;
}
.other_charts{
  display: flex;
    padding: 10px;
    justify-content: space-between;
    flex-flow: row wrap
}

.other_item{
  flex-basis: 50%;
 
}

.item1_other{

}
</style>
    <div class="row" style="padding: 28px; display:flex; justify-content:space-evenly;margin-top: -10px;flex-wrap:wrap">
        <div class=" col-sm-2 info-box" >
              <span class="info-box-icon bg-info elevation-1"><i class="voyager-bag" style="color:#fff"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Produits</span>
                <span class="info-box-number" id="prod">
                 
                  <!-- <small>%</small> -->
                </span>
              </div>
            
        </div>
        <div class=" col-sm-2 info-box" >
              <span class="info-box-icon bg-info elevation-1"><i class="voyager-truck" style="color:#fff"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Fournisseurs</span>
                <span class="info-box-number" id="four">
                  
                  <!-- <small>%</small> -->
                </span>
              </div>
            
        </div>
        <div class=" col-sm-2 info-box" >
              <span class="info-box-icon bg-info elevation-1"><i class="voyager-group" style="color:#fff"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Client</span>
                <span class="info-box-number" id="cli">
                  
                  <!-- <small>%</small> -->
                </span>
              </div>
            
        </div>
        <div class=" col-sm-2 info-box" >
              <span class="info-box-icon bg-info elevation-1"><i class="voyager-categories" style="color:#fff"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Catégories</span>
                <span class="info-box-number" id="cat">
                  
                  <!-- <small>%</small> -->
                </span>
              </div>
            
        </div>
        <div class=" col-sm-2 info-box" >
              <span class="info-box-icon bg-info elevation-1"><i class="voyager-list"style="color:#fff"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Ventes</span>
                <span class="info-box-number" id="vent">
                  
                  <!-- <small>%</small> -->
                </span>
              </div>
            
        </div>
    </div>

    <div class="page-content browse container-fluid" style="margin-top: -51px;">
     
     
            <div class="col-md-12"  style="padding: 28px;">
            <div class="panel panel-bordered" style="background-color: transparent">
                    <div class="panel-body">
                        <div class="graph_container" style="margin-top: -9px;">
                          <div class="item chart_vents" >
                            <div class="card" >
                              <div class="card-body">
                                <h5 class="card-title" style="word-spacing: 3px;letter-spacing: 1px;">Représentation Graphique des ventes effectuées dans les derniers jours</h5>
                                <br>
                                <canvas id="myChart" width="820" height="380"></canvas>

                                
                              </div>
                            </div>
                          </div>

                          <div class="item recent_paid">
                          <div class="card" style="width: 27rem;">
                              <div class="card-body">
                                <h5 class="card-title" style="border-bottom: 1px solid rgba(0,0,0,.125);height: 33px;margin-bottom: 21px;word-spacing: 3px;letter-spacing: 1px">Acheteurs Récents</h5>
                              
                                <ul class="users-list" >
                                  @foreach( getLastSales() as $lastSale)
                                    <li class="user-item">
                                        <div class="user-info">
                                          <div class="user-image">
                                            <i class="voyager-person"> </i>
                                          </div>
                                          
                                          <div class="user-name">
                                            <p class="user_name_text"> <span>{{$lastSale->nom_client}} </p>

                                            @if($lastSale->payé==0 || is_null($lastSale->payé) )
                                            <span class="badge badge-danger" style="font-size: 11px;">Dû</span>
                                           
                                            @elseif($lastSale->total == $lastSale->payé)
                                            <span class="badge badge-success" style="font-size: 11px;">Payé</span>


                                            @else
                                            <span class="badge badge-warning" style="font-size: 11px;">Avance</span>

                                            @endif
                                            
                                          </div>
                                          <div class="user-pricing">
                                            <p class="price">{{$lastSale->pricing}} GNF</p>
                                          </div>
                                         


                                        </div>
                                    </li>
                                    @endforeach

                                 

                                </ul>
                                
                              </div>
                            </div>
                          </div>

                        </div>

                       
                        <div class="other_charts">
                            <div class="other_item">
                              <div class="card" >
                                <div class="card-body" style="text-align:center">
                                  <h5 class="card-title" style="word-spacing: 3px;letter-spacing: 1px;text-align: center;">Proportion des status de Ventes</h5>
                                  <br>
                                    <canvas id="statusVente" style="margin:0 auto" width="300" height="300"></canvas>

                                  
                                </div>
                              </div>
                            </div>

                            <div class="other_item">
                                <div class="card" >
                                    <div class="card-body">
                                      <h5 class="card-title" style="word-spacing: 3px;letter-spacing: 1px;text-align: center;"">Proportion des status de Livraisons</h5>
                                      <br>
                                      <canvas id="statusLivraison" style="margin:0 auto" width="300" height="300"></canvas>
                                      
                                    </div>
                                </div>
                            </div>
                                      
                        </div>
                        </div>
                        
                    </div>
            
            </div>
           
            </div>
           
    </div>

           
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>


<script>

    document.getElementById("four").innerHTML = <?php echo getCountFour()?>;
    document.getElementById("prod").innerHTML = <?php echo getCountProd()?>;
    document.getElementById("cli").innerHTML = <?php echo getCountClient()?>;
    document.getElementById("cat").innerHTML = <?php echo getCountCat()?>;
    document.getElementById("vent").innerHTML = <?php echo getCountVente()?>;
   
    var data_ =[];
    var labels_ =[];

    

    var sales = <?php echo getSales()?>;

    for(i=0;i<sales.length; i++){
      data_[i] = sales[sales.length-1-i].nb_vente;
      labels_[i] = sales[sales.length-1-i].date_graph;
    }



var all_ventes = <?php echo getStatusVentes() ?>;
var data_statusVentes=[0,0,0];
var labels_statusVentes=["Dû","Avance","Payé"];

var data_statusLiv=[0,0];
var labels_Liv=["Livré","Non Livré"];

for(i=0;i <all_ventes.length;i++){
  if(all_ventes[i].status=="Dû"){
    data_statusVentes[0] = data_statusVentes[0]+1;
  }
  if(all_ventes[i].status=="Avance"){
    data_statusVentes[1] = data_statusVentes[1]+1;
  }
  if(all_ventes[i].status=="Payé"){
    data_statusVentes[2] = data_statusVentes[2]+1;
  }

  if(all_ventes[i].délivré==1){
    data_statusLiv[0] =  data_statusLiv[0]+1
  }else{
    data_statusLiv[1] =  data_statusLiv[1]+1
  }
}

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels:labels_,
        datasets: [{
            label: '# Ventes',
            data: data_,
            backgroundColor: [
                '#17a2b8'
            ],
            borderColor: [
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
          xAxes: [{
            gridLines: {
                display:false
            }
        }],
            yAxes: [{
                ticks: {
                    beginAtZero: true
                },
                gridLines: {
                  display:false
            }  
            }]
        },
        responsive: false,
        maintainAspectRatio: false,
    }
});


var ctx2 = document.getElementById('statusVente').getContext('2d');

var myPieChart = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels:labels_statusVentes,
        datasets: [{
            data: data_statusVentes,
            backgroundColor: [
                '#f96868',
                "#f2a654",
                "#46be8a"
            ],
            borderColor: [
                
            ],
            borderWidth: 1
        }]
    },
    options: {
 
        responsive: false,
        maintainAspectRatio: false,
    }
    // options: options
});


var ctx3 = document.getElementById('statusLivraison').getContext('2d');
var myPieChart = new Chart(ctx3, {
    type: 'pie',
    data: {
        labels:labels_Liv,
        datasets: [{
            data: data_statusLiv,
            backgroundColor: [  
                "#46be8a",
                '#f96868',
            ],
            borderColor: [
                
            ],
            borderWidth: 1
        }]
    },
    options: {
 
        responsive: false,
        maintainAspectRatio: false,
    }
    // options: options
});

</script>
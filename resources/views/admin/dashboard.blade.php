@extends('layouts.mainAdmin')

@section('intra-js')
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Produits', 'Nombre de commande'],
          @php
           //echo $chartData;
          @endphp
          // ['Work',     11],
          // ['Eat',      2],
          // ['Commute',  2],
          // ['Watch TV', 2],
          // ['Sleep',    7]
        ]);

        var options = {
          title: 'Produits commandés',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script> -->
@endsection

@section('content')
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12 main-chart">
        <!--CUSTOM CHART START -->
        
        <!--  -->
        <!-- <div id="piechart_3d" style="width: 100%; height: 500px;"></div> -->
        

        <!--custom chart end-->
        <div class="row mt">
          <!-- SERVER STATUS PANELS -->
          <div class="col-md-4 col-sm-4 mb">
            <a href="">
            <div class="grey-panel pn donut-chart">
              <div class="grey-header">
                <h5></h5>
              </div>
              <canvas id="serverstatus01" height="120" width="120"></canvas>
              <script>
                var doughnutData = [{
                    value: 70,
                    color: "#FF6B6B"
                  },
                  {
                    value: 30,
                    color: "#fdfdfd"
                  }
                ];
                var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
              </script>
              <div class="row">
                <div class="col-sm-6 col-xs-6 goleft">
                  {{-- <p>Usage<br/>Increase:</p> --}}
                </div>
                 <div class="col-sm-6 col-xs-6">
                  <!--<h2></h2> -->
                </div>
              </div>
            </div>
            </a>
            <!-- /grey-panel -->
          </div>
          <!-- /col-md-4-->
          <div class="col-md-4 col-sm-4 mb">
            <a href="">
            <div class="darkblue-panel pn">
              <div class="darkblue-header">
                <h5></h5>
              </div>
              <canvas id="serverstatus02" height="120" width="120"></canvas>
              <script>
                var doughnutData = [{
                    value: 60,
                    color: "#1c9ca7"
                  },
                  {
                    value: 40,
                    color: "#f68275"
                  }
                ];
                var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
              </script>
              {{-- <p>April 17, 2014</p> --}}
              <footer>
                <div class="pull-left">
                  <h5><i class="fa fa-hdd-o"></i> </h5>
                </div>
                <div class="pull-right">
                  <!-- <h2></h2> -->
                </div>
              </footer>
            </div>
            </a>
            <!--  /darkblue panel -->
          </div>
          <!-- /col-md-4 -->
          <div class="col-md-4 col-sm-4 mb">
            <!-- REVENUE PANEL -->
            <a href="">
            <div class="green-panel pn">
              <div class="green-header">
                <h5></h5>
              </div>
              <div class="chart mt">
                
              </div>
              <!-- <p class="mt"><b><h2></b><br/></p> -->
            </div>
            </a>
          </div>
          <!-- /col-md-4 -->
        </div>
        <!-- /row -->
        
        <!-- /row -->
       
      </div>
      <!-- /col-lg-9 END SECTION MIDDLE -->
      <!-- **********************************************************************************************************************************************************
          RIGHT SIDEBAR CONTENT
          *********************************************************************************************************************************************************** -->
    </div>
    <!-- /row -->
  </section>
</section>
@endsection

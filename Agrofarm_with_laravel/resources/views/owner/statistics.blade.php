<!DOCTYPE html>
<html>
 <head>
  <title>Statics Pie Chart</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="style.css">


  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <style type="text/css">
    .scroll
  {
    
    width:100%;
    height:300px; 
    overflow: scroll;
  }

.table  img{
    width: 45px; 
                height: 45px; 
                object-fit: contain;"
  }



  
    /* popup style */
.bg-modal{
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.7);
  
  position: absolute;
  top: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  display: none;
}

.modal-content{
  width: 500px;
  height: 450px;
  background-color: white;
  border-radius: 4px;
  text-align: center;
  padding: 20px;
  position: relative;
}
#popup1 input {
width: 50%;
display: block;

margin: 15px auto;
}


.close{
  position: absolute;
  top 0;
  right: 14px;
  font-size: 42px;
  transform: rotate(45deg);
  cursor: pointer;
}


    /* edit popup style */
.bg-modal2{
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.7);
  
  position: absolute;
  top: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  display: none;
}

.modal-content2{
  width: 500px;
  height: 470px;
  background-color: white;
  border-radius: 4px;
  text-align: center;
  padding: 20px;
  position: relative;
}
#popup input {
width: 50%;
display: block;

margin: 15px auto;
}

.close2{
  position: absolute;
  top 0;
  right: 14px;
  font-size: 42px;
  transform: rotate(45deg);
  cursor: pointer;
}
   .box{
    width:800px;
    margin:0 auto;
   }
  </style>
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  <script type="text/javascript">
   var analytics = <?php echo $TRType; ?>

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Debit Credit Percentage'
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, options);
   }
  </script>
 </head>
 <body>
  <header>
        @extends('owner/owner_layout')
    </header>
    
    @section('owner_content')
  <br />
  <div class="container">
   <h3 align="center">Transaction Pie Chart</h3><br />
   
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Debit Credit Percentage</h3>
    </div>
    <div class="panel-body" align="center">
     <div id="pie_chart" style="width:750px; height:450px;">

     </div>
    </div>
   </div>
   
  </div>
  <footer>
    @endsection
</footer>
 </body>
</html>
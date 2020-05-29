
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="">


  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link rel="stylesheet" href="Style.css">
<style type="text/css">
  
  #Checkout {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}
#Checkout h2{
text-align:left;
}

#Checkout * {
  box-sizing: border-box;
}

#Checkout .row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -10px;
}

#Checkout .col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

#Checkout .col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

#Checkout .col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

#Checkout .col-25,
#Checkout .col-50,
#Checkout .col-75 {
  padding: 0 16px;
}

#Checkout .container {
  background-color: #cfcccc85;
  padding: 3px 18px 13px 18px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

#Checkout input[type=text] {
 width: 60%; 
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

#Checkout label {
  margin-bottom: 10px;
  display: block;
}

#Checkout .icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

#Checkout .btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

#Checkout .btn:hover {
  background-color: #45a049;
}

#Checkout a {
  color: #2196F3;
}

#Checkout hr {
  border: 1px solid lightgrey;
}

#Checkout span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
#Checkout  .row {
    flex-direction: column-reverse;
  }
  #Checkout .col-25 {
    margin-bottom: 20px;
  }
}
</style>



 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#Checkout").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>

<script type="text/javascript">
  $(function() {
    $("#addchk").change(function(){
      var st =this.checked;
      if(st){
        $("#addtxt").prop("readonly",false);
      }
      else{

        $("#addtxt").prop("readonly",true);
      }
      
    });
  });
</script>

</head>
<body>

	<header>
        @extends('customer/customer_layout')
    </header>
    
    @section('customer_content')
    
    


<div id="Checkout">
<h2>Contact Form</h2>


<div class="row">
  <div class="col-75">
    <div class="row">
        <div class="col-25">
        </div>
    </div>
      
    <div class="container" >

      <form action="" method="post">
      @csrf
        <div class="row">
          <div class="col-md-8">
              
            <h3>Contact</h3>
            
            @if (session('Success_message'))
						
                    

            <h3 class="alert alert-dismissible alert-success">{{session('Success_message')}}</h3>

</p>
@endif



            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
          <input type="text" id="fname" name="name" value=""  class="form form-control">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="email" id="email" name="email" style="width: 60%;" value="" >
            <label for="email"><i class="fa fa-envelope"></i> Message</label>
            <input type="textarea" id="message" name="message" style="width: 60%;" value="" >
            
            <button type="submit"  formaction="{{URL::to('/contact_show')}}" class="btn btn-default"  style="background-color: green;color: white; width:60%" >Send Message</button>

  </div>
  </div>
</div>
</div>


</div>
</div>
</div>
</div>
 <div align="center">

  
</div>

</form>



<footer>
    @endsection
</footer>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>


</body>
</html>
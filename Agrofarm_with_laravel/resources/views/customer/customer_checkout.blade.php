
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
<h2>Checkout Form</h2>


<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="" method="post">
      @csrf
        <div class="row">
          <div class="col-md-8">

            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
          <input type="text" id="fname" name="name" value="{{$cus_info->name}}" readonly>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="email" id="email" name="email" style="width: 60%;" value="{{$cus_info->email}}" readonly>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address <h5 style="display: inline-block; color: grey;"> Change Address &nbsp &nbsp</h5><input type="checkbox" name="" id="addchk"></label>
            <input type="text"  name="address" id="addtxt" value="{{$cus_info->address}}" readonly>
            <label for="city"><i class="fa fa-phone"></i> Phone</label>
            <input type="text" id="phone" name="phone" value="{{$cus_info->phone}}" readonly>



            
          <div class="col-50">
            <h3>Payment</h3>
            
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Cash on delivery
        </label>
        
      
    
  </div>
  <div class="col-md-4">
    
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b></b></span></h4>



      <h1> Shopping Cart </h1>


<p class="text-muted" >  </p>

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table" ><!-- table Starts -->

<thead><!-- thead Starts -->

<tr>

<th >Product</th>

<th>Quantity</th>

<th>Unit Price</th>



<th colspan="4"> Sub Total </th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

    @php  $total=0 @endphp
    @foreach ($all_cart_product as $cart_product)
    
<tr><!-- tr Starts -->


<td>
    {{$cart_product->Fname}}

</td>

<td style="text-align: center;">

    {{$cart_product->qty}}

</td>

<td>

    {{$cart_product->price}}.00 BDT
  
</td>



<td>
    {{$subtotal=$cart_product->price*$cart_product->qty}}
	@php
		$total=$total+$subtotal;
	@endphp
</td>

</tr><!-- tr Ends -->
@endforeach

</tbody><!-- tbody Ends -->

<tfoot><!-- tfoot Starts -->

<tr>

<th colspan="3"> Total </th>

<th colspan="3">
    {{$total}}.00 BDT </th>

</tr>



</tfoot><!-- tfoot Ends -->

</table><!-- table Ends -->


</div><!-- table-responsive Ends -->

    </div>
  </div>
</div>
</div>


</div>
</div>
</div>
</div>
 <div align="center">

  <button type="submit"  formaction="{{URL::to('/confirm_checkout')}}" class="btn btn-default"  style="background-color: green;color: white;" >Confirm checkout</button>
  <input class="btn btn-default " type="button" value="Print" id="btnPrint" style="background-color: red;color: white;" />
  
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
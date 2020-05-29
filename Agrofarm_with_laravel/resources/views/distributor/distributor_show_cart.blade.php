<!DOCTYPE html>
<html>

<head>
<title> </title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<link rel="stylesheet" href="styles/style.css">


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

<link href="styles/bootstrap.min.css" rel="stylesheet">

<link href="styles/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
<style type="text/css">
.box{
	background: #fff;
	width: 100%;
	margin: 0 0 30px;
	border: solid 1px #e6e6e6;
	padding: 20px;
	box-shadow: 0 1px 5px rgba(0,0,0,0.1);
}


#content #productmain{
	margin-bottom: 30px;
}

#content #productmain .price{
	font-size: 30px;
	font-weight: 300;
	text-align: center;
	margin-top: 40px;
}

#content #mainimage{
	box-shadow: 0 1px 5px rgba(0,0,0,0.7);
	position: absolute;
	height: 600px;

}

#content a .thumb {
	display: block;
	box-shadow: 0 1px 5px rgba(0,0,0,0.2);
	border: solid 2px transparent;
}

#content .headline{
	height: 200px;
}
/* details.php  ends */
</style>


</head>

<body>

    
    <header>
        @extends('distributor/distributor_layout')
    </header>
    
    @section('distributor_content')
    


<div class="col-md-12" id="cart" ><!-- col-md-9 Starts -->

<div class="box" ><!-- box Starts -->

<form method="post" ><!-- form Starts -->
@csrf
<h1> Shopping Cart </h1>


<p class="text-muted" >  </p>

<div class="table-responsive" ><!-- table-responsive Starts -->



<table class="table" ><!-- table Starts -->

<thead><!-- thead Starts -->

<tr>

<th colspan="2" >Product</th>

<th>Quantity</th>

<th>Unit Price</th>


<th colspan="1">Action</th>

<th colspan="2"> Sub Total </th>


</tr>


</thead><!-- thead Ends -->
@php  $total=0 @endphp
@foreach ($all_cart_product as $cart_product)
	

  


<tbody><!-- tbody Starts -->


<tr><!-- tr Starts -->

<td colspan="1">

<img  src="{{asset('images/'.$cart_product->Fimage)}}" style="height: 70px;width: 70px;">

</td>

<td>
	 
	{{$cart_product->Fname}}

</td>

<td>
    <input type="number" style="width: 10%;" name="qty" id="" min="1"  value="{{$cart_product->qty}}"> 
</td>

<td>
    
	
	{{$cart_product->price}}

</td>



<td>
    
    <button class="btn btn-default"  formaction="{{URL::to('/distributor_update_cart/'.$cart_product->Fid)}}"  type="submit" style="background-color: green;color: white;">
        <i class="fa fa-refresh"> </i>
    </button> 
    

    <button class="btn btn-default" formaction="{{URL::to('/distributor_delete_cart/'.$cart_product->Fid)}}" type="submit" style="background-color: red;color: white;">
        <i class="fa fa-trash"> </i>
    </button> 
    
    
</td>

<td>

        
	{{$subtotal=$cart_product->price*$cart_product->qty}}
	@php
		$total=$total+$subtotal;
	@endphp
</td>

</tr><!-- tr Ends -->


</tbody><!-- tbody Ends -->
@endforeach
<tfoot><!-- tfoot Starts -->

<tr>

<th colspan="5"> Total </th>


</tr>

</tfoot><!-- tfoot Ends -->

</table><!-- table Ends -->


</div><!-- table-responsive Ends -->


<div class="box-footer"><!-- box-footer Starts -->

<div class="pull-left"><!-- pull-left Starts -->

<a href="{{URL::to('/distributor_shop')}}" class="btn btn-default">

<i class="fa fa-chevron-left"></i> Continue Shopping

</a>

</div><!-- pull-left Ends -->

<div class="pull-right"><!-- pull-right Starts -->


<a href="{{URL::to('/distributor_checkout')}}"  class="btn btn-primary"  name="checkout">

Proceed to checkout <i class="fa fa-chevron-right"></i>

</a>








</div><!-- pull-right Ends -->

</div><!-- box-footer Ends -->

</form><!-- form Ends -->


</div><!-- box Ends -->





<div class="col-md-12"><!-- col-md-3 Starts -->

<div class="box" id="order-summary"><!-- box Starts -->

<div class="box-header"><!-- box-header Starts -->

<h3>Order Summary</h3>

</div><!-- box-header Ends -->

<p class="text-muted">
Shipping and additional costs are calculated based on the values you have entered.
</p>

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table"><!-- table Starts -->

<tbody><!-- tbody Starts -->

<tr>

<td> Order Subtotal </td>
<th>BDT  {{$total}} </th>

</tr>

<tr>

<td> Shipping and handling </td>

<th>BDT 0.00</th>

</tr>

<tr>

<td>Tax</td>

<th>BDT 0.00</th>

</tr>

<tr class="total">

<td>Total</td>
<th>BDT {{$total}}</th>



</tr>

</tbody><!-- tbody Ends -->

</table><!-- table Ends -->

</div><!-- table-responsive Ends -->

</div><!-- box Ends -->

</div><!-- col-md-3 Ends -->

 </div><!-- content Ends -->

</div>


</div>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

<footer>
	@endsection
</footer>

</body>
</html>

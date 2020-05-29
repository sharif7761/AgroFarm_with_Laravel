<!DOCTYPE html>
<html>
<head>
	<title>Farm</title>
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

.table	img{
		width: 45px; 
                height: 45px; 
                object-fit: contain;
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
	top: 0;
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
	height: 510px;
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
	top: 0;
	right: 14px;
	font-size: 42px;
	transform: rotate(45deg);
	cursor: pointer;
}




</style>
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>
<body>
	<header>
        @extends('distributor/distributor_layout')
    </header>
    
    @section('distributor_content')
    
    
    
	</div>


		<div class="col-md-12" id="cart">
			<div class="box">
				<form  method="POST" >
					<legend><h1>Order Report</h1></legend>
					<div>
					
					<span class="pull-right">
						@csrf
							<input type="text" name="search" placeholder="Search by Food Name">
							<button class="btn btn-default" type="submit" formaction="{{URL::to('/distributor_search_order')}}" name="submit" value="submit" style="background-color: blue;color: white;">
								<i class="fa fa-search"> Search</i>
							</button>



					</span>	

				</div>

				<br>
				<br>
				<br>


	<div class="table-responsive">
						<div class="scroll">

	<table  class='table table-bordered table-hover'>
		<tr style='background-color: #9099f3;'>
			<td>ORDER ID</td>
			<td>distributor ID</td>
			<td>distributor NAME</td>
			<td>EMAIL</td>
			<td>PHONE</td>
			<td>ADDRESS</td>
			<td>FOOD ID</td>
			<td>FOOD NAME</td>
			<td>QUANTITY</td>
			<td>TOTAL PRICE</td>
			<td>STATUS</td>
			
			
        </tr>
        @foreach ($all_orders as $orders)
            
        
	
		<tr>
			<td>{{$orders->dOrder_id }}</td>
			<td>{{$orders->distributor_id }}</td>
			<td>{{$orders->name }}</td>
			<td>{{$orders->email }}</td>
			<td>{{$orders->phone }}</td>
			<td>{{$orders->address }}</td>
			<td>{{$orders->Fid }}</td>
			<td>{{$orders->Fname }}</td>
			<td>{{$orders->Quantity }}</td>
			<td>{{$orders->Total_price }}</td>
			<td>{{$orders->Status }}</td>
			
			
			
		</tr>
        @endforeach
	</table>

</div>
</div>


<div class="box-footer">
						
						<div class="pull-right">
							
							
							
						</div>

						
					</div><br><br>
				</form>


<footer>
    @endsection
	</footer>

	<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
            <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
            {!! Toastr::message() !!}


<div class="bg-modal2" >
			<div class="modal-content2">
				
				<div class="close2">
					+
				</div>


				<form  id="popup" method="POST" >
					<input type="text" style="width: 50%;" name="Order_id" id="Order_id" placeholder="Order_id" >
					<input type="text" style="width: 50%;" name="Cus_id" id="Cus_id" placeholder="Cus_id" >
					<input type="text" style="width: 50%;" name="name" id="name" placeholder="Name">
					<input type="text" style="width: 50%;" name="email" id="email" placeholder="Email">
					<input type="text" style="width: 50%;" name="phone" id="phone" placeholder="Phone">
					<input type="text" style="width: 50%;" name="address" id="address" placeholder="Address">
					<input type="text" style="width: 50%;" name="Fid" id="Fid" placeholder="Fid" >
					<input type="text" style="width: 50%;" name="food_name" id="Fname" placeholder="Fname">
					<input type="text" style="width: 50%;" name="quantity" id="Quantity" placeholder="Quantity">
					<input type="text" style="width: 50%;" name="Total_price" id="Total_price" placeholder="Total Price">
					<br><br>
		
						<button class="btn btn-default fa fa-pencil-square-o"   type="submit" name="update_order"  style="background-color: green; color: white;" formaction="/admin/update_order">Update Order</button>

					</form>
				

			</div>
		</div>





					<div class="bg-modal">
			<div class="modal-content">
				<div class="close">
					+
				</div>


				<form  id="popup1" method="POST" >
					
					
					<input type="text" style="width: 50%;" name="Uname" placeholder="Uname">
					<input type="text" style="width: 50%;" name="Phone" placeholder="Phone">
					
					<input type="text" style="width: 50%;" name="Email" placeholder="Email">
					<input type="text" style="width: 50%;" name="Address" placeholder="Address">
					<input type="text" style="width: 50%;"  name="Position" placeholder="Position">
					
					<button class="btn btn-default fa fa-plus" formaction="/admin/adduser" type="submit" name="add_user" style="background-color:slateblue; color: white;">Add User</button>
				</form>

			</div>
		</div>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script type="text/javascript">

	document.getElementById('add_item').addEventListener('click',function(){
document.querySelector('.bg-modal').style.display='none';

});


$(document).ready(function(){
	$('.edition').on('click',function(){
		
	
document.querySelector('.bg-modal2').style.display='flex';

$tr=$(this).closest('tr');
var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);
$('#Order_id').val(data[0]);
$('#Cus_id').val(data[1]);
$('#name').val(data[2]);
$('#email').val(data[3]);
$('#phone').val(data[4]);
$('#address').val(data[5]);
$('#Fid').val(data[6]);
$('#Fname').val(data[7]);
$('#Quantity').val(data[8]);
$('#Total_price').val(data[9]);
$('#Status').val(data[10]);




		});
	
	});



	 
	document.querySelector('.close').addEventListener('click',function(){
		document.querySelector('.bg-modal').style.display='none';

	});

	document.querySelector('.close2').addEventListener('click',function(){
		document.querySelector('.bg-modal2').style.display='none';
		
	});
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</body>
</html>
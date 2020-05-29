

<!DOCTYPE html>
<html>
<head>
	<title>E Commerce Store</title>
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
	height: 300px;
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
.bg-modal3{
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

.modal-content3{
	width: 500px;
	height: 300px;
	background-color: white;
	border-radius: 4px;
	text-align: center;
	padding: 20px;
	position: relative;
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
	height: 350px;
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
.close3{
	position: absolute;
	top: 0;
	right: 14px;
	font-size: 42px;
	transform: rotate(45deg);
	cursor: pointer;
}



.wrapper
		{
			width: 300px;
			margin:0 auto;
			background-color: white;
			color: black;	
		}


</style>
</head>
<body>



	<header>
        @extends('customer/customer_layout')
    </header>
    
    @section('customer_content')
    

<!-- 3rd head ends-->

</div>


		<div class="" id="">
			<div class="box" style="width: 100%;">
				
<div class="container" style="width: 100%;background-color: white;"> 
	<div class="wrapper">
        @if (session('Success_message'))
						
                    

	                <h3 class="alert alert-dismissible alert-success">{{session('Success_message')}}</h3>

</p>
@endif
@if (session('Error_message'))
						


<h3 class="alert alert-dismissible alert-danger">{{session('Error_message')}}</h3>

</p>
@endif

		<legend>
			<h2 style="text-align: center;">My Profile</h2>
		</legend>		


		<div style="text-align: center;">
			<h2 style="color:mediumseagreen; "><b style="color: slateblue" >Welcome </b>{{$cus_info->name}}</h2>
			<h3 style="color:slateblue; ">
				<b> <img src="{{asset('images/'.$cus_info->pic)}}" style="height: 170px;width:190px;"> </b>
			</h3>
		</div>

		<br>

		
		    <b>
		    <table class='table table-bordered' style='width:100%;'>

		    <tr>
		    <td>
		    <b> User ID: </b> 
		    </td>

		    <td>
		    {{$cus_info->Cus_id}} 
		    </td>
		    </tr>

		    <tr>
		    <td>
		    <b> User Name </b> 
		    </td>

		    <td>
				{{$cus_info->name}}
		    </td>
		    </tr>

		    <tr>
		    <td>
		    <b> Phone: </b> 
		    </td>

		    <td>
               {{$cus_info->phone}} 
                
 </td>
		    </tr>

		    <tr>
		    <td>
		    <b> Email: </b> 
		    </td>

		    <td>
              {{$cus_info->email}}  
                
 </td>
		    </tr>

		    <tr>
		    <td>
		    <b> Address: </b> 
		    </td>

		    <td>
               {{$cus_info->address}}  
            </td>
		    </tr>

		   

		    </table>
		    </b>
		

		<div  align="center">
							
							
							<a href="#" class="btn btn-primary" id="edit_pass" style="background-color: green;">Change Password <i class="fa fa-pencil-square-o"></i></a>	
							<button class="btn btn-default edition" id="edit_pro" type="button" style="background-color: blue;color: white;">
								<i class="fa fa-pencil-square-o"> Edit Info </i>
							</button> 
							<button class="btn btn-default edition" id="upload" type="button" style="background-color: rgb(0, 217, 255);color: white;">
								<i class="fa fa-pencil-square-o">  Change Image </i>
							</button> 
							<br> <br>
							
						</div>


</div>
</div>

</div>
</div>

<footer>
</footer>

<div class="bg-modal">
			<div class="modal-content">
				<div class="close">
					+
				</div>


				<form action="" id="popup" method="POST">
                    @csrf

                    

					<input type="password" name="old_pass" id="old_pass" placeholder="Enter Old Password" required>
					<input type="password" name="new_pass" id="new_pass" placeholder="Enter New Password" required>
					<input type="password" name="con_pass" id="con_pass" placeholder="Confirm New Password" required>
					
					
                <button class="btn btn-default" type="submit" formaction="{{URL::to('/customer_change_pass')}}" type="submit" name="change_pass" class="fa fa-send-o" style="background-color: red;color: white;">Submit</button>
					
	</form>


			</div>
		</div>


		
<div class="bg-modal3">
	<div class="modal-content3">
		<div class="close3">
			+
		</div>


        <form  id="popup" method="POST" enctype="multipart/form-data">
            @csrf
			<input type="file" name="cus_image" id="file" required>
			
			
			
<button class="btn btn-default" type="submit" formaction="{{URL::to('/customer_change_pic')}}" type="submit" name="change_pic" class="fa fa-send-o" style="background-color: rgb(39, 141, 167);color: white;">Change Image</button>
			
</form>


	</div>
</div>





		<footer>
		</footer>

		<div class="bg-modal2" >
			<div class="modal-content2">
				
				<div class="close2">
					+
				</div>


				<form  id="popup" method="POST" >
                    @csrf
					
					<input type="hidden" style="width: 50%;" name="Cus_id" id="Cus_id" placeholder="Cus_id" value="{{$cus_info->Cus_id}}" >
					<input type="text" style="width: 50%;" name="name" id="name" placeholder="Name" value="{{$cus_info->name}}">
					<input type="text" style="width: 50%;" name="email" id="email" placeholder="Email" readonly value="{{$cus_info->email}}">
					<input type="text" style="width: 50%;" name="phone" id="phone" placeholder="Phone" value="{{$cus_info->phone}}">
					<input type="text" style="width: 50%;" name="address" id="address" placeholder="Address" value="{{$cus_info->address}}">

		<button class="btn btn-default fa fa-refresh" formaction="{{URL::to('/customer_edit_info')}}" type="submit" name="delete_customer"  style="background-color: blue;color: white;"> Edit</button><br><br>
				</form>
				

			</div>
		</div>
		


<script type="text/javascript">
	

	

document.getElementById('edit_pass').addEventListener('click',function(){
document.querySelector('.bg-modal').style.display='flex';
document.querySelector('.bg-modal2').style.display='none';
document.querySelector('.bg-modal3').style.display='none';

});
document.querySelector('.close').addEventListener('click',function(){
		document.querySelector('.bg-modal').style.display='none';

	});	

	
document.getElementById('edit_pro').addEventListener('click',function(){
document.querySelector('.bg-modal2').style.display='flex';
document.querySelector('.bg-modal').style.display='none';
document.querySelector('.bg-modal3').style.display='none';


});

document.getElementById('upload').addEventListener('click',function(){
document.querySelector('.bg-modal2').style.display='none';
document.querySelector('.bg-modal').style.display='none';
document.querySelector('.bg-modal3').style.display='flex';


});



document.querySelector('.close2').addEventListener('click',function(){
		document.querySelector('.bg-modal2').style.display='none';

	});	

	document.querySelector('.close3').addEventListener('click',function(){
		document.querySelector('.bg-modal3').style.display='none';

	});	

	

	</script>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<footer>
	@endsection
</footer>

</body>
</html>




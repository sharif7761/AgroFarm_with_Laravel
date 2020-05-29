<!DOCTYPE html>
<html>
<head>
	<title>Crops</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<link rel="stylesheet" href="">


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<style type="text/css">


	#shop_header{
	font-family: "Roboto",Helvetica,Arial,sans-sarif;
	font-size: 14px;
	line-height: 1.42857143;
	color: #333333;
	background-color: #f0f0f0;
}

#top{
	background-color: #005266;
	padding: 10px 0;
    text-align: center;

}

#top .offer{
	color: #fff;
}

#top .offer .btn{
	text-transform: uppercase;
}

@media(max-width: 991px){
	#top .offer{
		margin-bottom: 10px;
	}
}

@media(max-width: 991px){
	#top {
		font-size: 12px;
		text-align: center;
	}
}

#top a{
	color: #fff;

}

#top ul.menu{
 padding-top: 5px;
 margin: 0;
 text-align: right;
 font-size: 12px;
 list-style: none;
}

@media(max-width: 991px){
	#top ul.menu{
		text-align: center;
	}
}

#top ul.menu{
	text-align: center;
}

#top ul.menu >li a{
	color: #eeeeee;

}

#top ul.menu>li{
	display: inline-block;
}

#top ul.menu > li +li:before{
	content: "|\00a0";
	padding: 0 5px;
	color: #f7f7f7;
}




/* header style */

.navbar{
	background: white;
}

.navbar-collapse .right {
	float: right;
}

.navbar-brand{
	float: left;
	padding: 10px 15px;
	font-size: 18px;
	line-height: 20px;
	height: 17px;
}


.navbar-brand:hover,.navbar-brand:focus{
	text-decoration: none;
}

.navbar ul.nav>li>a{
	text-transform: uppercase;
	font-weight: bold;
	font-size: 14px;
}

.padding{
	padding-top: 10px;
}

.navbar ul.nav>li>a:hover{
	background: #e7e7e7;

}

.btn-primary{
	color: rgb(255,255,255);
	background-color: rgb(75,151,168);
	border-color: rgb(65,179,156);
}
  
  
  #header_text{
    font-size: 21px;
    
    color: #FFFFFF;
  }

  #title{
    margin-left: 90px;
  }
  .contactus{
  	
  	float: left;
  	width: 45%;
  	
  	margin: auto;
  	padding-top: 25px;
  }

  .callus{
  float: right;
  	margin-right: 20px;	
  	width: 25%;
  	height: 100%;
  	background-color: tomato;
  	text-align: center;
  }

  .contactinfo{
  	float: right;
  	
  	width: 50%;
  	height: 100%
  }
  




 .social{
text-align: left;

}

.social a{
margin: 12px 10px 0 0;	
color: #fff;
display: inline-block;
width: 30px;
height: 30px;
border-radius: 15px;
line-height: 30px;
font-size: 15px;
text-align: center;
transform: all 0.3s ease-out;
vertical-align: bottom;
background-color: #555555;

}






#title h2{
	padding-left: 15px;
	color: tomato;
	text-transform: uppercase;
}

#title h4{
	color: grey;
	}

#header2{
	background-color: white;
	width: 100%;
	height: 117px;
}

.nav-right label{
	width: 20px;
	height: 30px;
	border-radius: 50%;

	color: tomato;
	font-size: 20px;
	background-color: red;
}

.nav-right p{
	color: white;
	text-align: center;
	
}

.nav-right a{
	padding-right: 50px;
	margin-top:  20px;
	
	text-decoration: none;

	
}

#login_style{
	color: tomato;
	margin-top: 10px;
	padding-top:  10px;
}

#cart_style{
padding:  0px;
}

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

.close{
	position: absolute;
	top: 0;
	right: 14px;
	font-size: 42px;
	transform: rotate(45deg);
	cursor: pointer;
}

	
/*fruit*/



.box{
	background: #fff;
	margin: 0 0 30px;
	border: solid 1px #e6e6e6;
	padding: 20px;
	box-shadow: 0 1px 5px rgba(0,0,0,0.1);
}
.breadcrumb{
	padding: 8px 15px;
	margin-bottom: 20px;
	background-color: #ffffff;
	border-radius: 0;
	box-shadow: 0 1px 5px rgba(0,0,0,0.5);
}

.breadcrumb >li + li:before{
	content: ">\00a0";
	color:#cccccc;
}



@media(max-width: 991px){

.breadcrumb{
padding: 8px 0;
text-align: center;
}

}




/* shop product style (responsive) */

@media(max-width: 768px){
.center-responsive{
	width: 70%;
	margin: 0 auto;

}
}

@media(max-width:550px){
.center-responsive{
	width: 95%;
	margin: 0 auto;

}	
}


/* shop.php  Ends */

</style>	

</head>
<body>





	<header>
        @extends('customer/customer_layout')
    </header>
    
    @section('customer_content')
	</header>




<div id="content">
	<div class="container">
		<div class="col-md-12"> <!-- top home|shop nav start -->
			<ul class="breadcrumb">
				<li><a href="/customer/shop">Shop</a></li>
				<li>Crop</li>
				
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				
				<li>
					<form action="" method="post">
						@csrf
					<input type="text" name="search" placeholder="Search by Crop Name">
							<button class="btn btn-default" type="submit" formaction="{{URL::to('/customer_search_product')}}" name="submit" value="submit" style="background-color: blue;color: white;">
								<i class="fa fa-search"> Search</i>
							</button>
						</form>
				</li>
				
			</ul>
			
		</div> <!-- top home|shop nav End -->
			
		<div class="col-md-3"> <!-- Side nav start -->
	<div class="box">
				<h1>Crop Shop</h1>
				<p>
					Chances are high that your item is available from a big box online retailer at a lower price.Consumers are motivated by more than price and convenience.
				</p>
		</div>  	
</div>

		<div class="col-md-9">
			
				</div>
                
                @foreach ($all_crops as $crops)
                    
                
                <div class='col-md-4 col-sm-6'>
				<div class='product'>
				<a href='{{URL::to('/customer_view_product/'.$crops->Fid)}}'>
							<img class= 'img-responsive' src= {{asset('images/'.$crops->Fimage1)}} style='position: relative;
                
    width:  200px;
    height: 200px;
    background-position: 50% 50%;
    background-repeat:   no-repeat;
    background-size:     cover;'>
                        </a>
                        
						<div class='text'>
							<h3>
								<a href='{{URL::to('/customer_view_product/'.$crops->Fid)}}'>{{$crops->Fname}} </a>
							</h3>
							
							<p class='price'>{{$crops->SRate}} BDT</p>
							<p class='buttons'>
								<a href="{{URL::to('/customer_view_product/'.$crops->Fid)}}" class='btn btn-default'>View Details</a>
								
							</p>
						</div>


					</div>
				</div>
			
                @endforeach


				<div class="row">
					<div id="load_data"></div>
   <div id="load_data_message"></div>


</div>
</div>
</div>
</div>
</div>
</div>



<footer>
    @endsection
</footer>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>
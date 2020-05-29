<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
    body {
        font-family: "Roboto", Helvetica, Arial, sans-sarif;
        font-size: 14px;
        line-height: 1.42857143;
        color: #333333;
        background-color: #f0f0f0;
    }

    #top {
        background-color: #005266;
        padding: 10px 0;
        text-align: center;

    }

    #top .offer {
        color: #fff;
    }

    #top .offer .btn {
        text-transform: uppercase;
    }

    @media(max-width: 991px) {
        #top .offer {
            margin-bottom: 10px;
        }
    }

    @media(max-width: 991px) {
        #top {
            font-size: 12px;
            text-align: center;
        }
    }

    #top a {
        color: #fff;

    }

    #top ul.menu {
        padding-top: 5px;
        margin: 0;
        text-align: right;
        font-size: 12px;
        list-style: none;
    }

    @media(max-width: 991px) {
        #top ul.menu {
            text-align: center;
        }
    }

    #top ul.menu {
        text-align: center;
    }

    #top ul.menu>li a {
        color: #eeeeee;

    }

    #top ul.menu>li {
        display: inline-block;
    }

    #top ul.menu>li+li:before {
        content: "|\00a0";
        padding: 0 5px;
        color: #f7f7f7;
    }




    /* header style */

    .navbar {
        background: white;
    }

    .navbar-collapse .right {
        float: right;
    }

    .navbar-brand {
        float: left;
        padding: 10px 15px;
        font-size: 18px;
        line-height: 20px;
        height: 17px;
    }


    .navbar-brand:hover,
    .navbar-brand:focus {
        text-decoration: none;
    }

    .navbar ul.nav>li>a {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 14px;
    }

    .padding {
        padding-top: 10px;
    }

    .navbar ul.nav>li>a:hover {
        background: #e7e7e7;

    }

    .btn-primary {
        color: rgb(255, 255, 255);
        background-color: rgb(75, 151, 168);
        border-color: rgb(65, 179, 156);
    }


    #header_text {
        font-size: 21px;

        color: #FFFFFF;
    }

    #title {
        margin-left: 90px;
    }

    .contactus {

        float: left;
        width: 45%;

        margin: auto;
        padding-top: 25px;
    }

    .callus {
        float: right;
        margin-right: 20px;
        width: 25%;
        height: 100%;
        background-color: red;
        text-align: center;
    }

    .contactinfo {
        float: right;

        width: 50%;
        height: 100%
    }





    .social {
        text-align: left;

    }

    .social a {
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






    #title h3 {
        padding-left: 8px;
        color: red;
        text-transform: uppercase;
    }

    #title h4 {
        color: grey;
    }

    #header2 {
        background-color: white;
        width: 100%;
        height: 117px;
    }

    .nav-right label {
        width: 20px;
        height: 30px;
        border-radius: 50%;

        color: red;
        font-size: 20px;
        background-color: red;


    }

    .nav-right p {
        color: white;
        text-align: center;


    }

    .nav-right a {
        padding-right: 50px;
        margin-top: 20px;

        text-decoration: none;


    }

    #login_style {
        color: red;
        margin-top: 10px;
        padding-top: 10px;
    }

    #cart_style {
        padding-bottom: 0px;
        margin: auto;
    }
    </style>
</head>

<body>
    <div id="top">
        <!--top bar start-->
        <div class="container">



            <label id="header_text">Free Shipping * Order Today</label>
        </div>

    </div>



    <div class="container" id="header2">
        <div class="navbar-header">
            <a class="navbar-brand home" href="index.php">
                <img src="{{asset('images//new1.png')}}" alt="Shop" class="hidden-xs">
                <img src="{{asset('images//new1.png')}}" alt="Shop" class="visible-xs">
        </div>
        <div id="title">

            <h3> AGRO FARM </h3>
            <h4>Best products here</h4>
            </a>
        </div>
        <div class="contactinfo">


            <div class="callus">
                <h3>Call Us</h3>
                <h4>0171234556</h4>

            </div>


            <div class="contactus">
                <p class="social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-envelope"></i></a>
                </p>
            </div>
        </div>
    </div>

    </div>


    <!-- 2nd head ends-->



    <!-- 3rd head starts-->

    <div class="navbar  navbar-default" id="navbar">
        <div class="container">


            <div class="navbar-collapse" id="navigation">
                <div class="padding nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="active">
                            <a href="{{URL::to('/')}}">Home</a>
                        </li>


                        <li>
                            <a href="/home/about">About Us</a>
                        </li>

                        <li style="text-align: center; padding-left: 300px; ">
                            <h3 style="color:red; text-align: center;">Please Login To View Shop</h3>
                        </li>




                    </ul>
                    <div class="nav-right">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><i class="fa fa-user fa-2x">
                                    <a href="#" id="login_style"> Login </a>
                                </i></li>



                        </ul>



                        <!--				
				
					<div class="cart_style">
				<a href="cart.php" class="navbar-btn right">
					<i class="fa fa-shopping-cart fa-2x"></i>
					<label><p>4</p></label>
				</a>
			</div>
		-->

                    </div>

                </div>
            </div>
        </div>
    </div>
    </a>
    </div>
    </div>





    <!-- 3rd head ends-->

</body>

</html>

@yield('content')


<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
    /* footer */
    body {
        font-family: "Roboto", Helvetica, Arial, sans-sarif;
        font-size: 14px;
        line-height: 1.42857143;
        color: #333333;
        background-color: #f0f0f0;
    }

    #footer {
        background: red;
        padding: 20px 0;
    }

    #footer ul {
        padding-left: 0;
        list-style: none;
    }

    #footer ul a {
        color: white;
        padding: 20px 0;

    }

    /* copyright*/

    #copyright {
        background: #333;
        color: #ccc;
        padding: 20px;
        font-size: 12px;
    }

    #copyright p {
        margin: 0;
    }
    </style>
</head>

<body>
    <footer>


        <div id="copyright">
            <!--copyright-->
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">
                        &copy; 2019 AgroFarm

                    </p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">
                        Template By: <a href="#">AgroFarm.com</a>

                    </p>

                </div>
            </div>

        </div>


    </footer>

    <!-- End your code here -->



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</body>

</html>
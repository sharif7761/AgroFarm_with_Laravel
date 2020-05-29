<!DOCTYPE html>
<html>

<head>
    <title>E Commerce Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">




    <style type="text/css">
    .scroll {

        width: 100%;
        height: 300px;
        overflow: scroll;
    }

    .table img {
        width: 45px;
        height: 45px;
        object-fit: contain;
    }




    /* popup style */
    .bg-modal {
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);

        position: absolute;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        display: none;
    }

    .modal-content {
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

    .close {
        position: absolute;
        top: 0;
        right: 14px;
        font-size: 42px;
        transform: rotate(45deg);
        cursor: pointer;
    }


    /* edit popup style */
    .bg-modal2 {
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);

        position: absolute;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        display: none;
    }

    .modal-content2 {
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

    .close2 {
        position: absolute;
        top: 0;
        right: 14px;
        font-size: 42px;
        transform: rotate(45deg);
        cursor: pointer;
    }



    .wrapper {
        width: 300px;
        margin: 0 auto;
        background-color: white;
        color: black;
    }
    </style>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body>



    <header>
        @extends('owner/owner_layout')
    </header>

    @section('owner_content')


    <!-- 3rd head ends-->

    </div>


    <div class="" id="">
        <div class="box" style="width: 100%;">

            <div class="container" style="width: 100%;background-color: white;">
                <div class="wrapper">

                    <legend>
                        <h2 style="text-align: center;">My Profile</h2>
                    </legend>


                    <div style="text-align: center;">
                        <h2 style="color:mediumseagreen; "><b>Welcome</b></h2>
                        <h3 style="color:slateblue; ">
                            <b> <img src={{asset('images/'.$user->pic)}}> </b>
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
                                    {{$user->Uid}}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b> User Name </b>
                                </td>

                                <td>
                                    {{$user->Uname}}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b> Phone: </b>
                                </td>

                                <td>
                                    {{$user->Phone}}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b> Email: </b>
                                </td>

                                <td>
                                    {{$user->Email}}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b> Address: </b>
                                </td>

                                <td>
                                    {{$user->Address}}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b> Position: </b>
                                </td>

                                <td>
                                    {{$user->Position}}
                                </td>
                            </tr>

                        </table>
                    </b>

                    <div align="center">


                        <a href="#" class="btn btn-primary" id="edit_pass" style="background-color: green;">Change
                            Password <i class="fa fa-pencil-square-o"></i></a>

                        <br> <br>

                    </div>


                </div>
            </div>

        </div>
    </div>


    <footer>
    </footer>

    <div class="bg-modal2">
        <div class="modal-content">
            <div class="close">
                +
            </div>


            <form action="" id="popup" method="POST">
                @csrf
                <input type="password" name="old_pass" id="old_pass" placeholder="Enter Old Password" required>
                <input type="password" name="new_pass" id="new_pass" placeholder="Enter New Password" required>
                <input type="password" name="con_pass" id="con_pass" placeholder="Confirm New Password" required>


                <button class="btn btn-default" type="submit" formaction="{{url('/owner_changepass')}}" type="submit"
                    name="change_pass" class="fa fa-send-o" style="background-color: red;color: white;">Submit</button>
            </form>

        </div>
    </div>







    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
    document.getElementById('edit_pass').addEventListener('click', function() {
        document.querySelector('.bg-modal2').style.display = 'flex';

    });
    document.querySelector('.close').addEventListener('click', function() {
        document.querySelector('.bg-modal2').style.display = 'none';

    });
    </script>



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <footer>
        @endsection
    </footer>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>
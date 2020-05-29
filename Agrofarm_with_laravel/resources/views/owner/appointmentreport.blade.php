<!DOCTYPE html>
<html>

<head>
    <title>Farm</title>
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

    .close2 {
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
        @extends('owner/owner_layout')
    </header>

    @section('owner_content')



    </div>


    <div class="col-md-12" id="cart">
        <div class="box">
            <form action="" method="post">
                @csrf
                <legend>
                    <h1>Appointment Report</h1>
                </legend>
                <div>

                    <span class="pull-right">
                        <input type="text" name="search" placeholder="Search by appointment Name" required>
                        <button class="btn btn-default" type="submit" formaction="{{url('/owner_searchappointment')}}"
                            name="submit" value="submit" style="background-color: blue;color: white;">
                            <i class="fa fa-search"> Search</i>
                        </button>


                    </span>

                </div>
            </form>

            <br>
            <br>
            <br>


            <div class="table-responsive">
                <div class="scroll">


                    <table class='table table-bordered table-hover'>
                        <tr style='background-color: #9099f3;'>
                            <td> ID</td>
                            <td>CUSTOMER NAME</td>
                            <td>DATE</td>
                            <td>STATUS</td>
                            <td>ACTION</td>

                        </tr>
                        @foreach ($all_appointment as $appointment)
                        <tr>
                            <td>{{$appointment->id }}</td>
                            <td>{{$appointment->name}}</td>
                            <td>{{$appointment->date}}</td>
                            <td>{{$appointment->status}}</td>

                            @if($appointment->status == 'Pending')
                            <td>
                                <button class="btn btn-default edition" type="button"
                                    style="background-color: green;color: white;">
                                    <i class="fa fa-pencil-square-o"> Approve</i>
                                </button>


                            </td>
                            @else

                            <td>
                                <button class="btn btn-default edition" type="button"
                                    style="background-color: Blue;color: white;">
                                    <i class="fa fa-pencil-square-o"> Modify</i>
                                </button>


                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>




            <div class="box-footer">

                <div class="pull-right">


                    <a href="#" id="add_item" style="background-color: white;"></a>

                </div>


            </div><br><br>







            <div class="bg-modal2">
                <div class="modal-content2">

                    <div class="close2">
                        +
                    </div>


                    <form id="popup" method="POST" enctype="multipart/form-data">
                        @csrf


                        <input type="text" style="width: 50%;" name="id" id="id" placeholder="Appointment id" readonly>
                        <input type="text" style="width: 50%;" name="name" id="name" placeholder="name" readonly>
                        <input type="date" style="width: 50%;" name="date" id="date" readonly>
                        <select name="status" style="width: 50%;" id="status" style="width: 50%;">
                            <option disabled hidden value="Pending">Pending</option>
                            <option value="Approved">Approved</option>
                            <option value="Not Approved">Not Approved</option>
                            <option value="Cancelled">Cancelled</option>
                        </select><br><br>




                        <button class="btn btn-default fa fa-pencil-square-o"
                            formaction="{{url('/owner_updateappointment')}}" type="submit" name="update_appointment"
                            style="background-color: green; color: white;">Update appointment</button>
                        <button class="btn btn-default fa fa-trash" formaction="{{url('/owner_deleteappointment')}}"
                            type="submit" name="delete_appointment" class="fa fa-trash"
                            style="background-color: red;color: white;">Delete appointment</button>
                    </form>


                </div>
            </div>





            <div class="bg-modal">
                <div class="modal-content">
                    <div class="close">
                        +
                    </div>


                    <form id="popup1" method="POST" enctype="multipart/form-data">

                        @csrf




                        <input type="text" style="width: 50%;" name="name" required id="name" placeholder="Name">
                        <input type="date" style="width: 50%;" value="<?php echo date("yy-m-d");?>" required name="date"
                            id="date" placeholder="Date(DD/MM/YYYY)">

                        <button class="btn btn-default fa fa-plus" formaction="{{url('/owner_addappointment')}}"
                            type="submit" name="add_appointment" style="background-color:slateblue; color: white;">Add
                            appointment</button>
                    </form>

                </div>
            </div>





            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>


            <script type="text/javascript">
            document.getElementById('add_item').addEventListener('click', function() {
                document.querySelector('.bg-modal').style.display = 'flex';

            });


            $(document).ready(function() {
                $('.edition').on('click', function() {


                    document.querySelector('.bg-modal2').style.display = 'flex';

                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);
                    $('#id').val(data[0]);
                    $('#name').val(data[1]);
                    $('#date').val(data[2]);
                    $('#status').val(data[3]);




                });

            });




            document.querySelector('.close').addEventListener('click', function() {
                document.querySelector('.bg-modal').style.display = 'none';

            });

            document.querySelector('.close2').addEventListener('click', function() {
                document.querySelector('.bg-modal2').style.display = 'none';

            });
            </script>
            <footer>
                @endsection
            </footer>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

            <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
            <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
            {!! Toastr::message() !!}

</body>

</html>
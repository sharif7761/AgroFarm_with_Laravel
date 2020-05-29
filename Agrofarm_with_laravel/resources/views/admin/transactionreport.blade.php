<!DOCTYPE html>
<html>

<head>
    <title>Transaction List</title>
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
        "

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
        top 0;
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
        top 0;
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
        @extends('admin/admin_layout')
    </header>

    @section('admin_content')



    </div>


    <div class="col-md-12" id="cart">
        <div class="box">

            <legend>
                <h1>Transaction Report</h1>
            </legend>
            <span class="pull-right">
                <button class="btn btn-default" formaction="#" style="background-color: blue;color: white;"
                    onclick="exportTableToCSV('transactiondata.csv')">TransactionDataDownload</button>
            </span>
            <div>
                <form action="" method="post">
                    @csrf
                    <span class="pull-right">

                        <input type="text" name="search" required placeholder="Search by Transaction Name">
                        <button class="btn btn-default" type="submit" formaction="{{url('/admin_searchtransaction')}}"
                            name="submit" value="submit" style="background-color: blue;color: white;">
                            <i class="fa fa-search"> Search</i>
                        </button>


                    </span>

            </div>
            </form>

            <br>
            <br>
            <br>

            @php $debit=0;
            $credit=0; @endphp

            <div class="table-responsive">
                <div class="scroll">

                    <table class='table table-bordered table-hover'>
                        <tr style='background-color: #9099f3;'>
                            <td>TRANSACTION ID</td>
                            <td>TRANSACTION NAME</td>
                            <td>TYPE</td>
                            <td>PRICE</td>
                            <td>DESCRIPTION</td>
                            <td>DATE</td>

                        </tr>

                        @foreach ($all_transaction as $transaction)
                        <tr>
                            <td>{{$transaction->TRid}}</td>
                            <td>{{$transaction->TRname}}</td>
                            <td>{{$transaction->TRType}}</td>
                            <td>{{$transaction->Price}}</td>
                            <td>{{$transaction->Description}}</td>
                            <td>{{$transaction->Date}}</td>

                        </tr>
                        @if($transaction->TRType=='debit')
                        @php $debit=$debit+$transaction->Price; @endphp
                        @endif
                        @if($transaction->TRType=='credit')
                        @php $credit=$credit+$transaction->Price; @endphp
                        @endif
                        @endforeach
                    </table>

                </div>
            </div>




            <div class="box-footer">
                <div>
                    <h3 style="color: red;">Total Debit: <span style="color: black;"> {{$debit}} tk.</span> </h3>
                    <h3 style="color: green;">Total Credit: <span style="color: black;"> {{$credit}} tk.</span> </h3>
                </div>

                <div class="pull-right">


                    <a href="#" class="btn btn-primary" id="add_item" style="background-color: red;">Add Item <i
                            class="fa fa-plus"></i></a>

                </div>


            </div><br><br>







            <div class="bg-modal2">
                <div class="modal-content2">

                    <div class="close2">
                        +
                    </div>


                    <form id="popup" method="POST" enctype="multipart/form-data">
                        @csrf


                        <input type="text" style="width: 50%;" name="TRid" id="TRid" placeholder="TRid" readonly>
                        <input type="text" style="width: 50%;" name="TRname" id="TRname" placeholder="TRname">
                        <select name="TRType" style="width: 50%;" id="TRType" style="width: 50%;">
                            <option disabled hidden>Select Type</option>
                            <option value="debit">Debit</option>
                            <option value="credit">Credit</option>
                        </select>
                        <input type="text" style="width: 50%;" name="Price" id="Price" placeholder="Price">
                        <input type="text" style="width: 50%;" name="Description" id="Description"
                            placeholder="Description">
                        <input type="date" style="width: 50%;" name="Date" id="Date" placeholder="Date">



                        <button class="btn btn-default fa fa-pencil-square-o"
                            formaction="{{url('/admin_updatetransaction')}}" type="submit" name="update_transaction"
                            style="background-color: green; color: white;">Update transaction</button>
                        <button class="btn btn-default fa fa-trash" formaction="{{url('/admin_deletetransaction')}}"
                            type="submit" name="delete_transaction" class="fa fa-trash"
                            style="background-color: red;color: white;">Delete transaction</button>
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

                        <input type="text" style="width: 50%;" name="TRname" id="TRname" placeholder="Transaction name"
                            required>
                        <select name="TRType" style="width: 50%;" required id="TRType" style="width: 50%;">
                            <option selected disabled hidden>Select Type</option>
                            <option value="debit">Debit</option>
                            <option value="credit">Credit</option>
                        </select>
                        <input type="text" style="width: 50%;" required name="Price" id="Price" placeholder="Price">
                        <input type="text" style="width: 50%;" name="Description" id="Description" required
                            placeholder="Description">
                        <input type="Date" style="width: 50%;" value="<?php echo date("yy-m-d");?>" required name="Date"
                            id="Date" placeholder="Date">


                        <button class="btn btn-default fa fa-plus" formaction="{{url('/admin_addtransaction')}}"
                            type="submit" name="add_transaction" style="background-color:slateblue; color: white;">Add
                            transaction</button>
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
                    $('#TRid').val(data[0]);
                    $('#TRname').val(data[1]);
                    $('#TRType').val(data[2]);
                    $('#Price').val(data[3]);
                    $('#Description').val(data[4]);
                    $('#Date').val(data[5]);



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


            <script type="text/javascript">
            function downloadCSV(csv, filename) {
                var csvFile;
                var downloadLink;

                // CSV file
                csvFile = new Blob([csv], {
                    type: "text/csv"
                });

                // Download link
                downloadLink = document.createElement("a");

                // File name
                downloadLink.download = filename;

                // Create a link to the file
                downloadLink.href = window.URL.createObjectURL(csvFile);

                // Hide download link
                downloadLink.style.display = "none";

                // Add the link to DOM
                document.body.appendChild(downloadLink);

                // Click download link
                downloadLink.click();
            }

            function exportTableToCSV(filename) {
                var csv = [];
                var rows = document.querySelectorAll("table tr");

                for (var i = 0; i < rows.length; i++) {
                    var row = [],
                        cols = rows[i].querySelectorAll("td, th");

                    for (var j = 0; j <= 5; j++)
                        row.push(cols[j].innerText);

                    csv.push(row.join(","));
                }

                // Download CSV file
                downloadCSV(csv.join("\n"), filename);
            }
            </script>
</body>

</html>
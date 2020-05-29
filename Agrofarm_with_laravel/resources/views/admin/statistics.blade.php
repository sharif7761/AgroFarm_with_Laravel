<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Transaction Graph</title>




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<link rel="stylesheet" href="style.css">


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style type="text/css">
.options {
    padding: 20px;
    background-color: rgba(191, 191, 191, 0.15);
    margin-top: 20px;
}

.option {
    margin-top: 10px;
}

.caption {
    font-size: 18px;
    font-weight: 500;
}

.option>span {
    margin-right: 10px;
}

.option>.dx-widget {
    display: inline-block;
    vertical-align: middle;
}





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
        @extends('admin/admin_layout')
    </header>

    @section('admin_content')
    <br />
    <title>Transaction Graph</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cldrjs/0.4.4/cldr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cldrjs/0.4.4/cldr/event.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cldrjs/0.4.4/cldr/supplemental.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cldrjs/0.4.4/cldr/unresolved.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/1.1.1/globalize.min.js">
    </script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/globalize/1.1.1/globalize/message.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/1.1.1/globalize/number.min.js">
    </script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/globalize/1.1.1/globalize/currency.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/1.1.1/globalize/date.min.js">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/19.2.6/css/dx.common.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/19.2.6/css/dx.light.css" />
    <script src="https://cdn3.devexpress.com/jslib/19.2.6/js/dx.all.js"></script>
    <script src="data.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <script src="index.js"></script>
    </head>

    <body class="dx-viewport">
        <div class="demo-container">
            <div id="chart-demo">
                <div id="chart"></div>





            </div>
        </div>
        </div><br><br><br>

        <script type="text/javascript">
        $(function() {
            var chart = $("#chart").dxChart({
                palette: "blue",
                dataSource: dataSource,
                commonSeriesSettings: {
                    type: types[0],
                    argumentField: "year"
                },
                commonAxisSettings: {
                    grid: {
                        visible: true
                    }
                },
                margin: {
                    bottom: 20
                },
                series: [{
                        valueField: "mmp",
                        name: "Debit"
                    },
                    {
                        valueField: "smp",
                        name: "Credit"
                    }

                ],
                tooltip: {
                    enabled: true
                },
                legend: {
                    verticalAlignment: "top",
                    horizontalAlignment: "right"
                },
                "export": {
                    enabled: true
                },
                argumentAxis: {
                    label: {
                        format: {
                            type: "decimal"
                        }
                    },
                    allowDecimals: false,
                    axisDivisionFactor: 60
                },
                title: "Transaction Graph"
            }).dxChart("instance");

            $("#types").dxSelectBox({
                dataSource: types,
                value: types[0],
                onValueChanged: function(e) {
                    chart.option("commonSeriesSettings.type", e.value);
                }
            });
        });


        var dataSource = [{
            year: 2020,
            smp: 2630,
            mmp: 2260,

        }, {
            year: 2019,
            smp: 1690,
            mmp: 2560,

        }, {
            year: 2018,
            smp: 2000,
            mmp: 2570,

        }, {
            year: 2017,
            smp: 1700,
            mmp: 1630,

        }, {
            year: 2016,
            smp: 1200,
            mmp: 1003,

        }, {
            year: 2015,
            smp: 1500,
            mmp: 910,

        }];



        var types = ["bar"];
        </script>

    </body>




    <footer>
        @endsection
    </footer>
</body>

</html>
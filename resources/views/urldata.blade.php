@extends('layouts.app')

@section('content')





    <div class="" style="padding-left:0px;">

        @isset($totalclick)
            <p style="color:red;font-size:25px;padding-left:200px;">Status of http://localhost:8000/{{$urlkey}}</p>
        <div style="float:left;width: 500px;" >
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total click</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{$totalclick}}</h1>
                    </div>

                </div>
            </div>
        </div>
            <div>
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Last 24 hours click</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{$dailyclick}}</h1>
                        </div>

                    </div>
                </div>
            </div>

            <div>
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Failed hit</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{$failclick}}</h1>
                        </div>

                    </div>
                </div>
            </div>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['device', 'Device type'],
                        ['Computer',  {{$pc}}    ],
                        ['Mobile',   {{$mobile}}   ]


                    ]);

                    var options = {
                        title: 'Device type'
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                }
            </script>

            <div >
                <div id="piechartos" style="margin-left:200px;width: 550px; height: 400px;"></div>
            </div>

            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['os', 'osdata'],
                        ['Windows',  {{$osclick[1]}}    ],
                        ['Mac',   {{$osclick[2]}}   ],
                            ['Linux',   {{$osclick[3]}}   ],
                            ['Ios',   {{$osclick[4]}}   ],
                            ['Android',   {{$osclick[5]}}   ]


                    ]);

                    var options = {
                        title: 'Operating System Click'
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechartos'));

                    chart.draw(data, options);
                }
            </script>





            <div >
                <div class="card">
                    <h5 class="card-header">Country click</h5>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Country</th>
                                <th scope="col">Click</th>


                            </tr>
                            </thead>
                            <tbody>
                            <p hidden> {{$k=0}} </p>

                            @foreach($countrylist as $key => $value)

                                <tr >


                                    <td>{{$value->country}}</td>
                                    <td>{{ $countryclick[++$k]}}</td>



                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div style="float:left;padding-top: 30px;">
                <div id="piechart" style="width: 600px; height: 450px;"></div>
            </div>




            <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['browser', 'browser click'],
                        ['Chrome',     {{$browserclick[1]}}],
                        ['Mozilla Firefox',      {{$browserclick[2]}}],
                        ['Handheld Browser',   {{$browserclick[3]}}]

                    ]);

                    var options = {
                        title: 'Browser click',
                        pieHole: 0.4,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                    chart.draw(data, options);
                }
            </script>
            <div style="padding-left:450px;" >
            <div id="donutchart" style="width: 600px; height: 500px;"></div>
            </div>






            <div style="padding-top: 0px;">
                <div class="card">
                    <h5 class="card-header">Referral click</h5>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Site</th>
                                <th scope="col">Click</th>


                            </tr>
                            </thead>
                            <tbody>
                            <p hidden> {{$k=0}} </p>

                            @foreach($referlist as $key => $value)

                                <tr >


                                    <td>{{$value->referer}}</td>
                                    <td>{{ $referclick[++$k]}}</td>



                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>






















        @endisset

            @isset($data)

        <div class="col-12" style="padding-left: 200px;">
            <div class="card">
                <h5 class="card-header">All short url data</h5>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Shorturl</th>
                            <th scope="col">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <p hidden> {{$i=0}} </p>
                        @foreach($data as $key => $value)
                            <p hidden> {{$i++}} </p>
                            <tr >
                                <td>{{$i}}</td>

                                <td>http://localhost:8000/{{$value->urlkey}}</td>

                                <td>

                                    <form method="post" action="{{route('data.url')}}">
                                        @csrf
                                        <div class="input-group mb-3">

                                            <input type="hidden" name="urlid" value={{$value->id}} class="form-control">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">Get Details</button>


                                            </div>
                                        </div>


                                    </form>

                                </td>


                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            @endisset

    </div>




@endsection

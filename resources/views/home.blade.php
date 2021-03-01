@extends('layouts.app')

@section('content')



        <!-- ============================================================== -->
        <!-- sales  -->



        <!-- ============================================================== -->
        <div style="">
            <div style="float:left;padding-bottom: 20px;" class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Short Url</h5>
                    <div class="metric-value d-inline-block">
                        <h1 style="padding-left:20px;"  class="mb-1">{{$count ?? ''}}</h1>
                    </div>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end sales  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- new customer  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- end new customer  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- visitor  -->
        <!-- ============================================================== -->

            <div style="padding: 10px;float:left" class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total click</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{$totalclick ?? ''}}</h1>
                    </div>

                </div>
            </div>

        <!-- ============================================================== -->
        <!-- end visitor  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- total orders  -->

            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 style="color:red;" class="">Popular short Url</h5>
                    <div class="metric-value d-inline-block">
                        <br/>
                        @if(@isset($popurl))
                        <h5 style="color:blue;" class="mb-1">http://localhost:8000/{{$popurl  }}</h5> <br/>
                        <p>Click:{{$maxurlclick }}</p>

                        @else
                            <h5 style="color:blue;" class="mb-1">No</h5> <br/>
                            <p>Click:0</p>
                            @endif
                    </div>

                </div>
            </div>



        <!-- ============================================================== -->








        <!-- ============================================================== -->





            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 style="color:cadetblue" class="">Total Click history</h5>
                    <div class="metric-value d-inline-block">


                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                        <div style="width: 900px; height: 350px" id="chart_div"></div>

                    </div>

                </div>
            </div>
        </div>



        <script>
            google.charts.load('current', {packages: ['corechart', 'line']});
            google.charts.setOnLoadCallback(drawBasic);

            function drawBasic() {

                var data = new google.visualization.DataTable();
                data.addColumn('number', 'X');
                data.addColumn('number', 'Click');

                data.addRows([
                    {{$hourdata}}
                ]);

                var options = {
                    hAxis: {
                        title: 'Daily Hour'
                    },
                    vAxis: {
                        title: 'Popularity'
                    }
                };

                var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

                chart.draw(data, options);
            }

        </script>

        <!-- end total orders  -->
        <!-- ============================================================== -->

    </div>


@endsection

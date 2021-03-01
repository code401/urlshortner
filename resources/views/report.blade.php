@extends('layouts.app')

@section('content')



    @isset($data)








                <h5  style="margin-left:350px;color:green;" class="">Report (From:{{$start}} to : {{$end}})</h5>

                    <table  style="margin-left:50px;" class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="">No.</th>
                            <th scope="">short url</th>
                            <th scope="">Country</th>
                            <th scope="">Device</th>
                            <th scope="">Browser</th>
                            <th scope="">Operating system</th>
                            <th scope="">Click date</th>
                            <th scope="">Click time</th>



                        </tr>
                        </thead>
                        <tbody>
                        <p hidden> {{$i=0}} </p>
                        @foreach($data as $key => $value)
                            <p hidden> {{$i++}} </p>
                            <tr >
                                <td>{{$i}}</td>
                                <td style="">http://localhost:8000/{{$value->urlkey}}</td>
                                <td style="">{{$value->country}}</td>
                                <td style="">{{$value->device}}</td>
                                <td style=" ">{{$value->browser}}</td>
                                <td style=" ">{{$value->os}}</td>
                                <td style=" ">{{$value->clickdate}}</td>
                                <td style=" ">{{$value->clicktime}}</td>



                            </tr>

                        @endforeach
                        </tbody>
                    </table>















    @endisset


























    @if(empty($data))

    <div style="padding-left: 50px;" >
        <div style="width:400px;">
            <div class="card">
                <h5 class="card-header">Short url report</h5>
                <div class="card-body">
                    <form method="post" action="{{route('data.report')}}">
                        @csrf
                        <div class="">
                           <p>Start date:</p>
                            <input type="date" name="start" max=<?php  echo date('Y-m-d'); ?> class="form-control"><br/>
                            <p>End date:</p>
                            <input type="date" name="end" max=<?php  echo date('Y-m-d'); ?> class="form-control"><br/>




                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">get report</button>
                            </div>

                        </div>



                    </form>
                    @isset($message)
                        <p style="padding-top:0px;padding-left:300px;color: red">{{$message}} </p>
                    @endisset
                </div>
            </div>

        </div>
    </div>

    @endif


@endsection

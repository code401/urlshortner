@extends('layouts.app')

@section('content')


    <div style="padding-left:50px;width:1000px;">

        <div>
            <div class="card">
                <h5 class="card-header">All ruled short url</h5>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Shorturl</th>
                            <th scope="col">Action</th>
                            <th scope="col">Rules status</th>

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

                                    <form method="post" action="{{route('set.rule')}}">
                                        @csrf
                                        <div class="input-group mb-3">

                                            <input type="hidden" name="urlkey" value={{$value->urlkey}} class="form-control">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">Set rule</button>


                                            </div>
                                        </div>


                                    </form>

                                </td>
                                <td>
                                 <p style="color:gray;font-size: 12px">Iplimit:  {{$value->iplimit}} </p>
                                    <p style="color:gray;font-size: 12px">Password:  {{$value->password}} </p>
                                    <p style="color:gray;font-size: 12px">Clicklimit:  {{$value->clicklimit}} </p>
                                    <p style="color:gray;font-size: 12px">Device:  {{$value->devicetype}} </p>
                                    <p style="color:gray;font-size: 12px">Country:  {{$value->country}} </p>
                                    <p style="color:gray;font-size: 12px">Refer:  {{$value->refer}} </p>


                                    <p style="color:gray;font-size: 12px">Expire date:

                                        @if($value->lasttime==0)

                                            @else
                                        {{date('d-m-Y', $value->lasttime)}} </p>
                                    @endif
                                </td>



                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>

    </div>

    </div>


@endsection

@extends('layouts.app')

@section('content')


    <div class="" style="width:800px;padding-left:200px;">

        <div class="col-18">
            <div class="card">
                <h5 class="card-header">Get QRCode and use these</h5>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Shorturl</th>


                        </tr>
                        </thead>
                        <tbody>
                        <p hidden> {{$i=0}} </p>
                        @foreach($data as $key => $value)
                            <p hidden> {{$i++}} </p>
                            <tr >
                                <td>{{$i}}</td>

                         <td>       <p>http://localhost:8000/{{$value->urlkey}}</p>

                                <form method="post" action="{{route('download.qrcode')}}">
                                    @csrf
                                    <div class="input-group mb-3">

                                        <input type="hidden" name="url" value={{$value->urlkey}} class="form-control">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Get QRCode</button>


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

    </div>

    </div>


@endsection

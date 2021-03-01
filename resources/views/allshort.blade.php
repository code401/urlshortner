@extends('layouts.app')

@section('content')


    <div class="" style="padding-left:50px;">

        <div class="">
            <div class="card">
                <h5 class="card-header">All short url</h5>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Shorturl</th>
                            <th scope="col">Original url</th>
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
                                <td style="overflow:scroll;width:50px; ">{{$value->originalurl}}</td>

                                <td>
                                    <form method="post" action="{{route('delete.url')}}">
                                        @csrf
                                        <div class="input-group mb-3">

                                            <input type="hidden" name="urlkey" value={{$value->urlkey}} class="form-control">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-danger">Delete</button>


                                            </div>
                                        </div>


                                    </form>
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

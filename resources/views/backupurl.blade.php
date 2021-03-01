@extends('layouts.app')

@section('content')


    <div class="" style="padding-left:50px;">

        <div class="">
            <div >
                <h5 class="">All short url</h5>
                <div class="">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="">No.</th>
                            <th scope="">Shorturl</th>

                            <th scope="">Backup url</th>
                            <th scope="">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <p hidden> {{$i=0}} </p>
                        @foreach($data as $key => $value)
                            <p hidden> {{$i++}} </p>
                            <tr>
                                <td   >{{$i}}</td>

                                <td>http://localhost:8000/{{$value->urlkey}}</td>
                                <td style="max-width: 400px;
                                     white-space: nowrap;
                                     overflow: scroll;">{{$value->backupurl}}</td>


                                <td  >

                                    <form method="post" action="{{route('setpage.backupurl')}}">
                                        @csrf
                                        <div class="input-group mb-3">

                                            <input type="hidden" name="urlkey" value={{$value->urlkey}} class="form-control">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">Set</button>


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

@extends('layouts.app')

@section('content')

    <div style="padding-left: 50px;" >
        <div class="col-xl-12">
            <div class="card">
                <h5 class="card-header">Set backup url</h5>
                <div class="card-body">
                    <form method="post" action="{{route('change.backup')}}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="hidden" name="urlkey" value="{{$urlkey}}" placeholder="short url" class="form-control">
                            <input style="margin-left: 20px;"  placeholder="backup url" type="text" name="backupurl" class="form-control">




                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">set backup url</button>
                            </div>

                        </div>



                    </form>

                </div>
            </div>

        </div>
    </div>




@endsection

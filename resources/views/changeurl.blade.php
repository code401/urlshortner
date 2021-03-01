@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
        }

    </script>
    <div style="padding-left: 50px;" >
        <div class="col-xl-12">
            <div class="card">
                <h5 class="card-header">Change original url</h5>
                <div class="card-body">
                    <form method="post" action="{{route('change.url')}}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="url" placeholder="short url" class="form-control">
                            <input style="margin-left: 20px;"  placeholder="new original url" type="text" name="fullurl" class="form-control">




                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Change</button>
                            </div>

                        </div>



                    </form>
                    @isset($message)
                        <p style="padding-top:0px;padding-left:300px;color: red">{{$message}} </p>
                    @endisset
                </div>
            </div>
            @isset($newurl)
                <p>Your newly custom short url:</p>
                <p style="color:maroon;font-size:25px;" id="shorturl">{{ $newurl }}</p>

                <button type="button" class="btn btn-primary btn-sm" onclick="copyToClipboard('#shorturl')">click to copy</button>
            @endisset
        </div>
    </div>




@endsection

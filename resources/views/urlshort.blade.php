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


            <div style="padding-left:100px;background-color:white" >
        <h5 class="card-header">Create short url</h5>

            <form method="post" action="{{route('userurl.short')}}">
                @csrf
                <div class="input-group mb-3">
                    <input size="40" type="text" name="url" placeholder="long url" class="form-control">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>

            </form>









            @isset($shorturl)
                <p style="font-size:16px;padding-bottom: 0px;">Created short url:</p>
                <p style="color:maroon;font-size:25px;padding-top: 0px;" id="shorturl">{{ $shorturl }} </p>
                <button type="button" class="btn btn-primary btn-sm" onclick="copyToClipboard('#shorturl')">click to copy</button>
            @endisset
        </div>





@endsection

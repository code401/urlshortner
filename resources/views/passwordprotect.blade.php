
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Url password protected</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script        type="text/javascript"        src="//code.jquery.com/jquery-2.0.2.js"></script>
    <script type="text/javascript" src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" type="text/css" href="/css/result-light.css">


    <style id="compiled-css" type="text/css">

        /* EOS */
    </style>

    <script id="insert"></script>


</head>
<body>
<div id="dialog" title="Password protected">
    @isset($message)

       <p style="color: red"> {{$message}} </p>
    @endisset

    <form method="post" action="{{route('check.password')}}">
        @csrf
    <input type="password" name="password"  />
        <input type="hidden" name="urlkey" value="{{$urlkey }}" />
        <button type="submit">submit</button>
</div>


<script type="text/javascript">//<![CDATA[


    $("#dialog").dialog();



    //]]></script>

<script>
    // tell the embed parent frame the height of the content
    if (window.parent && window.parent.parent){
        window.parent.parent.postMessage(["resultsFrame", {
            height: document.body.getBoundingClientRect().height,
            slug: "L47cwvne"
        }], "*")
    }

    // always overwrite window.name, in case users try to set it manually
    window.name = "result"
</script>


</body>
</html>

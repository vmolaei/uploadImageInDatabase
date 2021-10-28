
<html lang="en">
<head>

    <title>upload image</title>
    <meta charset="utf-8">
<!--<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery')}}"></script>-->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        #img{
            width: 300px;
            height:300px;

        }
    </style>
</head>
<body>
<div class="container">
    <h3>Create Form</h3>
    <p class="ajax-res"></p>
    @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
    @endif



    @if(Session::has('msg'))
        <p class="text-danger">{{session('msg')}}</p>
    @endif
    <form method="post" action="{{url('image/upload')}}" enctype="multipart/form-data" >
        @csrf
        <table class="table table-bordered">
            <th>Alt Text</th>
            <td><input type="text" name="img_alt" class="form-control"/> </td>
            <tr>
                <th>Image</th>
                <td><input type="file" name="img_src" class="form-control"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" class="btn btn-success save-data" value="upload"></td>
            </tr>
        </table>

    </form>
    <hr>

    <h3 class="my-3">Uploded images</h3>
    @foreach ($imgs as $img)
        <p class="my-4">
            <img id="img" src="{{asset('imgs/'.$img->img_src)}}" alt="{{$img->img_alt}}"/>
        </p>
    @endforeach

</div>
</body>
</html>

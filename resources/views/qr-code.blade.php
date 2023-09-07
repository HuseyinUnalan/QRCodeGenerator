<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>QR Code Generate</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>

<div class="container mt-5">

    <div class="text-center">
        @if(isset($qrCode))
            {{$qrCode}}
        @else
            {!! QrCode::size(300)->generate('https://www.linkedin.com/in/huseyin-unalan/'); !!}
        @endif
        <div class="mt-5">
            <form action="{{route('store.qr')}}" method="POST">
                @csrf
                <input type="text" class="form-control" name="data">
                <button type="submit" class="btn btn-success mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

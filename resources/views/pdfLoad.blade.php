<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PDF </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Your Data</h2>

        <div class="container text-center">
            <div class="row align-items-start">
              <div class="col">
                <img src="data:image/jpeg;base64,{{ base64_encode($image->encode('jpg')) }}"  height="80" >
                <br>
                <p>Name : {{ $data->name }}</p>
                <p>Email : {{ $data->email }}</p>
                <p>Mobile :  {{ $data->mobile }}</p>
                <p> Status :
                @if ($data->status == 1)
                On
                @else
                Off
                @endif
                </p>

                <br>
              </div>
              <div class="col">
                <p>Address : {{ $data->address }}</p>
                <p>
                    Skill :
                  @foreach($data->skill as $value)
                  <span >{{$value}},</span>
                  @endforeach
              </p>
                <p>Password : {{ $data->password }}</p>
                <p>Registration Date : {{ $data->regi_time }}</p>
              </div>
            </div>
          </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

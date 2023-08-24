@extends('layout.admin')

@section('title','Professional')

@section('content')
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Professional</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Professional</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

                @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
                @endif

              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{url('/professional-add')}}" class="btn btn-primary mb-2">Add Professional</a>

                    <a class="btn btn-warning  mb-2"  href="{{ route('export') }}">
                              Export  Data
                      </a>

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Address</th>
                    <th>Skill</th>
                    <th>Password</th>
                    <th>Registration Time</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 0)
                    @foreach ($professional as $prof)
                    <tr>
                      <td scope="row">{{ ++$i }}</td>
                      <td>
                        @if(!$prof->image)
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg" height="50">
                        @else
                        <img src="{{Storage::url("imageShow/{$prof->image}")}}" height="80">
                        @endif
                     </td>
                      <td>{{ $prof->name }}</td>
                      <td>{{ $prof->email }}</td>
                      <td>{{ $prof->mobile }}</td>
                      <td>

                        <form method="POST" action="{{ route('change.status', $prof->id) }}">
                            @csrf
                            @method('PUT')

                            @if ($prof->status == 1)
                            <button type="submit" class="btn btn-success">On</button>
                            @else
                            <button type="submit" class="btn btn-danger">Off</button>
                            @endif


                        </form>

                    </td>
                      <td>{{ $prof->address }}</td>
                      <td>
                        @foreach($prof->skill as $value)
                        <span >{{$value}},</span>
                        @endforeach
                    </td>
                      <td>{{ $prof->password }}</td>
                      <td>{{ $prof->regi_time }}</td>
                      <td>
                        <a href="{{url($prof->id.'/delete')}}" onclick="return confirm('Are you sure,you want to delete - {{ $prof->name }} ?')" class="btn-sm btn btn-danger">Delete</a>

                        <a href="{{url($prof->id.'/pdf')}}"  class="btn-sm btn btn-info">Download</a>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>Address</th>
                        <th>Skill</th>
                        <th>Password</th>
                        <th>Registration Time</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>

@endsection


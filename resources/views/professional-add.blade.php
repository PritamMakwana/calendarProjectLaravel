@extends('layout.admin')

@section('title','Professional Add')

@section('content')
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Professional Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/professional">Professional</a></li>
                    <li class="breadcrumb-item active">Professional Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{url('professional-add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name" name="name"  value="{{old('name')}}">
                                <span class="text-danger">
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Enter email" name="email"  value="{{old('email')}}">
                                <span class="text-danger">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label>mobile</label>
                                <input type="text" class="form-control" placeholder="Enter mobile" name="mobile"  value="{{old('mobile')}}">
                                <span class="text-danger">
                                    @error('mobile')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" placeholder="Enter password" name="password"  value="{{old('password')}}">
                                <span class="text-danger">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" placeholder="Enter Address" name="address" >{{old('address')}}</textarea>
                                <span class="text-danger">
                                    @error('address')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label>Skill</label>
                                <select class="select2bs4"
                                name="skill[]"
                                 data-placeholder="Select a Skill" style="width: 100%;" multiple="">
                                  <option value="HTML">HTML</option>
                                  <option value="CSS">CSS</option>
                                  <option value="Laravel">Laravel</option>
                                  <option value="PHP">PHP</option>
                                  <option value="MYSQL">MYSQL</option>
                                  <option value="Javascript">Javascript</option>
                                  <option value="Liveware">Liveware</option>
                                </select>
                                <span class="text-danger">
                                    @error('skill')
                                    {{$message}}
                                    @enderror
                                </span>
                              </div>



                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile"
                                        value="{{old('image')}}"
                                        name="image" >
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                <span class="text-danger">@error('image')
                                    {{$message}}
                                   @enderror
                                   </span>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

            </div>
        </div>
    </div>
</section>

@endsection

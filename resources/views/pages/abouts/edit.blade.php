@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Deshboard</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <form action="{{route('admin.abouts.update', $about->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row">
                <div class="form-group col-md-3 mt-3">
                    <h3> image</h3>
                    <img style="height: 25vh" src="{{url($about->image)}}" alt="img-thumbnail">
                         <input class="mt-2" type="file" name="image">
                </div>

                <div class="form-group col-md-4 mt-3">
                    <div class="mb-3">
                        <label for="title1"><h4>Title 1</h4></label>
                    <input type="text" class="form-control" id="title1" name="title1" value="{{$about->title1}}" >
                    </div>
                    <div class="mb-5">
                        <label for="title2"><h4>Title 2</h4></label>
                        <input type="text" class="form-control" id="title2" name="title2" value="{{$about->title2}}">
                    </div>
                </div>
                    <div class="form-group col-md-3 mt-3">
                            <h3>Description</h3>
                            <textarea class="form-control" name="description" rows="5">{{$about->description}}</textarea>
                    </div>

                </div>
            <input type="submit" name="submit" class="btn btn-primary mt-5">
    </div>
    </form>
</main>

@endsection

@extends('layouts.master')

@section('title')
Update Category
@endsection

@section('banner')
<section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Update Category</h1>
                        </div>
                    </div>
                </div>
            </section>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-push-md-3">
       <h1>Update Category</h1>
    <form method="post" action="{{url('categories/edit/'.$category->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="col-md-2">
                <label for="name">Name</label>
            </div>
            <div class="col-md-10">
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$category->name}}" required="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2">
                <label for="picture">Picture</label>
                @if($category->picture)
                 <img src="{{url($category->picture)}}" height="50px">
                @endif
            </div>
            <div class="col-md-10">
                 <input type="file" name="picture" class="form-control"> 
            </div>
        </div>
         <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Category</button>

        </div>
    </form>
</div>
@endsection
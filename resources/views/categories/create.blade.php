@extends('layouts.master')

@section('title')
@endsection  

@section('banner')
<section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Create new category</h1>
                        </div>
                    </div>
                </div>
            </section>
@endsection 

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-push-md-3">
       <h1>New Category</h1>
       @include('partials.validation_errors')
       @include('flash::message')
    <form method="post" action="{{url('categories/create')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="col-md-2">
                <label for="name">Name</label>
            </div>
            <div class="col-md-10">
                <input type="text" name="name" class="form-control" placeholder="Name" required="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2">
                <label for="picture">Picture</label>
            </div>
            <div class="form-group">
            <div class="col-md-10">
                 <input type="file" name="picture" class="form-control"> 
            </div>
        </div>
         <div class="form-group">
            <button type="submit" class="btn btn-primary">Save Category</button>

        </div>
    </form>
</div>


@endsection
@extends('layouts.master')

@section('title')
Delete Category
@endsection

@section('banner')
<section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Delete Category</h1>
                        </div>
                    </div>
                </div>
            </section>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-push-md-3">
       <h1>Delete Category</h1>
    <form method="post" action="{{url('categories/delete/'.$category->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="col-md-2">
                <label for="name">Name</label>
            </div>
            <div class="col-md-10">
                <div class="form-group">{{$category->name}}</div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-2">
                <label for="picture">Picture</label>
            </div>
            
            <div class="col-md-10">
                @if($category->picture)
                 <img src="{{url($category->picture)}}" height="50px">
                 @endif
            </div>
        </div>
        
         <div class="form-group">
            <button type="submit" class="btn btn-primary">Delete Category</button>
            <a href="{{url('category/'.$category->url)}}" class="btn btn-link">Cancel</a>

        </div>
    </form>
</div>
</div>
</div>
@endsection
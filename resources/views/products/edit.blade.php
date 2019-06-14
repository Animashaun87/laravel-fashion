@extends('layouts.master')

@section('title')
Update Product
@endsection
@section('pagecss')
<link rel="stylesheet" type="text/css" href="{{url('trumbowyg/ui/trumbowyg.css')}}">
@stop

@section('banner')
<section class="banner-area organic-breadcrumb">
<div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
        <div class="col-first">
          <h1>
              Update Product  
         </h1>
        </div>
    </div>
</div>
</section>
@endsection

@section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-6 col-md-3">
             <h1>Update Product</h1>
             <form method="post" action="{{url('products/edit/'.$product->id)}}" enctype="multipart/form-data">
             	@csrf
             	<div class="form-group">
             		<div class="col-md-2">
             			<label for="name">Name*</label>
             		</div>
             		<div class="col-md-10">
             			<input type="text" name="name" class="form-control" placeholder="Name" required="" value="{{$product->name}}">
             		</div>
             	</div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="price">Price*</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="price" class="form-control" placeholder="10000" required="" value="{{$product->price/100}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="old_price">Old Price</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="old_price" class="form-control" placeholder="10000" value="{{$product->old_price/100}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="category">Category*</label>
                    </div>
                    <div class="col-md-10">
                        <select name="category" class="form-control" required="">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($category->id == $product->category_id) selected="" @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="description">Description*</label>
                    </div>
                    <div class="col-md-10">
                        <textarea name="description" class="form-control" id="description" placeholder="" required="" >{!! $product->description !!}</textarea>
                    </div>
                </div>
             	<div class="form-group">
             		<div class="col-md-2">
             			<label for="picture">Picture*</label>
             			@if($product->picture)
             		</div>
             		<img src="{{url($product->picture)}}" width="70px">
             		@endif
             		<div class="col-md-10">
             			<input type="file" name="picture" class="form-control" required="">
             		</div>
             	</div>
                <div class="text-danger">
                    <strong>*</strong> = Required fields
                </div>
             	<div class="form-group">
             		<button type="submit" class="btn btn-primary">
             			Update Product
             		</button>
             	</div>
             </form>
         </div>
     </div>
 </div>
@endsection

@section('scripts')
<script src="{{url('trumbowyg/trumbowyg.js')}}"></script>
<script>
    $('#description').trumbowyg();
</script>
@stop
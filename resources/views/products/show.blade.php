@extends('layouts.master')

@section('title')
Product Name
@endsection

@section('banner')
<section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                           <h1>{{$product->name}}</h1> 

                           @auth
                           @if(auth()->user()->isAdmin())
                           <a href="{{url('products/edit/'.$product->id)}}" class="btn btn-info btn-sm">Edit</a>
                           <a href="{{url('products/delete/'.$product->id)}}" class="btn btn-danger btn-sm">Delete</a>
                           @endif
                           @endauth
                         </div>
                    </div>
                </div>
            </section> 
@endsection

@section('content')
<div class="container">
  <div class="product-quick-review">
    <div class="row align-items-center">
      <div class="col-lg-6" @if($product->picture) style="background-image: url({{url($product->picture)}}); background-size: cover; height: 470px; width: 20%;" @endif>
        
      </div>
       <div class="col-lg-6">
                <div class="quick-view-content">
                    <div class="top">
                        <h3 class="head">{{$product->name}}</h3>
                        <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">&#8358; {{number_format($product->price / 100)}}</span></div>
                        <div class="category">Category: <span>@if($product->category){{$product->category->name}}@endif</span></div>
                        <div class="available">Availibility: <span>In Stock</span></div>
                    </div>
                    <div class="middle">
                        <p class="content">{!! $product->description !!}</p>
                    </div>
                    <div >
                        <div class="quantity-container d-flex align-items-center mt-15">
                            Quantity:
                            <input type="text" class="quantity-amount ml-15" value="1" id="qty" />
                            <div class="arrow-btn d-inline-flex flex-column">
                                <button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
                                <button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
                            </div>

                        </div>
                        <div class="d-flex mt-20">
                            <a href="javascript:addcart_with_qty({{$product->id}})" onclick="" class="view-btn color-2"><span>Add to Cart</span></a>
                            <div id="cart_feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
      
    </div>
  </div>
</div>
<div class="container">
    <div class="details-tab-navigation d-flex justify-content-center mt-30">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li>
                <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-expanded="true">Description</a>
            </li>
            <li>
                <a class="nav-link" id="specification-tab" data-toggle="tab" href="#specification" role="tab" aria-controls="specification">Specification</a>
            </li>
            <li>
                <a class="nav-link" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments">Comments</a>
            </li>
            <li>
                <a class="nav-link active" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews">Reviews</a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description">
            <div class="description">
                <p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a child’s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named ‘Hangover’ by Beryl’s husband and still hangs in their house today</p>
                <p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking that is more efficient for one person creating less waste. The mission</p>
            </div>
        </div>
        <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="specification">
            <div class="specification-table">
                <div class="single-row">
                    <span>Width</span>
                    <span>128mm</span>
                </div>
                <div class="single-row">
                    <span>Height</span>
                    <span>508mm</span>
                </div>
                <div class="single-row">
                    <span>Depth</span>
                    <span>85mm</span>
                </div>
                <div class="single-row">
                    <span>Weight</span>
                    <span>52gm</span>
                </div>
                <div class="single-row">
                    <span>Quality checking</span>
                    <span>Yes</span>
                </div>
                <div class="single-row">
                    <span>Freshness Duration</span>
                    <span>03days</span>
                </div>
                <div class="single-row">
                    <span>When packeting</span>
                    <span>Without touch of hand</span>
                </div>
                <div class="single-row">
                    <span>Each Box contains</span>
                    <span>60pcs</span>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments">
            <div class="review-wrapper">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="total-comment">
                            <div class="single-comment">
                                <div class="user-details d-flex align-items-center flex-wrap">
                                    <img src="img/organic-food/u1.png" class="img-fluid order-1 order-sm-1" alt="">
                                    <div class="user-name order-3 order-sm-2">
                                        <h5>Blake Ruiz</h5>
                                        <span>12th Feb, 2017 at 05:56 pm</span>
                                    </div>
                                    <a href="#" class="view-btn color-2 reply order-2 order-sm-3"><i class="fa fa-reply" aria-hidden="true"></i><span>Reply</span></a>
                                </div>

                                <p class="user-comment">
                                    Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer hears tales of diamonds and begins dreaming of vast riches. He sells his farm and hikes off over the horizon, never to be heard from again.
                                </p>
                            </div>
                            <div class="single-comment reply-comment">
                                <div class="user-details d-flex align-items-center flex-wrap">
                                    <img src="img/organic-food/u2.png" class="img-fluid order-1 order-sm-1" alt="">
                                    <div class="user-name order-3 order-sm-2">
                                        <h5>Logan May</h5>
                                        <span>12th Feb, 2017 at 05:56 pm</span>
                                    </div>
                                    <a href="#" class="view-btn color-2 reply order-2 order-sm-3"><i class="fa fa-reply" aria-hidden="true"></i><span>Reply</span></a>
                                </div>
                                <p class="user-comment">
                                    Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer hears tales of diamonds and begins dreaming of vast riches. He sells his farm and hikes off over the horizon, never to be heard from again.
                                </p>
                            </div>
                            <div class="single-comment">
                                <div class="user-details d-flex align-items-center flex-wrap">
                                    <img src="img/organic-food/u3.png" class="img-fluid order-1 order-sm-1" alt="">
                                    <div class="user-name order-3 order-sm-2">
                                        <h5>Aaron Anderson</h5>
                                        <span>12th Feb, 2017 at 05:56 pm</span>
                                    </div>
                                    <a href="#" class="view-btn color-2 reply order-2 order-sm-3"><i class="fa fa-reply" aria-hidden="true"></i><span>Reply</span></a>
                                </div>
                                <p class="user-comment">
                                    Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer hears tales of diamonds and begins dreaming of vast riches. He sells his farm and hikes off over the horizon, never to be heard from again.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add-review">
                            <h3>Post a comment</h3>
                            <form action="#" class="main-form">
                                <input type="text" placeholder="Your Full name" onfocus="this.placeholder=''" onblur="this.placeholder = 'Your Full name'" required class="common-input">
                                <input type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" placeholder="Email Address" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email Address'" required class="common-input">
                                <input type="text" placeholder="Phone Number" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone Number'" required class="common-input">
                                <textarea placeholder="Messege" onfocus="this.placeholder=''" onblur="this.placeholder = 'Messege'" required class="common-textarea"></textarea>
                                <button class="view-btn color-2"><span>Submit Now</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews">
            <div class="review-wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="review-stat d-flex align-items-center flex-wrap">
                            <div class="review-overall">
                                <h3>Overall</h3>
                                <div class="main-review">4.0</div>
                                <span>(03 Reviews)</span>
                            </div>
                            <div class="review-count">
                                <h4>Based on 3 Reviews</h4>
                                <div class="single-review-count d-flex align-items-center">
                                    <span>5 Star</span>
                                    <div class="total-star five-star d-flex align-items-center">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <span>01</span>
                                </div>
                                <div class="single-review-count d-flex align-items-center">
                                    <span>4 Star</span>
                                    <div class="total-star four-star d-flex align-items-center">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <span>01</span>
                                </div>
                                <div class="single-review-count d-flex align-items-center">
                                    <span>3 Star</span>
                                    <div class="total-star three-star d-flex align-items-center">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <span>01</span>
                                </div>
                                <div class="single-review-count d-flex align-items-center">
                                    <span>2 Star</span>
                                    <div class="total-star two-star d-flex align-items-center">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <span>00</span>
                                </div>
                                <div class="single-review-count d-flex align-items-center">
                                    <span>1 Star</span>
                                    <div class="total-star one-star d-flex align-items-center">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <span>00</span>
                                </div>
                            </div>
                        </div>
                        <div class="total-comment">
                            <div class="single-comment">
                                <div class="user-details d-flex align-items-center">
                                    <img src="img/organic-food/u1.png" class="img-fluid" alt="">
                                    <div class="user-name">
                                        <h5>Blake Ruiz</h5>
                                        <div class="total-star five-star d-flex align-items-center">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="user-comment">
                                    Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer hears tales of diamonds and begins dreaming of vast riches. He sells his farm and hikes off over the horizon, never to be heard from again.
                                </p>
                            </div>
                            <div class="single-comment">
                                <div class="user-details d-flex align-items-center">
                                    <img src="img/organic-food/u2.png" class="img-fluid" alt="">
                                    <div class="user-name">
                                        <h5>Logan May</h5>
                                        <div class="total-star four-star d-flex align-items-center">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="user-comment">
                                    Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer hears tales of diamonds and begins dreaming of vast riches. He sells his farm and hikes off over the horizon, never to be heard from again.
                                </p>
                            </div>
                            <div class="single-comment">
                                <div class="user-details d-flex align-items-center">
                                    <img src="img/organic-food/u3.png" class="img-fluid" alt="">
                                    <div class="user-name">
                                        <h5>Aaron Anderson</h5>
                                        <div class="total-star three-star d-flex align-items-center">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="user-comment">
                                    Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer hears tales of diamonds and begins dreaming of vast riches. He sells his farm and hikes off over the horizon, never to be heard from again.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="add-review">
                            <h3>Add a Review</h3>
                            <div class="single-review-count mb-15 d-flex align-items-center">
                                <span>Your Rating:</span>
                                <div class="total-star five-star d-flex align-items-center">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <span>Outstanding</span>
                            </div>
                            <form action="#" class="main-form">
                                <input type="text" placeholder="Your Full name" onfocus="this.placeholder=''" onblur="this.placeholder = 'Your Full name'" required class="common-input">
                                <input type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" placeholder="Email Address" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email Address'" required class="common-input">
                                <input type="text" placeholder="Phone Number" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone Number'" required class="common-input">
                                <textarea placeholder="Review" onfocus="this.placeholder=''" onblur="this.placeholder = 'Review'" required class="common-textarea"></textarea>
                                <button class="view-btn color-2"><span>Submit Now</span></button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Details -->
        
<!-- Start Most Search Product Area -->
<section class="pt-100 pb-100">
    <div class="container">
        <div class="organic-section-title text-center">
            <h3>Most Searched Products</h3>
        </div>
        <div class="row mt-30">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-search-product d-flex">
                    <a href="02-11-product-details.html"><img src="img/r1.jpg" alt=""></a>
                    <div class="desc">
                        <a href="02-11-product-details.html" class="title">Pixelstore fresh Blueberry</a>
                        <div class="price"><span class="lnr lnr-tag"></span> $240.00</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-search-product d-flex">
                    <a href="02-11-product-details.html"><img src="img/r2.jpg" alt=""></a>
                    <div class="desc">
                        <a href="02-11-product-details.html" class="title">Pixelstore fresh Cabbage</a>
                        <div class="price"><span class="lnr lnr-tag"></span> $189.00</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-search-product d-flex">
                    <a href="02-11-product-details.html"><img src="img/r3.jpg" alt=""></a>
                    <div class="desc">
                        <a href="02-11-product-details.html" class="title">Pixelstore fresh Raspberry</a>
                        <div class="price"><span class="lnr lnr-tag"></span> $189.00</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-search-product d-flex">
                    <a href="02-11-product-details.html"><img src="img/r4.jpg" alt=""></a>
                    <div class="desc">
                        <a href="02-11-product-details.html" class="title">Pixelstore fresh Kiwi</a>
                        <div class="price"><span class="lnr lnr-tag"></span> $189.00</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-search-product d-flex">
                    <a href="02-11-product-details.html"><img src="img/r5.jpg" alt=""></a>
                    <div class="desc">
                        <a href="02-11-product-details.html" class="title">Pixelstore Bell Pepper</a>
                        <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-search-product d-flex">
                    <a href="02-11-product-details.html"><img src="img/r6.jpg" alt=""></a>
                    <div class="desc">
                        <a href="02-11-product-details.html" class="title">Pixelstore fresh Blackberry</a>
                        <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-search-product d-flex">
                    <a href="02-11-product-details.html"><img src="img/r7.jpg" alt=""></a>
                    <div class="desc">
                        <a href="02-11-product-details.html" class="title">Pixelstore fresh Brocoli</a>
                        <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-search-product d-flex">
                    <a href="02-11-product-details.html"><img src="img/r8.jpg" alt=""></a>
                    <div class="desc">
                        <a href="02-11-product-details.html" class="title">Pixelstore fresh Carrot</a>
                        <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-search-product d-flex">
                    <a href="02-11-product-details.html"><img src="img/r9.jpg" alt=""></a>
                    <div class="desc">
                        <a href="02-11-product-details.html" class="title">Pixelstore fresh Strawberry</a>
                        <div class="price"><span class="lnr lnr-tag"></span> $240.00</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-search-product d-flex">
                    <a href="02-11-product-details.html"><img src="img/r10.jpg" alt=""></a>
                    <div class="desc">
                        <a href="02-11-product-details.html" class="title">Prixma MG2 Light Inkjet</a>
                        <div class="price"><span class="lnr lnr-tag"></span> $240.00</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-search-product d-flex">
                    <a href="02-11-product-details.html"><img src="img/r11.jpg" alt=""></a>
                    <div class="desc">
                        <a href="02-11-product-details.html" class="title">Pixelstore fresh Cherry</a>
                        <div class="price"><span class="lnr lnr-tag"></span> $240.00 <del>$340.00</del></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-search-product d-flex">
                    <a href="02-11-product-details.html"><img src="img/r12.jpg" alt=""></a>
                    <div class="desc">
                        <a href="02-11-product-details.html" class="title">Pixelstore fresh Beans</a>
                        <div class="price"><span class="lnr lnr-tag"></span> $240.00 <del>$340.00</del></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
  function addcart_with_qty(product_id) {
    let feedback = document.getElementById('cart_feedback');
    let qty_val = document.getElementById('qty').value;
    if (isNaN(qty_val) || parseInt(qty_val) < 1) {
      feedback.innerHTML = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Please, add valid quantity</div>';
    } else {
      feedback.innerHTML = '<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Processing...</div>';
      $('#cart_feedback').load(base + '/product/cart/' + product_id + '/' + qty_val);
      cart_count();
      const alert = document.querySelector('.alert');
      setTimeout(() => {
        alert.remove()
      }, 5000)
    }
  }
</script>
@endsection
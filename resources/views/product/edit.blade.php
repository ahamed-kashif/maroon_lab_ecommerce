@extends('layouts.app')
@section('css')
    @include('extras.summernote-css')
    @include('extras.sweetalert2-css')
    @include('extras.select2css-extra')
    @include('extras.tagsinput-css')
@endsection
@section('content')
    @include('partials.alert')
    <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="contentbar">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-8 col-xl-9">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Product Detail</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="productTitle" class="col-sm-12 col-form-label">Product Title</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control font-20" id="productTitle" placeholder="Title" name="title" value="{{$product->title}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Short Description</label>
                                <div class="col-sm-12">
                                    <textarea class="summernote short" name="short_description" placeholder="short description" required>{{$product->short_description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Description</label>
                                <div class="col-sm-12">
                                    <textarea class="summernote" name="description">{{$product->description}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Product Image Gallery</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if($product->images()->count() != 0)
                                    @foreach($product->images()->get() as $img)
                                        <span class="pull-right clickable close-icon cross" data-effect="fadeOut">
                                            <img class="img-fluid rounded p-2" style="height:100px;width: 100px" src="{{asset($img->url)}}"/>
                                            <a class="delete_image" id="{{$img->id}}" href="javaScript:void(0);">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </span>
                                    @endforeach
                                @else
                                    <h5>No image uploaded yet!</h5>
                                @endif
                            </div>
                            <div class="row  image-container">

                            </div>

                        </div>
                        <div class="card-footer">
                            <label>select images are of jpeg,jpg or png formatted</label>
                            <input type="file" class="btn-lg btn-block image" name="images[]" accept="image/png, image/jpeg, image/jpf" multiple title="upload">
                        </div>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Other Detail</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xl-4">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div class="nav flex-column nav-pills" id="v-pills-product-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link mb-2 active" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true"><i class="feather icon-feather mr-2"></i>General</a>
                                        <a class="nav-link mb-2" id="v-pills-stock-tab" data-toggle="pill" href="#v-pills-stock" role="tab" aria-controls="v-pills-stock" aria-selected="false"><i class="feather icon-box mr-2"></i>Stock</a>
                                        <a class="nav-link mb-2" id="v-pills-advanced-tab" data-toggle="pill" href="#v-pills-advanced" role="tab" aria-controls="v-pills-advanced" aria-selected="false"><i class="feather icon-settings mr-2"></i>Advanced</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-8">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div class="tab-content" id="v-pills-product-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">

                                            <div class="form-group row">
                                                <label for="regularPrice" class="col-sm-4 col-form-label">Price(&#2547)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="regularPrice" placeholder="100" name="price" value="{{$product->price}}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label for="salePrice" class="col-sm-4 col-form-label">Sale Price(&#2547)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="salePrice" name="sale_price" value="{{$product->discounted_price}}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0 mt-2 p-2">
                                                <div class="col-sm-8">
                                                    <div class="form-row">
                                                        <div class="col-sm-6 ">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{$product->is_active?'checked':''}}>
                                                                <label class="form-check-label" for="is_active">
                                                                    Active
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" {{$product->is_featured?'checked':''}}>
                                                                <label class="form-check-label" for="is_featured">
                                                                    Featured
                                                                </label>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="v-pills-stock" role="tabpanel" aria-labelledby="v-pills-stock-tab">

                                            <div class="form-group row">
                                                <label for="sku" class="col-sm-4 col-form-label">SKU</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="sku" name="sku" value="{{$product->sku}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="stockStatus" class="col-sm-4 col-form-label">Stock Status</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="stockStatus" name="in_stock">
                                                        <option value="instock" value={{$product->in_stock ? 'selected' : ''}}>In Stock</option>
                                                        <option value="outofstock" >Out of Stock</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label for="stockQuantity" class="col-sm-4 col-form-label">Quantity</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="stockQuantity" name="quantity" value="{{$product->quantity}}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="v-pills-advanced" role="tabpanel" aria-labelledby="v-pills-advanced-tab">

                                            <div class="form-group row mb-0">
                                                <label for="purchaseNote" class="col-sm-3 col-form-label">Purchase note</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="purchaseNote" id="purchaseNote" rows="3" name="purchase_note">{{$product->purchase_note}}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h6 class="card-subtitle">If you are satisfied hit the update button..</h6>
                            <button class="btn btn-outline-warning btn-lg btn-block" type="submit"><i class="feather icon-upload mr-2"></i>Update</button>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-4 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Categories</h5>
                        </div>
                        <div class="card-body">
                            @if($categories->count() != 0)
                                @foreach($categories as $category)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input category" id="{{$category->id}}" name="category_id[]" value="{{$category->id}}" {{$product->categories->contains($category) ? 'checked':''}}>
                                        <label class="custom-control-label" for="{{$category->id}}">{{$category->title}}</label>
                                    </div>
                                @endforeach
                            @else
                                <h4>No Category is uploaded yet</h4>
                            @endif
                        </div>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Variant</h5>
                        </div>
                        <div class="card-body pt-3">
                            <select class="select2-multi-select form-control" name="variants[]" multiple="multiple">
                                @foreach($variants->groupBy('type') as $key => $variant)
                                    <optgroup label="{{$key}}">
                                        @foreach($variant as $item)
                                            <option value="{{$item->id}}" {{$product->variants->contains($item) ? 'selected' : ''}}>{{$item->value.'  '.$item->unit}}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Tags</h5>
                        </div>
                        <div class="card-body">
                            <div class="product-tags">
                                <span class="badge badge-secondary-inverse">New</span>
                                <span class="badge badge-secondary-inverse">Latest</span>
                                <span class="badge badge-secondary-inverse">Trending</span>
                                <span class="badge badge-secondary-inverse">Popular</span>
                                <span class="badge badge-secondary-inverse">Sale</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="add-product-tags">
                                <form>
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Add Tags" aria-label="Search" aria-describedby="button-addonTags">
                                        <div class="input-group-append">
                                            <button class="input-group-text" type="submit" id="button-addonTags">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
    </form>
@endsection
@section('js')
    @include('extras.summernote-js')
    <!-- eCommerce Page js -->
    <script src="{{asset('js/custom/custom-ecommerce-product-detail-page.js')}}"></script>
    @include('extras.sweetalert2-js')
    @include('extras.select2js-extra')
    @include('extras.tagsinput-js')
    <script src="{{asset('js/restapi.js')}}"></script>
    <script>
        $(document).ready(function() {
            let $imagesContainer = $('.image-container');
            $('.image').change(function () {
                if (typeof (FileReader) != "undefined") {
                    $imagesContainer.html('');
                    let regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|)$/;
                    $($(this)[0].files).each(function () {
                        let file = $(this);
                        if (regex.test(file[0].name.toLowerCase())) {
                            let reader = new FileReader();
                            reader.onload = function (e) {
                                let imageContainer = $('<div />')
                                imageContainer.addClass('d-inline-block')
                                    .addClass('mb-1')
                                let img = $('<img />');
                                img.addClass('img-fluid rounded').addClass('p-2')
                                img.attr('style', 'height:100px;width: 100px');
                                img.attr('src', e.target.result);
                                console.log(e.target.result);
                                imageContainer.append(img);
                                $imagesContainer.append(imageContainer);
                            }
                            reader.readAsDataURL(file[0]);
                        } else {
                            alert(file[0].name + " is not a valid image file.");
                            $imagesContainer.html("");
                            return false;
                        }
                    });
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            });
            $('.delete_image').on('click',function(){
                let url = '{{route('product.image.destroy',[$product->id,'image_id'])}}';
                url = url.replace('image_id', $(this).attr('id'));
                let parent = $(this).parent();
                let deleteImage =$.ajax({
                    dataType: 'json',
                    type : 'DELETE',
                    data: {api_token: $api_token},
                    url : url,
                });

                deleteImage.done(function(data){
                    console.log(data);
                    if(data.message === 'Successfully deleted this image'){
                        parent.remove();
                        swal(
                            {
                                title: 'Nice Work!',
                                text: data.message,
                                type: 'success',
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 1500
                            }
                        )
                    }else{
                        swal(
                            {
                                title: 'oh snap!',
                                text: data.message,
                                type: 'warning',
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 1500
                            }
                        )
                    }
                });
                deleteImage.fail(function(data){
                    alert(data.message);
                    parent.remove();
                });
             });
        });
    </script>
@endsection


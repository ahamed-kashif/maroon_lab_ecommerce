@extends('layouts.app')
@section('css')
    @include('extras.product-add-css')
    @include('extras.select2css-extra')
    @include('extras.tagsinput-css')
@endsection
@section('content')
    @include('partials.alert')
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
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
                            <form>
                                <div class="form-group row">
                                    <label for="productTitle" class="col-sm-12 col-form-label">Product Title</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control font-20" id="productTitle" placeholder="Title" name="title" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Short Description</label>
                                    <div class="col-sm-12">
                                        <textarea class="summernote short" name="short_description" placeholder="short description" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Description</label>
                                    <div class="col-sm-12">
                                        <textarea class="summernote" name="description" placeholder="description" required></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Product Image Gallery</h5>
                        </div>
                        <div class="card-body image-container">

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
                                                    <input type="text" class="form-control" id="regularPrice" placeholder="100" name="price" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label for="salePrice" class="col-sm-4 col-form-label">Sale Price(&#2547)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="salePrice" placeholder="50" name="sale_price">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0 mt-2 p-2">
                                                <div class="col-sm-8">
                                                    <div class="form-row">
                                                        <div class="col-sm-6 ">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active">
                                                                <label class="form-check-label" for="is_active">
                                                                    Active
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured">
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
                                                    <input type="text" class="form-control" id="sku" placeholder="SKU001" name="sku">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="stockStatus" class="col-sm-4 col-form-label">Stock Status</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="stockStatus" name="in_stock" required>
                                                        <option value="instock">In Stock</option>
                                                        <option value="outofstock">Out of Stock</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label for="stockQuantity" class="col-sm-4 col-form-label">Quantity</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="stockQuantity" placeholder="100" name="quantity">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="v-pills-advanced" role="tabpanel" aria-labelledby="v-pills-advanced-tab">

                                            <div class="form-group row mb-0">
                                                <label for="purchaseNote" class="col-sm-3 col-form-label">Purchase note</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="purchase_note" id="purchaseNote" rows="3" placeholder="Purchase note" name="purchase_note"></textarea>
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
                            <h6 class="card-subtitle">If you are satisfied hit the save button..</h6>
                            <button class="btn btn-outline-primary btn-lg btn-block" type="submit"><i class="feather icon-save mr-2"></i>SAVE</button>
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
                                        <input type="checkbox" class="custom-control-input category" id="{{$category->id}}" name="category_id[]" value="{{$category->id}}">
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
                            <h5 class="card-title">Sub-Categories</h5>
                        </div>
                        <div class="card-body">
                            @if($subcategories->count() != 0)
                                <select class="select2-multi-select form-control" name="sub_category_id">
                                    <option>select one.</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                                    @endforeach
                                </select>
                            @else
                                <h4>No Sub-Category is uploaded yet</h4>
                            @endif
                        </div>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Variannts</h5>
                        </div>
                        <div class="card-body pt-3">
                            <select class="select2-multi-select form-control" name="variants[]" multiple="multiple">
                                @foreach($variants->groupBy('type') as $key => $variant)
                                    <optgroup label="{{$key}}">
                                        @foreach($variant as $item)
                                            <option value="{{$item->id}}">{{$item->value.'  '.$item->unit}}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
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
    @include('extras.product-add-js')
    @include('extras.select2js-extra')
    @include('extras.tagsinput-js')
    <script>
        $(document).ready(function() {
            let $imagesContainer = $('.image-container');
            $imagesContainer.hide();
            $('.image').change(function () {
                if (typeof (FileReader) != "undefined") {
                    $imagesContainer.html('');
                    $imagesContainer.show();
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
        });
    </script>
@endsection


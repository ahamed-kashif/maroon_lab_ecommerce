@extends('layouts.app')
@section('css')
    @include('extras.product-css')
@endsection
@section('content')
    <form action="{{route('product.store')}}" method="post">
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
                                        <input type="text" class="form-control font-20" id="productTitle" placeholder="Title" name="title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Description</label>
                                    <div class="col-sm-12">
                                        <textarea class="summernote" name="description">This is demo product.</textarea>
                                    </div>
                                </div>
                            </form>
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
                                                    <input type="text" class="form-control" id="regularPrice" placeholder="100" name="price">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label for="salePrice" class="col-sm-4 col-form-label">Sale Price(&#2547)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="salePrice" placeholder="50" name="sale_price">
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
                                                    <select class="form-control" id="stockStatus" name="in_stock">
                                                        <option value="instock" value=true>In Stock</option>
                                                        <option value="outofstock" value=false>Out of Stock</option>
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
                                                    <textarea class="form-control" name="purchaseNote" id="purchaseNote" rows="3" placeholder="Purchase note" name="purchase_note"></textarea>
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
                            <h5 class="card-title">Color</h5>
                        </div>
                        <div class="card-body pt-3">
                            <div class="custom-checkbox-button">
                                <div class="form-check-inline checkbox-primary">
                                    <input type="checkbox" id="customCheckboxInline5" name="customCheckboxInline2" checked>
                                    <label for="customCheckboxInline5"></label>
                                </div>
                                <div class="form-check-inline checkbox-secondary">
                                    <input type="checkbox" id="customCheckboxInline6" name="customCheckboxInline2">
                                    <label for="customCheckboxInline6"></label>
                                </div>
                                <div class="form-check-inline checkbox-success">
                                    <input type="checkbox" id="customCheckboxInline7" name="customCheckboxInline2">
                                    <label for="customCheckboxInline7"></label>
                                </div>
                                <div class="form-check-inline checkbox-danger">
                                    <input type="checkbox" id="customCheckboxInline8" name="customCheckboxInline2">
                                    <label for="customCheckboxInline8"></label>
                                </div>
                                <div class="form-check-inline checkbox-warning">
                                    <input type="checkbox" id="customCheckboxInline9" name="customCheckboxInline2">
                                    <label for="customCheckboxInline9"></label>
                                </div>
                                <div class="form-check-inline checkbox-info">
                                    <input type="checkbox" id="customCheckboxInline10" name="customCheckboxInline2">
                                    <label for="customCheckboxInline10"></label>
                                </div>
                                <div class="form-check-inline checkbox-light">
                                    <input type="checkbox" id="customCheckboxInline11" name="customCheckboxInline2">
                                    <label for="customCheckboxInline11"></label>
                                </div>
                                <div class="form-check-inline checkbox-dark">
                                    <input type="checkbox" id="customCheckboxInline12" name="customCheckboxInline2">
                                    <label for="customCheckboxInline12"></label>
                                </div>
                            </div>
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
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Product Image Gallery</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-inline-block mb-1">
                                <img src="assets/images/ecommerce/product_gallery_01.jpg" alt="Rounded Image" class="img-fluid rounded">
                            </div>
                            <div class="d-inline-block mb-1">
                                <img src="assets/images/ecommerce/product_gallery_02.jpg" alt="Rounded Image" class="img-fluid rounded">
                            </div>
                            <div class="d-inline-block mb-1">
                                <img src="assets/images/ecommerce/product_gallery_03.jpg" alt="Rounded Image" class="img-fluid rounded">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary-rgba btn-lg btn-block">Add Gallery</button>
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
    @include('extras.product-js')
    <script>
        $(document).ready(function(){
            let $selectedCategories = [];
            $.each($(".category"), function(){
                $(this).change(function(){
                    if(this.checked){
                        $selectedCategories.push($(this).val());
                        console.log($selectedCategories);
                    }else{
                        let removeItem = $(this).val();
                        $selectedCategories = jQuery.grep($selectedCategories, function(value) {
                            return value != removeItem;
                        });
                        console.log($selectedCategories);
                    }
                });
            });

        });
    </script>
@endsection


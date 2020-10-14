<div class="col-lg-12">
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title">Product Details</h5>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="description-tab-line" data-toggle="tab" href="#description-line" role="tab" aria-controls="description-line" aria-selected="true"><i class="feather icon-file-text mr-2"></i>Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="review-tab-line" data-toggle="tab" href="#review-line" role="tab" aria-controls="review-line" aria-selected="false"><i class="fa fa-newspaper-o mr-2"></i>Purchase note</a>
                </li>

            </ul>
            <div class="tab-content" id="defaultTabContentLine">
                <div class="tab-pane fade show active" id="description-line" role="tabpanel" aria-labelledby="description-tab-line">
                    <p>{!! $product->description !!}</p>
                </div>
                <div class="tab-pane fade" id="review-line" role="tabpanel" aria-labelledby="review-tab-line">
                    <p>{{$product->purchase_note == null ? 'Nothing special' : $product->purchase_note}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

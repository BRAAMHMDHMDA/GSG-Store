<section class="modern-horizontal-wizard">
    <div class="bs-stepper wizard-modern modern-wizard-example">
        <div class="bs-stepper-header">
            <div class="step" data-target="#account-details-modern">
                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                         <i data-feather="info" class="font-medium-3"></i>
                                    </span>
                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Basic Details</span>
                                        <span class="bs-stepper-subtitle">Setup Product Details</span>
                                    </span>
                </button>
            </div>
            <div class="line">
                <i data-feather="chevron-right" class="font-medium-2"></i>
            </div>
            <div class="step" data-target="#personal-info-modern">
                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="navigation" class="font-medium-3"></i>
                                    </span>
                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Shipping Info</span>
                                        <span class="bs-stepper-subtitle">Add Shipping Info</span>
                                    </span>
                </button>
            </div>
            <div class="line">
                <i data-feather="chevron-right" class="font-medium-2"></i>
            </div>
            <div class="step" data-target="#address-step-modern">
                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                         <i data-feather="image" class="font-medium-3"></i>
                                    </span>
                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Gallery</span>
                                        <span class="bs-stepper-subtitle">Add Product Images</span>
                                    </span>
                </button>
            </div>
        </div>
        <div class="bs-stepper-content">
            <div id="account-details-modern" class="content">
                <div class="content-header">
                    <h5 class="mb-0">Basic Details</h5>
                    <small class="text-muted">Enter Basic Product Details.</small>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="name">name</label>
                        <input type="text" name="name" id="name"
                               class="form-control @error('name') is-invalid @enderror" placeholder="name"
                               value="{{old('name',$product->name)}}" required/>
                        @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="category_id">Category</label>
                        <select class="select2 w-100 @error('category_id') is-invalid @enderror"
                                name="category_id" id="category_id" required>
                            <option label=""></option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        @if(old('category_id',$product->category_id)==$category->id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="tags">Tags</label>
                        <!-- Multiple -->
                        <select class="select2 form-control @error('tag_id') is-invalid @enderror" name="tags[]" id="tags" multiple>
                            <option label=""></option>
                            @foreach($tags as $i => $tag)
                                <option value="{{ $tag->id }}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                        @error('tag_id')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="brand_id">Brand</label>
                        <select class="select2 w-100 @error('brand_id') is-invalid @enderror" name="brand_id"
                                id="brand_id" required>
                            <option label=""></option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}"
                                        @if(old('brand_id',$product->brand_id)==$brand->id) selected @endif>{{$brand->name}}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="sku">SKU (Barcode)</label>
                        <input type="text" name="sku" id="sku"
                               class="form-control @error('sku') is-invalid @enderror" placeholder="SKU"
                               value="{{old('sku',$product->sku)}}" required/>
                        @error('sku')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity"
                               class="form-control @error('quantity') is-invalid @enderror"
                               placeholder="Quantity" value="{{old('quantity',$product->quantity)}}" required min="0"/>
                        @error('quantity')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>






                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="price">Price</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{ $defualtCurrncy->code }}</span>
                        </div>
                        <input type="text" name="price" id="price numeral-formatting"
                               class="form-control numeral-mask1 phone-number-mask @error('price') is-invalid @enderror" placeholder="Price"
                               value="{{old('price',$product->price)}}" min="0" required  />
                        </div>
                        </div>
                        @error('price')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                     <div class="form-group col-md-6">
                        <label class="form-label" for="sale_price">Sale Price</label>
                        <input type="text" name="sale_price" id="sale_price"
                               class="form-control @error('sale_price') is-invalid @enderror"
                               placeholder="Sale Price" min="0" value="{{old('sale_price',$product->sale_price)}}"/>
                        @error('sale_price')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="editor"
                                  rows="2" placeholder="Description"
                                  name="description">{{old('description',$product->description)}}</textarea>
                        @error('description')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mt-2 mb-2">
                    <div class="form-group col-sm-12">
                        <label class="form-label" for="sale_price">Status</label>
                        <div class="demo-inline-spacing">
                            <div class="custom-control custom-control-success custom-radio">
                                <input type="radio" id="customRadio1" name="status"
                                       class="custom-control-input @error('status') is-invalid @enderror"
                                       value="active" @if(old('status',$product->status)=='active') checked @endif/>
                                @error('status')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                <label class="custom-control-label" for="customRadio1">Active</label>
                            </div>
                            <div class="custom-control custom-control-warning custom-radio">
                                <input type="radio" id="customRadio2" name="status"
                                       class="custom-control-input @error('status') is-invalid @enderror"
                                       value="draft" @if(old('status',$product->status)=='draft') checked @endif/>
                                <label class="custom-control-label" for="customRadio2">Draft</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-outline-secondary btn-prev" disabled>
                        <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <button class="btn btn-primary btn-next" id="as" type="button">
                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                        <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                    </button>
                </div>
            </div>
            <div id="personal-info-modern" class="content">
                <div class="content-header">
                    <h5 class="mb-0">Shipping Info</h5>
                    <small class="text-muted">Add Shipping Info.</small>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="weight">Weight</label>
                        <input type="number" name="weight" id="weight"
                               class="form-control @error('weight') is-invalid @enderror" placeholder="Weight"
                               value="{{old('weight',$product->weight)}}"/>
                        @error('weight')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="width">Width</label>
                        <input type="number" name="width" id="width"
                               class="form-control @error('width') is-invalid @enderror" placeholder="Width"
                               value="{{old('width',$product->width)}}" min="0"/>
                        @error('width')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="height">Height</label>
                        <input type="number" name="height" id="height"
                               class="form-control @error('height') is-invalid @enderror" placeholder="Height"
                               value="{{old('height',$product->height)}}"/>
                        @error('height')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="length">Length</label>
                        <input type="number" name="length" id="length"
                               class="form-control @error('length') is-invalid @enderror" placeholder="Length"
                               value="{{old('length',$product->length)}}" min="0"/>
                        @error('length')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary btn-prev">
                        <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <button class="btn btn-primary btn-next" type="button">
                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                        <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                    </button>
                </div>
            </div>
            <div id="address-step-modern" class="content">
                <div class="content-header">
                    <h5 class="mb-0">Gallery</h5>
                    <small class="text-muted">Add Product Images.</small>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label class="form-label" style="color: darkred;font-weight: bold">Main Image</label>
                        <div class="form-group col-12 " style="margin-bottom: 40px">
                            <input class="@error('main_image') is-invalid @enderror" type="file"
                                   name="main_image" id="product-image">
                            @error('main_image')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label class="form-label" style="color: darkred;font-weight: bold">Extra Images</label>
                        <div class="form-group col-12 " style="margin-bottom: 40px">
                            <input class="@error('gallery') is-invalid @enderror" type="file" name="gallery[]"
                                   id="product-images" multiple>
                            @error('gallery')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary btn-prev">
                        <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <button id="id" class="btn btn-success" type="submit"><i data-feather="save"></i> {{$button}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script src="{{ asset('dashboard_files/app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
<script src="{{ asset('dashboard_files/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
{{--<script src="{{ asset('dashboard_files/app-assets/js/scripts/forms/form-input-mask.js') }}"></script>--}}


    <script>

       var numeralMask1 = $('.numeral-mask1');
        //Numeral
        if (numeralMask1.length) {
            new Cleave(numeralMask1, {
                numeral: true,
                numeralDecimalScale: @php echo json_encode($defualtCurrncy->decimal_numbers); @endphp,
            });
        }
    </script>
@endpush


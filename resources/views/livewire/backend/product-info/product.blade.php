@push('css')

@endpush
<div>
    <style>
        .img_wrp {
            display: inline-block;
            position: relative;
        }

        .close {
            position: absolute;
            top: 0;
            right: 0;
        }
    </style>
    <x-slot name="title">
        Product Info
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form wire:submit.prevent="productSave">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title my-5">Add new product</h4>
                            {{-- <p class="card-title-desc">Fill all information below</p> --}}


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input id="name" type="text" class="form-control" wire:model.lazy="name"
                                            placeholder="Name">
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group" wire:ignore>
                                        <label class="control-label">Category</label>
                                        <select class="form-control select2" wire:model.lazy="category_id"
                                            id="select2-dropdown">
                                            <option>Select</option>
                                            @foreach ($Categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    {{-- When we use wire:ignore Search problem --}}
                                    <div class="form-group">
                                        <label class="control-label">Sub Category</label>
                                        <select class="form-control select2" wire:model.lazy="sub_category_id"
                                            id="select2-dropdown">
                                            <option>Select</option>
                                            @foreach ($SubCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- @error('sub_category_id') <span class="error">{{ $message }}</span> @enderror -->
                                     <div class="form-group">
                                        <label class="control-label">Sub-sub Category</label>
                                        <select class="form-control select2" wire:model.lazy="sub_sub_category_id"
                                            id="select2-dropdown">
                                            <option>Select</option>
                                            @foreach ($SubSubCategories as $subSubCategory)
                                            <option value="{{ $subSubCategory->id }}">{{ $subSubCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- @error('sub_sub_category_id') <span class="error">{{ $message }}</span> @enderror --}} -->
                                    <div class="form-group" wire:ignore>
                                        <label class="control-label">Brand</label>
                                        <select class="form-control" wire:model.lazy="brand_id" id="select2-dropdown1">
                                            <option value="">Select</option>
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('brand_id') <span class="error">{{ $message }}</span> @enderror

                                    <div class="form-group">
                                        <label for="regular_price">Regular Price</label>
                                        <input id="regular_price" type="number" step="any" class="form-control"
                                            wire:model.debounce.150ms="regular_price" placeholder="Regular Price">
                                        @error('regular_price') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="special_price">Special Price</label>
                                        <input id="special_price" type="number" step="any" class="form-control"
                                            wire:model.debounce.150ms="special_price" placeholder="Special Price">
                                        @error('special_price') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="wholesale_price">Wholesale Price</label>
                                        <input id="wholesale_price" type="number" step="any" class="form-control"
                                            wire:model.lazy="wholesale_price" placeholder="Wholesale Price">
                                        @error('wholesale_price') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="min_order_qty">Minimum Order Quantity</label>
                                        <input id="min_order_qty" type="number" step="any" class="form-control"
                                            wire:model.lazy="min_order_qty" placeholder="Minimum Order Quantity">
                                    </div>
                                    <div class="form-group">
                                        <label for="guarantee">Guarantee(Month)</label>
                                        <input id="guarantee" type="number" step="any" class="form-control"
                                            wire:model.lazy="guarantee" placeholder="guarantee">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Stock</label>
                                        <select class="form-control" wire:model.lazy="in_stock">
                                            {{-- <option value="">Select</option> --}}
                                            <option value="In Stock">In Stock</option>
                                            <option value="Out of Stock">Out of Stock</option>
                                        </select>
                                        @error('in_stock') <span class="error">{{ $message }}</span> @enderror
                                    </div>


                                    {{-- <div class="form-group">
                                        <label class="control-label">Featured</label>
                                        <select class="form-control" wire:model.lazy="featured">
                                            <option value="None">None</option>
                                            <option value="Fresh Fruits">Fresh Fruits</option>
                                            <option value="Fresh Vegetables">Fresh Vegetables</option>
                                            <option value="Meat & Seafood">Meat & Seafood</option>
                                            <option value="New Product">New Product</option>
                                            <option value="Trending Product">Trending Product</option>
                                            <option value="Best Selling Product">Best Selling Product</option>
                                        </select>
                                        @error('featured') <span class="error">{{ $message }}</span> @enderror
                                    </div> --}}



                                     <div class="form-group">
                                          <label class="control-label">Featured</label>
                                            <select class="form-control" wire:model.lazy="product_feature_id">
                                                <option value="">Select One</option>
                                                @foreach ($feature_products as $feature_product)
                                                   <option value="{{$feature_product->id}}">{{$feature_product->name}}</option>
                                                @endforeach
                                            </select>
                                          @error('product_feature_id') <span class="error">{{ $message }}</span> @enderror
                                     </div>


                                    <div wire:ignore class="form-group">
                                        <label for="basicpill-lastname-input">Short Description</label>
                                        <textarea class="form-control" id="short_description" rows="3"
                                            wire:model.lazy="short_description"
                                            placeholder="Short Description"> {{$short_description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="code">Product Code</label>
                                        <input id="code" type="text" class="form-control" wire:model.lazy="code"
                                            placeholder="Product Code">
                                        @error('code') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="purchase_price">Purchase Price</label>
                                        <input id="purchase_price" type="number" step="any" class="form-control"
                                            wire:model.lazy="purchase_price" placeholder="Purchase Price">
                                        @error('purchase_price') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Warehouse</label>
                                        <select class="form-control" wire:model.lazy="warehouse_id">
                                            <option value="">Select one</option>
                                            @foreach ($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}" @if($warehouse->name=="Default Warehouse") selected @endif>{{ $warehouse->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('warehouse_id') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="stock_in_opening">Opening Stock</label>
                                        <input id="stock_in_opening" type="number" step="any" class="form-control"
                                            wire:model.lazy="stock_in_opening" placeholder="Opening Stock">
                                    </div>
                                    <div class="form-group">
                                        <label for="basicpill-lastname-input">Status</label>
                                        <select class="form-control" wire:model.lazy="is_active">
                                            {{-- <option value="">Select Status</option> --}}
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('is_active') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="low_alert">Low Alert</label>
                                        <input id="low_alert" type="number" step="any" class="form-control"
                                            wire:model.lazy="low_alert" placeholder="Low Alert">
                                    </div>
                                    <div class="form-group">
                                        <label for="stock_in_opening">Youtube Link</label>
                                        <input type="text" class="form-control form-control-lg inputBox"
                                            wire:model.lazy="youtube_link" placeholder="Video Link" />
                                    </div>
                                    <div wire:ignore class="form-group">
                                        <label for="basicpill-lastname-input">Long Description</label>
                                        <textarea class="form-control" id="long_description" rows="3"
                                            wire:model.lazy="long_description" placeholder="Long Description"
                                            rows="8">{{$long_description}}</textarea>
                                    </div>
                                    <div wire:ignore class="form-group">
                                        <label for="basicpill-lastname-input">Key Word</label>
                                        <textarea class="form-control" id="key_word" rows="3"
                                            wire:model.lazy="key_word" placeholder="Key Word"
                                            rows="8">{{$key_word}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="low_alert"> Image(Max height 190px) </label>
                                        {{-- <div wire:loading wire:target="product_image">
                                            Processing Image...
                                        </div> --}}
                                        <input type="file" class="form-control form-control-lg inputBox"
                                            wire:model.lazy="product_image" />
                                        @error('product_image') <span class="error">{{ $message }}</span> @enderror
                                        @if ($product_image)
                                        <img src="{{ $product_image->temporaryUrl() }}"
                                            style="height:150px; weight:150px;" alt="Image"
                                            class="img-circle img-fluid">
                                        @endif
                                        @if($QueryUpdate && !$product_image)
                                        <div ng-repeat="file in imagefinaldata" class="img_wrp m-1">
                                            @if($QueryUpdate->ProductImageFirst)
                                            <img style="height:150px; weight:150px;"
                                                src="{{ asset('storage/photo/'.$QueryUpdate->ProductImageFirst->image) }}"
                                                class="rounded mb-1 imgResponsiveMax" alt="" />
                                            <div class="close text-danger"
                                                wire:click="imageDelete({{$QueryUpdate->ProductImageFirst->id}})"
                                                style="cursor:pointer;">
                                                <span aria-hidden="true">&times;</span>
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="low_alert">Product Gallery Image(Max height 190px)</label><br>
                                        <input type="file" class="form-control form-control-lg inputBox"
                                            wire:model.lazy="images" multiple />
                                    </div>
                                    @if($QueryUpdate)
                                    @foreach ($QueryUpdate->ProductImageTop4 as $image)
                                    <div ng-repeat="file in imagefinaldata" class="img_wrp m-1">
                                        <img style="height:100px; weight:100px;"
                                            src="{{ asset('storage/photo/'.$image->image) }}"
                                            class="rounded mb-1 imgResponsiveMax" alt="" />
                                        <div class="close text-danger" wire:click="imageDelete({{$image->id}})"
                                            style="cursor:pointer;">
                                            <span aria-hidden="true">&times;</span>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    @foreach ($images as $key=>$image)
                                    <div ng-repeat="file in imagefinaldata" class="img_wrp m-1">
                                        <img src="{{ $image->temporaryUrl() }}" style="height:100px; weight:100px;"
                                            alt="Image" class="img-circle img-fluid rounded mb-1 imgResponsiveMax">
                                        <div class="close text-danger" wire:click="removeMe({{ $key }})"
                                            style="cursor:pointer;">
                                            <span aria-hidden="true">&times;</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <center>
                            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light"
                                wire:target="product_image, images" wire:loading.attr="disabled">Publish</button>
                        </center>
                    </div> <!-- end card-->

                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function () {
        $('#select2-dropdown').select2();
        $('#select2-dropdown').on('change', function (e) {
            var data = $('#select2-dropdown').select2("val");
            @this.set('category_id', data);
        });
    });
    $(document).ready(function () {
        $('#select2-dropdown1').select2();
        $('#select2-dropdown1').on('change', function (e) {
            var data = $('#select2-dropdown1').select2("val");
            @this.set('brand_id', data);
        });
    });
    $(document).ready(function () {
  if ($("#short_description").length > 0) {
    tinymce.init({
      selector: "textarea#short_description",
      height: 200,
	   forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
            @this.set('short_description', editor.getContent());
            });
        },
      plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
      style_formats: [{
        title: 'Bold text',
        inline: 'b'
      }, {
        title: 'Red text',
        inline: 'span',
        styles: {
          color: '#ff0000'
        }
      }, {
        title: 'Red header',
        block: 'h1',
        styles: {
          color: '#ff0000'
        }
      }, {
        title: 'Example 1',
        inline: 'span',
        classes: 'example1'
      }, {
        title: 'Example 2',
        inline: 'span',
        classes: 'example2'
      }, {
        title: 'Table styles'
      }, {
        title: 'Table row 1',
        selector: 'tr',
        classes: 'tablerow1'
      }]
    });

  }
  if ($("#long_description").length > 0) {
    tinymce.init({
      selector: "textarea#long_description",
      height: 200,
	   forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
            @this.set('long_description', editor.getContent());
            });
        },
      plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
      style_formats: [{
        title: 'Bold text',
        inline: 'b'
      }, {
        title: 'Red text',
        inline: 'span',
        styles: {
          color: '#ff0000'
        }
      }, {
        title: 'Red header',
        block: 'h1',
        styles: {
          color: '#ff0000'
        }
      }, {
        title: 'Example 1',
        inline: 'span',
        classes: 'example1'
      }, {
        title: 'Example 2',
        inline: 'span',
        classes: 'example2'
      }, {
        title: 'Table styles'
      }, {
        title: 'Table row 1',
        selector: 'tr',
        classes: 'tablerow1'
      }]
    });

  }


  if ($("#key_word").length > 0) {
    tinymce.init({
      selector: "textarea#key_word",
      height: 200,
	   forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
            @this.set('key_word', editor.getContent());
            });
        },
      plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
      style_formats: [{
        title: 'Bold text',
        inline: 'b'
      }, {
        title: 'Red text',
        inline: 'span',
        styles: {
          color: '#ff0000'
        }
      }, {
        title: 'Red header',
        block: 'h1',
        styles: {
          color: '#ff0000'
        }
      }, {
        title: 'Example 1',
        inline: 'span',
        classes: 'example1'
      }, {
        title: 'Example 2',
        inline: 'span',
        classes: 'example2'
      }, {
        title: 'Table styles'
      }, {
        title: 'Table row 1',
        selector: 'tr',
        classes: 'tablerow1'
      }]
    });

  }

  $('.summernote').summernote({
    height: 300,
    // set editor height
    minHeight: null,
    // set minimum height of editor
    maxHeight: null,
    // set maximum height of editor
    focus: true // set focus to editable area after initializing summernote

  });
});
</script>

@endpush

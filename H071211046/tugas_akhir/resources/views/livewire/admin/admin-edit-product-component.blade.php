<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                EditProduct
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.products') }}" class="btn btn-success pull-right"> All Products </a>
                            </div>
                        </div>
                    </div>
                        <div class="panel-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }} </div>
                            @endif
                            <form class="form-horizontal" wire:submit.prevent="updateProduct">
                                {{-- @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif --}}
                                <div class="form-group">
                                    <label class="col-md-4 control-label"> Product Name </label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="product name" name="name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"> Product Slug </label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="product slug" class="form-control input-md"wire:model="slug" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"> Short Description </label>
                                    <div class="col-md-4">
                                        <textarea class="form-control" placeholder="short description" wire:model="short_description"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"> Description </label>
                                    <div class="col-md-4">
                                        <textarea class="form-control" placeholder=" description" wire:model="description"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"> Regular Price</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="regular price" class="form-control input-md" wire:model="regular_price" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"> Sale Price </label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="sale price" class="form-control input-md" wire:model="sale_price" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"> Stock  </label>
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="stock_status">
                                            <option value="instock"> InStock</option>
                                            <option value="outofstock"> Out of Stock</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"> Featured  </label>
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="featured">
                                            <option value="0"> No </option>
                                            <option value="1"> Yes </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"> Quantity </label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="quantity" class="form-control input-md"wire:model="quantity" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"> Product Image </label>
                                    <div class="col-md-4">
                                        <input type="file" placeholder="image" class="input-file" wire:model="newimage" />
                                        @if($newimage)
                                            <img src="{{ $newimage->temporaryUrl() }}"width="120" />
                                        @else
                                        <img src="{{ asset('assets/images/products') }}/{{ $image }}" width="120" />
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"> Category  </label>
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="category_id">
                                            <option value=""> Select Category </option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"> Confirmation </label>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary"> Update </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

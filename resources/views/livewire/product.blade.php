<div>
    <x-flash />
    @if(!$showForm)
    <div class="card mt-2">
        <div class="card-header">
            <h5 class="pull-left pt-2">Products</h5>
            <a href="javascript:void(0);" wire:click="addProduct()" class="btn btn-primary pull-right"><i class="bi bi-plus"></i> Add product</a>
            <div class="clear"></div>
        </div>
        <div id="tableExample">
            <div class="table-responsive scrollbar">
                <table class="table mb-0 data-table fs-10 tableToExport">
                    <thead class="bg-200">
                        <tr>
                            <th class="text-900 sort text-nowrap">Category name</th>
                            <th class="text-900 sort text-nowrap">Product name</th>
                            <th class="text-900 sort text-nowrap">Slug</th>
                            <th class="text-900 sort text-nowrap">Status</th>
                            <th class="text-900 sort text-nowrap noExl">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->category->cat_name }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>
                                {!! status_badge($product->status) !!}
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="badge bg-info rounded rounded-circle" style="padding-top: 7px; padding-bottom: 7px;"
                                    wire:click="edit({{ $product->product_id }})">
                                    <i class="bi bi-pencil fs-9"></i>
                                </a>

                                <a href="javascript:void(0)" class="badge bg-danger rounded rounded-circle" style="padding-top: 7px; padding-bottom: 7px;"
                                    wire:click="delete({{ $product->product_id }})"
                                    onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">
                                    <i class="bi bi-trash fs-9"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center justify-content-center filter-loader" style="display: none">
                    <div class="spinner-border text-danger" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                {{--<div class="pagination-wrapper">
                    {{ $business->appends(request()->all())->links('pagination::bootstrap-5') }}
            </div>--}}
        </div>
    </div>
    @endif
    @if($showForm)
    <div class="card mt-2">
        <div class="card-header bg-300">
            <div class="ms-auto pull-right mr-2">
                <a href="javascript:void(0);" wire:click="cancel()" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Back</a>
            </div>
            <h5 class="card-title pt-2">{{ $isEdit ? 'Edit product' : 'Add product' }}</h5>
            <div class="clear"></div>
        </div>
        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Category Name <span class="text-danger">*</span></label>
                        <select class="form-control"
                            wire:model="category_id">
                            <option value="">Select</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->cat_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Product Name <span class="text-danger">*</span></label>
                        <input type="text"
                            class="form-control"
                            wire:model="product_name">
                        @error('product_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Thumbnail Image</label>
                        <input type="file" wire:model.live="thumbnail" class="form-control">
                        @if ($thumbnail)
                        <div class="mt-2">
                            <strong>Preview:</strong><br>
                            <img src="{{ $thumbnail->temporaryUrl() }}" width="120">
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Gallery Images</label>
                        <input type="file" wire:model.live="gallery" multiple class="form-control">
                        @if ($gallery)
                        <strong>Preview:</strong><br>
                        <div class="mt-2 d-flex gap-2">
                            @foreach ($gallery as $img)
                            <img src="{{ $img->temporaryUrl() }}" width="80">
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" wire:model="description"></textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update' : 'Save' }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endif
</div>
</div>
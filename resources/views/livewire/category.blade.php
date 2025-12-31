<div>
    @if(!$showForm)
    <div class="card mt-2">
        <div class="card-header">
            <h5 class="pull-left pt-2">Category List</h5>
            <a href="javascript:void(0);" wire:click="addCategory()" class="btn btn-primary pull-right"><i class="bi bi-plus"></i> Add Category</a>
            <div class="clear"></div>
        </div>
        <div id="tableExample">
            <div class="table-responsive scrollbar">
                <table class="table mb-0 data-table fs-10 tableToExport">
                    <thead class="bg-200">
                        <tr>
                            <th class="text-900 sort text-nowrap">Category name</th>
                            <th class="text-900 sort text-nowrap">Slug</th>
                            <th class="text-900 sort text-nowrap">Status</th>
                            <th class="text-900 sort text-nowrap noExl">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->cat_name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                {!! status_badge($category->status) !!}
                            </td>
                            <td>
                                <a class="badge bg-info rounded rounded-circle" style="padding-top: 7px; padding-bottom: 7px;"
                                    wire:click="edit({{ $category->category_id }})">
                                    <i class="bi bi-pencil fs-9"></i>
                                </a>

                                <a class="badge bg-danger rounded rounded-circle" style="padding-top: 7px; padding-bottom: 7px;"
                                    wire:click="delete({{ $category->category_id }})"
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
                <a href="javascript:void(0);" wire:click="cancel" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Back</a>
            </div>
            <h5 class="card-title pt-2">{{ $isEdit ? 'Edit Category' : 'Add Category' }}</h5>
            <div class="clear"></div>
        </div>
        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Category Name <span class="text-danger">*</span></label>
                        <input type="text"
                            class="form-control"
                            wire:model="cat_name">
                        @error('cat_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Status <span class="text-danger">*</span></label>
                        <select class="form-control"
                            wire:model="status">
                            <option value="">Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
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
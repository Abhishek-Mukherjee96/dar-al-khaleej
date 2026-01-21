@extends('admin.layouts.main')
@section('content')
<x-flash />
<div class="card mt-2">
    <div class="card-header bg-300">
        <div class="ms-auto pull-right mr-2">
            <a href="{{route('blogs')}}" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Back</a>
        </div>
        <h5 class="card-title pt-2">Add Blog</h5>
        <div class="clear"></div>
    </div>
    <form action="{{route('add_blog_action')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Image <span class="text-danger">*</span></label>
                    <input type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" id="description"></textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script>
    tinymce.init({
        selector: '#description',
        plugins: 'lists link image table code help wordcount',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link image | alignleft aligncenter alignright alignjustify | table | code',
        menubar: false,
        branding: false,
        height: 200
    });
</script>
@endsection
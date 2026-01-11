@extends('admin.layouts.main')
@section('content')
<x-flash />
<div class="card mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-300">
                    <h5 class="card-title">Why Choose Us</h5>
                </div>
                <form action="{{ route('why_choose_us_edit_action') }}" method="POST" id="business_form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Title 1</label>
                                    <input type="text"
                                        class="form-control"
                                        name="title_1"
                                        value="{{ $why_choose->title_1 }}"
                                        id="title_1">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="">
                                    <label class="form-label">Image 1</label>
                                    <input type="file"
                                        class="form-control"
                                        name="img_1"
                                        value="{{ $why_choose->img_1 }}"
                                        id="img_1">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Description 1</label>
                                    <textarea class="form-control" name="desc_1" id="desc_1">{!! $why_choose->desc_1 !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Title 2</label>
                                    <input type="text"
                                        class="form-control"
                                        name="title_2"
                                        value="{{ $why_choose->title_2 }}"
                                        id="title_2">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="">
                                    <label class="form-label">Image 2</label>
                                    <input type="file"
                                        class="form-control"
                                        name="img_2"
                                        value="{{ $why_choose->img_2 }}"
                                        id="img_2">
                                </div>
                            </div>
                            <div class="col-md-22 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Description 2</label>
                                    <textarea class="form-control" name="desc_2" id="desc_2">{!! $why_choose->desc_2 !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    tinymce.init({
        selector: '#desc_1, #desc_2',
        plugins: 'lists link image table code help wordcount',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link image | alignleft aligncenter alignright alignjustify | table | code',
        menubar: false,
        branding: false,
        height: 200
    });
</script>
@endsection
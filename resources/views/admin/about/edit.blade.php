@extends('admin.layouts.main')
@section('content')
<x-flash />
<div class="card mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-300">
                    <h5 class="card-title">About section</h5>
                </div>
                <form action="{{ route('about_edit_action') }}" method="POST" id="business_form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label">About heading</label>
                                    <input type="text"
                                        class="form-control"
                                        name="about_heading"
                                        value="{{ $about->about_heading }}"
                                        id="about_heading">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label">About image</label>
                                    <input type="file"
                                        class="form-control"
                                        name="about_img"
                                        value="{{ $about->about_img }}"
                                        id="about_img">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label">About description</label>
                                    <textarea class="form-control" name="about_desc" id="about_desc">{!! $about->about_desc !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Mission heading</label>
                                    <input type="text" class="form-control" name="mission_heading" id="mission_heading" value="{{$about->mission_heading}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Mission image</label>
                                    <input type="file"
                                        class="form-control"
                                        name="mission_img"
                                        value="{{ $about->mission_img }}"
                                        id="mission_img">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Mission description</label>
                                    <textarea class="form-control" name="mission_desc" id="mission_desc">{!! $about->mission_desc !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Vision heading</label>
                                    <input type="text" class="form-control" name="vision_heading" id="vision_heading" value="{{$about->vision_heading}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Vision image</label>
                                    <input type="file"
                                        class="form-control"
                                        name="vision_img"
                                        value="{{ $about->vision_img }}"
                                        id="vision_img">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Vision description</label>
                                    <textarea class="form-control" name="vision_desc" id="vision_desc">{!! $about->vision_desc !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Founder heading</label>
                                    <input type="text" class="form-control" name="founder_heading" id="founder_heading" value="{{$about->founder_heading}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Founder image</label>
                                    <input type="file"
                                        class="form-control"
                                        name="founder_img"
                                        value="{{ $about->founder_img }}"
                                        id="founder_img">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Founder description</label>
                                    <textarea class="form-control" name="founder_desc" id="founder_desc">{!! $about->founder_desc !!}</textarea>
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
            selector: '#about_desc, #mission_desc, #vision_desc, #founder_desc',
            plugins: 'lists link image table code help wordcount',
            toolbar: 'undo redo | bold italic underline | bullist numlist | link image | alignleft aligncenter alignright alignjustify | table | code',
            menubar: false,
            branding: false,
            height: 200
        });
</script>
@endsection
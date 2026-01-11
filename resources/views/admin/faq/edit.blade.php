@extends('admin.layouts.main')
@section('content')
<x-flash />
<div class="card mt-2">
    <div class="card-header bg-300">
        <div class="ms-auto pull-right mr-2">
            <a href="{{route('faq_list')}}" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Back</a>
        </div>
        <h5 class="card-title pt-2">Add Category</h5>
        <div class="clear"></div>
    </div>
    <form action="{{route('update_faq_action',$faq->faq_id)}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Question <span class="text-danger">*</span></label>
                    <input type="text" value="{{$faq->question}}" name="question" class="form-control">
                    @error('question')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="">Select</option>
                        <option value="1" {{ $faq->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $faq->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label>Answer <span class="text-danger">*</span></label>
                    <textarea name="answer" class="form-control" id="answer">{{$faq->answer}}</textarea>
                    @error('answer')
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
        selector: '#answer',
        plugins: 'lists link image table code help wordcount',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link image | alignleft aligncenter alignright alignjustify | table | code',
        menubar: false,
        branding: false,
        height: 200
    });
</script>
@endsection
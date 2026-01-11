@extends('frontend.layouts.app')
@section('title', 'FAQ')
@section('content')
<section class="bannerInnerWrap">
    <div class="bannerInner">
        <img src="frontend/assets/images/inner-banner.jpg" alt="">
        <div class="desc">
            <div class="container">
                <div class="text">
                    <h1>FAQ</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="faq-section">
    <div class="container">
        <div class="ttl">
            <h2 class="siteTtl">Have a Questions</h2>
        </div>
        <div class="accordion accordion-flush" id="accordionExample">
            @foreach($faqs as $index => $faq)
            <div class="accordion-item">

                <h2 class="accordion-header" id="heading{{ $index }}">
                    <button
                        class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $index }}"
                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                        aria-controls="collapse{{ $index }}">
                        <h5 class="mb-0">{{ $faq->question }}</h5>
                    </button>
                </h2>

                <div
                    id="collapse{{ $index }}"
                    class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                    aria-labelledby="heading{{ $index }}"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
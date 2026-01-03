@extends('frontend.layouts.app')
@section('title', 'Contact Us')
@section('content')
<section class="bannerInnerWrap">
    <div class="bannerInner">
        <img src="frontend/assets/images/inner-banner.jpg" alt="">
        <div class="desc">
            <div class="container">
                <div class="text">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-page-sec">
    <div class="cus-container">
        <div class="row">
            <div class="col-md-4">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fas fa-map-marked"></i>
                        </div>
                        <div class="contact-info-text">
                            <h2>address</h2>
                            <span>Dubai, United Arab Emirates Al Quoz Industrial Area 3, Warehouse 12</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-info-text">
                            <h2>E-mail</h2>
                            <a href="mailto:support@darkhaleej.com"><span>support@darkhaleej.com</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="contact-info-text">
                            <h2>Phone Number</h2>
                            <a href="tel:+971 50 123 4567"><span>+971 50 123 4567</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="contact-page-form" method="post">
                    <h2>Get in Touch</h2>
                    <form action="contact-mail.php" method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single-input-field">
                                    <input type="text" placeholder="Your Name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single-input-field">
                                    <input type="email" placeholder="E-mail" name="email" required="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single-input-field">
                                    <input type="text" placeholder="Phone Number" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single-input-field">
                                    <input type="text" placeholder="Subject" name="subject" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="single-input-field">
                                    <textarea placeholder="Write Your Message" name="message" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="contBtn">Send Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-page-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109741.02912911311!2d76.69348873658222!3d30.73506264436677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fed0be66ec96b%3A0xa5ff67f9527319fe!2sChandigarh!5e0!3m2!1sen!2sin!4v1553497921355" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
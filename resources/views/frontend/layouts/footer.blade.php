<footer class="footer">
    <div class="cus-container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="ft-logo">
                    <a href="#">
                        <img src="{{asset('frontend/assets/images/footer-logo.png')}}" alt="">
                    </a>
                </div>
                <div class="specialBox">
                    <ul>
                        <li>
                            <a href="#">
                                <img src="{{asset('frontend/assets/images/facebook.png')}}" alt="">
                            </a>
                        </li>
                        <li><a href="#"><img src="{{asset('frontend/assets/images/instagram.png')}}" alt=""></a></li>
                        <li><a href="#"><img src="{{asset('frontend/assets/images/twitter.png')}}" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-md-5 col-sm-12">
                <div class="ftBoxWarp">
                    <div class="ftBox">
                        <h3 class="ftTtl">Helpful Links</h3>
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('about_us')}}">About</a></li>
                            <li><a href="{{route('products')}}">Products</a></li>
                            <li><a href="#">Why Choose Us</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="{{route('contact_us')}}">Contact us</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                    <div class="ftBox">
                        <h3 class="ftTtl">Categories</h3>
                        <ul>
                            @foreach($footerCategories as $category)
                            <li>
                                <a href="{{ route('products') }}?category={{ $category->slug }}">
                                    {{ $category->cat_name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="ftBox">
                        <h3 class="ftTtl">Contact Info</h3>
                        <div class="conBox">
                            <div class="icon">
                                <img src="frontend/assets/images/mail-icon.png" alt="">
                            </div>
                            <div class="text">
                                <a href="mailto:support@darkhaleej.com">support@darkhaleej.com</a>
                            </div>
                        </div>
                        <div class="conBox">
                            <div class="icon">
                                <img src="frontend/assets/images/phone-icon.png" alt="">
                            </div>
                            <div class="text">
                                <a href="tel:+971 50 123 4567">+971 50 123 4567</a>
                            </div>
                        </div>
                        <div class="conBox">
                            <div class="icon">
                                <img src="frontend/assets/images/address-icon.png" alt="">
                            </div>
                            <div class="text">
                                <p>Dubai, United Arab Emirates</p>
                                <span>Al Quoz Industrial Area 3, Warehouse 12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="ftBox">
                    <h3 class="ftTtl">Sign Up Now</h3>
                    <div class="newsletterBox">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="btnBox">
                            <button type="submit" class="btn">sign up now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyrightSec">
            <p>© 2025 DAR AL KHALEEJ. All rights reserved.</p>
            <ul>
                <li><a href="#">privacy policy</a></li>
                <li><a href="#">terms and conditions</a></li>
            </ul>
        </div>
    </div>
</footer>
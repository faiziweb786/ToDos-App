{{--  <div class="footer_header">
    <div class="site_container">
        <div class="footer_header_inner">
            <div class="footer_header_col">
                <a href="" class="rounded">
                    @if ($logo = \App\Models\Logo::first())
                        <img class="img-fluid rounded" src="{{ asset('storage/logo/' . $logo->image) }}"
                            width="100px" height="100px" alt="Photo">
                    @endif
                </a>
                <p>A new way to make the payments easy, reliable and secure.</p>
            </div>
            <div class="footer_header_col">
                <h3>Usefull Links</h3>
                <ul>
                    <li>
                        <a href="">Content</a>
                    </li>
                    <li>
                        <a href="">How it Works</a>
                    </li>
                    <li>
                        <a href="">Create</a>
                    </li>
                    <li>
                        <a href="">Explore</a>
                    </li>
                    <li>
                        <a href="">Terms & Services</a>
                    </li>
                </ul>
            </div>
            <div class="footer_header_col">
                <h3>Community</h3>
                <ul>
                    <li>
                        <a href="">Help Center</a>
                    </li>
                    <li>
                        <a href="">Partners</a>
                    </li>
                    <li>
                        <a href="">Suggestions</a>
                    </li>
                    <li>
                        <a href="">Blog</a>
                    </li>
                    <li>
                        <a href="">Newsletters</a>
                    </li>
                </ul>
            </div>
            <div class="footer_header_col">
                <h3>Partner</h3>
                <ul>
                    <li>
                        <a href="">Our Partner</a>
                    </li>
                    <li>
                        <a href="">Become a Partner</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer_reference">
            <div class="footer_reference_text">
                <p>© 2023 . All Rights Reserved.Povered By Zalluq</p>
            </div>
            <div class="footer_social_icon">
                <a href=""><i class="fa-brands fa-instagram"
                        style="color: #ffffff; font-size: 24px;"></i></a>
                <a href=""><i class="fa-brands fa-facebook"
                        style="color: #ffffff;font-size: 24px;"></i></a>
                <a href=""><i class="fa-brands fa-twitter"
                        style="color: #ffffff;font-size: 24px;"></i></a>
                <a href=""><i class="fa-brands fa-linkedin"
                        style="color: #ffffff;font-size: 24px;"></i></a>
            </div>
        </div>
    </div>
</div>  --}}


<div class="footer">
    <div class="site_container">
        <div class="row">
            <div class="col-md-3">
                <a href="" class="rounded">
                    @if ($logo = \App\Models\Logo::first())
                        <img class="img-fluid rounded" src="{{ asset('storage/logo/' . $logo->image) }}"
                            width="120px" height="120px" alt="Photo">
                    @endif
                </a>
                <p>A new way to make the payments easy, reliable and secure.</p>
            </div>
            <div class="col-md-3">
                <h2>Useful Links</h2>
                <a href="{{ route('home') }}">home</a>
                <a href="{{ route('services') }}">Services</a>
                <a href="#">Our Team</a>
                <a href="{{ route('contact-us') }}">Contact Us</a>
                <a href="{{ route('about-us') }}">About Us</a>
            </div>
            <div class="col-md-3">
                <h2>Contact</h2>
                <p>
                    Office#9,First Floor, National Business Center, Murree Road Rawalpindi.
                </p>
                <p>info@zalluq.com</p>
                <p>+92-301-8001635</p>
            </div>
            <div class="col-md-3">
                <h2>Sign Up</h2>
                <p>Keep me up to date with content, updates, and offers from Phlox</p>
                <a href="{{ route('register') }}" class="btn">sign up</a>
            </div>
        </div>

        <div class="row pt-5 mt-5">
            <div class="col-md-10">
                <p>
                    © 2023 . All Rights Reserved.Povered By Zalluq
                </p>
                <div class="icon">
                    <a href="">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-pinterest-p"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
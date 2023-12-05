


<div class="footer">
    <div class="site_container">
        <div class="row">
            <div class="col-md-3">
                <a href="" class="rounded">
                    <?php if($logo = \App\Models\Logo::first()): ?>
                        <img class="img-fluid rounded" src="<?php echo e(asset('storage/logo/' . $logo->image)); ?>"
                            width="120px" height="120px" alt="Photo">
                    <?php endif; ?>
                </a>
                <p>A new way to make the payments easy, reliable and secure.</p>
            </div>
            <div class="col-md-3">
                <h2>Useful Links</h2>
                <a href="<?php echo e(route('home')); ?>">home</a>
                <a href="<?php echo e(route('services')); ?>">Services</a>
                <a href="#">Our Team</a>
                <a href="<?php echo e(route('contact-us')); ?>">Contact Us</a>
                <a href="<?php echo e(route('about-us')); ?>">About Us</a>
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
                <a href="<?php echo e(route('register')); ?>" class="btn">sign up</a>
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
</div><?php /**PATH D:\project\login_registration\resources\views/user/partial/footer.blade.php ENDPATH**/ ?>
<div id="contact" class="container-fluid gray-bg d-flex align-items-center">
    <div class="row" style="width: 100%">
        <div class="col-md-6">
            <div class="white-box-auto">
                <h1 class="primary text-center">@lang('Say HELLO to me!')</h1>
                <form class="" action="" method="POST">
                    <div class="input-group input-group-seamless dg-input mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <input type="text" name="sender_email" id="sender_email" class="form-control py-3" placeholder="@lang('Your Email Address')">
                    </div>
                    <div class="input-group input-group-seamless dg-input mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <input type="text" name="sender_name" id="sender_name" class="form-control py-3" placeholder="@lang('Your Full Name')">
                    </div>
                    <div class="input-group input-group-seamless dg-input mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text top">
                                <i class="fas fa-comment-alt"></i>
                            </div>
                        </div>
                        <textarea class="form-control" rows="5" name="msg" id="msg" placeholder="@lang('Your Message')"></textarea>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn main-button px-5" >@lang('Send')</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 text-center part-2">
            <h1 class="primary mt-3">@lang('Get me on socials')</h1>
            <div class="row social-row">
                @foreach($user->socials as $social)
                <div class="col-4 py-2 mx-0 px-0 d-flex justify-content-center">
                    <div class="social"><a href="{{$social->url}}"><i class="{{$social->icon}}"></i></a></div>
                </div>
                @endforeach
            </div>
            <p class="copyright">Copyright &copy; {{date('Y')}} &bull; Website.com</p>
        </div>
    </div>
</div>
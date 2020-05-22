<div id="contact" class="container-fluid gray-bg d-flex align-items-center">
    <div class="row" style="width: 100%">
        <div class="col-md-6">
            <div class="white-box-auto">
                <h1 class="primary text-center">@lang('Say HELLO to me!')</h1>
                <form id="contact-form" action="{{route('contact')}}" method="POST">
                    <div class="input-group input-group-seamless dg-input mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <input type="text" name="sender_email" id="sender_email" class="form-control py-3" placeholder="@lang('Your Email Address')" required>
                    </div>
                    <div class="input-group input-group-seamless dg-input mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <input type="text" name="sender_name" id="sender_name" class="form-control py-3" placeholder="@lang('Your Full Name')" required>
                    </div>
                    <div class="input-group input-group-seamless dg-input mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text top">
                                <i class="fas fa-comment-alt"></i>
                            </div>
                        </div>
                        <textarea class="form-control" rows="5" name="sender_msg" id="sender_msg" placeholder="@lang('Your Message')" required></textarea>
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

@section('scripts')
    @parent 
    <script>
        $(()=>{
            $('#contact-form').submit(function(e){
                e.preventDefault();
                let btn = $('#contact-form button');
                let data = {
                    _token : '{{csrf_token()}}',
                    email : $('#sender_email').val(),
                    name : $('#sender_name').val(),
                    message : $('#sender_msg').val(),
                }
                btn.html('<i class="fas fa-spinner fa-spin"></i> Sending...');
                btn.prop('disabled',true);
                $.post("{{route('contact')}}",data,function(r){
                    console.log(r);
                    if(r.success) {
                        btn.html('<i class="fas fa-check"></i> Sent!');
                        $('#contact-form').trigger('reset');
                    } else {
                        btn.prop('disabled',false);
                        btn.html('Send');
                        if(r.email) {
                            $('#sender_email').addClass('is-invalid');
                        } else if(r.name) {
                            $('#sender_name').addClass('is-invalid');
                        } else {
                            $('#sender_msg').addClass('is-invalid');
                        }
                    }
                });
            });
            $('#contact-form input, #contact-form textarea').keydown(function(){
                $(this).removeClass('is-invalid');
            });
        });
    </script>
@stop
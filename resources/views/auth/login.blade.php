@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 my-5 log-card">
            <img src="/images/login-banner.png" class="log-img" style="width: 100%;" alt="">
        </div>
        <div class="col-md-6 my-5 ">
            <div class="card my-5 border log-card">
                

                <div class="card-body">
                    <h3 class="font-weight-bold mb-3">{{ __('Login') }}</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div id="phone-input"> 
                            <div class="form-group" >
                                <label for="phone" >{{ __('Mobile Number') }}</label>

                                <div>
                                    <input id="phone" placeholder="Enter your phone number" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group  mb-0">
                                <div >
                                    <button type="button" onclick="sendOTP()" class="btn btn-block btn-primary">
                                        {{ __('Send OTP') }}
                                    </button>    
                                </div>
                            </div>

                        </div>

                        <div class="d-none" id="otp-input">
                            <div class="form-group" >
                                <div id="alertMessage" class="alert alert-success">OTP Sent your phone.</div>
                                <div class="alert alert-danger d-none" id="error"></div>
                                <label for="otp" >{{ __('Enter OTP') }}</label>

                                <div >
                                    <input id="otp" type="otp" class="form-control @error('otp') is-invalid @enderror" name="otp" value="{{ old('otp') }}" required autocomplete="off" autofocus>

                                    @error('otp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                              
                            </div>

                        
                        
                            <div class="form-group  mb-0">
                                <div >
                                    <button type="button" id="verify-btn" onclick="verifyOTP()" class="btn btn-block btn-primary">
                                        {{ __('Verify OTP') }}
                                    </button>    
                                </div>
                            </div>

                            <div class="form-group mt-2 mb-0">
                                <div >
                                    <button type="button" onclick="resendOTP()" class="btn btn-block btn-warning">
                                        {{ __('Resend OTP') }}
                                    </button>    
                                </div>
                            </div>
                        </div>
                        <p class="mt-2">While using the application, I agree to the <a target="_blank" href="/terms">Terms &amp; Conditions</a> and <a href="/privacy-policy" target="_blank">Privacy Policy</a>.</p>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('js')

<script>
    function sendOTP()
    {
        $('#phone-input').toggleClass('d-none');
      
        axios.post('/send-otp', {phone: $('#phone').val()})
                .then(res => {
                    console.log(res.data);
                }).catch(err => {
                console.log(err)
            })

        $('#otp-input').toggleClass('d-none');
    }

    function resendOTP()
    {
        
        axios.post('/resend-otp')
                .then(res => {
                    console.log(res.data);
                }).catch(err => {
                console.log(err)
            })

        $('#alertMessage').toggleClass('OTP Resent to your phone.');
    }

    function verifyOTP()
    {
        $('#verify-btn').html('Verifying...');
        $('#verify-btn').toggleClass('disabled');
        axios.post('/verify-otp', {otp: $('#otp').val()})
                .then(res => {
                    console.log(res.data);
                    $('#verify-btn').html('Redirecting..');
                    window.location = '/home';
                }).catch(err => {
                $('#error').html(err.response.data.message);
                $('#error').toggleClass('d-none');    
                console.log(err)
                $('#verify-btn').html('Verify OTP');
                $('#verify-btn').toggleClass('disabled');
            })
    }
</script>

@endpush

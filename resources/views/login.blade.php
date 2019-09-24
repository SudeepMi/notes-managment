@extends('layouts.app')
@section('title','Login')
@section('css')
<style>
    {{--  .invalid-feedback{
        display:block;
    }  --}}
</style>
@endsection
@section('content')
<div id="login">
        <aside>

            <figure>
                    <a href="/"><img src="{{ asset('assets/img/logo.png') }}" width="149" height="42" data-retina="true" alt=""></a>
                </figure>
                <div id="portlet">
                    @isset($error)
                    {{ dd($error) }}
                    @endisset
                    <form class="login-form" action="{{ route('student.loginpage') }}" method="POST">
                        @csrf

                <div class="form-group">
                    <span class="input @error('email') is-invalid @enderror">
                    <input class="input_field " type="email" autocomplete="off" name="email" required>
                        <label class="input_label">
                        <span class="input__label-content">Your email</span>
                    </label>
                    </span>

                    <span class="input">
                    <input class="input_field  @error('password') is-invalid @enderror" type="password" autocomplete="new-password" name="password">
                        <label class="input_label">
                        <span class="input__label-content">Your password</span>
                    </label>
                    </span>
                    @error('email')
                    <span class="invalid-message">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <small><a href="#0">Forgot password?</a></small>
                </div>
                <button class="btn_1 rounded full-width add_top_60" type="submit">Login to Udema</button>
                <div class="text-center add_top_10">New to Udema? <strong><a href="#" class="register-btn">Sign up!</a></strong></div>
            </form>
            <form method="POST" action="" class="register-form">
                @csrf
                <select class="form-control" id="actionsforreg">
                        <option selected>You Are ?</option>
                        <option value="{{ route('student.registers') }}">Student</option>
                        <option value="{{ route('teacher.registers') }}">Teacher</option>

                    </select>
                <div class="form-group">
                        <span class="input">
                        <input class="input_field @error('firstname') is-invalid @enderror" type="text" name="firstname">
                            <label class="input_label">
                            <span class="input__label-content">Your Name</span>
                        </label>
                        @error('firstname')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </span>

                        <span class="input">
                        <input class="input_field  @error('lastname') is-invalid @enderror" type="text" name="lastname">
                            <label class="input_label">
                            <span class="input__label-content">Your Last Name</span>
                        </label>
                        @error('lastname')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </span>

                        <span class="input">
                        <input class="input_field  @error('email') is-invalid @enderror" type="email" name="email">
                            <label class="input_label">
                            <span class="input__label-content">Your Email</span>
                        </label>
                        @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </span>

                        <span class="input">
                        <input class="input_field  @error('phone') is-invalid @enderror" type="tel" name="phone">
                            <label class="input_label">
                            <span class="input__label-content">Conact</span>
                        </label>
                        @error('contact')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </span>

                        <span class="input">
                                <input class="input_field  @error('address') is-invalid @enderror" type="text" name="address">
                                    <label class="input_label">
                                    <span class="input__label-content">Address</span>
                                </label>
                                @error('address')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </span>

                        <span class="input">
                        <input class="input_field  @error('password') is-invalid @enderror" type="password" id="password1">
                            <label class="input_label">
                            <span class="input__label-content">Your password</span>
                        </label>
                        @error('password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </span>

                        <span class="input">
                        <input class="input_field  @error('password') is-invalid @enderror" type="password" id="password2" name="password">
                            <label class="input_label">
                            <span class="input__label-content">Confirm password</span>
                        </label>
                        @error('password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </span>

                        <div id="pass-info" class="clearfix"></div>
                    </div>
                    <button class="btn_1 rounded full-width add_top_30" type="submit">Register to Udema</button>
                    <div class="text-center add_top_10">Already have an acccount? <strong><a href="#" class="login-btn">Sign In</a></strong></div>
                </form>
                </div>
            <div class="copy">© 2017 Udema</div>
        </aside>
    </div>
    </div>
    <!-- /login -->

    @endsection
    @section('js')
        <!-- SPECIFIC SCRIPTS -->
        <script src="{{ asset('assets/js/jquery.cookiebar.js') }}"></script>
        <script>
            $(document).ready(function() {
                'use strict';
                $.cookieBar({
                    fixed: true
                });
            });
        </script>
        <script>
          $(document).ready( function(){
              $(".register-form").hide();
              $(".header").remove();
               $("footer").remove();
          })
          {{--  $(document).on('change','#actions', function(e){
              e.preventDefault()
              var val = $(this).val()
              $('.login-form').attr('action',val);
              console.log(val)
          })  --}}
          {{--  $(document).on('change','#actionsforreg', function(e){
            e.preventDefault()
            var val = $(this).val()
            $('.register-form').attr('action',val);
            console.log(val)
        })  --}}
          $(document).on('click','.register-btn', function(){
            $(".register-form").show();
            $(".login-form").hide();
          })

          $(document).on('click','.login-btn', function(){
            $(".login-form").show();
            $(".register-form").hide();
          })
          $(document).on('submit','.register-form', function(e){
             var a = $("#password1").val()
             var b = $("#password2").val()
             if(a != b){
                toastr.error('Password Doesnt match !', 'Sorry !')
                e.preventDefault()
             }else{
                 $(this).submit()
             }
          })
          {{--  $(document).on('submit','.login-form', function(e){
            e.preventDefault()
              var action = $("select[name='roles']").val()
              console.log(action)

              if (typeof action !== undefined){
                  $(this).submit()
             }else{
                toastr.error('Select your role !', 'Sorry !')
             }
          })  --}}

        </script>

    @endsection


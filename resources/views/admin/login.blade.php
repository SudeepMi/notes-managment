@extends('admin.layout.app')
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
                    <h4>Admin Area</h4>
                    <form class="login-form" action="{{ route('cpannel.admin.login') }}" method="POST">
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
                <button class="btn_1 rounded full-width add_top_60" type="submit">Login</button>
               </form>
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
              $(".header").remove();
               $("footer").remove();
          })
        </script>

    @endsection


@extends('layouts.app')
@section('title','Home')
@section('content')

	<main>
            <section id="hero_in" class="contacts">
                <div class="wrapper">
                    <div class="container">
                        <h1 class="fadeInUp"><span></span>Contact Udema</h1>
                    </div>
                </div>
            </section>
            <!--/hero_in-->

            <div class="contact_info">
                <div class="container">
                    <ul class="clearfix">
                        <li>
                            <i class="pe-7s-map-marker"></i>
                            <h4>Address</h4>
                            <span>{{ $contact->address }}<br>California - US.</span>
                        </li>
                        <li>
                            <i class="pe-7s-mail-open-file"></i>
                            <h4>Email address</h4>
                            <span>{{ $contact->email }}<br><small>Monday to Friday 9am - 7pm</small></span>

                        </li>
                        <li>
                            <i class="pe-7s-phone"></i>
                            <h4>Contacts info</h4>
                            <span>{{ $contact->phone }}<br><small>Monday to Friday 9am - 7pm</small></span>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/contact_info-->

            <div class="bg_color_1">
                <div class="container margin_120_95">
                    <div class="row justify-content-between">
                        <div class="col-lg-5">
                            <div class="map_contact">
                            </div>
                            <!-- /map -->
                        </div>
                        <div class="col-lg-6">
                            <h4>Send a message</h4>
                            <p>Ex quem dicta delicata usu, zril vocibus maiestatis in qui.</p>
                            <div id="message-contact"></div>
                            <form  class="contactform" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="input">
                                            <input class="input_field" type="text" id="name" name="name">
                                            <label class="input_label">
                                                <span class="input__label-content">Your Name</span>
                                            </label>
                                        </span>
                                        <span class="invalid-feedback">
                                            <strong class="error-name"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="input">
                                            <input class="input_field" type="email" id="email" name="email">
                                            <label class="input_label">
                                                <span class="input__label-content">Your email</span>
                                            </label>
                                        </span>
                                        <span class="invalid-feedback">
                                            <strong class="error-email"></strong>
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="input">
                                            <input class="input_field" type="text" id="phone" name="phone">
                                            <label class="input_label">
                                                <span class="input__label-content">Your telephone</span>
                                            </label>
                                        </span>
                                        <span class="invalid-feedback">
                                            <strong class="error-phone"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- /row -->
                                <span class="input">
                                        <textarea class="input_field" id="message" name="message" style="height:150px;"></textarea>
                                        <label class="input_label">
                                            <span class="input__label-content">Your message</span>
                                        </label>
                                </span>
                                <span class="invalid-feedback"></span>

                                <span class="input">
                                        <input class="input_field" type="text" id="verify">
                                        <label class="input_label">
                                        <span class="input__label-content">Are you human? <span class="first"></span> + <span class="second"></span> =</span>
                                        </label>
                                </span>
                                <span class="invalid-feedback"></span>

                                <p class="add_top_30"><input type="submit" value="Submit" class="btn_1 rounded" id="submit-contact"></p>
                            </form>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /bg_color_1 -->
        </main>
@endsection

@section('js')
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript" src="{{ asset('assets/js/mapmarker.jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/mapmarker_func.jquery.js') }}"></script>
<script>
    var first = 3;
    var second = 3;
    $(document).ready( function(){
        $('.first').html(first);
        $('.second').html(second);
    });

    $(document).on('submit','.contactform', function(e){
        e.preventDefault();

        var data= getData($(this))
        $.ajax({
            method:"POST",
            url: '/contact',
            data: { data: data}
        }).done( function(response){
            if(response.status != 'failed'){
                Swal.fire(
                    { title: 'Updated!',
                    text: response.successMsg,
                    type: response.status,
                    toast:true,
                    showConfirmButton: false,
                    timer: 1500,
                })
                location.reload()
                } else {
                Swal.fire(
                    {  title: 'Sorry!',
                text: response.successMsg,
                type:  response.status,
                toast:true,
                confirmButton: false,})

            }

        }).fail( function(response){
            Swal.fire({
                        title: 'Sorry!',
                        text: 'failed',
                        type:  'error',
                        toast:true,
                        showConfirmButton: false,
                        timer: 1000,
                    })
            getErrors(response)

    })
})
</script>
@endsection

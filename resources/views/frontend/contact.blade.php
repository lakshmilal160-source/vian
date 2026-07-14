@extends('frontend.layouts.app')

@section('title', 'Contact Us')

@section('content')
    @include('frontend.partials.banner', [
        'title' => $contents['welcome_note']->title ?? '',
        'description' => $contents['welcome_note']->description ?? '',
        'image'=>$contents['welcome_note']->image ?? ''
    ])
    <section class="contact-section cnt">
        <div class="container contact-container">


            <div class="contact-info-boxes">
                <div class="info-box">
                    <div class="info-icon">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                    <div class="info-text">
                        <h3>Call Me</h3>
                        <p>+{{ $globalSetting->countryCode1->phonecode }} {{ $globalSetting->phone_1 }}</p>
                    </div>
                </div>
                <div class="info-box">
                    <div class="info-icon">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="info-text">
                        <h3>E-mail</h3>
                        <p>{{ $globalSetting->email }}</p>
                    </div>
                </div>
                <div class="info-box">
                    <div class="info-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="info-text">
                        <h3>Location</h3>
                        <p>{{ $globalSetting->address }},{{ $globalSetting->street }}<br>{{ $globalSetting->state }},{{ $globalSetting->country }}
                            {{ $globalSetting->pin_code }}</p>
                    </div>
                </div>
            </div>

            <div class="get-in-touch">
                <h2>Get In Touch</h2>
                <form class="contact-form" id="contactForm">

                    @csrf

                    <div class="form-row">

                        <input type="text" name="name" placeholder="Name" required>

                        <input type="email" name="email" placeholder="Email" required>

                    </div>

                    <div class="form-row">

                        <input type="text" name="phone" placeholder="Phone Number" class="full-width">

                    </div>

                    <div class="form-row">

                        <textarea name="message" placeholder="Message" required class="full-width"></textarea>

                    </div>
                    <div class="form-row">
                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}">
                        </div>
                    </div>
                    <div class="form-submit">

                        <button type="submit" class="btn-send">

                            Send Message

                        </button>

                    </div>

                    {{-- RESPONSE --}}
                    <div id="contactResponse" class="mt-3"></div>

                </form>
            </div>
        </div>

        <button class="contact-slider-arrow"><i class="fa-solid fa-angle-right"></i></button>
    </section>

    <!-- Map Section -->
    <section class="contact-map-section">
        <div class="container">
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2820.4865864501576!2d103.74973591657195!3d1.3132222260479114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1abdfc955555%3A0x2776bd7fd30d15fc!2sWestech%20Building!5e0!3m2!1sen!2sin!4v1752553297962!5m2!1sen!2sin"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        $(document).ready(function() {

            $('#contactForm').submit(function(e) {
                e.preventDefault();

                let form = $(this);

                let submitBtn = form.find('button[type="submit"]');

                submitBtn.prop('disabled', true).text('Sending...');

                $.ajax({

                    url: "{{ route('contact.store') }}",
                    type: "POST",
                    data: form.serialize(),

                    success: function(response) {

                        $('#contactResponse').html(`
                    <div class="alert alert-success">
                        ${response.message}
                    </div>
                `);

                        form.trigger('reset');
                        grecaptcha.reset();

                    },

                    error: function(xhr) {

                        let errors = xhr.responseJSON.errors;

                        let errorHtml = '<div class="alert alert-danger"><ul>';

                        $.each(errors, function(key, value) {

                            errorHtml += `<li>${value[0]}</li>`;

                        });

                        errorHtml += '</ul></div>';

                        $('#contactResponse').html(errorHtml);

                    },

                    complete: function() {

                        submitBtn.prop('disabled', false).text('Send Message');

                    }

                });

            });

        });
    </script>
@endpush

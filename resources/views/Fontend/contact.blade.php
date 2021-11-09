@extends('Fontend.main')
@section('content')

<!-- Contact Us section -->
<div class="wrapper_class">
    <div class="container">
        <h1>Contact Us</h1>
        <section class="contact">
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3773.215428735671!2d72.82220731491338!3d18.96609098715106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7ce6b26d2c6a9%3A0xb91bbc35e1cc3975!2sShuklaji%20Street!5e0!3m2!1sen!2sin!4v1625569687897!5m2!1sen!2sin"
                    width="100%" height="450" style="border:0;" allowfullscreen=""
                    loading="lazy"></iframe>
            </div>
            <div class="info">
                <div>
                    <h2 style="font-size: 18px">Contact Info <i class="fas fa-chevron-right"></i></h2>
                    <p><span><i class="fas fa-map-marker-alt"></i></span>Shukalaji street, Gala No A-7,
                        Dawood
                        Compound</p>
                    <p><span>
                            <i class="fas fa-phone-volume"></i>
                        </span>+91 8291001070</p>
                    <p><span>
                            <i class="fas fa-envelope"></i>
                        </span> mail@example.com</p>
                </div>
                <div>
                    <h2 style="font-size: 18px">Open hours <i class="far fa-calendar-alt"></i></h2>
                    <p>
                        <span>
                            <i class="fas fa-clock"></i>
                        </span>
                        Monday-Friday: 9:00-17:00
                    </p>
                    <p>
                        <span>
                            <i class="fas fa-clock"></i>
                        </span>
                        Saturday: 10:00-15:00
                    </p>
                    <p>
                        <span>
                            <i class="fas fa-times-circle"></i>
                        </span>
                        Sunday: Closed
                    </p>
                    <p>
                        <span>
                            <i class="fas fa-clock"></i>
                        </span> Holidays: 10:00-13:00
                    </p>
                </div>
            </div>
    </div>
</div>
    @endsection

@extends('layouts.main')
@section('title', 'Hertfordshire Law Society - Contact Us')
{{--@section('foot','<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>--}}
{{--<script type="text/javascript" src="js/contact-us.js"></script>')--}}
@section('main')
<h1>Contact Us</h1>
<div class="contact-us">
        <section class="contact-form-section">
          <div class="labels">
            <label for="name">Name</label>
            <label for="email">Email address</label>
            <label for="phone-number">Phone no.</label>
            <label for="job-title">Job title</label>
            <label for="comment">Anything else?</label>
          </div>

          <form id="contact-us" method="post" novalidate>
            {!! csrf_field() !!}
            <input name="name" type="text" id="name" autofocus>
            <input name="email" type="email" id="email">
            <input name="phone-number" type="tel" id="phone-number">
            <input name="job-title" type="text" id="job-title">
            <textarea name="comment" id="comment"></textarea>
            <input type="submit" class="submit-button" value="Submit">
          </form>

          <address>
            <p class="title">Prefer to email us directly?</p>
            <p>Send us an email to <br>
              <a href="mailto:admin@hertlawsoc.co.uk">admin@hertlawsoc.co.uk</a>
            </p>
            <p>We'll get back to you as soon as we can!</p>
          </address>
        </section>

        <h3>Know who you want to contact?</h3>
        <section class="contacts">
          <address class="team-member">
            <img src="img/portrait.png" alt="">
            <div>
              <h5>Amanda Thurston</h5>
              <h5>President</h5>
              <p><a href="mailto:president@hertslawsoc.org.uk">
                  president@hertslawsoc.org.uk</a></p>
            </div>
          </address>
          <address class="team-member">
            <img src="img/portrait.png" alt="">
            <div>
              <h5>Dennis Sheridan</h5>
              <h5>Vice President</h5>
              <p><a href="mailto:vice-president@hertslawsoc.org.uk">
                  vice-president@hertslawsoc.org.uk</a></p>
            </div>
          </address>
        </section>
      </div>
@endsection

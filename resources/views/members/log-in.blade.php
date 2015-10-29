@extends('layouts.main')
@section('title', 'Hertfordshire Law Society - Member Area')
@section('main')
			<h1>Member Area</h1>
      <div class="member-area_log-in">
        <h4>Log In</h4>
        <p>Already a member? Use you details to log in below.</p>
        <div class="labels">
          <label for="email">Email address</label>
          <label for="password">Password</label>
        </div>
        <form>
          <input type="text" name="email" id="email">
          <input type="password" name="password" id="password ">
        </form>
        <form action="member-area" method="POST">
          <input type="submit" class="submit-button">
        </form>
      </div>
         
      <div class="member-area_sign-up">
        <h4>Not a member?</h4>
        <p>Send us your details using our online form to start the
applicaion process.</p>
        <a href="become-a-member">View membership benefits></a>
        <a class="become-a-member-button"><span>Become a member</span></a>
      </div>

@endsection

@extends('layouts.header', ['title' => 'Contact Us', 'pageCss' => 'assets/css/contactUs.css'])

@section('content')
<div class="container mt-5">
    <h1 class="text-center" style="color: blue; font-weight: bold;">Contact Us</h1><br>
    <p class="text-center mb-5">We’d love to hear from you! Whether you have a question, feedback, or need assistance, our team is here to help.</p>
    <div class="contact-image mb-5">
        <img src=  {{asset('assets/img/contact.svg') }}  alt="Centered Image">
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h2>Email Us</h2>
            <p>For general inquiries and support: <a href="mailto:support@KnoWell.com">support@KnoWell.com</a></p>
            <p>For business and partnership opportunities: <a href="mailto:business@KnoWell.com">business@KnoWell.com</a></p>
            
            <h2>Call Us</h2>
            <p>Customer Support: <a href="tel:+940000000000">+94 000 000 0000</a></p>
            <p>Business Inquiries: <a href="tel:+940000000000">+94 000 000 0000</a></p>
            
            <h2>Visit Us</h2>
            <p>KnoWell Headquarters<br>Faculty Of Technological Studies, Uva Wellassa University Of Sri Lanka</p>
            
            <h2>Follow Us</h2>
            <p>Stay connected and follow us on social media:</p>
            <ul>
              <li>Facebook: <a href="https://facebook.com/KnoWell">facebook.com/KnoWell</a></li>
              <li>Twitter: <a href="https://twitter.com/KnoWell">twitter.com/KnoWell</a></li>
              <li>LinkedIn: <a href="https://linkedin.com/company/KnoWell">linkedin.com/company/KnoWell</a></li>
            </ul>
          </div>
          


        <div class="col-lg-6">
            <h2>Contact Form</h2>
          <div class="contact-form-border">
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                @auth
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                @endauth
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"  required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"  required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </form>
        </div>
        </div>  
    </div>

    <p class="text-center mt-5">We look forward to connecting with you!</p>
</div>


@endsection

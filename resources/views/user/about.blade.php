@extends('layouts.header',['title' => 'About Us', 'pageCss' => 'assets/css/about.css'])
   

@section('content')
    <section class="container mt-5 mb-5">
        <h1 class="text-main-color fw-bold text-center mb-4">About Us</h1>
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <p class="fs-5">
                    Welcome to KnoWell! KnoWell is your go-to destination for sharing and discovering knowledge. Our mission is to 
                    create a vibrant community where people from all walks of life can ask questions, share insights, and learn from one another.
                </p>
                <h2 class="text-main-color fw-bold mt-4">Our Vision</h2>
                <p class="fs-5">
                    We envision a world where knowledge is freely shared, accessible, and seeks to foster personal and collective growth. 
                    We aim to foster a culture of continuous learning and innovation by bringing together people with different skills and experiences.
                </p>
                <h2 class="text-main-color fw-bold mt-4">Our Values</h2>
                <ul class="list-unstyled fs-5">
                    <li><strong>Community:</strong> We believe in the power of community and the collective wisdom it brings.</li>
                    <li><strong>Respect:</strong> Every member deserves respect and a voice, fostering a safe and inclusive environment.</li>
                    <li><strong>Integrity:</strong> We value honesty and transparency in all interactions and content shared.</li>
                    <li><strong>Curiosity:</strong> Encouraging inquisitiveness and a desire to learn is at the heart of what we do.</li>
                </ul>
                <p class="fs-5 mt-4">
                    Join us in our mission to democratize knowledge and empower individuals through shared learning. Whether you're here to ask questions, share your expertise, or simply explore, we’re glad to have you as part of our community.
                </p>
            </div>
        </div>
    </section>

    @endsection


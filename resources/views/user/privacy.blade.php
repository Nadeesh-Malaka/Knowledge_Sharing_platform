@extends('layouts.header',['title' => 'Privacy', 'pageCss' => 'assets/css/privacy.css'])
   

@section('content')



<div class="container mt-5 content-container">
  <h2 class="content-header" style="color:blue; text-align: center;">Privacy Policy</h2>
  <p style="text-align: center;">Your privacy is important to us. This Privacy Policy explains how KnoWell collects, uses, and protects your personal information.</p>
  <img src= {{asset('assets/img/slider-img.png') }}  alt="pic" class="img-fluid" style="display: block; margin: 0 auto;">
  <h3 class="content-header" style="text-align: center;">Information We Collect</h3>
  <ul>
    <li>Personal Information: When you create an account, we collect information such as your name, email address, and any other details you provide.</li>
    <li>Usage Data: We collect information on how you use our platform, including the pages you visit, the questions you ask, and the answers you provide.</li>
    <li>Cookies: We use cookies to enhance your experience on our site. Cookies help us understand your preferences and improve our services.</li>
  </ul>

  <h3 class="content-header" style="text-align: center;">How We Use Your Information</h3>
  <ul>
    <li>To provide and improve our services</li>
    <li>To communicate with you about updates, promotions, and support</li>
    <li>To analyze usage patterns and improve user experience</li>
    <li>To protect the security and integrity of our platform</li>
  </ul>

  <h3 class="content-header" style="text-align: center;">Sharing Your Information</h3>
  <p>We do not sell, trade, or otherwise transfer your personal information to outside parties without your consent, except as required by law or to trusted third parties who assist us in operating our platform.</p>

  <h3 class="content-header" style="text-align: center;">Your Choices</h3>
  <p>You can update your account information and preferences at any time by logging into your account. You can also opt-out of receiving promotional emails by following the unsubscribe instructions in each email.</p>

  <h3 class="content-header" style="text-align: center;">Security</h3>
  <p>We implement a variety of security measures to safeguard your personal information. However, no method of transmission over the internet is 100% secure, so we cannot guarantee absolute security.</p>

  <h3 class="content-header" style="text-align: center;">Changes to This Policy</h3>
  <p>We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new policy on our website and updating the “Effective Date” at the top.</p>

  <h3 class="content-header" style="text-align: center;">Contact Us</h3>
  <p>If you have any questions about this Privacy Policy, please contact us at <a href="mailto:privacy@knowell.com">privacy@knowell.com</a>.</p>
</div>




  @endsection

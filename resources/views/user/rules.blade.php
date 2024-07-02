@extends('layouts.header',['title' => 'Community Guidelines', 'pageCss' => 'assets/css/rules.css'])
   

@section('content')


<div class="guidelines-container mt-5">
    <div class="guidelines-content">
      <h2 class="guidelines-header">Community Guidelines</h2>
      <img class="guidelines-image" src= {{asset('assets/img/experience-img.jpg') }}  style="display: block; margin: 0 auto;" alt="Guidelines Image">
      <br><p style="text-align: center;">Welcome to KnoWell! To ensure a positive experience for everyone, we ask that you follow these community guidelines:</p>
      <br><ul class="guidelines-list">
        <li><span><b>Be Respectful:</b></span> <br>Treat all members with respect. Personal attacks, harassment, and hate speech will not be tolerated.</li>
        <li><span><b>Stay On Topic:</b></span> <br>Keep your questions and answers relevant to the topic at hand. Off-topic posts may be removed.</li>
        <li><span><b>No Spam:</b></span> <br>Avoid posting spam or irrelevant links. Promotional content should be clearly labeled and relevant to the discussion.</li>
        <li><span><b>Cite Sources:</b></span><br> When sharing information, provide sources to back up your claims. This helps maintain the credibility and accuracy of our platform.</li>
        <li><span><b>Protect Privacy:</b></span> <br>Do not share personal information about yourself or others. Respect privacy and confidentiality at all times.</li>
        <li><span><b>Report Violations:</b></span> <br>If you see something that violates these guidelines, please report it to our moderation team.</li>
      </ul>
      <div class="guidelines-footer">
        By following these guidelines, you help us maintain a welcoming and productive environment for all members.<br>Thank you for being a part of the KnoWell community!
      </div>
    </div>
  </div>

 


    @endsection
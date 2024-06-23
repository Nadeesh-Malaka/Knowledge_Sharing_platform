@extends('layouts.header',['title' => 'Community Guidelines', 'pageCss' => 'assets/css/rules.css'])
   

@section('content')

<div class="guidelines-container">
        <h2 class="guidelines-header">Community Guidelines</h2>
        <p>Welcome to KnoWell! To ensure a positive experience for everyone, we ask that you follow these community guidelines:</p>
        <ul class="guidelines-list">
            <li><span>1. Be Respectful:</span> Treat all members with respect. Personal attacks, harassment, and hate speech will not be tolerated.</li>
            <li><span>2. Stay On Topic:</span> Keep your questions and answers relevant to the topic at hand. Off-topic posts may be removed.</li>
            <li><span>3. No Spam:</span> Avoid posting spam or irrelevant links. Promotional content should be clearly labeled and relevant to the discussion.</li>
            <li><span>4. Cite Sources:</span> When sharing information, provide sources to back up your claims. This helps maintain the credibility and accuracy of our platform.</li>
            <li><span>5. Protect Privacy:</span> Do not share personal information about yourself or others. Respect privacy and confidentiality at all times.</li>
            <li><span>6. Report Violations:</span> If you see something that violates these guidelines, please report it to our moderation team.</li>
        </ul>
        <div class="guidelines-footer">
            By following these guidelines, you help us maintain a welcoming and productive environment for all members.<br>Thank you for being a part of KnoWell!
        </div>
    </div>


    @endsection
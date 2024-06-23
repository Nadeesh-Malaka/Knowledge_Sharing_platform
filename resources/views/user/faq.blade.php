@extends('layouts.header',['title' => 'faq', 'pageCss' => 'assets/css/faq.css'])
   

@section('content')


    <div class="faq-container">
      <h1 class="faq-header">Frequently Asked Questions</h1>
      
      <div class="faq-item">
        <p class="faq-question">Q: What is KnoWell?</p>
        <p class="faq-answer">A: KnoWell is a knowledge sharing platform where users can ask questions, provide answers, and share insights on various topics.</p>
      </div>

      <div class="faq-item">
        <p class="faq-question">Q: How do I ask a question?</p>
        <p class="faq-answer">A: Simply click on the "Ask a Question" button, enter your question in the provided field, and submit. Be sure to categorize your question appropriately to reach the right audience.</p>
      </div>

      <div class="faq-item">
        <p class="faq-question">Q: How can I answer a question?</p>
        <p class="faq-answer">A: Browse through the questions and click on any that you are interested in. Click "Answer" to provide your response.</p>
      </div>

      <div class="faq-item">
        <p class="faq-question">Q: Are there any guidelines for posting?</p>
        <p class="faq-answer">A: Yes, please refer to our Community Guidelines page for detailed information on posting rules and etiquette.</p>
      </div>

      <div class="faq-item">
        <p class="faq-question">Q: Can I edit or delete my posts?</p>
        <p class="faq-answer">A: Yes, you can edit or delete your own posts by navigating to the post and selecting the appropriate option.</p>
      </div>

      <div class="faq-item">
        <p class="faq-question">Q: How do I report inappropriate content?</p>
        <p class="faq-answer">A: If you come across content that violates our guidelines, click the "Report" button to notify our moderation team.</p>
      </div>

      <div class="faq-item">
        <p class="faq-question">Q: What if I have more questions?</p>
        <p class="faq-answer">A: If you have any other questions, feel free to contact us or check out our Help Center for more information.</p>
      </div>
    </div>
    @endsection
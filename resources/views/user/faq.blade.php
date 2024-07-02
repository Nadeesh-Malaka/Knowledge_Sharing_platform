@extends('layouts.header',['title' => 'faq', 'pageCss' => 'assets/css/faq.css'])
   

@section('content')



<div class="wrapper mt-5 pt-5">
  <h1 class="faq-header" style="color: blue;font-weight: 900;">Frequently Asked Questions</h1>
  <div class="contact-image mb-4">
      <img src={{asset('assets/img/faq.webp') }} alt="FAQ Image" width="400px" height="100px">
  </div>
  <div class="faq">
      <button class="accordion">
          What is KnoWell?
          <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
          <p>
              KnoWell is a knowledge sharing platform where users can ask questions, provide answers, and share insights on various topics.
          </p>
      </div>
  </div>
  <div class="faq">
      <button class="accordion">
          How do I ask a question?
          <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
          <p>
              Simply click on the "Ask a Question" button, enter your question in the provided field, and submit. Be sure to categorize your question appropriately to reach the right audience.
          </p>
      </div>
  </div>
  <div class="faq">
      <button class="accordion">
          How can I answer a question?
          <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
          <p>
              Browse through the questions and click on any that you are interested in. Click "Answer" to provide your response.
          </p>
      </div>
  </div>
  <div class="faq">
      <button class="accordion">
          Are there any guidelines for posting?
          <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
          <p>
              Yes, please refer to our Community Guidelines page for detailed information on posting rules and etiquette.
          </p>
      </div>
  </div>
  <div class="faq">
      <button class="accordion">
          Can I edit or delete my posts?
          <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
          <p>
              Yes, you can edit or delete your own posts by navigating to the post and selecting the appropriate option.
          </p>
      </div>
  </div>
  <div class="faq">
      <button class="accordion">
          How do I report inappropriate content?
          <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
          <p>
              If you come across content that violates our guidelines, click the "Report" button to notify our moderation team.
          </p>
      </div>
  </div>
</div>

<script>
  var acc = document.getElementsByClassName("accordion");
  var i;
  for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function () {
          this.classList.toggle("active");
          this.parentElement.classList.toggle("active");
          var pannel = this.nextElementSibling;
          if (pannel.style.display === "block") {
              pannel.style.display = "none";
          } else {
              pannel.style.display = "block";
          }
      });
  }
</script>
    @endsection
@extends("Front/layout")
@section('container')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="{{asset('front_asset/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>                   
          <li class="active">Account</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Register</h4>
                  <form id="registeration_form" class="aa-login-form" method="post">
                    @csrf
                    <label for="">Username<span>*</span></label>
                    <input type="text" name="username" placeholder="Enter Yours Name">
                    <div style="display:none; color:red; margin-top:-14px " id="username_error"></div>
                    <label for="">Phone<span>*</span></label>
                    <input type="text" name="phone" placeholder="Enter Yours Phone Number">
                    <div style="display:none; color:red; margin-top:-14px " id="phone_error"></div>
                    <label for="">Username or Email address<span>*</span></label>
                    <input type="text" name="email" placeholder="Username or email">
                    <div style="display:none; color:red; margin-top:-14px " id="email_error"></div>
                    <label for="">Password<span>*</span></label>
                    <input type="password" name="password" placeholder="Password">
                    <div style="display:none; color:red; margin-top:-14px " id="password_error"></div>
                    <button type="submit" class="aa-browse-btn">Register</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
@endsection
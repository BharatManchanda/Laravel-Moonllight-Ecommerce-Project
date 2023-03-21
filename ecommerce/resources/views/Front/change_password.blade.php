@extends("Front/layout")
@section('container')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="{{asset('front_asset/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Change Password</h2>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>                   
          <li class="active">Change Password</li>
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
                 <h4>Change Password</h4>
                  <form id="update_password" class="aa-login-form" method="post">
                    @csrf
                    <label for="">Enter New Password<span>*</span></label>
                    <input type="text" name="new_pass" placeholder="Enter Yours Name">
                    <div style="color:red; margin-top:-14px " id="new_pass_error"></div>
                    <label for="">Re-enter Your Password<span>*</span></label>
                    <input type="text" name="re_new_pass" placeholder="Re-enter Your Password">
                    <div style="color:red; margin-top:-14px " id="re_new_pass_error"></div>
                    <button type="submit" class="aa-browse-btn">Update Password</button>                    
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
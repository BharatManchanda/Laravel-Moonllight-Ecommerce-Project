/** 
  * Template Name: Daily Shop
  * Version: 1.0  
  * Template Scripts
  * Author: MarkUps
  * Author URI: http://www.markups.io/

  Custom JS
  

  1. CARTBOX
  2. TOOLTIP
  3. PRODUCT VIEW SLIDER 
  4. POPULAR PRODUCT SLIDER (SLICK SLIDER) 
  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  6. LATEST PRODUCT SLIDER (SLICK SLIDER) 
  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  9. PRICE SLIDER  (noUiSlider SLIDER)
  10. SCROLL TOP BUTTON
  11. PRELOADER
  12. GRID AND LIST LAYOUT CHANGER 
  13. RELATED ITEM SLIDER (SLICK SLIDER)

  
**/

jQuery(function($){


  /* ----------------------------------------------------------- */
  /*  1. CARTBOX 
  /* ----------------------------------------------------------- */
    
     jQuery(".aa-cartbox").hover(function(){
      jQuery(this).find(".aa-cartbox-summary").fadeIn(500);
    }
      ,function(){
          jQuery(this).find(".aa-cartbox-summary").fadeOut(500);
      }
     );   
  
  /* ----------------------------------------------------------- */
  /*  2. TOOLTIP
  /* ----------------------------------------------------------- */    
    jQuery('[data-toggle="tooltip"]').tooltip();
    jQuery('[data-toggle2="tooltip"]').tooltip();

  /* ----------------------------------------------------------- */
  /*  3. PRODUCT VIEW SLIDER 
  /* ----------------------------------------------------------- */    

    jQuery('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
        loading_image: 'demo/images/loading.gif'
    });

    jQuery('#demo-1 .simpleLens-big-image').simpleLens({
        loading_image: 'demo/images/loading.gif'
    });

  /* ----------------------------------------------------------- */
  /*  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-popular-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    }); 

  
  /* ----------------------------------------------------------- */
  /*  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-featured-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });
    
  /* ----------------------------------------------------------- */
  /*  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      
    jQuery('.aa-latest-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */     
    
    jQuery('.aa-testimonial-slider').slick({
      dots: true,
      infinite: true,
      arrows: false,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true
    });

  /* ----------------------------------------------------------- */
  /*  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */  

    jQuery('.aa-client-brand-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  9. PRICE SLIDER  (noUiSlider SLIDER)
  /* ----------------------------------------------------------- */        

    jQuery(function(){
      if($('body').is('.productPage')){
        var min=$("#low_price").val();
        var max=$("#high_price").val();
        if(min == ''  &&  max == ''){
          min=0;
          max=5000;
        }
       var skipSlider = document.getElementById('skipstep');
        noUiSlider.create(skipSlider, {
            range: {
                'min': 0,
                '10%': 200,
                '20%': 400,
                '30%': 500,
                '40%': 1000,
                '50%': 1200,
                '60%': 1500,
                '70%': 1800,
                '80%': 2000,
                '90%': 2500,
                'max': 5000
            },
            snap: true,
            connect: true,
            start: [min, max]
        });
        // for value print
        var skipValues = [
          document.getElementById('skip-value-lower'),
          document.getElementById('skip-value-upper')
        ];

        skipSlider.noUiSlider.on('update', function( values, handle ) {
          skipValues[handle].innerHTML = values[handle];
        });
      }
    });


    
  /* ----------------------------------------------------------- */
  /*  10. SCROLL TOP BUTTON
  /* ----------------------------------------------------------- */

  //Check to see if the window is top if not then display button

    jQuery(window).scroll(function(){
      if ($(this).scrollTop() > 300) {
        $('.scrollToTop').fadeIn();
      } else {
        $('.scrollToTop').fadeOut();
      }
    });
     
    //Click event to scroll to top

    jQuery('.scrollToTop').click(function(){
      $('html, body').animate({scrollTop : 0},800);
      return false;
    });
  
  /* ----------------------------------------------------------- */
  /*  11. PRELOADER
  /* ----------------------------------------------------------- */

    jQuery(window).load(function() { // makes sure the whole site is loaded      
      jQuery('#wpf-loader-two').delay(200).fadeOut('slow'); // will fade out      
    })

  /* ----------------------------------------------------------- */
  /*  12. GRID AND LIST LAYOUT CHANGER 
  /* ----------------------------------------------------------- */

  jQuery("#list-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").addClass("list");
  });
  jQuery("#grid-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").removeClass("list");
  });


  /* ----------------------------------------------------------- */
  /*  13. RELATED ITEM SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-related-item-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    }); 
    
});

function pic_change_with_color(img,col){
  $(".simpleLens-big-image-container").html("<a data-lens-image='http://localhost:8000/storage/products/"+img+"' class='simpleLens-lens-image'><img  src='http://localhost:8000/storage/products/"+img+"' class='simpleLens-big-image' width='250px' height='300px'></a>");
  $("#col_id").val(col);
}
function show_color(size){
  $(".hideClass").hide();
  $(".show_"+size).show();
  $(".all_size").css("border","1px solid #ddd");
  $("#show_"+size).css("border","1px solid #000");
  $("#col_id").val('');
  $("#siz_id").val(size);
}
function home_cart(id, size, color){
  $("#col_id").val(color);
  $("#siz_id").val(size);
  $("#qty").val(1);
  $("#pro_id").val(id);
  $("#error_msg").html("");
  var cart_pop="";
  var total=0;
    $.ajax({
      url:"/add_to_cart",
      type:"POST",
      dataType:"JSON",
      data:$("#subForm").serialize(),
      success:function(dat){
        alert(dat.msg);
        $(".aa-cart-notify").html(dat.total_product);
        $.each(dat.data,function(key, val){
          cart_pop+="<li><a class='aa-cartbox-img' href='#'><img src='"+pro_img+"/"+val.image+"' width='150px' height='150px' alt='img'></a><div class='aa-cartbox-info'><h4><a href='#'>"+val.title+"</a></h4><p>"+val.quanity+" x ₹ "+val.price+"</p></div><a class='aa-remove-product' href='#'><span class='fa fa-times'></span></a></li>";
          total=parseInt(total)+parseInt(val.quanity)*parseInt(val.price);
        });
        cart_pop+="<li><span class='aa-cartbox-total-title'>Total</span><span class='aa-cartbox-total-price'>₹ "+total+"</span></li>";
        $("#cart-box-start").html(cart_pop);
      },
      error: function (xhr, status, error) {
        alert(error.responseTextss);
      }
    });
}
function update_quantity(id, size, color,qty, price){
  $("#col_id").val(color);
  $("#siz_id").val(size);
  $("#qty").val($("#qty_"+qty).val());
  $("#pro_id").val(id);
  $("#error_msg").html("");
  var cart_pop="";
  var total=0;
  $.ajax({
    url:"/add_to_cart",
    type:"POST",
    dataType:"JSON",
    data:$("#subForm").serialize(),
    success:function(dat){
      $(".aa-cart-notify").html(dat.total_product);
        $.each(dat.data,function(key, val){
          cart_pop+="<li><a class='aa-cartbox-img' href='#'><img src='"+pro_img+"/"+val.image+"' width='150px' height='150px' alt='img'></a><div class='aa-cartbox-info'><h4><a href='#'>"+val.title+"</a></h4><p>"+val.quanity+" x ₹ "+val.price+"</p></div><a class='aa-remove-product' href='#'><span class='fa fa-times'></span></a></li>";
          total=parseInt(total)+parseInt(val.quanity)*parseInt(val.price);
        });
        cart_pop+="<li><span class='aa-cartbox-total-title'>Total</span><span class='aa-cartbox-total-price'>₹ "+total+"</span></li>";
        $("#cart-box-start").html(cart_pop);
    }
  });
  var tot=$("#qty_"+qty).val()*price;
  $("#total_"+qty).html('₹ '+tot);
}
function delete_pro(id, size, color, qty){
  $("#col_id").val(color);
  $("#siz_id").val(size);
  $("#qty").val(0);
  $("#pro_id").val(id);
  $("#error_msg").html("");
  var cart_pop="";
  var total=0;
  $.ajax({
    url:"/add_to_cart",
    type:"POST",
    dataType:"JSON",
    data:$("#subForm").serialize(),
    success:function(dat){
      alert(dat.msg);
      $(".aa-cart-notify").html(dat.total_product);
        $.each(dat.data,function(key, val){
          cart_pop+="<li><a class='aa-cartbox-img' href='#'><img src='"+pro_img+"/"+val.image+"' width='150px' height='150px' alt='img'></a><div class='aa-cartbox-info'><h4><a href='#'>"+val.title+"</a></h4><p>"+val.quanity+" x ₹ "+val.price+"</p></div><a class='aa-remove-product' href='#'><span class='fa fa-times'></span></a></li>";
          total=parseInt(total)+parseInt(val.quanity)*parseInt(val.price);
        });
        cart_pop+="<li><span class='aa-cartbox-total-title'>Total</span><span class='aa-cartbox-total-price'>₹ "+total+"</span></li>";
        $("#cart-box-start").html(cart_pop);
    }
  });
  $("#cart_box_"+qty).hide();
}

function add_to_cart(pro_id){
  $("#qty").val($("#quantity").val());
  var color = $("#col_id").val();
  var size = $("#siz_id").val();
  var cart_pop="";
  var total=0;
  if (size=='') {
    $("#error_msg").html("<div class='alert alert-danger'>Please select size....!!</div>");
  }
  else if (color=='') {
    $("#error_msg").html("<div class='alert alert-danger'>Please select color.....!!</div>");
  }
  else{
    $("#error_msg").html("");
      $.ajax({
        url:"/add_to_cart",
        type:"POST",
        dataType:"JSON",
        data:$("#subForm").serialize(),
        success:function(dat){
          alert(dat.msg);
          $(".aa-cart-notify").html(dat.total_product);
        $.each(dat.data,function(key, val){
          cart_pop+="<li><a class='aa-cartbox-img' href='#'><img src='"+pro_img+"/"+val.image+"' width='150px' height='150px' alt='img'></a><div class='aa-cartbox-info'><h4><a href='#'>"+val.title+"</a></h4><p>"+val.quanity+" x ₹ "+val.price+"</p></div><a class='aa-remove-product' href='#'><span class='fa fa-times'></span></a></li>";
          total=parseInt(total)+parseInt(val.quanity)*parseInt(val.price);
        });
        cart_pop+="<li><span class='aa-cartbox-total-title'>Total</span><span class='aa-cartbox-total-price'>₹ "+total+"</span></li>";
        $("#cart-box-start").html(cart_pop);
        }
      });
  }
}

function sory_by_func() {
  $("#sort_function").val($("#sory_by").val());
  $("#filtering").submit();
}
function price_filter_func() {
  $("#low_price").val($("#skip-value-lower").html());
  $("#high_price").val($("#skip-value-upper").html());
  $("#filtering").submit();
}
function color_filter_func(color,type) {
  if (type==1) {
    var new_val=$("#color").val().replace(color+":","");
    $("#color").val(new_val);
  } else {
    var col=$("#color").val();
    $("#color").val(color+":"+col);
  }
  $("#filtering").submit();
}
$("#registeration_form").submit(function(event){
  event.preventDefault();
  $.ajax({
    url:"/register_process",
    type:"POST",
    dataType:"JSON",
    data:$("#registeration_form").serialize(),
    success:function(param) {
    if(param.status == 'error'){
      $.each(param.error,function(key, val) {
        $("#"+key+"_error").text(val);
        $("#"+key+"_error").css("display","block");
      });
    }
    else{
      $("#username_error").css("display","none");
      $("#email_error").css("display","none");
      $("#password_error").css("display","none");
      $("#phone_error").css("display","none");
      $("#registeration_form")[0].reset();
      alert(param.msg);
    }
  }
});
});
$("#login_form").submit(function(event){
  
  $("#alert_error").css("display","none");
  $("#login_password_error").text("");
  $("#login_email_error").text("");
  event.preventDefault();
  $.ajax({
    url: "/login_process",
    type:"post",
    data: $("#login_form").serialize(),
    dataType:"JSON",
    success:function(parms){
      if(parms.status=="Empty"){
        $.each(parms.msg,function(key, val){
          $("#"+key+"_error").text(val);
        });
      }
      else if(parms.status=="Email Failed"){
        $("#alert_error").text(parms.msg);
        $("#alert_error").css("display","block");
      }
      else if(parms.status=="Password Failed"){
        $("#alert_error").text(parms.msg);
        $("#alert_error").css("display","block");
      }
      else if(parms.status=="Not Verify"){
        $("#alert_error").text(parms.msg);
        $("#alert_error").css("display","block");
      }
      else if(parms.status=="Success"){
        alert("Login Successfully...!!");
        window.location.href=window.location.href;
      }
    }
  });

});
$("#login_form2").submit(function(event){
  alert("jhg");
  $("#alert_error2").css("display","none");
  $("#login_password_error2").text("");
  $("#login_email_error2").text("");
  event.preventDefault();
  $.ajax({
    url: "login_process2",
    type:"post",
    data: $("#login_form2").serialize(),
    dataType:"JSON",
    success:function(parms){
      if(parms.status=="Empty"){
        $.each(parms.msg,function(key, val){
          $("#"+key+"_error2").text(val);
        });
      }
      else if(parms.status=="Email Failed"){
        $("#alert_error2").text(parms.msg);
        $("#alert_error2").css("display","block");
      }
      else if(parms.status=="Password Failed"){
        $("#alert_error2").text(parms.msg);
        $("#alert_error2").css("display","block");
      }
      else if(parms.status=="Not Verify"){
        $("#alert_error2").text(parms.msg);
        $("#alert_error2").css("display","block");
      }
      else if(parms.status=="Success"){
        alert("Login Successfully...!!");
        // window.location.href=window.location.href;
      }
    }
  });

});
function show_forget_password(){
  $("#forget_popup").css("display","block");
  $("#login_popup").css("display","none");
}
function login_popup_show(){
  $("#forget_popup").css("display","none");
  $("#login_popup").css("display","block");
}

$("#forget_form").submit(function(event){
  $("#forget_email_error").text("");
  event.preventDefault();
  $.ajax({
    url:"/forget-password",
    type:"POST",
    data: $("#forget_form").serialize(),
    dataType:"JSON",
    success:function(param){
      if(param.status == 'error'){
        $.each(param.msg,function(key, val){
          $("#forget_email_error").text(val);
        });
      }
      else if(param.status == 'error2'){
        $("#forget_email_error").text(param.msg);
      }
      else if(param.status == 'success'){
        alert(param.msg);
      }
    }
  });
});

$("#update_password").submit(function(event){
  $("#new_pass_error").text("");
  $("#re_new_pass_error").text("");
  event.preventDefault();
  $.ajax({
    url:'/update_password',
    type:'post',
    data: $("#update_password").serialize(),
    dataType:"JSON",
    success: function(param){
      if(param.status=='error'){
        $.each(param.msg,function(key, val){
          $("#"+key+"_error").text(val);
          console.log("hi");
        });
      }
      else if(param.status=='error2'){
        $("#re_new_pass_error").text(param.msg);
      }
      else{
        alert(param.msg);
        window.location.href="/";
      }
    }
  });
});


function coupon_code_check(){
  $("#coupon_code_error").text("");
  $("#coupon_code_error").css("display","none");
  var coupon_code = $("#coupon_code").val();
  var token = $("[name='_token']").val();
  var total_price = parseInt($("#original_total_price").text());
  // var total_price = $(".total_price").text();
  if(coupon_code != ''){
    $.ajax({
      url:'coupon_code_check',
      type:'post',
      data:{coupon_code:coupon_code,_token:token},
      dataType:"JSON",
      success:function(param){
        if(param.status == 'error'){
          $("#coupon_code_error").text(param.message);
          $("#coupon_code_error").css("display","block");
        }
        else if(param.status == 'success'){
          alert(param.message);
          $("#coupon_code_applied td").text($("#coupon_code").val());
          $("#coupon_code_applied").show();
          var coupon_amt = total_price - parseInt(param.total_price);
          $("#coupon_discount_amount td").text("₹ "+coupon_amt);
          $("#coupon_discount_amount").show();
          $(".total_price").text("₹ "+param.total_price);
          $(".aa-checkout-coupon").css("display","none");
        }
      }
    });
  }
  else{
    $("#coupon_code_error").text("Please enter coupon code.");
    $("#coupon_code_error").css("display","block");
  }
}

remove_coupon_code = ()=>{
  $("#coupon_code_error").text("");
  $("#coupon_code_error").css("display","none");
  var coupon_code = $("#coupon_code").val("");
  var token = $("[name='_token']").val();
  var total_price = parseInt($("#original_total_price").text());
          $("#coupon_code_applied td").text(coupon_code);
          $("#coupon_code_applied").hide();
          $("#coupon_discount_amount td").text("");
          $("#coupon_discount_amount").hide();
          $(".total_price").text("₹ "+total_price);
          $(".aa-checkout-coupon").css("display","block");
          alert("Coupon Code Removed Successfully");
  }
  $("#order_submit").submit(function(event){
    $("#name_error").text("");
    $("#company_error").text("");
    $("#email_error").text("");
    $("#mobile_error").text("");
    $("#address_error").text("");
    $("#locality_error").text("");
    $("#city_error").text("");
    $("#state_error").text("");
    $("#zip_error").text("");
    event.preventDefault();
    $("#coupon_code_error").text("");
    $("#coupon_code_error").css("display","none");
    $.ajax({
      url:"/order_submit",
      type:"post",
      data:$("#order_submit").serialize(),
      dataType:"JSON",
      success:function(param){
        if(param.status == 'guesterror'){
          $.each(param.error, function(key, val){
            $("#"+key+"_error").text(val);
          });
          $("#email_error").text("Email id  alredy exists. Please Login");
        }
        else if(param.status == 'error'){
          $.each(param.error, function(key, val){
            $("#"+key+"_error").text(val);
          });
        }
        else if(param.status == 'error2'){
          $("#coupon_code_error").text(param.message);
          $("#coupon_code_error").css("display","block");
        }
        else if(param.status == 'error3'){
          alert(param.message);
        }
        else if(param.status == 'success'){
          alert(param.message);
          if(param.redirectTo != ''){
            window.location.href=param.redirectTo;
          }
          else{
            window.location.href="/";
          }
        }
      }
    });
  });

  var select = document.querySelectorAll("#star-rating-review span");
  for(i=0;i<select.length;i++){
    select[i].setval=i+1;
    ['click','mouseover','mouseout'].forEach(function(event){
      select[i].addEventListener(event,ratingShow);
    });

    }

    function ratingShow(event){

      var type = event.type;
      var setval = this.setval;
      select.forEach(function(elem,ind){
        if(type === 'click'){
          if(ind<setval){
            elem.classList.add("orange");
            $("#review-rating").val(setval);
          }
          else{
            elem.classList.remove("orange");
          }
        }
        else if(type === 'mouseover'){
          if(ind<setval){
            elem.classList.add("yellow");
          }
          else{
            elem.classList.remove("yellow");
          }
        }
        else{
            elem.classList.remove("yellow");
        }  




      })



    }

    @include('inc.quick_view')
    @include('inc.quick_view_featured')
    @include('inc.quick_view_popular')

    @include('inc.wish_list')
    @include('inc.wish_list_featured')
    @include('inc.wish_list_popular')


      @include('inc.price_alert')
      @include('inc.price_alert_featured')
      @include('inc.price_alert_popular')

    <script>
     function Submit(form_class,res){
       var form_data=$('.'+form_class).serializeArray();
          var msg="";
          console.log(form_data);
          jQuery.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }
         });
          $.ajax({
          url:"{{ url('/createWishList') }}",
          method:"POST",
          data:form_data,
          beforeSend: function () {
          $('.loader').show();

          $('#submit_btn').attr('disabled',true);
                          },
          success: function(data){
              $('.loader').hide();
                var delay = 3000;
                $('#submit_btn').attr('disabled',false);
                console.log(data);
               if(data.success){
                 $('.'+res).append("<div class='alert alert-success'>"+data.success.success_message+"</div>");
            //  setTimeout((function(){ window.location.reload() }), 3000);
               }else if(data.error){

                $('.'+res).append("<div class='alert alert-danger'>"+data.error.error_message+"</div>");
               }
               else{
              console.log(data);
                jQuery.each(data.errors, function(key, value){
                 msg+='<p>'+value+'</p>';
                });
                  $('.'+res).append("<div class='alert alert-danger'>"+msg+"</div>");
               }
                      },
                      error:function(jqXHR, textStatus, errorThrown){
                    //  $('#overlay1').hide();
                    alert(textStatus);
                    console.log(errorThrown);
                    console.log(jqXHR);

                  $('.loader').hide();
              }
                                  });
          $('#submit_btn').attr('disabled',false);

      }


      function submitPrice(form_class){
        var form_data=$('.'+form_class).serialize();
           var msg="";
           jQuery.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
           $.ajax({
           url:"{{ url('/createPriceAlert') }}",
           method:"POST",
           data:form_data,
           beforeSend: function () {
           $('.loader').show();

           $('#submit_btn').attr('disabled',true);
                           },
           success: function(data){
               $('.loader').hide();
                 var delay = 3000;
                 $('#submit_btn').attr('disabled',false);
                 console.log(data);
                if(data.success){
                  $('.res').append("<div class='alert alert-success'>"+data.success.success_message+"</div>");
               setTimeout((function(){ window.location.reload() }), 3000);
                }else if(data.error){

                 $('.res').append("<div class='alert alert-danger'>"+data.error.error_message+"</div>");
                }
                else{
               console.log(data);
                 jQuery.each(data.errors, function(key, value){
                  msg+='<p>'+value+'</p>';
                 });
                   $('.res').append("<div class='alert alert-danger'>"+msg+"</div>");
                }
                       },
                       error:function(jqXHR, textStatus, errorThrown){
                     //  $('#overlay1').hide();
                     alert(textStatus);
                     console.log(errorThrown);
                     console.log(jqXHR);

                   $('.loader').hide();
               }
                                   });
           $('#submit_btn').attr('disabled',false);

       }


       function compare(product_id){
         var form_data={"product_id":product_id};
            var msg="";
            jQuery.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               }
           });
            $.ajax({
            url:"{{ url('/compare') }}",
            method:"POST",
            data:form_data,
            beforeSend: function () {
            $('#loader').show();
            bootbox.alert({
              size: "large",
              title: "Compare product",
              message:'<div class="res"></div><img id="loader" class="loader" src="admin/assets/images/ripple.gif" />',
              callback: function(){ /* your callback code */ }
            })
                            },
            success: function(data){
                $('#loader').hide();
                  var delay = 3000;
                  $('#submit_btn').attr('disabled',false);
                  console.log(data);
                 if(data.success){
                   $('.res').append("<div class='alert alert-success'>"+data.success.success_message+"</div>");
                setTimeout((function(){ window.location.reload() }), 3000);
                 }else if(data.error){

                  $('.res').append("<div class='alert alert-danger'>"+data.error.error_message+"</div>");
                 }
                 else{
                console.log(data);
                  jQuery.each(data.errors, function(key, value){
                   msg+='<p>'+value+'</p>';
                  });
                    $('.res').append("<div class='alert alert-danger'>"+msg+"</div>");
                 }
                        },
                        error:function(jqXHR, textStatus, errorThrown){
                      //  $('#overlay1').hide();
                      alert(textStatus);
                      console.log(errorThrown);
                      console.log(jqXHR);

                    $('#loader').hide();
                }
                                    });
            $('#submit_btn').attr('disabled',false);

        }
    </script>

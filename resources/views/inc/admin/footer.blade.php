<script>
function showConfirmMessage(title,type,message) {
    swal({
        title:title,
        text:message,
        type:type,
         html: true,
    }, function () {
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
}
</script>

<style>
#loader,loader2{
  display:none;
  width:20px;
}
#loader3{
  display:none;
  width:20px;
}
#loader4{
  display:none;
  width:20px;
}
#movingBar{
  display:none;
}
</style>

<script src="{{ url('admin/assets/js/app.min.js')}}"></script>
<script src="{{ url('admin/assets/js/chart.min.js')}}"></script>
<!--<script src="admin/assets/js/admin.js"></script>-->
<script src="{{ url('admin/assets/js/pages/index.js')}}"></script>
<script src="{{ url('admin/assets/js/pages/charts/jquery-knob.js')}}"></script>
<script src="{{ url('admin/assets/js/pages/sparkline/sparkline-data.js')}}"></script>
<script src="{{ url('admin/assets/js/pages/medias/carousel.js')}}"></script>

 <script src="{{ url('admin/assets/js/table.min.js')}}"></script>
  <script src="{{ url('admin/assets/js/admin.js')}}"></script>
  <script src="{{ url('admin/assets/js/bundles/export-tables/dataTables.buttons.min.js')}}"></script>
      <script src="{{ url('admin/assets/js/bundles/export-tables/buttons.flash.min.js')}}"></script>
  <script src="{{ url('admin/assets/js/bundles/export-tables/jszip.min.js')}}"></script>
  <script src="{{ url('admin/assets/js/bundles/export-tables/pdfmake.min.js')}}"></script>
  <script src="{{ url('admin/assets/js/bundles/export-tables/vfs_fonts.js')}}"></script>
  <script src="{{ url('admin/assets/js/bundles/export-tables/buttons.html5.min.js')}}"></script>
  <script src="{{ url('admin/assets/js/bundles/export-tables/buttons.print.min.js')}}"></script>
  <script src="{{ url('admin/assets/js/pages/apps/support.js')}}"></script>

  <script src="{{ url('admin/assets/js/bundles/lightgallery/dist/js/lightgallery-all.js')}}"></script>
     <!-- Custom Js -->
     <script src="{{ url('admin/assets/js/pages/medias/image-gallery.js') }}"></script>


</body>
</html>

<script>

function DeleteImages(id,url){
   var jdata={"id":id};

    jQuery.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       }
   });
    $.ajax({
    url:"<?php echo url('') ?>/"+url,
    method:"POST",
    data:jdata,
    beforeSend: function () {
  //  $('#loader').show();
      //$('#movingBar').show();
  //  $(btn).attr('disabled',true);
                    },
    success: function(data){
        $('#loader').hide();
          var delay = 3000;
          //$(btn).attr('disabled',false);
          console.log(data);
         if(data.success){
           showConfirmMessage("Success","success",data.success.success_message);
         setTimeout((function(){ window.location.reload() }), 3000);
         }else if(data.error){
        showConfirmMessage("Error","error",data.error.error_message);
         }
         else{
           console.log(data);
                    jQuery.each(data.errors, function(key, value){
                     msg+='<p>'+value+'</p>';
                    });
                    showConfirmMessage("Error","error",msg);
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
    //$(btn).attr('disabled',false);

};

  function Delete(id,btn,url){
     var jdata={"id":id};
    	var msg="";
      jQuery.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
     });
      $.ajax({
      url:"<?php echo url('') ?>/"+url,
      method:"POST",
      data:jdata,
      beforeSend: function () {
      $('#loader').show();
        //$('#movingBar').show();
      $(btn).attr('disabled',true);
                      },
      success: function(data){
        	$('#loader').hide();
            var delay = 3000;
            $(btn).attr('disabled',false);
            console.log(data);
           if(data.success){
						 showConfirmMessage("Success","success",data.success.success_message);
					 setTimeout((function(){ window.location.reload() }), 3000);
					 }else if(data.error){
					showConfirmMessage("Error","error",data.error.error_message);
					 }
					 else{
             console.log(data);
                  		jQuery.each(data.errors, function(key, value){
                  		 msg+='<p>'+value+'</p>';
                  		});
                      showConfirmMessage("Error","error",msg);
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
      $(btn).attr('disabled',false);

  };
</script>

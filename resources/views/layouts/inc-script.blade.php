<script src="{{url('assets/home/js/jquery.js')}}"></script>
<script src="{{url('assets/home/js/moment.js')}}"></script>
<script src="{{url('assets/home/js/bootstrap.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYeBBmgAkyAN_QKjAVOiP_kWZ_eQdadeI&callback=initMap&libraries=places"></script>
<script src="{{url('assets/home/js/owl-carousel.js')}}"></script>
<script src="{{url('assets/home/js/blur-area.js')}}"></script>
<script src="{{url('assets/home/js/icheck.js')}}"></script>
<script src="{{url('assets/home/js/gmap.js')}}"></script>
<script src="{{url('assets/home/js/magnific-popup.js')}}"></script>
<script src="{{url('assets/home/js/ion-range-slider.js')}}"></script>
<script src="{{url('assets/home/js/sticky-kit.js')}}"></script>
<script src="{{url('assets/home/js/smooth-scroll.js')}}"></script>
<script src="{{url('assets/home/js/fotorama.js')}}"></script>
<script src="{{url('assets/home/js/bs-datepicker.js')}}"></script>
<script src="{{url('assets/home/js/typeahead.js')}}"></script>
<script src="{{url('assets/home/js/quantity-selector.js')}}"></script>
<script src="{{url('assets/home/js/countdown.js')}}"></script>
<script src="{{url('assets/home/js/window-scroll-action.js')}}"></script>
<script src="{{url('assets/home/js/fitvid.js')}}"></script>
<script src="{{url('assets/home/js/youtube-bg.js')}}"></script>
<script src="{{url('assets/home/js/custom.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>


<script>
$(document).on('click','#add_sub',function (event) {
  event.preventDefault();
  var form = $('#add_sub_form')[0];
  var formData = new FormData(form);

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
    }
});

var email_sub = document.getElementById("email_sub").value;


if(email_sub == ''){

  swal("กรูณา ป้อนอีเมลให้ถูกต้อง");

}else{

  $.LoadingOverlay("show", {
    background  : "rgba(255, 255, 255, 0.4)",
    image       : "",
    fontawesome : "fa fa-cog fa-spin"
  });


$.ajax({
    url: "{{url('/api/subscribe')}}",
    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
    data: formData,
    processData: false,
    contentType: false,
    cache:false,
    type: 'POST',
    success: function (data) {

    //  console.log(data.data.status)
        if(data.data.status == 200){


          setTimeout(function(){
              $.LoadingOverlay("hide");
          }, 0);

          swal("สำเร็จ!", data.data.msg, "success");

          $("#email_sub").val('');


        }else{



          setTimeout(function(){
              $.LoadingOverlay("hide");
          }, 0);

          swal(data.data.msg);
          $("#email_sub").val('');

        }
    },
    error: function () {

    }
});

}


//  console.log(formData);

});

</script>

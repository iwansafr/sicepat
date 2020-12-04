$(document).ready(function () {
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      alert("perangkat anda tidak mendukung untuk menangkap lokasi anda");
    }
  }

  function showPosition(position) {
    $("form").find(".card-body").append("<label><b>Koordinat Rumah</b> <i class='fa fa-map'></i></label><br>Latitude: " + position.coords.latitude +
      " | Longitude: " + position.coords.longitude + "<input type='hidden' name='longitude' value='" + position.coords.longitude + "'><input type='hidden' name='latitude' value='" + position.coords.latitude + "'>");
  }
  getLocation();

  function readURL(input, a) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        // if(e.total>500000 && isFileImage(input.files[0])){
        // 	var suc = $(a).siblings('input[type="file"]').val('');
        // alert('ukuran file tidak boleh lebih dari 500KB');
        // }else{
        // console.log(e);
        $(a).attr('src', e.target.result);
        // $('#filename').html(e.target.result);
        // }
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
  $(document).on('change', 'input[type="file"]', function () {
    // console.log($(this));
    var a = $(this).siblings('.image_place');
    readURL(this, a);
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        // $('#filename').html(e.target.result);
      };
      reader.readAsDataURL(this.files[0]);
      // setInterval($('#btn_upload').trigger('click'),300);
    }
  });
});
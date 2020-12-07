$(document).ready(function(){
	$('select[name="role"]').on('change',function(){
		let val = $(this).val();
		if(val == 3){
	    $("form").find(".card-body").append(
	    	`<div class="form-group" id="tps_select">
	    		<label>Pilih TPS</label>
	    		<select class="form-control" id="select_tps">

	    		</select>
	    	</div>`
	    );
			$.getJSON('/tps/json',function(result){
				$.each(result,function(i,field){
					$('#select_tps').append(`<option value="${field.id}">${field.desa} - ${field.no}</option>`);
				});
			});
		}else{
			$('#tps_select').remove();
		}
	});
});
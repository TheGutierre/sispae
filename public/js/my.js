$( document ).ready(function() {
	console.log('aeww');
	$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
	    $("#success-alert").slideUp(500);
	}); 
	$("#example1").DataTable({
		"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json"
        }
	});
});
$(function(){
	$('input.checkgroupnesc').click(function(){
		if($(this).is(":checked")){
			$('input.checkgroupnesc').attr('disabled',true);
			$(this).removeAttr('disabled');
		}else{
			$('input.checkgroupnesc').removeAttr('disabled');
		}
	});
});
$(function(){
	$('input.checkgroupemail').click(function(){
		if($(this).is(":checked")){
			$('input.checkgroupemail').attr('disabled',true);
			$(this).removeAttr('disabled');
		}else{
			$('input.checkgroupemail').removeAttr('disabled');
		}
	});
});
$(function(){
	$('input.faxS').click(function(){
		if($(this).is(":checked")){
			$('input.fax').attr('disabled',true);
			$(this).removeAttr('disabled');
		}else{
			$('input.fax').removeAttr('disabled');
		}
	});
});
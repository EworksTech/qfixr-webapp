$(document).ready(function(){
	$('input[type=checkbox]').on('click', function(){
		alert($(this).attr('name') +' '+ $(this).attr('value'));
	});
	$('select.onChange').on('change', function(){
		alert($(this).attr('id') +' '+ $(this).val());
	});
});
$('#submit_rep').click(function() {
	//grab the values
  var new_rep = $('#text_area').val();
  var rep_id =$ ('#reply_id').val();
  
  //show loading text
  $('#save_statuss').text("loading......!!!");

  //perform http request
  $.post('forum_rep_edit.php',{ new_rep: new_rep,rep_id: rep_id}, function(data){
  	$('#save_statuss').text(data);
  });
  
});
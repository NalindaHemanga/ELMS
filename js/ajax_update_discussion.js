$('#submit_discussion').click(function() {
	//grab the values
  var edited_post = $('#post_des').val();
  var post_id =$ ('#postedit_id').val();
  
  //show loading text
  $('#save_statuss').text("loading......!!!");

  //perform http request
  $.post('forum_post_edit.php',{ edited_post: edited_post,post_id: post_id}, function(data){
  	$('#save_statuss').text(data);
  });
  
});
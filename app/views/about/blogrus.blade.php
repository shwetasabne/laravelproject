<div id = "div-question-form">
<form id="question" class="form-horizontal" url="about/virus">
  <fieldset>
    <legend>Query</legend>
    <div class="form-group">
      <label for="inputAnswer" class="col-lg-2 control-label">Secret Key</label>
      <div id="div-input-answer" class="col-lg-5">
        <input name="inputAnswer" type="text" size="35" class="form-control" id="inputAnswer" placeholder="Answer">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button id="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
</div>

<div id = "div-answer-form" style="display: none;">
<form id = "answer" class="form-horizontal" method="POST" url="about/blogs">
  <fieldset>
    <legend>Blogs</legend>
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="form-group">
      <label for="inputName" class="col-lg-2 control-label">Name</label>
      <div id="div-input-name" class="col-lg-5">
        <input name="inputName" type="text" size="35" class="form-control" id="inputName" placeholder="Name">
      </div>
    </div>
	

    <div class="form-group">
      <label for="inputDescription" class="col-lg-2 control-label">Description</label>
      <div id="div-input-description" class="col-lg-5">
        <textarea class="ckeditor" name="inputDescription" id="inputDescription"></textarea>
      </div>
    </div>
	
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button id="submit2"  class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
</div>

<script type="text/javascript">

$("document").ready(function(){
	
	$("#submit2").click(function(e){
		e.preventDefault();
	    $form = $(this).closest('form');
		$form.attr('action', 'blogs');
		$form.submit();
	});
	
	$("#submit").click(function(e){
		
		e.preventDefault();
		$.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		
		var secret = $('#inputAnswer').val();
		var dataString = 'answer='+secret;
		$.ajax({
			
			type:"POST",
			url:"virus",
			data:dataString,
			success:function(data){
				
				if(data == 1)
				{
					$('#div-answer-form').show();
					$('#div-question-form').hide();
				}
				else
				{
					alert("YOu did sometihng bad");
					return false;
				}
			}
			
		});
		
	});
});

</script>
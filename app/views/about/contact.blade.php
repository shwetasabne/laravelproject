<form class="form-horizontal" method="POST" url="about/contact">
  <fieldset>
    <legend>Contact Us</legend>
	<div class="form-group">
		<div id="menu" class="col-lg-5">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			<ul>
				<li>
					<a href="http://www.facebook.com/sheer.shweta"><img src="/images/Facebook_32_x_32.png"></a>
				</li>
				<li>
					<a href="https://twitter.com/sheer_shweta"><img src="/images/Twitter_32_x_32.png"></a> 
				</li>
				<li>
					<a href="https://www.linkedin.com/profile/view?id=87947892&authType=NAME_SEARCH&authToken=XBcL&locale=en_US&srchid=879478921405747896338&srchindex=1&srchtotal=3&trk=vsrp_people_res_name&trkInfo=VSRPsearchId%3A879478921405747896338%2CVSRPtargetId%3A87947892%2CVSRPcmpt%3Aprimary"><img src="/images/LinkedIn_32_x_32.png"></a> 
				</li>
				<li>
					<a href="https://plus.google.com/108484028864477850512/posts/p/pub?hl=en"><img src="/images/GooglePlus_32_x_32.png"></a> 
				</li>
			</ul>
		</div>
	</div>
    <div class="form-group">
      <label for="inputName" class="col-lg-2 control-label">Name</label>
      <div id="div-input-name" class="col-lg-5">
        <input name="inputName" type="text" size="35" class="form-control" id="inputName" placeholder="Name">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div id="div-input-email" class="col-lg-5">
        <input name="inputEmail" type="email" size="35" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Message</label>
      <div id="div-input-message" class="col-lg-5">
        <textarea name="inputMessage" class="form-control" size="35" rows="3" id="inputMessage"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button id="cancel" class="btn btn-default">Cancel</button>
        <button id="submit" type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
<script type="text/javascript">
$(document).ready(function() {
	
	$('#blogs').removeClass("active");
	$('#about').removeClass("active");
	$('#projects').removeClass("active");
	$('#resume').removeClass("active");
	$('#contact').addClass("active");
	$('#roadmap').removeClass("active");
	
	$('#cancel').click(function(){
		
		$('#inputName').val('');
		$('#inputEmail').val('');
		$('#inputMessage').val('');

	});

	$('#submit').click(function(){
		
		if(!$('#inputName').val())
		{
			$('#div-input-name').addClass('has-error');
			$('#div-input-name').after('<div><label class="control-label" for="inputError"><font color="red">Required</font></label></div>');		
			return false;
		}
		if(!$('#inputEmail').val())
		{
			$('#div-input-email').addClass('has-error');
			$('#div-input-email').after('<div><label class="control-label" for="inputError"><font color="red">Required</font></label></div>');		
			return false;
		}
		if(!$('#inputMessage').val())
		{
			$('#div-input-message').addClass('has-error');
			$('#div-input-message').after('<div><label class="control-label" for="inputError"><font color="red">Required</font></label></div>');		
			return false;
		}
		
	});
	
});
</script>
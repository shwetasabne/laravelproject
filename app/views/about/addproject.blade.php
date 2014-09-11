<form class="form-horizontal" method="POST" url="about/addproject" id="form-project">
	<fieldset>
    	<div class="form-group">
      	  <label for="inputName" class="col-lg-2 control-label">Name</label>
      		<div id="div-input-name" class="col-lg-5">
        	<input name="inputName" type="text" size="35" class="form-control" id="inputName" placeholder="Name">
      		</div>
    	</div>
    	<div class="form-group">
      	  <label for="inputTechnologies" class="col-lg-2 control-label">Technologies</label>
      		<div id="div-input-technologies" class="col-lg-5">
        	<input name="inputTechnologies" type="text" size="35" class="form-control" id="inputTechnologies" placeholder="Technologies">
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
        		<button id="cancel" class="btn btn-default">Cancel</button>
        		<button id="submit2" class="btn btn-primary">Submit</button>
      	  </div>
    	</div>
	</fieldset>
</form>
<script type="text/javascript">
$(document).ready(function() {


});
</script>
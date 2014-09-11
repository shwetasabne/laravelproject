<?php
foreach($data['allFilesInfo'] as $key=>$val){
	
	foreach($val as $k=>$v)
	{
		echo '
			<div class="container">
				<legend>'.$v['title'].'</legend>
				<p>'.$v['contents'].'</p>
		    </div>
		';
	}
	
}
?>
<script type="text/javascript">
$(document).ready(function() {
	$('#blogs').addClass("active");
	$('#about').removeClass("active");
	$('#projects').removeClass("active");
	$('#resume').removeClass("active");
	$('#contact').removeClass("active");
	$('#roadmap').removeClass("active");
});
</script>
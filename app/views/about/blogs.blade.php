<div class="container">
@foreach ($data['blogs'] as $blog)
	<legend class="text-info">{{ $blog->{'name'} }}</legend>
	<div class="expandable">{{ $blog->{'description'} }}</div>
	

	<br/>
@endforeach
</div>

<script type="text/javascript">
$(document).ready(function() {

	$('#blogs').addClass("active");
	$('#about').removeClass("active");
	$('#projects').removeClass("active");
	$('#resume').removeClass("active");
	$('#contact').removeClass("active");
	$('#roadmap').removeClass("active");


    $('div.expandable').expander({
       slicePoint:       90,  // default is 100
     });
		
});
</script>
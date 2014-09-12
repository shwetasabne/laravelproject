<div class="container">
@foreach ($data['projects'] as $project)
	<legend class="text-success">{{ $project->{'name'} }}</legend>
	<p><i>{{ $project->{'created_at'} }}</i><p>
	<p><i>Technologies: {{ $project->{'technologies'} }}</i><p>		
	<div class="expandable">{{ $project->{'description'} }}</div>

	<br/>
@endforeach
</div>

<script type="text/javascript">
$(document).ready(function() {

	$('#blogs').removeClass("active");
	$('#about').removeClass("active");
	$('#projects').addClass("active");
	$('#resume').removeClass("active");
	$('#contact').removeClass("active");
	$('#roadmap').removeClass("active");
	
    $('div.expandable').expander({
       slicePoint:       30,  // default is 100
     });
	
		
});
</script>
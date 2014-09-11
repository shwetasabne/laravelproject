<div class="container">
@foreach ($data['projects'] as $project)
	<legend>{{ $project->{'name'} }}</legend>
	<p><i>{{ $project->{'created_at'} }}</i><p>
	<p><i>Technologies: {{ $project->{'technologies'} }}</i><p>
	<p>{{ $project->{'description'} }}</p>
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
});
</script>
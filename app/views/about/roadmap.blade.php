<div class="container">
	<legend>Version 2.0.0.0</legend>
	<ul>
		<li>Add Comments to the Blogs section</li>
		<li>Make roadmaps section data driven</li>
		<li>Integrate Roundup / bug tracking with website</li>
		<li>Use third party pdf drivers for Resume section</li>
	</ul>
</div>
<div class="container">
	<legend>Version 1.0.0.0</legend>
	<ul>
		<li>Base/foundation of the website</li>
		<li>Integrate Google drive API to retrieve blogs</li>
		<li>Use mongodb to make Projects section data driven</li>
		<li>Support for Contact Us module</li>
	</ul>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('#blogs').removeClass("active");
	$('#about').removeClass("active");
	$('#projects').removeClass("active");
	$('#resume').removeClass("active");
	$('#contact').removeClass("active");
	$('#roadmap').addClass("active");
});
</script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="_token" content="{{ csrf_token() }}"/>
    <title>Shweta Sabne</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	{{ HTML::script('packages/js/jquery-ui.custom.min.js') }}
    {{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
	{{ HTML::style('css/main.css')}}
	{{ HTML::script('packages/ckeditor/ckeditor.js') }}
	{{ HTML::style('packages/jquery-ui-1.10.4/css/smoothness/jquery-ui-1.10.4.custom.css') }}
	{{ HTML::style('packages/jquery-ui-1.10.4/css/smoothness/jquery-ui-1.10.4.custom.min.css') }}
	{{ HTML::script('packages/js/jquery.expander.js') }}

<div class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand">Shweta Sabne</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav">
      <li id="about" class="active">{{ HTML::link('about/index', 'About') }}</li>
      <li id="projects">{{ HTML::link('about/projects', 'Projects') }}</li>
	  <li id="blogs">{{ HTML::link('about/blogs', 'Random Stuff !') }}</li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li id="contact">{{ HTML::link('about/contact', 'Contact Me') }}</li>
    </ul>
  </div>
</div>
  </head>
 
<body>
 
    <div class="container">
        @if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
        @endif
 
        {{ $content }}
    </div>

</body>
<hr>
<footer>
        <div class="row">
          <div class="col-lg-12">
            <p>CSS implemented by <a href="http://bootswatch.com/cosmo/" rel="nofollow">Bootswatch (Cosmo theme)</a></p>
            <p>Code powered by <a href="http://laravel.com/">Laravel Framework</a>.</p>
            <p>Based on <a href="http://getbootstrap.com" rel="nofollow">Bootstrap</a>. Icons from <a href="http://fortawesome.github.io/Font-Awesome/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="http://www.google.com/webfonts" rel="nofollow">Google</a>.</p>
          </div>
        </div>

</footer>
</html>

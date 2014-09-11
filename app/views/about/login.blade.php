<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<div class="container">
		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6">
				{{ Form::open(array('url'=>'about/signin', 'class'=>'form-omb_loginForm', 'id'=>'formfit1')) }}
			    <!--form class="omb_loginForm" url="user/signin" autocomplete="off" method="POST"-->
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" class="form-control input-block-level" name="username" placeholder="username">
					</div>
					<span class="help-block"></span>
										
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control input-block-level" name="password" placeholder="Password">
					</div>
					<br/><br/>
					<div>
					{{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
				</div>
				{{ Form::close() }}
			</div>
    	</div>  	
	</div>
</div>
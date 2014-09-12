<?php
 

//require_once ("vendor/google-api-php-client/src/Google_Client.php");
//require_once ("vendor/google-api-php-client/src/contrib/Google_DriveService.php");
//require_once ("vendor/google-api-php-client/src/contrib/Google_Oauth2Service.php");
//require_once ("vendor/simple_html_dom.php");

class AboutController extends BaseController {


	protected $layout = "layouts.main";
	

	public function __construct() {
	   $this->beforeFilter('csrf', array('on'=>'post'));
	}
	/**
	* getIndex
	*
	*/
	public function getIndex() {
	    $this->layout->content = View::make('about.index');
	    
	}
	
	public function getProjects(){
		
		$projects = new Projects();
		
		$rows = $projects->getProjects();
		$tmp_date = $rows[0]->{'created_at'};
		$formatted_date = date("M Y", strtotime($tmp_date));
		$rows[0]->{'created_at'} = $formatted_date;
		$data['projects'] = $rows;
		$this->layout->content = View::make('about.projects')->with("data", $data);
	}
	
	public function getContact(){
		$this->layout->content = View::make('about.contact');		
	}
 
 	public function getBlogs(){
		
		$blogs = new Blogs();
		
		$rows = $blogs->getBlogs();
		$data['blogs'] = $rows;
		$this->layout->content = View::make('about.blogs')->with("data", $data);
 		
 	}

	/** This implementation is using Google Drive.
	// Uncomment when we pay for  the service account
 	public function getBlogs(){
 		
		$service = $this->buildService('sheer.shweta@gmail.com');
		$allFiles = $this->retrieveAllFiles($service);
		$allFileInfo = array();
		foreach($allFiles as $fileId)
		{
			$temp_info = $this->printFiles($service, $fileId);
			array_push($allFileInfo, $temp_info);
		}
		
		$data['allFilesInfo'] = $allFileInfo;
		$this->layout->content = View::make('about.blogs')->with("data", $data);
		
 	}
	
	public function getRoadmap(){
		$this->layout->content = View::make('about.roadmap');
	}
	**/
	
	
	public function getVirus(){
		
		$this->layout->content = View::make('about.virus');
	}
		
	
	public function postVirus(){
		
		$answer = Input::get('answer');
		if($answer == Config::get('app.secret_post_answer'))
		{
			return 1;
		}
		else
		{
			return -1;
		}
	}
	
	
	public function postProjects(){
		
		$projects = new Projects();
		$name = Input::get('inputName');
	    $technologies = Input::get('inputTechnologies');
		$description = Input::get('inputDescription');
		$created_at = date("Y-m-d H:i:s");
		$updated_at = date("Y-m-d H:i:s");
			
		$projects->insertProjects($name, $technologies, $description, $created_at, $updated_at);

        return Redirect::to('about/projects')
            ->with('message', '<div class="alert alert-dismissable alert-success">
    				<strong>Well done!</strong> Project added successfully.</div>');

	}
	
	
	public function getBlogrus(){
		
		$this->layout->content = View::make('about.blogrus');
	}
		
	
	public function postBlogrus(){
		
		$answer = Input::get('answer');
		if($answer == Config::get('app.secret_post_answer'))
		{
			return 1;
		}
		else
		{
			return -1;
		}
	}
	
	
	public function postBlogs(){
		
		$blogs = new Blogs();
		$name = Input::get('inputName');
		$description = Input::get('inputDescription');
		$created_at = date("Y-m-d H:i:s");
		$updated_at = date("Y-m-d H:i:s");
			

		$blogs->insertBlogs($name, $description, $created_at, $updated_at);

        return Redirect::to('about/blogs')
            ->with('message', '<div class="alert alert-dismissable alert-success">
    				<strong>Well done!</strong> Project added successfully.</div>');

	}
	
 	public function postContact(){
 		
         $fromEmail = Input::get('inputEmail');
         $fromName = Input::get('inputName');
         $subject = "Email from user at";
         $data = [ 'msg' => Input::get('inputMessage') ];

         $toEmail = 'sheer.shweta@gmail.com';
         $toName = 'Shweta Sabne';

         Mail::send('about.contactemail', $data, function($message) use ($toEmail, $toName, $fromEmail, $fromName, $subject){

             $message->to($toEmail, $toName);

             $message->from($fromEmail, $fromName);

             $message->subject($subject);
         });

      return Redirect::to('about/contact')
          ->with('message', '<div class="alert alert-dismissable alert-success">
  				<strong>Well done!</strong> Thank you for your feedback. We will get back to you shortly.</div>');
 	}
	
	
	public function printFiles($service, $fileId)
	{
		$file_info = array();
	    $file = $service->files->get($fileId);

		$title = $file->getTitle();
		
		$exportLinks = $file->getExportLinks();
		$downloadUrl = $exportLinks["text/html"]; 

		if ($downloadUrl) 
		{
			$request = new Google_HttpRequest($downloadUrl, 'GET', null, null);
		    $httpRequest = Google_Client::$io->authenticatedRequest($request);
		    if ($httpRequest->getResponseHttpCode() == 200) 
			{
		      $contents = $httpRequest->getResponseBody();
		    } 
			else 
			{
		      $contents = 'reponse code not obtained';
		    }
		} 
		else 
        {
			$contents = 'download url not obtained';
		}
		 
		$file_info[$fileId]['title'] = $title;
	    $file_info[$fileId]['contents'] = $contents;
		
		preg_match("/<body[^>]*>(.*?)<\/body>/is", $contents, $matches);
		//var_dump($matches[1]);
		 $file_info[$fileId]['contents'] = $matches[1];
		
   	    return $file_info;
	}
	

	public function retrieveAllFiles($service) {

	    $result = array();
	    $pageToken = NULL;
		$file_ids = array();
		$files = $service->files->listFiles();
		//var_dump($files);
		foreach($files->getItems() as $f)
		{
			foreach ($f as $key=>$val)
			{
				if($key == 'id')
				{
					array_push($file_ids, $val);
					
				}
			}
		}
		return $file_ids;
	}
	
	
	public function buildService($userEmail) {
		
		 session_start();

		 $DRIVE_SCOPE = 'https://www.googleapis.com/auth/drive';
		 $SERVICE_ACCOUNT_EMAIL = '388164385292-p3a5862lsjtrgv2g3s540nea9e3r589f@developer.gserviceaccount.com';
		 $SERVICE_ACCOUNT_PKCS12_FILE_PATH = '/Users/shwetasabne/aboutme/shwetasabne/public/resources/API Project-ba0bc0c8779d.p12';
		 
	  	$key = file_get_contents($SERVICE_ACCOUNT_PKCS12_FILE_PATH);

	  	$auth = new Google_AssertionCredentials(
	      	$SERVICE_ACCOUNT_EMAIL,
	      	array($DRIVE_SCOPE),
	      	$key);

	  	$auth->sub = 'admin@shwetasabne.com';
	  	$client = new Google_Client();
	  	$client->setUseObjects(true);
	  	$client->setAssertionCredentials($auth);
		//var_dump(new Google_DriveService($client));
	  	return new Google_DriveService($client);
	  
	}
	


}
?>
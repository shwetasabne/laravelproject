<?php

class Projects extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'projects';

	public function getProjects(){
		
		Log::info(__CLASS__."::".__METHOD__."::"."Attempting to get the projects from database");
		try {
			
			$sql = 'SELECT name, technologies, description, created_at from projects';
			$rows = DB::select($sql, array());
			return $rows;			
		}
		catch(Exception $e)
		{
			Log::error(__CLASS__."::".__METHOD__."::"."Error ".$e);
			return;
		}
		
	}

	public function insertProjects($name, $technologies, $description, $created_at, $updated_at){
		
		Log::info(__CLASS__."::".__METHOD__."::"."Attempting to add the projects to database");
		try {
			
			$sql = 'INSERT INTO projects 
						(name, technologies, description, created_at, updated_at) 
					VALUES(?, ?, ?, ?, ?)';

			$projects = array($name, $technologies, $description, $created_at, $updated_at);

			$rows_inserted = DB::insert($sql, $projects);
			Log::info(__CLASS__."::".__METHOD__."::"."Project inserted successfully ".$rows_inserted);
			return $rows_inserted;			
		}
		catch(Exception $e)
		{
			Log::error(__CLASS__."::".__METHOD__."::"."Error ".$e);
			return;			
		}
	}

}
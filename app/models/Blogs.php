<?php

class Blogs extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'blogs';

	public function getBlogs(){
		
		Log::info(__CLASS__."::".__METHOD__."::"."Attempting to get the blogs from database");
		try {
			
			$sql = 'SELECT name, description from blogs';
			$rows = DB::select($sql, array());
			return $rows;			
		}
		catch(Exception $e)
		{
			Log::error(__CLASS__."::".__METHOD__."::"."Error ".$e);
			return;
		}
		
	}

	public function insertBlogs($name, $description, $created_at, $updated_at){
		
		Log::info(__CLASS__."::".__METHOD__."::"."Attempting to add the blogs to database");
		try {
			
			$sql = 'INSERT INTO blogs 
						(name, description, created_at, updated_at) 
					VALUES(?, ?, ?, ?)';

			$blogs = array($name, $description, $created_at, $updated_at);

			$rows_inserted = DB::insert($sql, $blogs);
			Log::info(__CLASS__."::".__METHOD__."::"."Blog inserted successfully ".$rows_inserted);
			return $rows_inserted;			
		}
		catch(Exception $e)
		{
			Log::error(__CLASS__."::".__METHOD__."::"."Error ".$e);
			return;			
		}
	}

}
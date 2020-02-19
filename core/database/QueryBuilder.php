<?php

/**
 * 
 */
class QueryBuilder
{
	protected $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	
	public function selectAll($table)
	{
		$statement = $this->pdo->prepare("select * from {$table}");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_OBJ); // getting objects
	}

	//get specific row by id
	public function selectWhere($table,$id)
	{
		$statement = $this->pdo->prepare("select * from {$table} where id=:id");
		$statement->bindParam(':id',$id);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_OBJ); // getting objects
	}

	public function add($table,$columns,$bind,$data)
	{
		$statement = $this->pdo->prepare("insert into {$table} ({$columns['columns']}) values ({$bind['value']})");
		$bind_items = explode(',',$bind['value']);
		foreach($bind_items as $key=>$bind_value){
			$statement->bindParam($bind_value,$data[$key]);
		}
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_OBJ); // getting objects
	}

	public function update($table,$bind,$data,$id,$columns = null)
	{
		$statement = $this->pdo->prepare("update {$table} set {$bind['value']} WHERE id=:id");
		$statement->bindParam(':id',$id);
		$statement->bindParam(':completed',$data['status']);
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_OBJ); // getting objects
	}

	//get specific row by id
	public function delete($table,$id)
	{
		$statement = $this->pdo->prepare("delete from {$table} where id=:id");
		$statement->bindParam(':id',$id);
		$statement->execute();
	}

}
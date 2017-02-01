<?php
namespace Database\Query;
require './database.php';

class DvdQuery  extends \Database{
  private $sql= "SELECT  dvds.id, title, rating_name
  FROM dvds, ratings
  WHERE  dvds.rating_id = ratings.id AND
  title LIKE ?";
  public $search;

  public function titleContains($search){
    $this->search = $search;
    $this->sql;
  }

  public function orderByTitle(){
    $this->sql .= "ORDER BY title";
  }

  public function find(){
    $like = '%' . $this->search. '%';
    $statement = self::$pdo->prepare($this->sql);
    $statement->bindParam(1, $like);
    $statement->execute();
    $results = $statement->fetchAll(\PDO::FETCH_OBJ);
    return $results;
  }
}
 ?>

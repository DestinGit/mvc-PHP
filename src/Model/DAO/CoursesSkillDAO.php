<?php
namespace m2i\projet\Model\DAO;

use m2i\projet\Model\Entity\CoursesSkillDTO;

class CoursesSkillDAO implements ICoursesSkillDAO {

    /**
    * @var \PDO
    */
    private $pdo;

    /**
     * @var \PDOStatement;
     */
    private $selectStatement;


    /**
    * DAOClient constructor.
    * @param \PDO $pdo
    */
    public function __construct(\PDO $pdo)
    {
    $this->pdo = $pdo;
    }

    /**
    * @return $this
    */
    public function findAll(){
        $sql = "SELECT * FROM courses_skills";
        $this->selectStatement = $this->pdo->query($sql);
        return $this;
    }

    /**
    * @param array $pk
    * @return $this
    */
    public function findOneById(array $pk){
        $sql = "SELECT * FROM courses_skills WHERE course_id=?  AND skill_id=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $this->selectStatement = $statement;
        return $this;
    }

    /**
    * @param array $search
    * @return $this
    */
    public function find(array $search = [], array $orderBy = [], array $limit = []){
        $sql = "SELECT * FROM courses_skills ";

        if(count($search)>0){
            $sql .= " WHERE ";
            $cols = array_map(
                function($item){
                    return "$item=:$item";
                }, array_keys($search)
            );

            $sql .= implode(" AND ", $cols);
        }

        if(count($orderBy)>0){
            $sql .= "ORDER BY ";
            $cols = array_map(
                function($item) use($orderBy){
                    return "$item ". $orderBy[$item];
                },
                array_keys($orderBy)
            );
            $sql .= implode(", ", $cols);
        }

        if(count($limit) >0){
            $sql .= " LIMIT ".$limit[0];
            if(isset($limit[1])){
                $sql .= " OFFSET ". $limit[1];
            }
        }

        $statement = $this->pdo->prepare($sql);
        $statement->execute($search);
        $this->selectStatement = $statement;
        return $this;
    }


    /**
    * @return array
    */
    public function getAllAsArray(){
        return $this->selectStatement->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
    * @return array
    */
    public function getAllAsArrayGroupedById(){
        $data =  $this->selectStatement->fetchAll(\PDO::FETCH_ASSOC|\PDO::FETCH_GROUP);

        $data = array_map(
            function ($item){
                return $item[0];
            }
            , $data
        );
        
        if($data){
            return $data;
        } else {
            throw new Exception("Ancun résultat pour cette requête");
        }
        
    }

    /**
    * @return array
    */
    public function getOneAsArray(){
        $data = $this->selectStatement->fetch(\PDO::FETCH_ASSOC);

        if($data){
            return $data;
        } else {
            throw new Exception("Ancun résultat pour cette requête");
        }
    }

    /**
    * @return array
    */
    public function getAllAsEntity(){
        $this->selectStatement->setFetchMode(\PDO::FETCH_CLASS, CoursesSkillDTO::class);
        $data = $this->selectStatement->fetchAll();

        if($data){
            return $data;
        } else {
            throw new Exception("Ancun résultat pour cette requête");
        }
    }

    /**
    * @return CoursesSkillDTO
    */
    public function getOneAsEntity(){
        $this->selectStatement->setFetchMode(\PDO::FETCH_CLASS, CoursesSkillDTO::class);
        $data = $this->selectStatement->fetch();

        if($data){
            return $data;
        } else {
            throw new Exception("Ancun résultat pour cette requête");
        }
    }

    /**
    * @param CoursesSkillDTO $coursesSkill
    */
    public function save(CoursesSkillDTO $coursesSkill){
        if($coursesSkill->getId() == null){
            $pk = $this->insert($coursesSkill);
            $coursesSkill->setId($pk);
        } else {
            $this->update($coursesSkill);
        }
    }

    /**
    * @param CoursesSkillDTO $coursesSkill
    * @return int
    */
    private function insert(CoursesSkillDTO $coursesSkill){
        $sql = "INSERT INTO courses_skills (course_id, skill_id) VALUES ( ?, ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $coursesSkill->getId(), $coursesSkill->getId()
        ]);
        return $this->pdo->lastInsertId();
    }

    /**
    * @param CoursesSkillDTO $coursesSkill
    */
    private function update(CoursesSkillDTO $coursesSkill){
        $sql = "UPDATE courses_skills SET course_id=? , skill_id=?  WHERE course_id=?  AND skill_id=? ";
        $data = array(
            $coursesSkill->getId(),
$coursesSkill->getId(),
$coursesSkill->getId(),
$coursesSkill->getId()
        );
        $statement = $this->pdo->prepare($sql);

        $statement->execute([
            $coursesSkill->getId(),
$coursesSkill->getId(),
$coursesSkill->getId(),
$coursesSkill->getId()

        ]);

    }

    /**
    * @param CoursesSkillDTO $coursesSkill
    * @return bool
    */
    public function delete(CoursesSkillDTO $coursesSkill){
        if($coursesSkill->getId() != null){
            $sql = "DELETE FROM courses_skills WHERE course_id=?  AND skill_id=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$coursesSkill->getId(), 
$coursesSkill->getId()]);
        }
    }

}
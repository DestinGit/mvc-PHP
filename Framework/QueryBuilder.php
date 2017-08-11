<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 11/08/2017
 * Time: 09:20
 */

namespace m2i\Framework;


class QueryBuilder
{
    /**
     * @var array
     */
    private $from = [];

    /**
     * @var array
     */
    private $select = [];

    /**
     * @var array
     */
    private $where = [];

    /**
     * @var array
     */
    private $orderBy = [];

    /**
     * @var array
     */
    private $innerJoin = [];

    /**
     * QueryBuilder constructor.
     */
    public function __construct(){}


    /**
     * @param array ...$tableName
     * @return $this
     *
     * $qb->from('auteurs')
     * $qb->from('auteurs', 'livres')
     */
    public function from(...$tableName) {
        $this->from[] = implode(', ', $tableName);
        return $this;
    }

    /**
     * @param string $fields
     * @return $this
     *
     * $qb->select('nom, prenom, titre')
     */
    public function select(string $fields) {
        $this->select[] = $fields;
        return $this;
    }

    /**
     * @param string $whereClause
     * @return $this
     */
    public function where(string $whereClause) {
        $this->where[] = $whereClause;
        return $this;
    }

    /**
     * @param string $orderByClause
     * @return $this
     */
    public function orderBy(string $orderByClause) {
        $this->orderBy[] = $orderByClause;
        return $this;
    }

    /**
     * @param string $tableName
     * @param string $condition
     * @return $this
     */
    public function innerJoin(string $tableName, string $condition) {
//        $parts = explode('=', $condition);
//        $this->innerJoin[] = $tableName . ' ON ' . $tableName.'.'. $parts[0] . '=' . $this->from[0].'.'.$parts[1];
        $this->innerJoin[] = $tableName . ' ON ' . $condition;
        return $this;
    }

    /**
     * @return mixed|string
     * @throws \Exception
     */
    public function getSQL() {
        if (count($this->from) == 0 || count($this->select) == 0) {
            throw new \Exception('Les clauses FROM et SELECT ne peuvent être vides');
        }

        $sql = 'SELECT ' . implode(', ', $this->select) .
               ' FROM ' . implode(', ', $this->from);

        if (count($this->where) > 0) {
            $sql .= ' WHERE (' . implode(') AND (', $this->where) . ')';
        }

        if (count($this->orderBy) > 0) {
            $sql .= ' ORDER BY ' . implode(', ', $this->orderBy);
        }

        foreach ($this->innerJoin as $value) {
            $sql .= ' INNER JOIN ' . $value;
        }

        $sql = str_replace(';', '', $sql);

        return $sql;
    }
}
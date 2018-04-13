<?php

namespace App;

use PDO, Exception;

class Model
{
    private static $_pdo;
    public static $table;
    public static $primaryKey = 'id';    

    const SELECT=0;
    const UPDATE=1;
    const INSERT=2;

	private $_table;
    private $_primaryKey;
    private $_query;
    private $_method = self::SELECT;
    private $_columns = '*';
    private $_conditions;
    private $_order;
    private $_limit;
    private $_parameters = [];
    
    private $_stmt;

    /**
     * Init Model class
     * @param  string $host
     * @param  string $db
     * @param  string $user
     * @param  string $password
     */
    public static function init(string $host, string $db, string $user, string $password)
    {
        self::$_pdo = new PDO("mysql:host={$host};dbname={$db}", $user, $password, [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
    }

    public function __call($method, $args)
    {
        return $this->{$method}($args);
    }
    
    public static function __callStatic($method, $args)
    {
        $self = new self;

        $self->_table = static::$table;
        $self->_primaryKey = static::$primaryKey;
        
        return $self->{$method}($args);
    }

    protected function table(array $args): self
    {
    	$this->_table = $args[0];

    	return $this;
    }

    protected function select(array $args): self
    {
    	$this->_columns = (empty($args)) ? '*' : join(', ', $args) ;

    	return $this;
    }

    protected function where(array $args): self
    {
    	switch (count($args))
    	{
    		case 2:
    			$column = $args[0];
    			$operator = '=';
    			$value = $args[1];
    		break;
    		case 3:
    			$column = $args[0];
    			$operator = $args[1];
    			$value = $args[2];
    		break;
    		default:
    			throw new Exception("Invalid number of args with where statement.", 1);
    		break;
    	}

    	$this->_conditions = " WHERE {$column} {$operator} :{$column}";
        $this->_parameters[$column] = $value;

    	return $this;
    }

    protected function andWhere(array $args): self
    {
    	switch (count($args))
    	{
    		case 2:
    			$column = $args[0];
    			$operator = '=';
    			$value = $args[1];
    		break;
    		case 3:
    			$column = $args[0];
    			$operator = $args[1];
    			$value = $args[2];
    		break;
    		default:
    			throw new Exception("Invalid number of args with andWhere statement.", 1);
    		break;
    	}

    	$this->_conditions .= " AND {$column} {$operator} :{$column}";
    	$this->_parameters[$column] = $value;
    	
    	return $this;
    }

    protected function afterToday(array $args): self
    {
        $this->_conditions .= " AND {$args[0]} > NOW()";

        return $this;
    }

    protected function date(array $args): self
    {
        $date = \DateTime::createFromFormat('d/m/Y', $args[1]);

        $this->_conditions .= " AND {$args[0]} BETWEEN '{$date->format('Y-d-m')} 00:00:00' AND '{$date->format('Y-m-d')} 23:59:59'";

        return $this;
    }

    protected function orderBy(array $args): self
    {
    	switch (count($args))
    	{
    		case 1:
    			$column = $args[0];
    			$sort = 'ASC';
    		break;
    		case 2:
    			$column = $args[0];
    			$sort = $args[1];
    		break;
    		default:
    			throw new Exception("Invalid number of args with orderBy statement.", 1);
    		break;
    	}

    	$this->_order = " ORDER BY {$column} {$sort}";

    	return $this;
    }

    protected function orderByRand(): self
    {
    	$this->_order = " ORDER BY RAND()";

    	return $this;
    }

    protected function limit(array $args): self
    {
    	$this->_limit = " LIMIT {$args[0]}";

    	return $this;
    }

    protected function offset(array $args): self
    {
    	$this->_limit .= " OFFSET {$args[0]}";

    	return $this;
    }

    protected function get()
    {
    	$this->_run();

    	return $this->_stmt->fetchAll(PDO::FETCH_OBJ);
    }

    protected function all()
    {
    	$this->_limit = null;

    	$this->_run();

    	return $this->_stmt->fetchAll(PDO::FETCH_OBJ);
    }

    protected function first()
    {
    	$this->limit([1]);

    	$this->_run();

    	return $this->_stmt->fetch(PDO::FETCH_OBJ);
    }

    protected function find(array $args)
    {
        $this->limit([1]);
        $this->where([$this->_primaryKey, $args[0]]);

        $this->_run();

        return $this->_stmt->fetch(PDO::FETCH_OBJ);
    }

    // TODO
    protected function findOrFail(array $args)
    {
        $this->limit([1]);
        $this->where([$this->_primaryKey, $args[0]]);
    }

    protected function count(): int
    {
        $this->_run();

        return $this->_stmt->rowCount();
    }

    protected function update(array $args): void
    {
        $this->_method = self::UPDATE;

        foreach ($args[0] as $column => $value)
            $this->_parameters[$column] = $value;

        $this->_run();
    }

    protected function add(array $args): void
    {
        $this->_method = self::INSERT;

        foreach ($args[0] as $column => $value)
            $this->_parameters[$column] = $value;

        $this->_run();
    }

    private function _run()
    {
    	switch ($this->_method)
    	{
    		case self::SELECT:
    			$this->_query = "SELECT {$this->_columns} FROM {$this->_table}{$this->_conditions}{$this->_order}{$this->_limit}";
    		break;
            case self::UPDATE:
                $columns = '';
                foreach ($this->_parameters as $columns => $value)
                    $columns .= "{$columns} = :{$columns}, ";

                $this->_query = "UPDATE {$this->_table} SET " . substr($columns, 0, -1) . $this->_conditions;
            break;
            case self::INSERT:
                $this->_query = "INSERT INTO {$this->_table} (" . implode(', ', array_keys($this->_parameters)) . ") VALUES (:" . implode(', :', array_keys($this->_parameters)) . ")";
            break;
    		default:
    			throw new Exception("Invalid SQL method [{$this->_method}].", 1);
    		break;
    	}

        $this->_stmt = self::$_pdo->prepare($this->_query);

        foreach ($this->_parameters as $column => $value)
            $this->_stmt->bindValue(":{$column}", $value);

        $this->_stmt->execute();
    }
}
<?php

class Connection {
    private $link;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $config = require_once 'config.php';
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $this->link = new PDO($dsn, $config['username'], $config['password']);

        return $this;
    }

    public function exec(string $sql): void
    {
        $this->link->exec($sql);
    }

    public function execute(string $sql, array $params = []): PDOStatement
    {
        $stmt = $this->link->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function query(string $sql, array $params = []): array
    {
        $result = $this->execute($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
        return $result ?: [];
    }
}

/*
primary key
foreign key
sql data types
joins
cross join
like
indexes
union/all
group by
having

*/
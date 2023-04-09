<?php

interface DBConnection
{
    public function connect();
    public function disconnect();
}

interface DBRecord
{
    public function create(string $jsonData);
    public function read(int $id);
    public function update(int $id, string $jsonData);
    public function delete(int $id);
}

interface DBQueryBuilder
{
    public function select();
}

interface DBFactory
{
    public function createConnection(): DBConnection;
    public function createRecord(string $tableName): DBRecord;
    public function createQueryBuilder(): DBQueryBuilder;
}

//////////////////////MYSQL////////////////////
class MySQLConnection implements DBConnection
{
    public function connect()
    {
    }
    public function disconnect()
    {
    }
}

class MySQLRecord implements DBRecord
{
    public function create(string $jsonData)
    {
    }

    public function read(int $id)
    {
    }

    public function update(int $id, string $jsonData)
    {
    }

    public function delete(int $id)
    {
    }
}

class MySQLQueryBuilder implements DBQueryBuilder
{
    public function select()
    {
    }
}

class MySQLFactory implements DBFactory
{
    public function createConnection(): DBConnection
    {
        return new MySQLConnection();
    }

    public function createRecord(string $tableName): DBRecord
    {
        return new MySQLRecord($tableName);
    }

    public function createQueryBuilder(): DBQueryBuilder
    {
        return new MySQLQueryBuilder();
    }
}

//////////////////////POSTGRE////////////////////

class PostgreConnection implements DBConnection
{
    public function connect()
    {
    }
    public function disconnect()
    {
    }
}

class PostgreRecord implements DBRecord
{
    public function create(string $jsonData)
    {
    }

    public function read(int $id)
    {
    }

    public function update(int $id, string $jsonData)
    {
    }

    public function delete(int $id)
    {
    }
}

class PostgreQueryBuilder implements DBQueryBuilder
{
    public function select()
    {
    }
}

class PostgreSQLFactory implements DBFactory
{
    public function createConnection(): DBConnection
    {
        return new PostgreConnection();
    }

    public function createRecord(string $tableName): DBRecord
    {
        return new PostgreRecord($tableName);
    }

    public function createQueryBuilder(): DBQueryBuilder
    {
        return new PostgreQueryBuilder();
    }
}



//////////////////////ORACLE////////////////////

class OracleConnection implements DBConnection
{
    public function connect()
    {
    }
    public function disconnect()
    {
    }
}

class OracleRecord implements DBRecord
{
    public function create(string $jsonData)
    {
    }

    public function read(int $id)
    {
    }

    public function update(int $id, string $jsonData)
    {
    }

    public function delete(int $id)
    {
    }
}

class OracleQueryBuilder implements DBQueryBuilder
{
    public function select()
    {
    }
}

class OracleFactory implements DBFactory
{
    public function createConnection(): DBConnection
    {
        return new OracleConnection();
    }

    public function createRecord(string $tableName): DBRecord
    {
        return new OracleRecord($tableName);
    }

    public function createQueryBuilder(): DBQueryBuilder
    {
        return new OracleQueryBuilder();
    }
}

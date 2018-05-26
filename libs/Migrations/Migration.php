<?php
/**
 * Created by PhpStorm.
 * User: uilha
 * Date: 25/05/18
 * Time: 13:20
 */

class Migration
{
    public static $fields;
    public static $primary_key;
    public static $table;
    public static $db_connect;
    public static $built_migrations;

    public function __construct($_connection = NULL)
    {
        if(empty($_connection)) {
            self::$db_connect = new FactoryDatabase();
        }else{
            self::$db_connect = $_connection;
        }
        self::$fields = "";
        self::$built_migrations ="";
    }

    public static function setBuiltMigrations($sql)
    {
        self::$built_migrations .= $sql;
    }

    public static function getCreatedSql()
    {
        return self::$built_migrations;
    }

    public static function build()
    {
        try{
            //get table structure defined
            get_called_class()::create();
            if(!self::$db_connect->check_if_table_exist(self::$table)){
                if(empty(self::$fields)){
                    die("No fields to create the table");
                }
               $sql = "\nCREATE TABLE ".self::$table." (".self::$fields." ".self::$primary_key.");";

                self::$db_connect->setQueries($sql);
                self::$db_connect->prepareQuery();
                self::setBuiltMigrations($sql);
                return self::$db_connect->stmtExecute();
            }
        }catch (PDOException $exception){
            die($exception);
        }
    }

    public static function migrate()
    {
        foreach (glob(APP_MIGRATION.'*.php') as $file) {
            $class = basename($file, '.php');
            $migration = new $class();
            $migration::build();
        }
        return true;
    }

    public static function setFields($_fields)
    {
        if(!empty(self::$fields)) {
            self::$fields .=',';
        }
        self::$fields .=$_fields;
    }

    public static function table($_table)
    {
        self::$table = $_table;
    }

    public static function increment($name)
    {
        self::setFields("`".$name."` INT ".self::nullable(false)." AUTO_INCREMENT");
        self::$primary_key = ", PRIMARY KEY (`".$name."`)";
    }

    public static function char($name, $size=150, $nullable=true)
    {
        self::setFields("`".$name."` CHAR(".$size.")".self::nullable($nullable));
    }

    public static function string($name, $size=150, $nullable=true)
    {
        self::setFields("`".$name."` VARCHAR(".$size.")".self::nullable($nullable));
    }

    public static function integer($name, $nullable=true)
    {
        self::setFields("`".$name."` DATETIME ".self::nullable($nullable));
    }

    public static function datetime($name, $nullable=true)
    {
        self::setFields("`".$name."` DATETIME ".self::nullable($nullable));
    }

    public static function text($name, $nullable=true)
    {
        self::setFields("`".$name."` TEXT ".self::nullable($nullable));
    }

    public static function nullable($nulllable)
    {
        if(!$nulllable || (trim(strtoupper($nulllable)) == "NOT NULL")) {
            return "NOT NULL";
        }
        else {
            return "NULL";
        }
    }

}
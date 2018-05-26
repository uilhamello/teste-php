<?php
/**
 * Created by PhpStorm.
 * User: uilha
 * Date: 25/05/18
 * Time: 13:15
 */

class UserMigration extends Migration
{
    /**
     *
     */
    public static function create()
    {
        self::table("users");
        self::increment('id');
        self::string("name",200);
        self::string("username",150);
        self::string("password",150);
        self::datetime("created_at");
        self::datetime("updated_at");
        self::datetime("deleted_at");
    }
}
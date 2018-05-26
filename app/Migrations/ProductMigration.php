<?php
/**
 * Created by PhpStorm.
 * User: uilha
 * Date: 26/05/18
 * Time: 02:39
 */

class ProductMigration extends Migration
{
    /**
     *
     */
    public static function create()
    {
        self::table("produtos");
        self::increment('id');
        self::string("nome",200);
        self::string("descricao",250);
        self::integer("quantidade",150);
        self::string("preco",150);
        self::datetime("created_at");
        self::datetime("updated_at");
        self::datetime("deleted_at");
    }
}
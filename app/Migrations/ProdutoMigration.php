<?php
/**
 * Created by PhpStorm.
 * User: uilha
 * Date: 25/05/18
 * Time: 13:15
 */

class ProdutoMigration extends Migration
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
        self::integer("quantidade",10);
        self::string("preco",20);
        self::datetime("created_at");
        self::datetime("updated_at");
        self::datetime("deleted_at");
    }
}
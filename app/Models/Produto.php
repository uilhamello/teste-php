<?php

class Produto extends Model{

	protected $table = 'produtos';
	protected $id = 'id';
    public $fillable = ['nome', 'descricao','quantidade','preco'];

    protected $timestamp = true;

	public function __construct()
	{
		parent::__construct();
	}
}
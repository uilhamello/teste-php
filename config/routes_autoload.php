<?php
function __autoload($CLASS){

  if(file_exists(SYS_ROOT."libs/Models/".$CLASS.".php")){
      include_once SYS_ROOT."libs/Models/".$CLASS.".php";
  }
  elseif(file_exists(SYS_ROOT."libs/Views/".$CLASS.".php")){
      include_once SYS_ROOT."libs/Views/".$CLASS.".php";
  }
  elseif(file_exists(SYS_ROOT."libs/Controllers/".$CLASS.".php")){
      include_once SYS_ROOT."libs/Controllers/".$CLASS.".php";
  }
  elseif(file_exists(SYS_ROOT."libs/Helpers/".$CLASS.".php")){
      include_once SYS_ROOT."libs/Helpers/".$CLASS.".php";
  }
  elseif(file_exists(SYS_ROOT."libs/Encryption/".$CLASS.".php")){
      include_once SYS_ROOT."libs/Encryption/".$CLASS.".php";
  }
  elseif(file_exists(SYS_ROOT."libs/Migrations/".$CLASS.".php")){
      include_once SYS_ROOT."libs/Migrations/".$CLASS.".php";
  }
  elseif(file_exists(SYS_ROOT."app/Models/".$CLASS.".php")){
      include_once SYS_ROOT."app/Models/".$CLASS.".php";
  }
  elseif(file_exists(SYS_ROOT."app/Controllers/".$CLASS.".php")){
      include_once SYS_ROOT."app/Controllers/".$CLASS.".php";
  }
  elseif(file_exists(SYS_ROOT."app/Migrations/".$CLASS.".php")){
      include_once SYS_ROOT."app/Migrations/".$CLASS.".php";
  }
  else{
    die('Class [' .$CLASS. '] Not file');
  }
}
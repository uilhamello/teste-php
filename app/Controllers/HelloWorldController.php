<?php
/**
 * Created by PhpStorm.
 * User: uilha
 * Date: 26/04/18
 * Time: 17:52
 */

class HelloWorldController  extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function index()
    {
        $result = $this->user->find($_SESSION['user_id']);

        View::data([
            'created_at'=> $result[0]['created_at'],
            'name'=> $result[0]['name'],
        ]);
        view('helloworld.html');
        return false;
    }
}
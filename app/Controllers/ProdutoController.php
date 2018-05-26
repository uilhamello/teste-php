<?php
/**
 * Created by PhpStorm.
 * User: uilha
 * Date: 26/04/18
 * Time: 17:52
 */

class ProdutoController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Produto;
    }

    public function index()
    {
        if(isset($_GET['search'])){

            if($_GET['search'] =='lack') {
                $result = $this->lack();
            }
            if($_GET['search'] =='lastchange') {
                $result = $this->lastchange();
            }
        }else{
            $result = $this->model->all();
        }

        $table = '';
        if($result){
            $table = '';
            foreach ($result as $key => $value) {
                $class = "";
                $array_keys = array_keys($value);
                if($result[$key]['quantidade'] <= 3){
                    $class=" atemption";
                }
                $table .= '<tr>';
                foreach ($array_keys as $key=>$val){
                    if(in_array($val,$this->model->fillable) || $val == 'id'){
                        $table .= '<td >'.$value[$val];
                        if($val == 'quantidade'){
                            $table .= "<span style='color:indianred'>$class</span>";
                        }
                        $table .= '</td>';
                    }
                }
                $table .= '<td>';
                $table .='<a href=\'{{URL_BASE}}/?module=produto_reduzir&id='.($value['id']).'\'>-</a>&nbsp;&nbsp;';
                $table .='<a href=\'{{URL_BASE}}/?module=produto_aumentar&id='.($value['id']).'\'>+</a>&nbsp;&nbsp;';
                $table .='<a href=\'{{URL_BASE}}/?module=produto_update&id='.($value['id']).'\'>Editar</a>&nbsp;&nbsp;';
                $table .= '<a href=\'{{URL_BASE}}/?module=produto_delete&id='.($value['id']).'\'>Deletar</a></td>';
                $table .= '</tr>';
            }
        }
        View::data(['table_content'=>$table]);
    }

    public function create()
    {

    }

    public function store()
    {
        $this->model->insert($_POST);
        $this->index();
        redirect_route('produto');
    }

    public function update()
    {
        $result = $this->model->find($_GET['id']);
        if(isset($result[0])){
            View::data($result[0]);
        }
    }

    public function alter()
    {
        print_r($_POST);
        $result = $this->model->updateById($_POST);
        redirect_route('produto');
    }

    public function delete()
    {
        $this->model->deleteById($_GET['id']);
        redirect_route('produto');
    }

    public function reduzir()
    {
        $result = $this->findHere($_GET['id']);
        $result['quantidade'] = $result['quantidade'] -1;
        $result = $this->model->updateById($result);
        redirect_route('produto');
    }

    public function aumentar()
    {
        $result = $this->findHere($_GET['id']);
        $result['quantidade'] = $result['quantidade'] +1;
        $result = $this->model->updateById($result);
        redirect_route('produto');
    }

    public function findHere($id)
    {
        $result = $this->model->find($id);
        return $result[0];

    }

    public function lastchange()
    {
        return $this->model->select()->order("updated_at","desc")->limit(5)->get();
    }

    public function lack()
    {
        return $this->model->select()->where("quantidade","<=",3)->get();
    }
}
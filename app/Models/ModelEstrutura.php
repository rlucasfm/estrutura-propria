<?php namespace App\Models;

use CodeIgniter\Model;

class ModelEstrutura extends Model
{
    protected $table            = 'estruturas';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['id_user', 'checkout_link', 'pixel'];
    protected $useTimestamps    = false;
    protected $skipValidation   = true;

    public function cadastrarEstrutura($link_checkout, $pixel)
    {
        $id_user = session()->get('id_user');

       $estrutura_anterior = $this->where('id_user', $id_user)->first();
       if(empty($estrutura_anterior))
       {           
           $data = [
               'id_user'        => $id_user,
               'checkout_link'  => $link_checkout,
               'pixel'          => $pixel
           ];
           $this->insert($data);
           $id = $this->where('checkout_link', $link_checkout)->first()->id;
           $link = 'http://www.upconvert.com.br/redirect.php?idcode='.$id;
           return '<a href="'.$link.'"><h3>'.$link.'</h3></a>';
       }else{
            $link = base_url('estrutura/ver/'.$estrutura_anterior->id);
           return '<h5>Você já tem uma estrutura própria</h5><br><a href="'.$link.'"><h3>'.$link.'</h3></a>';
       }
    }

    public function info_estrutura($id)
    {
        $result = $this->where('id', $id)->first();

        if(!empty($result))
        {
            $link_checkout  = $result->checkout_link;
            $link_estrutura = 'http://www.upconvert.com.br/redirect.php?idcode='.$result->id;
            $pixel          = $result->pixel;
            $array          = [$link_checkout, $link_estrutura, $pixel];
        }
        else
        {
            $array = ["Você ainda não tem nenhuma estrutura", "", ""]; 
        }

        return $array;
    }
}
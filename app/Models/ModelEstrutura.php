<?php namespace App\Models;

use CodeIgniter\Model;

class ModelEstrutura extends Model
{
    protected $table            = 'estruturas';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['id_user', 'checkout_link'];
    protected $useTimestamps    = false;
    protected $skipValidation   = true;

    public function cadastrarEstrutura($link_checkout)
    {
        $id_user = session()->get('id_user');

       $estrutura_anterior = $this->where('id_user', $id_user)->first();
       if(empty($estrutura_anterior))
       {           
           $data = [
               'id_user' => $id_user,
               'checkout_link' => $link_checkout
           ];
           $this->insert($data);
           $id = $this->where('checkout_link', $link_checkout)->first()->id;
           $link = base_url('estrutura/ver/'.$id);
           return '<a href="'.$link.'"><h3>'.$link.'</h3></a>';
       }else{
            $link = base_url('estrutura/ver/'.$estrutura_anterior->id);
           return '<h5>Você já tem uma estrutura própria</h5><br><a href="'.$link.'"><h3>'.$link.'</h3></a>';
       }
    }

    public function info_estrutura($id)
    {
        $result = $this->where('id', $id)->first();

        if(!empty($result)
        {
            $link_checkout = $result->checkout_link;
            $link_estrutura = $link = base_url('estrutura/ver/'.$result->id);
            $array = [$link_checkout, $link_estrutura];
        }
        else
        {
            $array = ["Você ainda não tem nenhuma estrutura", ""]; 
        }

        return $array;
    }
}
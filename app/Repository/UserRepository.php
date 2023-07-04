<?php

namespace App\Repository;

use App\Models\UserModel;

class UserRepository {

    protected $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getUser($id=''){

        if (empty($id)) {
            $data = $this->userModel->join('t_tipe_akun',  't_tipe_akun.id', '=', 't_user.role')->select('t_user.id','t_user.nm_user', 't_user.email_user', 't_tipe_akun.tipe_akun')->orderBy('t_user.created_at', 'ASC')->get();
        }else{
            $data = $this->userModel->where('id', $id)->first();
        }
        return $data;
    }

    public function Post(array $post){
        return $this->userModel->create($post);
    }

    public function Update(array $post, $id)
    {
        return $this->userModel->where('id', $id)->update($post);
    }

    public function Delete($id)
    {
        return $this->userModel->find($id)->delete();
    }

}

?>

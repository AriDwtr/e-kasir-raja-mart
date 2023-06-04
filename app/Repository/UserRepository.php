<?php

namespace App\Repository;

use App\Models\UserModel;

class UserRepository {

    protected $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function Update(array $post)
    {
        return $this->userModel->where('id', $post['id'])->update($post);
    }

}

?>

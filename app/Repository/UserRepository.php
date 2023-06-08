<?php

namespace App\Repository;

use App\Models\UserModel;

class UserRepository {

    protected $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function Update(array $post, $id)
    {
        return $this->userModel->where('id', $id)->update($post);
    }

}

?>

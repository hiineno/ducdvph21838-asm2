<?php
namespace App\Models;
class UserModel extends BaseModel{
    protected $tableName = 'user';
    protected $id = 'user_id';

    public function checkUser($username){
        $user = $this->where('user_id', '=' ,$username);
        if ($user) {
            return $user[0];
        }
        return false;
    }
}
?>
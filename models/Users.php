<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Users extends ActiveRecord
{
    private $username_users;
    private $password_users;
    public $password_users_repeat;
    public $password_users_old;
    public $page;
    private $nama_users;
    private $jenis_kelamin_users;
    private $tempat_lahir_users;
    private $tanggal_lahir_users;
    private $alamat_users;
    private $gambar_users;

    public static function tableName()
    {
        return 'master_users';
    }

    public function rules()
    {
        return [
            [
                ['username_users', 'nama_users', 'jenis_kelamin_users', 'tempat_lahir_users', 'tanggal_lahir_users', 'alamat_users'], 'required'
            ],
            [
                ['username_users'], 'unique'
            ],
            [
                ['password_users', 'password_users_repeat'], 'required',
                'whenClient' => "function(attribute, value) {
                                        var page = $('input[name=\"Users[page]\"]').val();
                                        if(page == 'add'){
                                            return true;
                                        }
                                 }"
            ],
            [['gambar_users'], 'file', 'extensions' => ['png', 'jpg', 'gif', 'jpeg'], 'maxSize' => 1024 * 1024 * 2],
            [['password_users_repeat'], 'compare', 'compareAttribute' => 'password_users', 'message' => "Passwords don't match"],
            [['password_users_repeat'], 'safe'],
            [['password_users_old'], 'safe'],
            [['page'], 'safe'],
        ];
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'id';

  // protected $returnType = 'array';
  // protected $useSoftDeletes = true;

  protected $allowedFields = ['username', 'password', 'role'];

  // protected $useTimestamps = false;
  // protected $createdField = 'created_at';
  // protected $updatedField = 'updated_at';
  // protected $deletedField = 'deleted_at';

  // protected $validationRules = [];
  // protected $validationMessages = [];
  // protected $skipValidation = false;
  public function role()
  {
    return ['1' => 'Root', '2' => 'Admin Kementerian', '3' => 'Admin Provinsi', '4' => 'Admin Dinsos', '5' => 'Admin Kecamatan', '6' => 'Admin Desa'];
  }
}

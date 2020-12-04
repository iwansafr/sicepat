<?php

namespace App\Models;

use CodeIgniter\Model;

class Tps extends Model
{
  protected $table = 'tps';
  protected $primaryKey = 'id';

  // protected $returnType = 'array';
  // protected $useSoftDeletes = true;

  protected $allowedFields = ['nama', 'nik', 'alamat', 'pekerjaan', 'foto_diri', 'foto_kk', 'foto_ktp', 'foto_rumah', 'longitude', 'latitude', 'valid_count'];

  protected $useTimestamps = true;
  // protected $createdField = 'created_at';
  // protected $updatedField = 'updated_at';
  // protected $deletedField = 'deleted_at';

  // protected $validationRules = [];
  // protected $validationMessages = [];
  // protected $skipValidation = false;
  public function valid()
  {
    return ['6' => 'Desa', '5' => 'Kecamatan', '4' => 'Dinsos', '3' => 'Provinsi', '2' => 'Kementerian'];
  }
}
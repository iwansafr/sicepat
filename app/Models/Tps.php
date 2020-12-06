<?php

namespace App\Models;

use CodeIgniter\Model;

class Tps extends Model
{
  protected $table = 'tps';
  protected $primaryKey = 'id';

  // protected $returnType = 'array';
  // protected $useSoftDeletes = true;

  protected $allowedFields = ['kecamatan','desa','dukuh','rw','rt','rt','nama','nama_ktp','telp','wa','email','foto','no','nik','situasi'];

  // protected $useTimestamps = true;
  // protected $createdField = 'created_at';
  // protected $updatedField = 'updated_at';
  // protected $deletedField = 'deleted_at';

  // protected $validationRules = [];
  // protected $validationMessages = [];
  // protected $skipValidation = false;
  public function situasi()
  {
    return ['1' => 'Hijau', '2' => 'Kuning', '3' => 'Merah'];
  }
}
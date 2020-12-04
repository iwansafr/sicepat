<?php

namespace App\Models;

use CodeIgniter\Model;

class Inbox extends Model
{
  protected $table = 'inbox';
  protected $primaryKey = 'id';

  // protected $returnType = 'array';
  // protected $useSoftDeletes = true;

  protected $allowedFields = ['nama', 'pesan', 'jawaban', 'tipe', 'email', 'hp'];

  protected $useTimestamps = true;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
  // protected $deletedField = 'deleted_at';

  // protected $validationRules = [];
  // protected $validationMessages = [];
  // protected $skipValidation = false;
}
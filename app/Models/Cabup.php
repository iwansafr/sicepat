<?php

namespace App\Models;

use CodeIgniter\Model;

class Cabup extends Model
{
  protected $table = 'cabup';
  protected $primaryKey = 'id';

  // protected $returnType = 'array';
  // protected $useSoftDeletes = true;

  protected $allowedFields = ['nama', 'no', 'foto'];

  protected $useTimestamps = true;
  // protected $createdField = 'created_at';
  // protected $updatedField = 'updated_at';
  // protected $deletedField = 'deleted_at';

  // protected $validationRules = [];
  // protected $validationMessages = [];
  // protected $skipValidation = false;
}
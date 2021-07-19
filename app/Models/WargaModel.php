<?php

namespace App\Models;
use App\Entities\WargaEntity;
use CodeIgniter\Model;

class WargaModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'warga';
	protected $primaryKey           = 'id_warga';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = WargaEntity::class;
	protected $useSoftDeletes       = true;
	protected $allowedFields        = ['nik','nama','kelamin','alamat','no_rumah','status'];
	

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
		'nik'  	 	  => 'required|numeric|min_length[16]|max_length[16]',
        'nama'        => 'required|min_length[3]|max_length[25]',
        'kelamin'     => 'required',
        'alamat' 	  => 'required|max_length[1500]',
		'no_rumah' 	  => 'required',
		'status'	  => 'required'];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	 const ORDERABLE = [
        1 => 'nik',
        2 => 'nama',
        3 => 'kelamin',
        4 => 'alamat',
		5 => 'no_rumah',
		6 => 'status',
    ];
	public $orderable = ['nik','nama','kelamin','alamat','no_rumah','status'];


	 /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = '')
    {
        $builder = $this->builder()
            ->select('warga.id_warga, warga.nik, warga.nama, warga.kelamin, warga.alamat, warga.no_rumah, warga.status');

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('nik', $search)
                ->orLike('nama', $search)
                ->orLike('kelamin', $search)
                ->orLike('alamat', $search)
            ->groupEnd();

        return $condition->where([
            'warga.deleted_at'  => null,
        ]);
    }
}

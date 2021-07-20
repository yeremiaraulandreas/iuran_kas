<?php

namespace App\Models;

use App\Entities\TransaksiEntity;
use CodeIgniter\Model;

class TransaksiModel extends Model
{
	protected $table = 'iuran';
    protected $primaryKey = 'id';
    protected $returnType = TransaksiEntity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = ['tanggal', 'bulan', 'tahun', 'jumlah','warga_id'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [
        'warga_id'  => 'required|numeric',
        'tanggal'   => 'required',
        'bulan'     => 'required',
		'jumlah'	=> 'required',
        'tahun'     => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    const ORDERABLE = [
        1 => 'tanggal',
        2 => 'bulan',
        3 => 'jumlah',
        4 => 'tahun',
		5 => 'nama'
    ];

    public $orderable = ['tanggal', 'bulan', 'jumlah', 'tahun','nama'];

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
            ->select('iuran.id, iuran.tanggal, iuran.bulan, iuran.tahun, iuran.jumlah, warga.nama')
            ->join('warga', 'iuran.warga_id = warga.id_warga');

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('tanggal', $search)
                ->orLike('jumlah', $search)
                ->orLike('tahun', $search)
                ->orLike('nama', $search)
            ->groupEnd();

        return $condition->where([
            'iuran.deleted_at'  => null,
            'warga.deleted_at' => null,
        ]);
    }
    public function getWarga() {
 
       $query = $this->db->query('select * from warga');
       return $query->getResult();
    }
    
    public function laporan($where)
    {
       
            $this->select('iuran.id, iuran.bulan, iuran.tahun, iuran.jumlah, warga.nama');
           
			$this->join('warga', 'iuran.warga_id = warga.id_warga');
			$this->where($where);
			return $this->get()->getResultArray();
        

        
    }
 
}

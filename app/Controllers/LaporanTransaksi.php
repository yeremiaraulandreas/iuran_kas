<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Controllers\BaseController;

class LaporanTransaksi extends BaseController
{
	public function __construct()
    {
        $this->model = new TransaksiModel();
    }
	public function index()
	{
		//
		return view('LaporanViews');
	}
	public function laporan()
    {   
        $bln = date('m');
		$thn = date('Y');

		$awal = $thn.'-'.$bln.'-'.'01';
		$akhir = $thn.'-'.$bln.'-'.'31';
		if(!$this->request->getPost()){
			$where = ['tanggal >=' => $awal, 'tahun <=' => $akhir];
        	$data['data'] = $this->model->laporan($where);	

		}else{
			$dari = $this->request->getPost('tahun');
		}
		
        
     
         return view('LaporanViews',$data);
    }
}

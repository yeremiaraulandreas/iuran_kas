<?php

namespace App\Controllers;
use App\Models\WargaModel;
use App\Models\TransaksiModel;
use App\Models\Book;

class Home extends BaseController
{
    public function index()
    {
        $warga = new WargaModel();
        $iuran = new TransaksiModel();

        $data['warga'] = $warga->countAllResults();
        $data['iuran'] = $iuran->countAllResults();
        return view('HomeViews', $data);
    }

    //--------------------------------------------------------------------

   
}

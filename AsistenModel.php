<?php

namespace App\Models;

use CodeIgniter\Model;

class AsistenModel extends Model
{
    protected $table = 'asisten';

    protected $asisten;

    protected $allowedFields = ['NIM', 'NAMA', 'PRAKTIKUM', 'IPK'];

    public function getAsisten()
    {
        return $this->findAll();
    }

    public function simpan($record)
    {
        $this->save([
            'NIM' => $record['nim'],
            'NAMA' => $record['nama'],
            'PRAKTIKUM' => $record['praktikum'],
            'IPK' => $record['ipk']
        ]);
    }

    public function ambil($nim) //dipanggil ke controller
    {
        return $this->where(['nim' => $nim])->first();
    }
}

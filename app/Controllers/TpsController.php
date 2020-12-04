<?php

namespace App\Controllers;

use App\Models\Tps;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TpsController extends BaseController
{
  public function __construct()
  {
    helper('form');
  }
  public function list($valid = 1)
  {
    $tps = new Tps();
    $data = $tps->where('valid_count', $valid)->find();
    return view('tps/index', ['data' => $data]);
  }
  public function index()
  {
    $tps = new Tps();
    $data = $tps->findAll();
    return view('tps/index', ['data' => $data]);
  }
  public function show($id = 0)
  {
    $tps = new Tps();
    $data = $tps->find($id);
    if (empty($data)) {
      helper('system');
      return view('layout/forbidden', ['msg' => 'Maaf Data tidak ditemukan', 'alert' => 'danger']);
    } else {
      return view('tps/detail', ['data' => $data, 'valid' => $tps->valid()]);
    }
  }
  public function new()
  {
    session();
    $tps = new Tps();
    return view('tps/edit', ['validation' => \Config\Services::validation()]);
  }
  public function edit($id = 0)
  {
    session();
    $data = [];
    $tps = new Tps();
    $data = $tps->find($id);
    return view('tps/edit', ['validation' => \Config\Services::validation(), 'data' => $data]);
  }
  public function create()
  {
    helper('system');
    // helper('file');
    $validation = [
      'nik' => [
        'label' => 'Nik',
        'rules' => 'required|is_unique[blts.nik,id,{id}]',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Ada',
        ]
      ],
      'nama' => [
        'label' => 'Nama',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
        ]
      ],
      'alamat' => [
        'label' => 'Alamat',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
        ]
      ],
      'pekerjaan' => [
        'label' => 'Pekerjaan',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
        ]
      ],
    ];
    $data = [
      'nama' => $this->request->getPost('nama'),
      'nik' => $this->request->getPost('nik'),
      'alamat' => $this->request->getPost('alamat'),
      'pekerjaan' => $this->request->getPost('pekerjaan'),
      'latitude' => $this->request->getPost('latitude'),
      'longitude' => $this->request->getPost('longitude'),
      'valid_count' => session()->get('role')
    ];
    $tps = new Tps();
    $validation['foto_diri'] = [
      'label' => 'Foto Diri',
      'rules' => 'uploaded[foto_diri]|is_image[foto_diri]',
      'errors' => [
        'uploaded' => '{field} Tidak Boleh Kosong',
        'is_image' => 'format gambar {field} tidak sesuai'
      ]
    ];
    $validation['foto_ktp'] = [
      'label' => 'Foto KTP',
      'rules' => 'uploaded[foto_ktp]|is_image[foto_ktp]',
      'errors' => [
        'uploaded' => '{field} Tidak Boleh Kosong',
        'is_image' => 'format gambar {field} tidak sesuai'
      ]
    ];
    $validation['foto_kk'] = [
      'label' => 'Foto KK',
      'rules' => 'uploaded[foto_kk]|is_image[foto_kk]',
      'errors' => [
        'uploaded' => '{field} Tidak Boleh Kosong',
        'is_image' => 'format gambar {field} tidak sesuai'
      ]
    ];
    $validation['foto_rumah'] = [
      'label' => 'Foto Rumah',
      'rules' => 'uploaded[foto_rumah]|is_image[foto_rumah]',
      'errors' => [
        'uploaded' => '{field} Tidak Boleh Kosong',
        'is_image' => 'format gambar {field} tidak sesuai'
      ]
    ];
    if (!$this->validate($validation)) {
      // $validation = \Config\Services::validation();
      // return redirect()->back()->withinput()->with('validation', $validation);
      return redirect()->back()->withinput();
    }

    $foto = [];
    $file = $this->request->getFile('foto_diri');
    if (!empty($file->getClientExtension())) {
      $foto['foto_diri'] = 'foto_diri-' . $data['nik'] . '.' . $file->getClientExtension();
      if (file_exists('images/blt' . $foto['foto_diri'])) {
        unlink('images/tps/' . $foto['foto_diri']);
        unlink('images/tps/thumb_' . $foto['foto_diri']);
      }
      if ($file->move('images/tps/', $foto['foto_diri'])) {
        $data['foto_diri'] = $foto['foto_diri'];
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_diri'])
          ->resize(200, 100, true, 'height')
          ->save('images/tps/thumb_' . $foto['foto_diri']);
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_diri'])
          ->resize(300, 300, true, 'height')
          ->save('images/tps/' . $foto['foto_diri']);
      }
    }
    $file = $this->request->getFile('foto_ktp');
    if (!empty($file->getClientExtension())) {
      $foto['foto_ktp'] = 'foto_ktp-' . $data['nik'] . '.' . $file->getClientExtension();
      if (file_exists('images/blt' . $foto['foto_ktp'])) {
        unlink('images/tps/' . $foto['foto_ktp']);
        unlink('images/tps/thumb_' . $foto['foto_ktp']);
      }
      if ($file->move('images/tps/', $foto['foto_ktp'])) {
        $data['foto_ktp'] = $foto['foto_ktp'];
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_ktp'])
          ->resize(200, 100, true, 'height')
          ->save('images/tps/thumb_' . $foto['foto_ktp']);
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_ktp'])
          ->resize(300, 300, true, 'height')
          ->save('images/tps/' . $foto['foto_ktp']);
      }
    }
    $file = $this->request->getFile('foto_kk');
    if (!empty($file->getClientExtension())) {
      $foto['foto_kk'] = 'foto_kk-' . $data['nik'] . '.' . $file->getClientExtension();
      if (file_exists('images/blt' . $foto['foto_kk'])) {
        unlink('images/tps/' . $foto['foto_kk']);
      }
      if ($file->move('images/tps/', $foto['foto_kk'])) {
        $data['foto_kk'] = $foto['foto_kk'];
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_kk'])
          ->resize(200, 100, true, 'height')
          ->save('images/tps/thumb_' . $foto['foto_kk']);
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_kk'])
          ->resize(300, 300, true, 'height')
          ->save('images/tps/' . $foto['foto_kk']);
      }
    }
    $file = $this->request->getFile('foto_rumah');
    if (!empty($file->getClientExtension())) {
      $foto['foto_rumah'] = 'foto_rumah-' . $data['nik'] . '.' . $file->getClientExtension();
      if (file_exists('images/blt' . $foto['foto_rumah'])) {
        unlink('images/tps/' . $foto['foto_rumah']);
        unlink('images/tps/thumb_' . $foto['foto_rumah']);
      }
      if ($file->move('images/tps/', $foto['foto_rumah'])) {
        $data['foto_rumah'] = $foto['foto_rumah'];
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_rumah'])
          ->resize(200, 100, true, 'height')
          ->save('images/tps/thumb_' . $foto['foto_rumah']);
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_rumah'])
          ->resize(300, 300, true, 'height')
          ->save('images/tps/' . $foto['foto_rumah']);
      }
    }
    if ($tps->save(
      $data
    )) {
      return redirect()->back()->with('message', ['msg' => 'Data Berhasil di simpan', 'alert' => 'success']);
    } else {
      return redirect()->back()->withinput()->with('message', ['msg' => 'Data gagal di simpan', 'alert' => 'danger']);
    }
  }
  public function update($id = 0)
  {
    helper('system');
    // helper('file');
    $validation = [
      'nik' => [
        'label' => 'Nik',
        'rules' => 'required|is_unique[blts.nik,id,' . $id . ']',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Ada',
        ]
      ],
      'nama' => [
        'label' => 'Nama',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
        ]
      ],
      'alamat' => [
        'label' => 'Alamat',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
        ]
      ],
      'pekerjaan' => [
        'label' => 'Pekerjaan',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
        ]
      ],
    ];
    $data = [
      'nama' => $this->request->getPost('nama'),
      'nik' => $this->request->getPost('nik'),
      'alamat' => $this->request->getPost('alamat'),
      'pekerjaan' => $this->request->getPost('pekerjaan'),
      'latitude' => $this->request->getPost('latitude'),
      'longitude' => $this->request->getPost('longitude'),
      'valid_count' => session()->get('role')
    ];
    $tps = new Tps();
    $tps_data = $tps->find($id);
    $data['id'] = $tps_data['id'];
    if (!$this->validate($validation)) {
      // $validation = \Config\Services::validation();
      // return redirect()->back()->withinput()->with('validation', $validation);
      return redirect()->back()->withinput();
    }

    $foto = [];
    $file = $this->request->getFile('foto_diri');
    if (!empty($file->getClientExtension())) {
      $foto['foto_diri'] = 'foto_diri-' . $data['nik'] . '.' . $file->getClientExtension();
      if (file_exists('images/blt' . $foto['foto_diri'])) {
        unlink('images/tps/' . $foto['foto_diri']);
        unlink('images/tps/thumb_' . $foto['foto_diri']);
      }
      if ($file->move('images/tps/', $foto['foto_diri'])) {
        $data['foto_diri'] = $foto['foto_diri'];
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_diri'])
          ->resize(200, 100, true, 'height')
          ->save('images/tps/thumb_' . $foto['foto_diri']);
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_diri'])
          ->resize(300, 300, true, 'height')
          ->save('images/tps/' . $foto['foto_diri']);
      }
    }
    $file = $this->request->getFile('foto_ktp');
    if (!empty($file->getClientExtension())) {
      $foto['foto_ktp'] = 'foto_ktp-' . $data['nik'] . '.' . $file->getClientExtension();
      if (file_exists('images/blt' . $foto['foto_ktp'])) {
        unlink('images/tps/' . $foto['foto_ktp']);
        unlink('images/tps/thumb_' . $foto['foto_ktp']);
      }
      if ($file->move('images/tps/', $foto['foto_ktp'])) {
        $data['foto_ktp'] = $foto['foto_ktp'];
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_ktp'])
          ->resize(200, 100, true, 'height')
          ->save('images/tps/thumb_' . $foto['foto_ktp']);
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_ktp'])
          ->resize(300, 300, true, 'height')
          ->save('images/tps/' . $foto['foto_ktp']);
      }
    }
    $file = $this->request->getFile('foto_kk');
    if (!empty($file->getClientExtension())) {
      $foto['foto_kk'] = 'foto_kk-' . $data['nik'] . '.' . $file->getClientExtension();
      if (file_exists('images/blt' . $foto['foto_kk'])) {
        unlink('images/tps/' . $foto['foto_kk']);
      }
      if ($file->move('images/tps/', $foto['foto_kk'])) {
        $data['foto_kk'] = $foto['foto_kk'];
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_kk'])
          ->resize(200, 100, true, 'height')
          ->save('images/tps/thumb_' . $foto['foto_kk']);
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_kk'])
          ->resize(300, 300, true, 'height')
          ->save('images/tps/' . $foto['foto_kk']);
      }
    }
    $file = $this->request->getFile('foto_rumah');
    if (!empty($file->getClientExtension())) {
      $foto['foto_rumah'] = 'foto_rumah-' . $data['nik'] . '.' . $file->getClientExtension();
      if (file_exists('images/blt' . $foto['foto_rumah'])) {
        unlink('images/tps/' . $foto['foto_rumah']);
        unlink('images/tps/thumb_' . $foto['foto_rumah']);
      }
      if ($file->move('images/tps/', $foto['foto_rumah'])) {
        $data['foto_rumah'] = $foto['foto_rumah'];
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_rumah'])
          ->resize(200, 100, true, 'height')
          ->save('images/tps/thumb_' . $foto['foto_rumah']);
        $image = \Config\Services::image()
          ->withFile('images/tps/' . $foto['foto_rumah'])
          ->resize(300, 300, true, 'height')
          ->save('images/tps/' . $foto['foto_rumah']);
      }
    }
    if ($tps->save(
      $data
    )) {
      return redirect()->back()->with('message', ['msg' => 'Data Berhasil di simpan', 'alert' => 'success']);
    } else {
      return redirect()->back()->withinput()->with('message', ['msg' => 'Data Gagal di simpan', 'alert' => 'danger']);
    }
  }

  public function delete($id = 0)
  {
    if (!empty($id)) {
      $tps = new Tps();
      $data = $tps->find($id);
      if ($tps->delete($id)) {
        if (!empty($data)) {
          if (file_exists('images/tps/' . $data['foto_diri'])) {
            unlink('images/tps/' . $data['foto_diri']);
          }
          if (file_exists('images/tps/' . $data['foto_ktp'])) {
            unlink('images/tps/' . $data['foto_ktp']);
          }
          if (file_exists('images/tps/' . $data['foto_kk'])) {
            unlink('images/tps/' . $data['foto_kk']);
          }
          if (file_exists('images/tps/' . $data['foto_rumah'])) {
            unlink('images/tps/' . $data['foto_rumah']);
          }
        }
        return redirect()->back()->with('message', ['msg' => 'Data Berhasil di Hapus', 'alert' => 'success']);
      } else {
        return redirect()->back()->with('message', ['msg' => 'Data Gagal di Hapus', 'alert' => 'danger']);
      }
    }
  }
  public function excel()
  {
    $tps = new Tps();
    $dataBlt = $tps->findAll();
    $spreadsheet = new Spreadsheet();

    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A1', 'NIK')
      ->setCellValue('B1', 'NAMA')
      ->setCellValue('C1', 'ALAMAT')
      ->setCellValue('D1', 'PEKERJAAN')
      ->setCellValue('E1', 'LONGITUDE')
      ->setCellValue('F1', 'LATITUDE');
    $column = 2;
    foreach ($dataBlt as $key => $value) {
      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $value['nik'])
        ->setCellValue('B' . $column, $value['nama'])
        ->setCellValue('C' . $column, $value['alamat'])
        ->setCellValue('D' . $column, $value['pekerjaan'])
        ->setCellValue('E' . $column, $value['longitude'])
        ->setCellValue('F' . $column, $value['latitude']);
      $column++;
    }

    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Blt';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }

  public function valid($id = 0)
  {
    if (!empty($id)) {
      $tps = new Tps();
      $tps->find($id);
      $valid_count = !empty($this->request->getVar('valid')) ? session()->get('role') - 1 : session()->get('role');
      if ($tps->save(['id' => $id, 'valid_count' => $valid_count])) {
        return redirect()->back()->with('message', ['msg' => 'Data Berhasil diPerbarui', 'alert' => 'success']);
      } else {
        return redirect()->back()->with('message', ['msg' => 'Data Gagal diPerbarui', 'alert' => 'danger']);
      }
    }
  }
}

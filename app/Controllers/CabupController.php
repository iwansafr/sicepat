<?php

namespace App\Controllers;

use App\Models\Cabup;

class CabupController extends BaseController
{
  public function __construct()
  {
    helper('form');
  }
  public function index()
  {
    $cabup = new Cabup();
    $data = $cabup->findAll();
    return view('cabup/index', ['data' => $data]);
  }
  public function edit($id = 0)
  {
    session();
    $data = [];
    $cabup = new Cabup();
    if (!empty($id)) {
      $data = $cabup->find($id);
    }
    return view('cabup/edit', ['validation' => \Config\Services::validation(), 'data' => $data, ]);
  }
  public function new()
  {
    session();
    $cabup = new Cabup();
    return view('cabup/edit', ['validation' => \Config\Services::validation()]);
  }
  public function create()
  {
    helper('system');
    $data = [
      'nama' => $this->request->getPost('nama'),
      'no' => $this->request->getPost('no'),
    ];
    $cabup = new Cabup();
    if (!$this->validate([
      'nama' => [
        'label' => 'nama',
        'rules' => 'required|is_unique[cabup.nama,id,{id}]',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Ada',
        ]
      ],
      'no' => [
        'label' => 'nomor',
        'rules' => 'required|is_unique[cabup.no,id,{id}]',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Ada',
        ]
      ],
    ])) {
      // $validation = \Config\Services::validation();
      // return redirect()->back()->withinput()->with('validation', $validation);
      return redirect()->back()->withinput();
    }

    if ($cabup->save(
      $data
    )) {
      return redirect()->back()->with('message', ['msg' => 'Data Berhasil di simpan', 'alert' => 'success']);
    } else {
      return redirect()->back()->withinput()->with('message', ['msg' => 'Data Gagal di simpan', 'alert' => 'danger']);
    }
  }
  public function update($id = 0)
  {
    helper('system');
    $data = [
      'nama' => $this->request->getPost('nama'),
      'no' => $this->request->getPost('no'),
    ];
    $cabup = new Cabup();
    $cabup_data = $cabup->find($id);
    $data['id'] = $cabup_data['id'];
    if (!$this->validate([
      'nama' => [
        'label' => 'nama',
        'rules' => 'required|is_unique[cabup.nama,id,' . $id . ']',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Ada',
        ]
      ],
      'no' => [
        'label' => 'nomor',
        'rules' => 'required|is_unique[cabup.no,id,' . $id . ']',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
          'is_unique' => '{field} Sudah Ada',
        ]
      ],
    ])) {
      // $validation = \Config\Services::validation();
      // return redirect()->back()->withinput()->with('validation', $validation);
      return redirect()->back()->withinput();
    }

    if ($cabup->save(
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
      $cabup = new Cabup();
      if ($cabup->delete($id)) {
        return redirect()->back()->with('message', ['msg' => 'Data Berhasil di Hapus', 'alert' => 'success']);
      } else {
        return redirect()->back()->with('message', ['msg' => 'Data Gagal di Hapus', 'alert' => 'danger']);
      }
    }
  }
}

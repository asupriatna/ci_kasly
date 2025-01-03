<?php
namespace App\Controllers;

use App\Models\EntityModel;

class Entity extends BaseController
{
    public function index()
    {
        $model = new EntityModel();
        $this->data['entities'] = $model->findAll();
        return view('entity/list', $this->data);
    }

    public function create()
    {
        return view('entity/create');
    }

    public function store()
    {
        $model = new EntityModel();
        $this->data = [
            'ety_name' => $this->request->getPost('name'),
            'ety_referal_code' => $this->request->getPost('referal_code'),
            'ety_guid' => generateGUID()
        ];
        $model->save($this->data);
        return redirect()->to('/entities');
    }

    public function edit($id)
    {
        $model = new EntityModel();
        $this->data['entity'] = $model->where('ety_guid',$id)
        ->first();
        return view('entity/edit', $this->data);
    }

    public function update($id)
    {
        $model = new EntityModel();
        $this->data = [
            'ety_name' => $this->request->getPost('name'),
            'ety_referal_code' => $this->request->getPost('referal_code')
        ];
        $model->where('ety_guid',$id)
        ->set($this->data)
        ->update();
        return redirect()->to('/entities');
    }

    public function delete($id)
    {
        $model = new EntityModel();
        $model->where('ety_guid',$id)
        ->delete();
        return redirect()->to('/entities');
    }
}
<?php
namespace App\Controllers;

use App\Models\AccountModel;

class Account extends BaseController
{
    public function index()
    {
        $model = new AccountModel();
        $this->data['accounts'] = $model->findAll();
        return view('account/list', $this->data);
    }

    public function create()
    {
        return view('account/create');
    }

    public function store()
    {
        $model = new AccountModel();
        $this->data = [
            'acc_name' => $this->request->getPost('account_name'),
            'acc_type' => $this->request->getPost('account_type'),
            'acc_guid' => generateGUID()
        ];
        $model->save($this->data);
        return redirect()->to('/accounts');
    }

    public function edit($id)
    {
        $model = new AccountModel();
        $this->data['account'] = $model->where('acc_guid', $id)->first();
        return view('account/edit', $this->data);
    }

    public function update($id)
    {
        $model = new AccountModel();
        $this->data = [
            'acc_name' => $this->request->getPost('account_name'),
            'acc_type' => $this->request->getPost('account_type')
        ];
        $model->where('acc_guid', $id)->set($this->data)->update();
        return redirect()->to('/accounts');
    }

    public function delete($id)
    {
        $model = new AccountModel();
        $model->where('acc_guid', $id)->delete();
        return redirect()->to('/accounts');
    }
}
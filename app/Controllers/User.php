<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\EntityModel;
use App\Models\RoleModel;

class User extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $this->data['users'] = $model->findAll();
        return view('user/list', $this->data);
    }

    public function create()
    {
        $entityModel = new EntityModel();
        $roleModel = new RoleModel();
        $this->data['entities'] = $entityModel->findAll();
        $this->data['roles'] = $roleModel->findAll();
        return view('user/create', $this->data);
    }

    public function store()
    {
        $model = new UserModel();
        $this->data = [
            'usr_username' => $this->request->getPost('username'),
            'usr_email' => $this->request->getPost('email'),
            'usr_password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'guidid' => generateGUID(),
            'entity_id' => $this->request->getPost('entity_id'),
            'role_id' => $this->request->getPost('role_id')
        ];
        $model->save($this->data);
        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $entityModel = new EntityModel();
        $roleModel = new RoleModel();
        $this->data['user'] = $model->where('usr_guid', $id)->first();
        $this->data['entities'] = $entityModel->findAll();
        $this->data['roles'] = $roleModel->findAll();
        return view('user/edit', $this->data);
    }

    public function update($id)
    {
        $model = new UserModel();
        $this->data = [
            'usr_username' => $this->request->getPost('username'),
            'usr_email' => $this->request->getPost('email'),
            'entity_id' => $this->request->getPost('entity_id'),
            'role_id' => $this->request->getPost('role_id')
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $this->data['usr_password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $model->where('usr_guid', $id)->set($this->data)->update();
        return redirect()->to('/users');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->where('usr_guid', $id)->delete();
        return redirect()->to('/users');
    }
}
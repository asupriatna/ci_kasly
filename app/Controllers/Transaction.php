<?php
namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\AccountModel;
use App\Models\UserModel;

class Transaction extends BaseController
{
    public function index()
    {
        $model = new TransactionModel();
        $this->data['transactions'] = $model
        ->select('transactions.*, acc_name, acc_type')
        ->join('accounts', 'accounts.id = trn_account_id')
        ->findAll();
        return view('transaction/list', $this->data);
    }

    public function create()
    {
        $accountModel = new AccountModel();
        $data['accounts'] = $accountModel->findAll();
        return view('transaction/create', $data);
    }

    public function store()
    {
        $model = new TransactionModel();
        $data = [
            'trn_transaction_date' => $this->request->getPost('transaction_date'),
            'trn_account_id' => $this->request->getPost('account_id'),
            'trn_amount' => $this->request->getPost('amount'),
            'type' => $this->request->getPost('type'),
            'trn_description' => $this->request->getPost('description'),
            'trn_created_by' => session()->get('user_id'),
            'trn_guid' => generateGUID()
        ];
        $model->save($data);
        return redirect()->to('/transactions');
    }

    public function edit($guid)
    {
        $model = new TransactionModel();
        $accountModel = new AccountModel();
        $data['transaction'] = $model->where('trn_guid', $guid)->first();
        $data['accounts'] = $accountModel->findAll();
        return view('transaction/edit', $data);
    }

    public function update($guid)
    {
        $model = new TransactionModel();
        $data = [
            'trn_transaction_date' => $this->request->getPost('transaction_date'),
            'trn_account_id' => $this->request->getPost('account_id'),
            'trn_amount' => $this->request->getPost('amount'),
            'type' => $this->request->getPost('type'),
            'trn_description' => $this->request->getPost('description'),
            'trn_updated_by' => session()->get('user_id')
        ];
        $model->where('trn_guid', $guid)->set($data)->update();
        return redirect()->to('/transactions');
    }

    public function delete($guid)
    {
        $model = new TransactionModel();
        $model->where('trn_guid', $guid)->delete();
        return redirect()->to('/transactions');
    }
}
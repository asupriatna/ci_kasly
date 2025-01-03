<?php
namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('usr_email', $email)->first();

        if ($user && password_verify($password, $user['usr_password'])) {
            session()->set([
                'user_id' => $user['id'],
                'user_email' => $user['usr_email'],
                'logged_in' => true,
            ]);
            return redirect()->to('/users');
        } else {
            return redirect()->back()->with('error', 'Invalid login credentials');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function attemptRegister()
    {
        $model = new UserModel();
        $data = [
            'usr_username' => $this->request->getPost('username'),
            'usr_email' => $this->request->getPost('email'),
            'usr_password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'usr_guid' => generateGUID(),
            'usr_email_verified_at' => null,
        ];
        $model->save($data);

        // Send activation email
        $this->sendActivationEmail($data['usr_email'], $data['usr_guid']);

        return redirect()->to('/login')->with('success', 'Registration successful. Please check your email to activate your account.');
    }

    public function activate($guid)
    {
        $model = new UserModel();
        $user = $model->where('usr_guid', $guid)->first();

        if ($user) {
            $model->update($user['id'], ['usr_email_verified_at' => Time::now()]);
            return redirect()->to('/login')->with('success', 'Account activated successfully. You can now log in.');
        } else {
            return redirect()->to('/login')->with('error', 'Invalid activation link.');
        }
    }

    private function sendActivationEmail($email, $guid)
    {
        $emailService = \Config\Services::email();

        $emailService->setTo($email);
        $emailService->setSubject('Account Activation');
        $emailService->setMessage('Please click the following link to activate your account: ' . base_url('activate/' . $guid));

        $emailService->send();
    }
}
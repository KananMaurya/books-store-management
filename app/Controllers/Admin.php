<?php
namespace App\Controllers;

class Admin extends BaseController {

    public function login()
    {
        // if ($this->session->get('isLoggedIn') && $this->session->get('role') === 'admin') {
        //     // ❌ OLD: return redirect()->to('/admin/dashboard');
        //     // ✅ NEW: Use route name instead of hard-coded URL
        //     return redirect()->to('admin/dashboard');
        // }

        $data = ['title' => 'Admin Login'];
        return view('admin/login', $data);
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
      

        if ($username === 'admin' && $password === '12345') {
            $this->session->set([
                'isLoggedIn' => true,
                'role'       => 'admin',
                'username'   => $username,
            ]);

            // ❌ OLD: return redirect()->to('/admin/dashboard');
            // ✅ NEW: Use route name
            return redirect()->to('admin/dashboard');
        }

        return redirect()->back()->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        $this->session->destroy();
        // ❌ OLD: return redirect()->to('/admin/login');
        // ✅ NEW: Use route name
        return redirect()->to('admin/login');
    }

    public function dashboard()
    {
        // $this->checkAdmin();

        $data = [
            'title'    => 'Admin Dashboard',
            'username' => $this->session->get('username'),
        ];

        return $this->renderAdmin('admin/dashboard', $data);
    }

    public function users()
    {
        // $this->checkAdmin();

        $data = ['title' => 'Manage Users'];
        return $this->renderAdmin('admin/users', $data);
    }
}
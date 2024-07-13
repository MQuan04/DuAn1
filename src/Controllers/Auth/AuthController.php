<?php

namespace Minhquan\Asm\Controllers\Auth;

use Minhquan\Asm\Controller;
use Minhquan\Asm\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $this->render('auth/login');
    }

    public function login()
    {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if (!$email || !$password) {
            $this->render('auth/login', ['error' => 'Vui lòng nhập đầy đủ email và mật khẩu']);
            return;
        }

        $userModel = new User();
        $user = $userModel->getUserByEmailPassword($email, $password);

        if ($user && $user['role'] === 'admin') {
            $_SESSION['is_admin'] = true;
            $_SESSION['user'] = $user;
            header('Location: /admin/dashboard');
            exit;
        } else {
            $this->render('auth/login', ['error' => 'Email hoặc mật khẩu không đúng hoặc không phải admin']);
            return;
        }
    }

    public function logout()
    {
        unset($_SESSION['is_admin']);
        unset($_SESSION['user']);
        header('Location: /');
        exit();
    }
}

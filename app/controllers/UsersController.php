<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UsersController
 */

class UsersController extends Controller {
    public function __construct()
    {
        parent::__construct();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->call->model('UsersModel');
    }

    public function index()
    {
        // Check if logged in
        if (!isset($_SESSION['user'])) {
            redirect('/auth/login');
            exit;
        }

        $logged_in_user = $_SESSION['user']; 
        $data['logged_in_user'] = $logged_in_user;

        // Pagination setup
        $page = isset($_GET['page']) ? (int) $this->io->get('page') : 1;
        $q = isset($_GET['q']) ? trim($this->io->get('q')) : '';
        $records_per_page = 10;

        $users = $this->UsersModel->page($q, $records_per_page, $page);
        $data['user'] = $users['records'];
        $total_rows = $users['total_rows'];

        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('custom');
        $this->pagination->initialize($total_rows, $records_per_page, $page, 'users?q='.$q);
        $data['page'] = $this->pagination->paginate();

        $this->call->view('users/index', $data);
    }

    // ✅ Admin only
    public function create()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            show_error('Access denied. Only admin can add users.', 403);
            return;
        }

        if ($this->io->method() === 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');  

            $data = [
                'username' => $username,
                'email' => $email,
                'role' => $this->io->post('role'),
                'password' => password_hash($this->io->post('password'), PASSWORD_BCRYPT),
                'created_at' => date('Y-m-d H:i:s')
            ];

            if ($this->UsersModel->insert($data)) {
                redirect('/users');
            } else {
                echo 'Failed to create user.';
            }
        } else {
            $this->call->view('users/create');
        }
    }

    // ✅ Admin only
    public function update($id)
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            show_error('Access denied. Only admin can update users.', 403);
            return;
        }

        $user = $this->UsersModel->get_user_by_id($id);
        if (!$user) {
            echo "User not found.";
            return;
        }

        if ($this->io->method() === 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');
            $role = $this->io->post('role');
            $password = $this->io->post('password');

            $data = [
                'username' => $username,
                'email' => $email,
                'role' => $role,
            ];

            if (!empty($password)) {
                $data['password'] = password_hash($password, PASSWORD_BCRYPT);
            }

            if ($this->UsersModel->update($id, $data)) {
                redirect('/users');
            } else {
                echo 'Failed to update user.';
            }
        } else {
            $data['user'] = $user;
            $data['logged_in_user'] = $_SESSION['user'];
            $this->call->view('users/update', $data);
        }
    }

    // ✅ Admin only
    public function delete($id)
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            show_error('Access denied. Only admin can delete users.', 403);
            return;
        }

        if ($this->UsersModel->delete($id)) {
            redirect('/users');
        } else {
            echo 'Failed to delete user.';
        }
    }

    public function register()
    {
        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = password_hash($this->io->post('password'), PASSWORD_BCRYPT);

            $data = [
                'username' => $username,
                'email'    => $this->io->post('email'),
                'password' => $password,
                'role'     => $this->io->post('role'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            if ($this->UsersModel->insert($data)) {
                redirect('/auth/login');
            }
        }

        $this->call->view('/auth/register');
    }

    public function login()
    {
        $this->call->library('auth');
        $error = null;

        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            $user = $this->UsersModel->get_user_by_username($username);

            if ($user) {
                if ($this->auth->login($username, $password)) {
                    $_SESSION['user'] = [
                        'id'       => $user['id'],
                        'username' => $user['username'],
                        'role'     => $user['role']
                    ];

                    if ($user['role'] == 'admin') {
                        redirect('/users');
                    } else {
                        redirect('/users'); // or /songs if you want
                    }
                } else {
                    $error = "Incorrect password!";
                }
            } else {
                $error = "Username not found!";
            }
        }

        $this->call->view('auth/login', ['error' => $error]);
    }

    public function dashboard()
    {
        $page = isset($_GET['page']) ? (int) $this->io->get('page') : 1;
        $q = isset($_GET['q']) ? trim($this->io->get('q')) : '';
        $records_per_page = 10;

        $user = $this->UsersModel->page($q, $records_per_page, $page);
        $data['user'] = $user['records'];
        $total_rows = $user['total_rows'];

        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('bootstrap');
        $this->pagination->initialize($total_rows, $records_per_page, $page, 'users?q='.$q);
        $data['page'] = $this->pagination->paginate();

        $this->call->view('user/dashboard', $data);
    }

    public function logout()
    {
        $this->call->library('auth');
        $this->auth->logout();
        redirect('auth/login');
    }
}
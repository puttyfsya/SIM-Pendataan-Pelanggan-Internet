<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url'); // Load the URL helper
        $this->load->library('session'); // Load the Session library
        $this->load->library('form_validation'); // Load the Form Validation library
        $this->load->model('LoginAdmin'); // Load the LoginAdmin model

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', 'Masukkan data terlebih dahulu...');

        if ($this->form_validation->run() == false) {
            $this->load->view('Login/headerLogin');
            $this->load->view('Login/formLogin');
            $this->load->view('Login/footerLogin');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $cekLogin = $this->LoginAdmin->cekLogin($email, $password);

            if ($cekLogin !== null) {
                $user_email = $cekLogin->email;

                if ($user_email === 'adminInflynetworks@gmail.com') {
                    // Level admin
                    $this->session->set_userdata('email', $user_email);
                    redirect('DashboardAdmin'); // Redirect to admin dashboard
                } elseif ($user_email === 'superadminInflynetworks@gmail.com') {

                    $this->session->set_userdata('email', $user_email);
                    redirect('DashboardSuperAdmin'); // Redirect to super admin dashboard
                } else {
                    $this->session->set_flashdata('pesan', 'Email pengguna tidak valid');
                    redirect('Welcome');
                }
            } else {
                // Jika login gagal
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Username atau password salah</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                redirect('Welcome'); // Redirect back to login page
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();

        $this->load->helper('url'); // Load the URL helper
        redirect('Welcome'); // Use redirect() function
    }
}

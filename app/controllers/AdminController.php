<?php
    namespace App\Controllers;

    class AdminController extends Controller {
        public function index() {
            if(isset($_SESSION['user'])) {
                if($_SESSION['user']['role'] !== 'admin') {
                    header('location: ./');die;
                }
            }
            if(!isset($_SESSION['user'])) {
                header('location: ./');die;
            }
            $title = 'Dashboard';

            return $this->view('admin/dashboard', ['title' => $title]);
        }
    }
?>
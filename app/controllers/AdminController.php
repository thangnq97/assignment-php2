<?php
    namespace App\Controllers;

    class AdminController extends Controller {
        public function index() {
            $title = 'Dashboard';

            return $this->view('admin/dashboard', ['title' => $title]);
        }
    }
?>
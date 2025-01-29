<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('welcome');
    }
    public function table() {
        return view('page.table');
    }
    public function dataTable() {
        return view('page.dataTable');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category_boxes;

class CategoryBoxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Sets title and route
        $data['section_title'] = 'Category Box Administration';
        $data['section_route'] = 'category_boxes';

        return view('admin/category_box', $data);
    }
}

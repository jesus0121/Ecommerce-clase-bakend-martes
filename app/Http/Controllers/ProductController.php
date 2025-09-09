<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        return 'List products';
    }

    function detail($id, $category = null)
    {
        if ($category != null) {

            return 'Detail products: ' . $id . ". With category: " . $category;
        } else {
            return 'Detail products: ' . $id;
    }

    function create(){
            return "FORM FOR CREATE PRODUCTS";
        }
    }
}

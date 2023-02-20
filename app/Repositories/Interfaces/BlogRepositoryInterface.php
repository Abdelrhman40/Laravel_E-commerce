<?php

namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

interface BlogRepositoryInterface
{
    public function adminPage();
    public function home();
    public function products();
    public function create();
    public function store(Request $request);
    public function show($id);
    public function showadmin($id);
    public function edit($id);
    public function update(Request $request , $id);
    public function delete($id);
    public function filter($val);
    public function addcart($id);
    public function gotocart();
    public function deletecart($id);
}

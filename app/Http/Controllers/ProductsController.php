<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductUser;
use Illuminate\Http\Request;
use function PHPSTORM_META\type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Redirect;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Repositories\Interfaces\BlogRepositoryInterface;

class ProductsController extends Controller
{
    private $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    public function adminPage(){
        return $blog =$this->blogRepository->adminPage();
    }
    public function home(){
        return $blog =$this->blogRepository->home();
    }
    public function products(){
        return $blog =$this->blogRepository->products();
    }
    public function create(){
        return $blog =$this->blogRepository->create();
    }
    public function store(Request $request){
        return $blog =$this->blogRepository->store($request);
    }
    public function show($id){
        return $blog =$this->blogRepository->show($id);
    }
    public function showadmin($id){
        return $blog =$this->blogRepository->showadmin($id);
    }
    public function edit($id){
        return $blog =$this->blogRepository->edit($id);

    }
    public function update(Request $request , $id)
    {
        return $blog =$this->blogRepository->update($request,$id);
    }

    public function delete($id){
        return $blog =$this->blogRepository->delete($id);
    }

    public function filter($val){
        return $blog =$this->blogRepository->filter($val);
    }

    public function addcart($id){
        return $blog =$this->blogRepository->addcart($id);
    }

    public function gotocart(){
        return $blog =$this->blogRepository->gotocart();
    }

    public function deletecart($id){
        return $blog =$this->blogRepository->deletecart($id);
    }


}

<?php
namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\NewModel;
use App\Models\UserModel;
use App\Request;

class ProductController extends Controller {

    public function index(){
        $categories = CategoryModel::all();
        $featureProduct = ProductModel::limit(4);
        $news = NewModel::all();
       return $this->view("index", ['categories' => $categories, 'featureProduct' => $featureProduct, 'news' => $news]);
    }
    public function detailproduct(Request $request){
        $id = $request->getBody()['id'];
        $primary = 'product_id';
        $relateProduct = ProductModel::limit(4);
        $detailProduct = ProductModel::findOne($primary,$id);
        return $this->view("detailProduct", ['detailProduct' => $detailProduct, 'relateProduct' => $relateProduct]);
        exit;
    }
    public function shop(){
        $categories = CategoryModel::all();
        $products = ProductModel::all();
        return $this->view("shop", ['categories' => $categories, 'products' => $products]);
        exit;
    }
    public function login(){
        $user = UserModel::all();
        return $this->view("login", ['user' => $user]);

    }
    public function loginPost(Request $request){
        $user = 'user_id';
        $data = $request->getBody();
        $error = [];
        $user = new UserModel();
        $user = $user->checkUser($data['user_id']);
        $password = $user->findOne($user, $data['user_id']);
        if($data['user_id'] =="admin" && $data['password'] = 123456){
            $_SESSION['username'] = $user;
            header("Location: /admin/list");
        }
        if($user) {
                    if($data['password'] = $password){
                    $_SESSION['username'] = $user;
                    header("Location: /");
                }
        }
    }
    public function register(){
        return $this->view("register");
    }
    public function listProduct(){
        $products = ProductModel::all();
        $categories = CategoryModel::all();
        return $this->view("admin/products/list", ['categories' => $categories, 'products' => $products]);
    }
    public function deleteProduct(Request $request){
        $id = $request->getBody()['id'];
        $p = new ProductModel();
        $primary = "product_id";
        $p->delete($primary, $id);
        header('location: admin/list');
    }
    public function deleteCategory(Request $request){
        $id = $request->getBody()['id'];
        $p = new CategoryModel();
        $primary = "type_id";
        $p->delete($primary, $id);
        header('location: admin/list');
    }
    public function createget(){
        $categories = CategoryModel::all();
        return $this->view("admin/products/add", ['categories' => $categories]);
    }
    public function createproduct(Request $request){
        $p = $request->getBody();
        $image = $_FILES['product_avatar']['name'];
        move_uploaded_file($_FILES['product_avatar']['tmp_name'], "./src/imgs/img_product". $image);
        $p['product_avatar'] = $image;
        $product = new ProductModel();
    
        $product->insert($p);
        
        header('location: admin/list');

    }
    public function updateget(Request $request){
        $id = $request->getBody()['id'];
        $primary = 'product_id';
        $product = ProductModel::findOne($primary, $id);
        $categories = CategoryModel::all();
        return $this->view('admin/products/update', 
        [
        'product' => $product,
        'categories' => $categories,
        ]);
}
    public function updateProduct(Request $request){
        $data = $request->getBody();
        $id = $data['product_id'];
        unset($data['product_id']);
        if($_FILES['product_avatar']['size'] > 0){
        $data['product_avatar'] = $_FILES['product_avatar']['name'];
        move_uploaded_file($_FILES['product_avatar']['tmp_name'], "images/".  $data['product_avatar']);
        }
        $p = new ProductModel();
        $p->update($id, $data);
        var_dump($data);
        header('location: /admin/list');
        exit;
    }
}
?>
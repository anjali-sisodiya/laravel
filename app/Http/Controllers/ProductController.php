<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Productmodel;
use App\Models\User;
class ProductController extends Controller
    {
//******************************Registration page***********************
    public function create(){
    return view('product.create');
    }

// *****************************Store Registration info*****************
    public function storeinfo()
    {
   
    $this->validate(request(), [
    'name' => 'required',
    'email' => 'required|email',
    'password' => 'required'
    ]);
    $user = User::create(request(['name', 'email', 'password']));
    if ($user) {
    auth()->login($user);
    return redirect()->to('/addproduct');
    } else {
    }
    }

// ******************************Login page******************************

    public function showloginpage(){
    return view('product.login');
    }

// ******************************Login functionality*********************

    public function login(Request $request)
    {
    $request->validate([
    'email' => 'required|email',
    'password' => 'required'
    ]);
    $user = User::where('email', $request->email)->first();
    if ($user) {
    if (Hash::check($request->password, $user->password)) {
    $request->session()->put('User_name', $user->name);
    return redirect()->to('/addproduct'); 
    }else{
    echo "Password not match";
    }
    }else{
    echo "This email is not registered"; 
    }
    return redirect()->to('/showloginpage');
    }

// ******************************Logout***********************************

    public function logout(){
    session()->forget('User_name');
    return redirect('/showloginpage');
    }

// *****************************Add product page**************************

    public function addproduct(){
    return view('product.addproduct');
    }

// *****************************Add product in db**************************

    public function store(Request $request)
    {
    $member = new Productmodel;
    $member->product_name= $request->input('p_name');
    $member->product_price= $request->input('p_price');
    if($request->hasFile('image')&& $request->file('image')->isValid()){
    $file= $request->file('image');
    $extension= $file->getClientOriginalExtension();
    $filename = time().'.'. $extension;
    $file->move('upload/', $filename);
    $member['image'] = 'upload/' .$filename;
    }
    $result = $member->save();
    if( $result){
    return redirect()->to('/showlist');
    }else{
    echo "Something went wrong";
    }
    }

// *****************************Product items list**************************

    public function showlist() {
    $show = Productmodel::all();
    // dd($show);
    return view('product.productlist', ['show' => $show]);
    }

// *****************************Edit product*********************************

    public function edit($id){
    $show = Productmodel::find($id);
    return view('product.editproduct', ['show' => $show]);
    }

// *****************************Update Product********************************

    public function update(Request $request,$id)
    {
    $member = Productmodel::find($id);
    $member->product_name = $request->input('p_name');
    $member->product_price = $request->input('p_price');
    if($request->hasFile('image')&&
    $request->file('image')->isValid()){
    $file= $request->file('image');
    $extension= $file->getClientOriginalExtension();
    $filename = time().'.'. $extension;
    $file->move('upload/',$filename);
    $member['image'] = 'upload/' .$filename;
    }
    $member->update();
    return redirect()->to('/showlist');
    }

// *****************************Trash Product**********************************

    public function trash($id){
    $product = Productmodel::where('id',$id)->first();
    $product->delete();
    return redirect()->to('/showlist');
    }

// *****************************Undo functionality******************************

    public function undo(){
    $show = Productmodel::onlyTrashed()->get();
    return view('product.recycle_bin', ['show' => $show]);
    }

// *****************************Restore functionality****************************

    public function restore($id){
    $product = Productmodel::withTrashed()->find($id);
    if(!is_null($product)){
    $product->restore();
    }
    return redirect()->to('/showlist');
    }

// *****************************Delete Functionality******************************
    public function delete($id){
    $product = Productmodel::withTrashed()->find($id);
    if(!is_null($product)){   
    $product->forceDelete();
    }
    return redirect()->to('/showlist');
    }
}
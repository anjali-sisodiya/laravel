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
//return redirect()->to('/login');
}
********************************************************
public function login(Request $request)
{
$credentials = $request->validate([
'email' => 'required|email',
'password' => 'required'
]);
if(Auth::attempt($credentials))
{
//return redirect()->intended('addproduct')->withSuccess('login sucessfull');
return redirect()->route('addproduct')->withSuccess('Login successful');
}
return back()->withErrors([
'email' => 'The provided credentials do not match our records.',
]);
}
public function logout(Request $request){
Auth::logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
return redirect('/showloginpage');
}
***************************************************
Route::middleware(['auth'])->group(function () {
Route::get('/addproduct', [ProductController::class, 'addproduct'])->name('addproduct');
});
++++++++++++++++++++products table++++++++++++++++++++++++++
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateProductsTable extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::create('products', function (Blueprint $table) {
$table->id();
$table->string('product_name');
$table->integer('product_price');
$table->string('image')->nullable();
$table->timestamps();
});
}
/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
Schema::dropIfExists('products');
}
}
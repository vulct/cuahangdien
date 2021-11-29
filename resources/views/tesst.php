public function cart(Product $product){

$cart = session()->get('cart');

// If Cart is empty, add a new array in the session
if ($cart == []) {
$cart[] = $product;
session()->put('cart', $cart);
}else{
// else if not empty, loop the cart and look if similar product is in the cart.
foreach ($cart as $product_item) {
if ($product->id == $product_item["id"]) {
$product_item["quantity"] += 1;
$found = true;
}
}

if($found !== true) {
$cart[] = $product;
session()->put('cart', $cart);
}
}

return back();
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Auth;

class ProductController extends Controller
{
    public function productAll() {
        return view('product.productAll',[
            'product' => \App\Models\Product::all(),
        ]);
    }
    public function productPage($id) {
        return view('product.productPage',[
            'product' => \App\Models\Product::find($id),
            'user' => \App\Models\User::all(),
        ]);
    }

    public function profileUser($id) {
        return view('product.profileUser',[
            'user' => \App\Models\User::find($id),
            'review' => \App\Models\Review::all(),
        ]);
    }
    public function profileAuth() {
        return view('product.profileAuth',[
            'user' => \App\Models\User::find(Auth::id()),
            'review' => \App\Models\Review::all(),
            'product' => \App\Models\Product::all(),
        ]);
    }

////////////////////////////////////////////////////////////////////////////////////////

    public function create() {
        return view('product.create', ['category_of_product' => \App\Models\CategoryOfProduct::all()]);
    }

    public function store(Request $request, \App\Models\Product $product) {
        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('img'), $newImageName);

        $id = Auth::id();
        $product->user_id = $id;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->image = '/img/' . $newImageName;
        $product->category = $request->input('category');
        $product->lendTime = $request->input('lendTime');

        if($product->save()){
            return redirect('/producten');
        }
        return redirect('producten/maak');
    }

    public function editState($id) {
        $product = Product::find($id);
        $product->state = "Lending";
        $product->lender = Auth::id();
        $product->lendTimePlusTime = time() + ($product->lendTime * 60);
        $product->save();

        return redirect('producten/');
    }

    public function checkForProducts() {
        $products = product::all();

        foreach ($products as $p) {
            if ($p->state == "Lending") {
                if ($p->lendTimePlusTime < time()) {
                    $p->state = "Pending";

                    $p->lendTimePlusTime = NULL;
                    $p->save();
                }
            }
        }
    }

    public function productReturn($id) {
        return view('product.productReturning',[
            'product' => \App\Models\Product::find($id),
            'user' => \App\Models\User::all(),
        ]);
    }

    public function productAccept(Request $request, \App\Models\Review $review, $id) {
        $product = Product::find($id);

        $review->review = $request->input('review');
        $review->user_id = $product->lender;
            
        if ($product->state == "Pending") {
            $product->state = "Lendable";
            $product->lender = NULL;
            if ($review->save()) {
                $product->save();
                return redirect('profiel/');
            }
        }
        else {
            return redirect('profiel/');
        }
    }

    public function deleteProduct($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect('producten/');
    }

    public function blockUser($id) {

        $products = product::all();
        $user = User::find($id);

        if ($user->role == "User") {
            foreach ($products as $p) {
                if ($p->user_id == $user->id) {
                    $p->state = "Blocked";
                    $user->role = "Guest";
                    if ($user->save()) {
                        $p->save();
                    }
                }
            }
        }
        elseif ($user->role == "Guest") {
            foreach ($products as $p) {
                if ($p->user_id == $user->id) {
                    $p->state = "Lendable";
                    $user->role = "User";
                    if ($user->save()) {
                        $p->save();
                    }
                }
            }
        }
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{

    /**
     * Display a listing of the prducts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->forget('product');
        $products = Product::all();
        return view('products.index',compact('products',$products));
    }

    /**
     * Show the step 1 Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep1(Request $request)
    {
        $product = $request->session()->get('product');
        return view('products.create-step1',compact('product', $product));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateStep1(Request $request)
    {

        $validatedData = $request->validate([
            
            'contentOfInquiry' => 'required',
            'content'=>'required|max:500',
            'companyName'=>'required|max:50',
            'departmentName'=>'max:50',
            'name' => 'required|max:20',
            'furigana'=>'max:50',
            'phoneNo' => 'required|max:20',
            'email'  =>  'required|email',
            'agree' => 'accepted',
        ]);

        if(empty($request->session()->get('product'))){
            $product = new Product();
            $product->fill($validatedData);
            $request->session()->put('product', $product);
        }else{
            $product = $request->session()->get('product');
            $product->fill($validatedData);
            $request->session()->put('product', $product);
        }
        
        return redirect('/products/create-step3');

    }

    /**
     * Show the Product Review page
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep3(Request $request)
    {
        $product = $request->session()->get('product');
        return view('products.create-step3',compact('product',$product));
    }

    /**
     * Store product
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->session()->get('product');
        $product->save();

        $data =array(

            'contentOfInquiry' => $product->contentOfInquiry,
            'content'=>$product->content,
            'companyName'=>$product->companyName,
            'departmentName'=>$product->departmentName,

            'name'=> $product->name,

            'furigana' => $product->furigana,
            'phoneNo' => $product->phoneNo,
            'email' => $product->email
        );

        Mail::send('contact',$data,function($message)use ($data){
            $message->from('12996pep@gmail.com');
            $message->to($data['email']);
            $message->subject('Thanks your inquiry');
        });

        return redirect('/products');
    }
}
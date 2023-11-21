<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Products;

class Api_transactions extends Controller
{
    public function index(){
        
		$data = Transactions::select('*')->orderBy('id')->paginate(10);

        return response()->json($data);
    }
	
	public function savetransaksi(Request $request)
    {
		$quantity=$request->input('quantity');
		$product_id=$request->input('product_id');
		if(empty($quantity)){
			return response()->json([
				'code'=>'0000',
				'message'=>'Quantity tidak boleh kosong'
			]);
		}else if(empty($product_id)){
			return response()->json([
				'code'=>'0000',
				'message'=>'Product_id tidak boleh kosong'
			]);
		}else{
			$dataproduk = Products::find($product_id);
			if($dataproduk){
				$lasttransactions = Transactions::select('*')->orderBy('id', 'desc')->first();
				$tglnow=date('ymd');
				$num_padded = sprintf("%011d", ($lasttransactions->id+1));
				$reference_no = 'INV'.$tglnow.$num_padded;
				$payment_amount=$dataproduk->price*$quantity;
				$data = [
					'reference_no' => $reference_no,
					'price' => $dataproduk->price,
					'quantity' => $quantity,
					'payment_amount' => $payment_amount,
					'product_id' => $product_id,
					'created_at' => date('Y-m-d H:i:s')
				];
				
				//$Transactions = Transactions::create($data);
				return response()->json([
					'code'=>'20000',
					'message'=>'OK',
					'data'=>$data
				]);
			}else{
				return response()->json([
					'code'=>'0000',
					'message'=>'Product_id tidak terdaftar'
				]);
			}
		}
		
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Products;

class Produk extends Controller
{
    public function index()
    {      
        if (Auth::check()) 
        {
            return view('produk');
        }
        else
        {
            return redirect('login');
        }
    }
	public function get_product()
	{
		if (Auth::check()) 
        {
			$search = request('search');
            $data = Products::when($search, function ($query, $search) {
					return $query->where('name', 'like', "%$search%")
						->orWhere('price', 'like', "%$search%")
						->orWhere('stock', 'like', "%$search%")
						->orWhere('description', 'like', "%$search%");
				})->select(['id','name', 'price', 'stock', 'description'])->orderBy('id')->paginate(10);

			return response()->json($data);
        }
        else
        {
            return redirect('login');
        }
	}

    public function saveproduk(Request $request)
    {
		$id_edit = request('id_edit');
		if ($id_edit != "null") {
			$data = Products::find($id_edit);
			$data->name = request('name');
			$data->price = request('price');
			$data->stock = request('stock');
			$data->description = request('description');
			$data->save();
		}else{		
			$data = [
				'name' => $request->input('name'),
				'price' => $request->input('price'),
				'stock' => $request->input('stock'),
				'description' => $request->input('description'),
				'created_at' => date('Y-m-d H:i:s')
			];
			
			$Products = Products::create($data);
		}
        return response()->json('sukses', 200);

    }

	public function get_produkById($id)
	{
		$dt = Products::find($id);

		return response()->json($dt, 200);
	}
	
	public function hapus_produk($id)
	{
		Products::where('id', $id)->delete();
		return response()->json('sukses', 200);
	}
}
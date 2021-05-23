<?php

namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{

    public function index($id)
    {
        $rent = Rent::findOrFail($id); 
        return response()->json(['rent' => $rent]);
    }
    public function store(Request $request){
        $rent = new Rent;

        $user = auth()->user();
        $rent->user_id = $user->id;
        $rent->book_id = $request->book_id;
        $rent->data_recebimento = $request->data_recebimento;
        $rent->data_entrega = $request->data_entrega;

        if($rent->save()){
            return response()->json(['Livro alugado com sucesso.'],200);  
        } else {
            return response()->json(['Erro ao alugar o livro tenet mais tarde.'],404);
        }
    }
}

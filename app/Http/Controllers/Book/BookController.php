<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //listando dados
    public function index()
    {
        $books = Book::all();
        return response()->json(['books' => $books]);        
    }
    //retornando o dono do livro
    public function show($id)
    {
        $books = Book::findOrFail($id); 
        $ownerBook = User::where('id',$books->user_id)->first()->toArray();
        return response()->json(['books' => $books, 'ownerBook' => $ownerBook]);
    }
    //criando livros
    public function store(Request $request)
    {
        $book = new Book;        
        $request->validate([
            'titulo' => 'required|unique:books',
            'descricao' => 'required|unique:books',
            'autor' => 'required|unique:books',
        ]);

        $user = auth()->user();
        $book->user_id = $user->id;

        $book->titulo = $request->titulo;
        $book->descricao = $request->descricao;
        $book->autor = $request->autor;
        
        if($book->save()){
            return response()->json(['Livro cadastrado com sucesso.'],200);  
        } else {
            return response()->json(['Erro ao cadastrar livro.'],404);
        }
    }
    //editando um livro
    public function edit(Request $request)
    {
        $user = auth()->user();
        $book = new Book;  
        if($user->id != $book->user_id){
            return response()->json(['Você não tem permissão para realiar essa ação.'],404);
        }
        $data = $request->all();
        Book::findOrFail($request->id)->update($data);
        return response()->json(['Livro alterardo com sucesso.'],200); 
    }
    //apagando um livro
    public function destroy($id)
    {
        $user = auth()->user();
        $book = new Book;  
        if($user->id != $book->user_id){
            return response()->json(['Você não tem permissão para realiar essa ação.'],404);
        }
        Book::findOrFail($id)->delete(); 
        return response()->json(['Livro apagado com sucesso.'],200); 
    }
}

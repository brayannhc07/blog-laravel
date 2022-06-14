<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:256",
            "description" => "required|"
        ]);

        $article = new Article;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->save();

        return redirect()->route("articles")->with("success", "Artículo creado correctamente");
    }

    public function index()
    {
        $articles = Article::all();
        return View('articles.index', ['articles' => $articles]);
    }

    public function showNew()
    {
        return View('articles.show', ['new' => TRUE]);
    }

    public function showEdit($id)
    {
        $article = Article::find($id);
        return View('articles.show', ['new' => FALSE, 'article' => $article]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required|max:256",
            "description" => "required|"
        ]);

        $article = Article::find($id);
        $article->title = $request->title;
        $article->description = $request->description;
        $article->save();

        return redirect()->route("articles")->with("success", "Artículo actualizado correctamente");
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect()->route("articles")->with("success", "Artículo eliminado correctamente");
    }
}

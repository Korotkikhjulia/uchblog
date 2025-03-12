<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $title = 'Home Page';
        // $products = Product::with(['category', 'status'])->where('hidden', 0)->where('uhidden', 0)->where('status_id', 2)->orderBy('id', 'desc')->paginate(10);
        $products = Post::query()->orderBy('id', 'desc')->get();
        $sort = $request->get('sort', 'created_at'); // по умолчанию сортируем по дате
        $order = $request->get('order', 'desc'); // по умолчанию по убыванию

        // Запрос для получения постов с сортировкой
        $posts = Post::orderBy($sort, $order)->get();
        return view('home', compact('title', 'products', 'posts', 'sort', 'order'));
    }

    public function show($id)
    {
        $product = Post::query()->where('id', $id)->firstOrFail();
        $pr = Post::query()->where('id', $id)->firstOrFail();
        return view('show', compact('product', 'pr'));
    }

    public function create()
    {
        $title = 'Create Page';
        return view('create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|min:10',
        ]);
        $user_id = Auth::user()->id;
        $data = $request->all();
        $data['user_id'] = $user_id;
        $product = Post::create($data);
        return redirect()->route('home')->with('success', 'Пост успешно добавлен!');
    }

    public function edit(string $id)
    {
        $product = Post::query()->where('id', $id)->firstOrFail();
        return view('edit', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|min:10',
        ]);
        $product = Post::find($id);
        $data = $request->all();
        $product->update($data);
        return redirect()->route('home')->with('success', 'Изменения сохранены');
    }

    public function destroy(string $id)
    {
        $product = Post::find($id);
        $product->delete();
        return redirect()->route('home')->with('success', 'Пост удален!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Получаем текст из поисковой строки
    
        // Если строка поиска пуста, сразу возвращаем пустой массив
        if (empty($query)) {
            return response()->json([]);
        }
    
        // Ищем посты, заголовок которых содержит введенный текст
        $posts = Post::where('title', 'LIKE', "%{$query}%")->get();
    
        // Возвращаем результат в формате JSON
        return response()->json($posts);
    }
}

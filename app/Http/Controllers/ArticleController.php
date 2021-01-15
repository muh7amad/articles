<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\Self_;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    public static $uploadPaths = array(
        'article_photos' => '/uploads/articles_images',

    );
    public function __construct()
    {
        $this->middleware('auth');
    }
public function index()
{
$articles = Article::all();
    $categories = Category::all();
    $categoryName = 'null';
return view('articles.index',compact('articles','categories','categoryName'));
}
public function articles(){
        $articles = Article::with(['category'])->get();
        return view('articles.articles',compact('articles'));
}
    public function create(){
        $categories = Category::all();
        return view('articles.create',compact('categories'));
    }

    public function save(Request $request){
        $articleTitle =$request->get('title');
        $articleDetails = $request->get('details');
        $photoURL =$request->file('photo');
        $categoryId = $request->get('category');
        //$thumb = Image::make($photoURL->getRealPath())->resize(100,100,function ($constraint){$constraint->aspectRatio();});


if (isset($photoURL)){
    //way 1
    $thumbName = time().'.'.$photoURL->getClientOriginalExtension();
    Image::make($photoURL->getRealPath())->resize(300,200)->save(public_path('/uploads/articles_images/thumb/'.$thumbName));

    //way 2
$photoName =uniqid("article_").'.'.$photoURL->getClientOriginalExtension();
$photoURL->move(public_path().self::$uploadPaths['article_photos'],$photoName);


}
else{
$photoName ='';
}
Article::create([
    'title'=>$articleTitle,
    'photo'=>$photoName,
    'details'=>$articleDetails,
    'thumb'=>$thumbName,
    'categoryId'=> $categoryId

]);
        return back();

    }

    public function details($id){

        //$article = Article::query()->find(1);
         $ppp =  DB::table('articles')->where('id',$id)->first();
       // $ttt = Article::where('id',1)->first();
        return view('articles.details',compact('ppp'));
    }

    public function getArticles($categoryId){
        //$articles = DB::table('articles')->where('categoryId',$categoryId)->get();
        $articles= Article::with(['category'])->where('categoryId', $categoryId)->get();
        $categories = Category::all();
        $categoryName = DB::table('category')->where('id',$categoryId)->first();
        return view('articles.index',compact('articles','categories','categoryName'));
    }
    public function favoriteArticle($articleId){

        \Auth::user()->favorites()->attach($articleId);
        return back();


    }
    public function unFavoriteArticle($articleId){

        \Auth::user()->favorites()->detach($articleId);

        return back();



    }
    public function getMyArticles()
    {
        $myFavorites = \Auth::user()->favorites ;

        return view('articles.myFavorites',compact('myFavorites'));
    }
    public function delete($articleId){
        try {
            Article::query()->find($articleId)->delete();
            return Redirect::route('all_articles');
        } catch (\Exception $e) {
        }
    }
}

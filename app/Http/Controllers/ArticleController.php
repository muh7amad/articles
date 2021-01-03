<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
return view('articles.index',compact('articles'));
}

    public function create(){
        return view('articles.create');
    }

    public function save(Request $request){
        $articleTitle =$request->get('title');
        $articleDetails = $request->get('details');
        $photoURL =$request->file('photo');
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
    'details'=>$articleDetails

]);
        return back();

    }

    public function details($id){

        //$article = Article::query()->find(1);
         $ppp =  DB::table('articles')->where('id',$id)->first();
       // $ttt = Article::where('id',1)->first();
        return view('articles.details',compact('ppp'));
    }
}

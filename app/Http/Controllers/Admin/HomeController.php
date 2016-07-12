<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\AdminUser;
use App\Models\One;
use App\Models\Blog;
use App\Models\Link;
use App\Models\Note;
class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(Request $request)
    {
        $article_count = Article::count();
        $category_count = Category::count();
        $tag_count = Tag::count();
        $user_count = AdminUser::count();
        $one_count = One::count();
        $blog_count = Blog::count();
        $link_count=Link::count();
        $note_count=Note::count();
        return view('admin.home',compact('article_count','category_count','tag_count','user_count','one_count','blog_count','link_count','note_count'));
    }
}
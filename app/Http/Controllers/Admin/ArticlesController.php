<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use DB;
use App\Models\Articles;
use App\Models\Comments;
use App\Models\Tag;

class ArticlesController extends Controller
{
    /**
     * 显示文章列表页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 根据条件搜索及获取分页
        $showCount = $request->input('showCount',10);
        // 文章标题搜索条件
        $search = $request->input('search','');
        // 文章作者搜索条件
        $author = $request->input('author','');
        // 文章审核搜索条件
        $astate = $request->input('astate','1');
        // 把分页和搜索条件存储起来提交回去
        $req = $request->all();
        // 从数据库拿出数据并且每页显示10条
        $articles = Articles::where('title','like','%'.$search.'%')->where('author','like','%'.$author.'%')->where('astate','like','%'.$astate.'%')->paginate($showCount );
        return view('admin.article.index',['articles'=>$articles,'req'=>$req,'title'=>'文章列表']);
    }

    /**
     * 显示添加文章页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        // 查询类别数据根据paths排序返回数据
        $cates = Cates::select('*',DB::raw("concat(cpath,',',cid) as paths"))->orderBy('paths','asc')->get();
        // 跳转到文章详情添加页面
        return view('admin.article.create',['title'=>'文章添加','cates'=>$cates,'tags'=>$tags]);
    }

    /**
     * 添加接收的文章,放进数据库
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'tag_id' => 'required',
            'author' => 'required',
            'acontent' => 'required'
        ],[
            'title.required' => '文章名称不能为空哦~',
            'tag_id.required' => '最少选择一个标签哟~(oﾟvﾟ)ノ',
            'author.required' => '作者是必填项啊~(￣┰￣*)',
            'acontent.required' => '文章怎么能没有内容呀!(ノ｀Д)ノ'
        ]);
        // 把提交过来的数据放进数据库
        $article = new Articles;
        $article->cid = $request->input('cid');
        $article->uid = $request->input('uid');
        $article->title = $request->input('title');
        $article->author = $request->input('author');
        $article->acontent = $request->input('acontent');
        // 判断数据是否存储成功
        if($article->save()){
            //处理标签
            try{
                $res = $article->tags()->sync($request->tag_id);
            }catch(\Exception $e){
                return back()->with('error','添加文章失败');
            }

            return back()->with('success','添加文章成功');
        }else{
            return back()->with('error','添加文章失败');
        }
    }

    /**
     * 显示审核的文章详情 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function astate($id)
    {
        $tags = Tag::all();
        $article = Articles::find($id);
        return view('admin.article.astate',['title'=>'文章审核','article'=>$article,'tags'=>$tags]);
    }

    /**
     * 指定文章过审 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function audit($id)
    {
        $article = Articles::where('aid','=',$id)->update(['astate'=>'11']);
        return back()->with('success','文章已过审');
    }

    /**
     * 指定文章推荐 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function switchup($id)
    {
        $article = Articles::where('aid','=',$id)->update(['state'=>'1']);
        return back();
    }

    /**
     * 指定文章下架
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function switchdown($id)
    {
        $article = Articles::where('aid','=',$id)->update(['state'=>'0']);
        return back();
    }

    /**
     * 查看指定id的文章详情
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 获取指定id的文章数据
        $article = Articles::find($id);
        return view('admin.article.show',['title'=>'文章详情','article'=>$article]);
    }

    /**
     * 显示文章详情修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        // 获取指定id的文章数据
        $article = Articles::find($id);
        // 查询类别数据根据paths排序返回数据
        $cates = Cates::select('*',DB::raw("concat(cpath,',',cid) as paths"))->orderBy('paths','asc')->get();
        return view('admin.article.edit',['title'=>'文章修改','article'=>$article,'cates'=>$cates,'tags'=>$tags]);
    }

    /**
     * 获取提交过来的数据,根据id修改数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'tag_id' => 'required',
            'author' => 'required',
            'acontent' => 'required'
        ],[
            'title.required' => '文章名称不能修改为空哦~',
            'tag_id.required' => '最少选择一个标签哟~(oﾟvﾟ)ノ',
            'author.required' => '作者是必填项啊~(￣┰￣*)',
            'acontent.required' => '文章怎么能没有内容呀!(ノ｀Д)ノ'
        ]);

        // 把获取的数据放进数据库
        $cid = $request->input('cid');
        $title = $request->input('title');
        $author = $request->input('author');
        $acontent = $request->input('acontent');

        // 把提交过来的数据放进指定数据表
        $res = Articles::where('aid','=',$id)->update(['cid'=>$cid,'title'=>$title,'author'=>$author,'acontent'=>$acontent]);
        if($res){
            $article = Articles::find($id);

            try{
                $res = $article->tags()->sync($request->tag_id);
            }catch(\Exception $e){
                return back()->with('error','修改文章失败');
            }

            return view('admin.article.show',['title'=>'文章详情','article'=>$article])->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 根据提交的id删除指定文章
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 删除指定的文章
        $res = Articles::where('aid','=',$id)->delete();
        if($res){
            return back()->with('success','删除文章成功');
        }else{
            return back()->with('error','删除文章失败');
        }
    }

    /**
     * 根据提交的id删除指定评论
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comment($id)
    {
        // 根据获取的id删除指定的评论
        $res = Comments::where('id','=',$id)->delete();
        if($res){
            return back()->with('success','删除评论成功');
        }else{
            return back()->with('error','删除评论失败');
        }
    }

}

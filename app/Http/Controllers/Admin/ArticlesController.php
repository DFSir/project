<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use DB;
use App\Models\Articles;
use App\Models\Tag;

class ArticlesController extends Controller
{
    /**
     * 显示文章类别页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Articles::paginate(10);
        return view('admin.article.index',['articles'=>$articles,'title'=>'文章添加']);
    }

    /**
     * 显示添加文章页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        // 根据paths排序返回数据
        $cates = Cates::select('*',DB::raw("concat(cpath,',',cid) as paths"))->orderBy('paths','asc')->get();
        // 跳转到文章详情添加页面
        return view('admin.article.create',['cates'=>$cates,'tags'=>$tags]);
    }

    /**
     * 添加接收的文章,放进数据库
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $article = new Articles;
        $article->cid = $request->input('cid');
        $article->uid = $request->input('uid');
        $article->title = $request->input('title');
        $article->author = $request->input('author');
        $article->acontent = $request->input('acontent');

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

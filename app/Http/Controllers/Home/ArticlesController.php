<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Tag;
use DB;
use App\Models\Huser;
use App\Models\Articles;

class ArticlesController extends Controller
{
    /**
     * 用户发布文章的列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取当前登录用户
        $uid = session('Huser')->uid;
        $user = Huser::find($uid);
        // 从数据库获取文章数据
        $artle = Articles::where('uid','=',$uid)->get();
        // 跳转到文章列表页
        return view('home.article.index',['artle'=>$artle,'user'=>$user]);
    }

    /**
     * 显示前台用户添加文章页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取当前登录用户
        $uid = session('Huser')->uid;
        $user = Huser::find($uid);
        // 获取标签
        $tags = Tag::all();
        // 查询类别数据根据paths排序返回数据
        $cates = Cates::select('*',DB::raw("concat(cpath,',',cid) as paths"))->orderBy('paths','asc')->get();
        // 跳转到文章详情添加页面
        return view('home.article.create',['cates'=>$cates,'tags'=>$tags,'user'=>$user]);
    }

    /**
     * 前台用户添加文章
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 给提交过来的数据做判断
        $this->validate($request, [
            'title' => 'required',
            'tag_id' => 'required',
            'author' => 'required',
            'acontent' => 'required',
            'photo' => 'required'
        ],[
            'title.required' => '文章名称不能为空哦~',
            'tag_id.required' => '最少选择一个标签哟~(oﾟvﾟ)ノ',
            'author.required' => '作者是必填项啊~(￣┰￣*)',
            'acontent.required' => '文章怎么能没有内容呀!(ノ｀Д)ノ',
            'photo.required' => '不能没有文章图片啊~=-='
        ]);
        //处理表单提交信息
        if($request -> hasFile('photo')){
            $photo = $request -> file('photo');
            $ext = $photo ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/photo/'.date('Ymd',time());
            $res = $photo -> move($dir_name,$file_name);
            $photo_path = ltrim($dir_name.'/'.$file_name,'.');
        }

        // 把提交过来的数据放进数据库
        $article = new Articles;
        $article->cid = $request->input('cid');
        $article->uid = session('Huser')->uid;
        $article->title = $request->input('title');
        $article->author = $request->input('author');
        $article->acontent = $request->input('acontent');
        $article->photo = $photo_path;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 获取当前登录用户
        $uid = session('Huser')->uid;
        $user = Huser::find($uid);
        // 从数据库获取文章详情数据
        $artle = Articles::find($id);

        return view('home.article.show',['artle'=>$artle,'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取当前登录用户
        $uid = session('Huser')->uid;
        $user = Huser::find($uid);
        // 获取全部的标签
        $tags = Tag::all();
        // 获取指定id的文章数据
        $article = Articles::find($id);
        // 查询类别数据根据paths排序返回数据
        $cates = Cates::select('*',DB::raw("concat(cpath,',',cid) as paths"))->orderBy('paths','asc')->get();
        return view('home.article.edit',['article'=>$article,'cates'=>$cates,'tags'=>$tags,'user'=>$user]);
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
        // 给提交过来的数据做判断
        $this->validate($request, [
            'title' => 'required',
            'tag_id' => 'required',
            'author' => 'required',
            'acontent' => 'required'
        ],[
            'title.required' => '文章名称不能修改为空哦~',
            'tag_id.required' => '最少选择一个标签哟~(oﾟvﾟ)ノ',
            'author.required' => '作者是必填项啊~',
            'acontent.required' => '文章怎么能没有内容呀!(ノ｀Д)ノ'
        ]);

        // 把获取的数据拿到
        $cid = $request->input('cid');
        $title = $request->input('title');
        $author = $request->input('author');
        $acontent = $request->input('acontent');

        // 处理表单提交信息
        if($request -> hasFile('photo')){
            $photo = $request -> file('photo');
            $ext = $photo ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/photo/'.date('Ymd',time());
            $res = $photo -> move($dir_name,$file_name);
            $photo_path = ltrim($dir_name.'/'.$file_name,'.');
            // 把提交过来的数据放进指定数据表
            $res = Articles::where('aid','=',$id)->update(['photo'=>$photo_path]);
        }

        // 把提交过来的数据放进指定数据表
        $res = Articles::where('aid','=',$id)->update(['cid'=>$cid,'title'=>$title,'author'=>$author,'acontent'=>$acontent,'astate'=>'10','click'=>0,]);
        if($res){
            // 获取指定id的文章详情
            $article = Articles::find($id);
            // 修改文章的标签
            try{
                $res = $article->tags()->sync($request->tag_id);
            }catch(\Exception $e){
                return back()->with('error','修改文章失败');
            }

            return $this->index();
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 删除指定的文章
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
}

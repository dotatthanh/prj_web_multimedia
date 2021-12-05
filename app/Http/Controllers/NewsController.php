<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = News::paginate(10);

        if ($request->search) {
            $news = News::where('title', 'like', '%'.$request->search.'%')->paginate(10);
            $news->appends(['search' => $request->search]);
        }

        $data = [
            'news' => $news
        ];

        return view('news.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type', 0)->get();

        $data = [
            'categories' => $categories,
        ];

        return view('news.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        try {
            DB::beginTransaction();

            if ($request->file('image')) {
                $name = time().'_'.$request->image->getClientOriginalName();
                $file_path_image = 'uploads/news/'.$name;
                Storage::disk('public_uploads')->putFileAs('news', $request->image, $name);
            }
            
            $create = News::create([
                'title' => $request->title,
                'image' => $file_path_image,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'summary' => $request->summary,
            ]);
            
            DB::commit();
            return redirect()->route('news.index')->with('alert-success','Thêm tin tức thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Thêm tin tức thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::where('type', 0)->get();

        $data = [
            'data_edit' => $news,
            'categories' => $categories,
        ];

        return view('news.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        try {
            DB::beginTransaction();

            $data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'summary' => $request->summary,
            ];

            if ($request->file('image')) {
                $name = time().'_'.$request->image->getClientOriginalName();
                $file_path_image = 'uploads/news/'.$name;
                Storage::disk('public_uploads')->putFileAs('news', $request->image, $name);
                $data['image'] = $file_path_image;
            }

            $news->update($data);
            
            DB::commit();
            return redirect()->route('news.index')->with('alert-success','Sửa tin tức thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Sửa tin tức thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        try {
            DB::beginTransaction();

            News::destroy($news->id);
            
            DB::commit();
            return redirect()->route('news.index')->with('alert-success','Xóa tin tức thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Xóa tin tức thất bại!');
        }
    }
}

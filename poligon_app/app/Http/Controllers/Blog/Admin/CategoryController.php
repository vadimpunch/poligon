<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    protected $repository;


    public function __construct()
    {
        parent::__construct();
        $this->repository = app(BlogCategoryRepository::class);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     $paginator = $this->repository->getAllWithPaginate(15);

      return view('blog.admin.category.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategory();
        $categoryList = $this->repository->getForComboBox();

        return view('blog.admin.category.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();

        $item = new BlogCategory($data);
        $item->save();

        if($item->exists) {
            return redirect()->route('blog.admin.category.edit', $item->id)
                    ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['Ошибка сохранения']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $item = BlogCategory::findOrFail($id)
//        $categoryList = BlogCategory::all();
        $item = $this->repository->getEdit($id);
        $categoryList = $this->repository->getForComboBox();
        if(empty($item)) {
            abort(404);
        }



        return view('blog.admin.category.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        $item = $this->repository->getEdit($id);
        if(empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись с id = {$id} не найдена"])
                ->withInput();
        }
        $data = $request->all();

        if(empty($data['slug'])) {
            $data['slug'] = str_slug($data['title']);
        }

        $result = $item->update();
        if($result) {
             return redirect()->route('blog.admin.categories.edit', $item->id)
                    ->with(['success' => 'Успешно сохранено']);
        }else{
             return back()->withInput()->withErrors(['msg' => 'Ошибка сохранения']);
        }
    }

}

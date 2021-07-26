<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BlogPostRepository;
use App\Repositories\BlogCategoryRepository;

/**
 * Class PostController
 * @package App\Http\Controllers\Blog\Admin
 */

class PostController extends BaseController
{
    /**
     * @var BlogPostRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $repository;

    /**
     * @var BlogCategoryRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $categoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->repository = app( BlogPostRepository::class);
        $this->categoryRepository = app(BlogCategoryRepository::class);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->repository->getAllWithPaginate(15);
        return view('blog.admin.post.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogPost();
        $categoryList = $this->categoryRepository->getForComboBox();
        return view('blog.admin.post.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostCreateRequest $request)
    {
        $data = $request->input();
        $item = (new BlogPost())->create($data);

        $item->save();

        if($item->exists) {
            return redirect()->route('blog.admin.post.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['Ошибка сохранения']);
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
       $item = $this->repository->getEdit($id);
       if(!$item) {
           abort(404);
       }
       $categoryList = $this->categoryRepository->getForComboBox();

       return view('blog.admin.post.edit', compact('item', 'categoryList'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $item = $this->repository->getEdit($id);
        if(!$item) {
            return back()
                ->withErrors(['msg' => "Запись с id {$id} не найдена"])
                ->withInput();
        }
        $data = $request->all();

        $result = $item->update($data);

        if($result) {
            return redirect()
                ->route('blog.admin.post.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);

        } else {
            return back()
                ->withErrors(['msg' => "Запись с id {$id} не найдена"])
                ->withInput();
        }
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

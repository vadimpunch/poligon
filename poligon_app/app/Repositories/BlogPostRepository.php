<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\BlogPost as Model;

/**
 * Class BlogPostRepository.
 */
class BlogPostRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param null $perPage
     * @return mixed
     */
    public function getAllWithPaginate($perPage = 25)
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id'
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->with(['category' => function($query) {
                $query->select(['id', 'title']);
            },
                'user:id,name'
            ])
            ->orderBy('id', 'DESC')
            ->paginate($perPage);

        return $result;
    }


}

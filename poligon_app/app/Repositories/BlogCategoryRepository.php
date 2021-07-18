<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BlogCategoryRepository
 * @package App\Repositories
 */
class BlogCategoryRepository extends CoreRepository
{
    /**
     * @return mixed|string
     */
    protected function getModelClass() {
        return Model::class;
    }

    /**
     * Получить модель для редактирования
     * @param int $id
     * @return mixed
     */
    public function getEdit($id) {
        return $this->startConditions()->find($id);

    }

    /**
     * Получить категории для вывода в селекте
     * @return \Illuminate\Contracts\Foundation\Application[]|Collection|\Illuminate\Database\Eloquent\Model[]|mixed[]
     */
    public function getForComboBox() {
        return $this->startConditions()->all();
    }


}
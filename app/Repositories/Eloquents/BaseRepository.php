<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    private $app;

 	protected $model;

 	public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract public function model();

    public function makeModel() {
        $model = $this->app->make($this->model());
 
        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
 
        return $this->model = $model;
    }

    /**
     * Retrieve all data of repository
     */
    public function all($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    /**
     * Retrieve all data of repository, paginated
     */
    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 10) : $limit;

        return $this->model->paginate($limit, $columns);
    }

    /**   
     * Find data by id
     */
    public function find($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**   
     * Find data by field
     */
    public function findByField($field, $value, $columns = ['*'])
    {
        return $this->model->where($field, '=', $value)->get($columns);
    }

    /**   
     * Find data by multiple condition
     */
    public function findWhere(array $where , $columns = ['*'])
    {
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                return $this->model->where($field, $condition, $val)->get($columns);
            } else {
                return $this->model->where($field, '=', $value)->get($columns);
            }
        }
    }

    /**   
     * Find data matches condition
     */
    public function findWhereIn($field, array $values, $columns = ['*'])
    {
        return $this->model->whereIn($field, $values)->get($columns);
    }

    /**   
     * Find data by field
     */
    public function findWhereNotIn($field, array $values, $columns = ['*'])
    {
        return $this->model->whereNotIn($field, $values)->get($columns);
    }

    /**
     * Save a new entity in repository
     */
    public function create(array $attributes)
    {   
        return $this->model->create($attributes);
    }

    /**
     * Update a entity in repository by id
     */
    public function update(array $attributes, $id)
    {
        $model = $this->model->findOrFail($id);
        $model->fill($attributes);
        $model->save();

        return $this;
    }

    /**
     * Delete a entity in repository by id
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Retrieve data with eager loading
     */
    public function with($relations)
    {
        if (is_string($relations)) {
            $relations = func_get_arg();
        }
        return $this->model->with($relations);
    }
}
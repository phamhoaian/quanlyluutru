<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    
	public function all($columns = array('*'));

    public function paginate($limit = null, $columns = array('*'));

    public function find($id, $columns = array('*'));

    public function findByField($field, $value, $columns = array('*'));

    public function findWhere( array $where , $columns = array('*'));

    public function findWhereIn( $field, array $values, $columns = array('*'));

    public function findWhereNotIn( $field, array $values, $columns = array('*'));

    public function create(array $attributes);

    public function update(array $attributes, $id);

    public function delete($id);

    public function with($relations);
}
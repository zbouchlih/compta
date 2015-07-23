<?php namespace App\Libraries\Repositories;

use App\Models\Right;
use Bosnadev\Repositories\Eloquent\Repository;
use Schema;
use Symfony\Component\HttpKernel\Exception\HttpException;

class RightRepository extends Repository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
      return 'App\Models\Right';
    }

	public function search($input)
    {
        $query = Right::query();

        $columns = Schema::getColumnListing('rights');
        $attributes = array();

        foreach($columns as $attribute)
        {
            if(isset($input[$attribute]) and !empty($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] = $input[$attribute];
            }
            else
            {
                $attributes[$attribute] =  null;
            }
        }

        return [$query->get(), $attributes];
    }

    public function apiFindOrFail($id)
    {
        $model = $this->find($id);

        if(empty($model))
        {
            throw new HttpException(1001, "Right not found");
        }

        return $model;
    }

    public function apiDeleteOrFail($id)
    {
        $model = $this->find($id);

        if(empty($model))
        {
            throw new HttpException(1001, "Right not found");
        }

        return $model->delete();
    }

public function store($role, $rights)
    {
        

        foreach ($rights as $right) {

                $role->rights()->attach($right);
    }

}
public function destroy($role)
{
        
         $role->rights()->detach();
    }

    public function modify($role,$rights)
{
        $role->rights()->sync($rights);
         
    }

}

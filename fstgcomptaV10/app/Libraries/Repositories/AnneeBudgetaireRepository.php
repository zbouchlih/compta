<?php namespace App\Libraries\Repositories;

use App\Models\Anneebudgetaire;
use Bosnadev\Repositories\Eloquent\Repository;
use Schema;
use Symfony\Component\HttpKernel\Exception\HttpException;
use DB;
class AnneebudgetaireRepository extends Repository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
      return 'App\Models\Anneebudgetaire';
    }

	public function search($input)
    {
        $query = Anneebudgetaire::query();

        $columns = Schema::getColumnListing('anneebudgetaires');
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
            throw new HttpException(1001, "Anneebudgetaire not found");
        }

        return $model;
    }

    public function apiDeleteOrFail($id)
    {
        $model = $this->find($id);

        if(empty($model))
        {
            throw new HttpException(1001, "Anneebudgetaire not found");
        }

        return $model->delete();
    }

    public function createbudgets()
    {
       
        $idAnnee=DB::table('anneebudgetaires')->max('id');
        DB::table('budgets')->insert([
                  'idTypeBudget' => 1,
                  'idAnnee' => $idAnnee,
                  'previsionnel' => 0,
                  'initial' => 0,
                  'modificatif' => 0
            ]);
        DB::table('budgets')->insert([
                  'idTypeBudget' => 2,
                  'idAnnee' => $idAnnee,
                  'previsionnel' => 0,
                  'initial' => 0,
                  'modificatif' => 0
            ]);
    }

     public function createrepartitions()
    {
        $profiles = DB::table('profiles')->get();
        $idBudget=DB::table('budgets')->max('id');
        $idBudgetNext=$idBudget-1;
        foreach($profiles as $profile)
        {
            DB::table('repartitions')->insert([
                  'idBudget' => $idBudget,
                  'idProfile' => $profile->id,
                  'budget' => 0
            ]);
            DB::table('repartitions')->insert([
                  'idBudget' => $idBudgetNext,
                  'idProfile' => $profile->id,
                  'budget' => 0
            ]);
        }
    }
}

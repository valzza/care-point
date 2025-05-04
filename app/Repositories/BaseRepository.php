<?php
namespace App\Repositories;
use App\Repositories\IEloquent\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository{
    
    protected $model;
    public function __construct(Model $model)
    {
        $this->model=$model;
    }

    public function all($pageSize=0){ //nese ka paginate ta kthen me paginate
        if($pageSize){
            return $this->model->orderBy('id','asc')->paginate($pageSize);
        }else{
            return $this->model->orderBy('id','asc')->get(); //nese ska paginate ta kthen normal
        }
    }
     
    public function find($id): ?Model
    {
        return $this->model->where('id',$id)->first();
    }

    public function create(array $attributes): Model{
        return $this->model->create($attributes);
    }

    public function update(array $attributes,$id): Model{
        $model=$this->model->find($id);
        if($model){
            $model->fill($attributes);
            $model->update();
        }
        return $model;

    }

    public function delete($id){
        $model=$this->model->find($id);
        if($model){
            return $model->delete();
        }
        return false;

    }
}
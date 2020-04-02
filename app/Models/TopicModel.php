<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;


/**
 * Model TopicModel
 *
 * @property int $id
 * @property int $user_id
 * @property string $content
 * @property int $created_at
 * @property int $updated_at
 *
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicModel where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicModel whereIn($column, $values, $boolean = 'and', $not = false)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicModel leftJoin($table, $first, $operator = null, $second = null)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicModel rightJoin($table, $first, $operator = null, $second = null)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicModel get($columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicModel paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicModel find($id, $columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicModel first($columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicModel select($columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicModel orderBy($column, $direction = 'asc')
 * @package App\Model
 */
class TopicModel extends Model
{
    protected $table = 'topic';
    protected $dateFormat = 'U';

    public function comments(){
        return $this->hasMany(CommentModel::class,'topic_id','id');
    }


    public function user(){
        return $this->hasOne(UserModel::class,'id','user_id');
    }

}
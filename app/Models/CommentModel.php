<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;


/**
 * Model CommentModel
 *
 * @property int $id
 * @property int $topic_id
 * @property int $user_id
 * @property string $content
 * @property string $image
 * @property int $created_at
 * @property int $updated_at
 * @property int $pid
 *
 * @method static \Illuminate\Database\Query\Builder | \App\Models\CommentModel where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static \Illuminate\Database\Query\Builder | \App\Models\CommentModel whereIn($column, $values, $boolean = 'and', $not = false)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\CommentModel leftJoin($table, $first, $operator = null, $second = null)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\CommentModel rightJoin($table, $first, $operator = null, $second = null)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\CommentModel get($columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\CommentModel paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\CommentModel find($id, $columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\CommentModel first($columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\CommentModel select($columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\CommentModel orderBy($column, $direction = 'asc')
 * @package App\Model
 */
class CommentModel extends Model
{
    protected $table = 'comment';
    protected $dateFormat = 'U';

    public function user(){
        return $this->hasOne(UserModel::class,'id','user_id');
    }

}
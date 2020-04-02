<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;


/**
 * Model TopicImageModel
 *
 * @property int $id
 * @property int $topic_id
 * @property string $url
 * @property int $created_at
 * @property int $updated_at
 *
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicImageModel where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicImageModel whereIn($column, $values, $boolean = 'and', $not = false)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicImageModel leftJoin($table, $first, $operator = null, $second = null)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicImageModel rightJoin($table, $first, $operator = null, $second = null)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicImageModel get($columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicImageModel paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicImageModel find($id, $columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicImageModel first($columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicImageModel select($columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\TopicImageModel orderBy($column, $direction = 'asc')
 * @package App\Model
 */
class TopicImageModel extends Model
{
    protected $table = 'topic_image';
    protected $dateFormat = 'U';



}
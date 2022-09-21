<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'author'
    ];

    /**
     * storeNewsClientData
     * 登録
     *
     * @param  array $storeData
     * @return  Builder|Book
     */
    public function storeBookData(array $storeData): Builder|Book
    {
        $storeList = [
            'title',
            'author'
        ];
        $cloneThis = clone $this;

        foreach($storeList as $column) {
            if(array_key_exists($column, $storeData)) {
                $cloneThis->$column = $storeData[$column];
            }
        }

        $cloneThis->save();

        return $cloneThis;
    }
}

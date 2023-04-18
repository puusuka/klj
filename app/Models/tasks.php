<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    use HasFactory;
     protected $fillable = ['name']; //保存したいカラム名が1つの場合 HasFactoryの記述は別の章で利用するファクトリで紹介します。その下の$fillableの記述は、指定したカラムのみ値の書き換えが可能になります。指定したカラムに対してのみ、 create()やupdate() 、fill()が可能になります。
    //  $guardedてのがあてのがあって、指定したカラムは、create()やupdate() 、fill()が不可能となります。
    //  protected $guarded = [
        'subject',
    // ];仮にこうするとsubjactは変更できなくなる。
    // 下記のコードを記述した場合、エラーとなります。


// public function update(StoreTask $request, $id)
    // {
        // $update = [
            // 'subject' => $request->subject,
            // 'description' => $request->description,
            // 'completed' => $request->completed,
            // 'complete_date' => $request->complete_date,
        // ];
        // Task::where('id', $id)->update($update);
        // return back()->with('success', '編集しました');
    // }これやったとしてもエラーが出る。
}

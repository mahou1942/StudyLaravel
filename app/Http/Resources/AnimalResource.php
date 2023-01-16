<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type_id' => $this->type_id,
            'type_name' => $this->type->name,   //說明1：使用 animal 物件的type 方法，取得分類資料以後，再找到分類的名稱，並設定type_name欄位村放內容。
            'name' => $this->name,
            'birthday' => $this->birthday,
            'age' => $this->age, //說明2：age預計顯示一個「X歲X月」的格式，但我們的資料表裡面沒有這個欄位，但我們的資料表裡面沒有這個欄位，我們將後續介紹一個 Laravel Model 的功能
            'area' => $this->area,
            'fix' => $this->fix,
            'description' => $this-> description,
            'personality' => $this->personality,
            'created_at' => (string)$this->created_at, //說明3：在變數前面使用 (string) 可以將變數強制轉型為文字型態，如上範例將日期型態轉換為字串型態，可以嘗試將其中一個強制轉換(string)字樣拿掉，觀察與原始的差別。
            'updated_at' => (string)$this->updated_at,
            'user_id' => $this->user_id,
        ];
    }
}

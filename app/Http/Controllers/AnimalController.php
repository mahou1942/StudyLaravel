<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnimalResource;
use App\Http\Resources\AnimalCollection;
use App\Models\Animal;
use App\Models\Type;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 使用網址設定為快取檔案名稱
        // 取得網址
        $url = $request->url();
        // 取得qurey的參數 例如：?limit=5&page=2 網址問號後面的參數
        $queryParams = $request->query();
        // 每個人請求的參數排序可能不同，使用參數第一個英文字排序
        ksort($queryParams);
        // 使用http_build_query 方法將查詢參數轉為字串
        $queryString = http_build_query($queryParams);
        // 組合成完整網址
        $fullUrl = "{$url}?{$queryString}";

        // Laravel 快取方法 檢查是否有快取紀錄
        if (Cache::has($fullUrl)){
            // 使用 return 直接回傳快取資料，省略程式邏輯
            return Cache::get($fullUrl);
        }

       // 搜尋特定名字
//        if(isset($request->name)){
//            $value = $request->name;
//            $query->where("name" , 'like' , "%$value%");
//        }

        //預設值
        $limit = $request->limit ?? 10 ;

        // 建立查詢建構器，分段的方式撰寫SQL語句
        $query = Animal::query()->with('type');

        // 篩選code邏輯，如果有設定filters參數
        if(isset($request->filters)){
            $filters = explode(',' , $request->filters);
            foreach ($filters as $key => $filter){
                list($key , $value) = explode(':' , $filter);
                $query->where($key , 'like' , "%$value%");
            }
        }

        //排列順序
        if(isset($request->sorts)){
            $sorts = explode(',' , $request->sorts);
            foreach ($sorts as $key => $sort){
                list($key , $value) = explode(':' , $sort);
                if($value == 'asc' || $value == 'desc'){
                    $query->orderBy($key , $value);
                }
            }
        }else{
            $query->orderBy('id' , 'desc');
        }

        // 使用model orderBy方法加入SQL語法排序
//        $animals = $query->orderBy('id' , 'desc')
//            ->paginate($limit)
//            ->appends($request->query());

//        $animals = Type::find('1')->animals;

        $animals = $query->paginate($limit)->appends($request->query());

        //沒有塊取紀錄記住資料，並設定60秒過期，快取名稱使用網址命名。
        return Cache::remember($fullUrl , 60 , function () use ($animals){
//            return response($animals , Response::HTTP_OK);
            return new AnimalResource($animals);
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'type_id' => 'nullable|exists:types,id',        //允許null或整數
            'name' => 'required|string|max:255',    //必填文字最多255字元
            'birthday' => 'nullable|date',
            'area' => 'nullable|string|max:255',    //允許null或文字最多255字元
            'fix' => 'required|boolean',            //必填並且為布林值
            'description' => 'nullable',            //允許null
            'personality' => 'nullable',
        ]);
        $request['user_id'] = 1;

        $animal = Animal::create($request->all());
        $animal = $animal->refresh();
//        return $animal->get();
        return response($animal , Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        return new AnimalResource($animal);
//        return response($animal , Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $this->validate($request , [
            'type_id' => 'nullable|exists:types,id',        //允許null或整數
            'name' =>  'string|max:255',
            'birthday' => 'nullable|date',
            'area' => 'nullable|string|max:255',    //允許null或文字最多255字元
            'fix' => 'required|boolean',            //必填並且為布林值
            'description' => 'nullable',            //允許null
            'personality' => 'nullable',            //允許null
        ]);
        $request['user_id'] = 1;

        //
        $animal->update($request->all());
        return response($animal, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        //

        $animal->delete();
        return response(null , Response::HTTP_NO_CONTENT);

    }
}

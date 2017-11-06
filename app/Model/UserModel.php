<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/16
 * Time: 23:49
 * user表模型
 */
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends ModelBase{

    protected $table = "user";

    public $timestamps = false;

    private $DBobj = '';

    public function __construct()
    {
//        parent::__construct($attributes);
        $this->DBobj = DB::table($this->table);
    }

    /*
     * 获取用户信息
     * @where 查询条件
     * 单条
     */
    public function getUser($where,$field = "*",$limit = 1 ){
        if($limit = 1){
            $obj = DB::table($this->table)->where($where)->first();
        }else{
            $obj = DB::table($this->table)->where($where)->limit($limit)->get();
        }
        return $obj;
    }

    /*
     * 创建用户
     * @username
     * @password
     *
     */
    public function createUser($username,$password)
    {
        $data['username'] = $username;
        $data['password'] = md5(md5($password));
        $data['createtime'] = time();
        $data['updatetime']=time();
        $data['nick'] = 'user'.date('ymdhis').rand(100,999);
        $data['level'] = 1;
        try{
            $res = $this->DBobj->insertGetId($data);
        }catch(\Exception $e){
            $this->write_log("执行参数:".json_encode($data),"usermodel",'warning');
            $this->write_log($e->getMessage(),"usermodel",'warning');
        }
        return $res;
    }

    /*
     * 测试
     */
    public function test()
    {
        return 1;
    }
}

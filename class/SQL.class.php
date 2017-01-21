<?php
/**
 * sql连接类
 * @author kj415j45
 */
final class SQL{
    /**
     * sql连接，单例模式
     */
    private static $connection=null;
    
    /**
     * 执行query后的返回
     */
    private static $result=null;
    
    /**
     * 禁用无参构造方法
     */
    private function __construct(){
        
    }
    
    /**
     * 析构方法释放连接
     */
    public function __destruct(){
        if(self::$connection!=null){
            mysqli_close(self::$connection);
        }
    }
    
    /**
     * 连接数据库
     * @param string $host     数据库所在域名
     * @param string $username 用户
     * @param string $passwd   密码
     * @param string $dbname   指定要连接的数据库
     * @return bool 连接成功?true:false
     */
    public static function SQLConnect($host, $username, $passwd, $dbname){
        self::$connection=mysqli_connect($host, $username, $passwd, $dbname);
        return self::$connection!=null;
    }
    
    /**
     * 返回连接实例
     */
    public static function getConnection(){
        return self::$connection;
    }
    
    /**
     * 执行SQL指令
     * @param string $query 要执行的语句
     */
    public static function query($query){
		self::$result=null;
        self::$result=mysqli_query(self::$connection,$query);
    }
    
    /**
     * 返回上次SQL的结果
     * @return bool/mysqli_result
     */
    public static function getResult(){
        return self::$result;
    }
}
?>
<?php
/**
 * sql连接类
 * @author kj415j45
 */
final class SQL{//TODO
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
	 * 和SELECT语句变量顺序一致
	 */
    public static function SELECT($requests,$tables,$require,$extra){
        self::query("SELECT $requests FROM $tables WHERE $require $extra");
    }
    
    /**
	 * 实际调用的是SELECT
	 */
    public static function GET($requests,$tables,$require,$extra){
        self::SELECT($requests,$tables,$require,$extra);
    }
    
	/**
	 * 和UPDATE语句变量顺序一致
	 */
    public static function UPDATE($tables,$requests,$require,$extra){
        self::query("UPDATE $tables SET $requests WHERE $require $extra");
    }
    
    /**
	 * 和INSERT语句变量顺序一致
	 */
    public static function INSERT($table,$rowname,$values,$extra){
        self::query("INSERT INTO $table ($rowname) VALUES($values) $extra");
    }
    
    /**
	 * 和DELETE语句变量顺序一致
	 */
    public static function DELETE($table,$require){
        self::query("DELETE FROM $table WHERE $require");
    }
    
    /**
	 * 取得上次操作影响的行数
	 */
    public static function getAffected_Rows(){
        return mysqli_affected_rows(self::$result);
    }
    
	/**
	 * 取得指定结果集的数组
	 */
	public static function getArray($result){
		return mysqli_fetch_array($result);
	}
	
	/**
	 * 取得指定结果集的关联数组
	 */
	public static function getAssoc($result){
		return mysqli_fetch_assoc($result);
	}
	
	/**
	 * 修复UTF-8字符集BUG
	 */
	public static function fixUTF8(){
		self::query("SET NAMES utf8");
	}
	
    /**
     * 取得上次SQL的结果
     */
    public static function getResult(){
        return self::$result;
    }
}


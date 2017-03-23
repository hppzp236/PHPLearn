<?php
    /**
     * 数组的相关处理函数：
     * http://php.net/manual/zh/ref.array.php
     *
     * 下面演示几个函数的使用：
     * array_values() 返回数组中所有的值
     * list() 给一组变量进行赋值
     * array_keys() 返回数组中部分的或所有的键名， 需要区分大小写
     * in_array() 检查数组中是否存在某个值， 需要区分大小写
     * array_search() 在数组中搜索给定的值，如果成功则返回相应的键名
     * array_key_exists() 检查给定的键名或索引是否存在于数组中
     * array_flip() 交换数组中的键和值
     * array_reverse() 返回一个单元顺序相反的数组
     */
    $lamp = array("os"=>"Linux", "webserver"=>"Apache", "db"=>"MySQL", "language"=>"PHP");

    echo '---------- print_r() ----------<br>';
    print_r($lamp); // 打印结果：Array ( [os] => Linux [webserver] => Apache [db] => MySQL [language] => PHP )
    echo '<br>';

    echo '---------- array_values() ----------<br>';
    $lamp2 = array_values($lamp);

    print_r($lamp2); // 打印结果：Array ( [0] => Linux [1] => Apache [2] => MySQL [3] => PHP )
    echo '<br>';

    echo '---------- list() 配合 array_values() ----------<br>';
    list($os, $webserver, $db, $language) = array_values($lamp);
    echo $os."<br>";
    echo $webserver."<br>";
    echo $db."<br>";
    echo $language."<br>";
    /* 打印结果：
            Linux
            Apache
            MySQL
            PHP
     * */

    echo '---------- array_keys() 1个参数 ----------<br>';
    print_r(array_keys($lamp)); // 打印结果：Array ( [0] => os [1] => webserver [2] => db [3] => language )
    echo '<br>';

    /**
     * array_keys() 返回数组中部分的或所有的键名
     * 需要区分大小写
     */
    echo '---------- array_keys() 2个参数 ----------<br>';
    print_r(array_keys($lamp,"Apache")); // 打印结果：Array ( [0] => webserver )
    echo '<br>';

    echo '---------- array_keys() 2个参数 2 ----------<br>';
    $lampNew = array("os"=>"Linux", "webserver"=>"Apache", "webserver2"=>"Apache", "db"=>"MySQL", "language"=>"PHP");
    print_r(array_keys($lampNew,"Apache")); // 打印结果：Array ( [0] => webserver [1] => webserver2 )
    echo '<br>';

    echo '---------- array_keys() 2个参数 3 ----------<br>';
    $lampNew2 = array("os"=>"Linux", "webserver"=>"Apache", "webserver2"=>"apache", "db"=>"MySQL", "language"=>"PHP");
    print_r(array_keys($lampNew2,"Apache")); // 打印结果：Array ( [0] => webserver ) 证明array_keys()区分大小写
    echo '<br>';

    /**
     * in_array() 检查数组中是否存在某个值
     * 需要区分大小写
     * 第三个参数如果是true，不仅内容相同，类型也需要相同
     * 在 PHP 版本 4.2.0 之前，第一个参数 不允许是一个数组
     */
    echo '---------- in_array() 2个参数 ----------<br>';
    if (in_array("MySQL", $lampNew2)){
        echo "在数组中<br>"; // 打印结果：在数组中
    }else{
        echo "不在数组中<br>";
    }

    echo '---------- in_array() 3个参数 ----------<br>';
    $lampNew3 = array("os"=>"Linux", "webserver"=>"Apache", "webserver2"=>"apache", "age"=>11, array("a", "b"));
    if (in_array("11", $lampNew3)){
        echo "在数组中<br>"; // 打印结果：在数组中
    }else{
        echo "不在数组中<br>";
    }
    if (in_array("11", $lampNew3, true)){ // 第三个参数如果是true，不仅内容相同，类型也需要相同
        echo "在数组中<br>";
    }else{
        echo "不在数组中<br>"; // 打印结果：不在数组中
    }
    if (in_array(array("a", "b"), $lampNew3, true)){ // 在 PHP 版本 4.2.0 之前，第一个参数 不允许是一个数组
        echo "在数组中<br>"; // 打印结果：在数组中
    }else{
        echo "不在数组中<br>";
    }
    if (in_array(array("b", "a"), $lampNew3, true)){ // 数组的顺序，也要一致，否则查询不到
        echo "在数组中<br>";
    }else{
        echo "不在数组中<br>"; // 打印结果：不在数组中
    }

    echo '---------- in_array() 2个参数 2 ----------<br>';
    echo in_array("Linux", $lampNew3); // 打印结果：1
    echo '<br>';

    /**
     * array_search() 在数组中搜索给定的值，如果成功则返回相应的键名
     */
    echo '---------- array_search() 2个参数 2 ----------<br>';
    echo array_search("Linux", $lampNew3); // 打印结果：os
    echo '<br>';

    /**
     * array_key_exists() 检查给定的键名或索引是否存在于数组中
     * 判断键名是否存在，我们也可以用isset()
     * isset() 检测变量是否设置
     */
    echo '---------- array_key_exists() ----------<br>';
    if (array_key_exists("os", $lampNew3)){
        echo "在数组中<br>";
    }else{
        echo "不在数组中<br>"; // 打印结果：不在数组中
    }
    echo '---------- isset() ----------<br>';
    if (isset($lampNew3['os'])){
        echo "在数组中<br>";
    }else{
        echo "不在数组中<br>"; // 打印结果：不在数组中
    }

    /**
     * array_flip() 交换数组中的键和值
     */
    echo '---------- array_flip() ----------<br>';
    $lampNew3Flip = array_flip($lampNew3); // $lampNew3包含数组，会报错，交换以后，数组会丢失
    print_r($lampNew3Flip); // 打印结果：Array ( [Linux] => os [Apache] => webserver [apache] => webserver2 [11] => age )
    echo '<br>';

    echo '---------- array_flip() 2 ----------<br>';
    $lampNew4 = array("os"=>"Linux", "webserver"=>"Apache", "webserver2"=>"apache", "db"=>"MySQL", "language"=>"PHP");
    $lampNew4Flip = array_flip($lampNew4); // $lampNew3包含数组会报错，交换以后，数组会丢失
    print_r($lampNew4Flip); // 打印结果：Array ( [Linux] => os [Apache] => webserver [apache] => webserver2 [MySQL] => db [PHP] => language )
    echo '<br>';

    echo '---------- array_flip() 3 ----------<br>';
    $lampNew5 = array("os"=>"Linux", "webserver"=>"Apache", "webserver2"=>12.3, "db"=>"MySQL", "language"=>"PHP");
    $lampNew5Flip = array_flip($lampNew5); // $lampNew3包含浮点数的value，交换以后，数据会丢失
    print_r($lampNew5Flip); // 打印结果：Array ( [Linux] => os [Apache] => webserver [MySQL] => db [PHP] => language )
    echo '<br>';

    /**
     * array_reverse() 返回一个单元顺序相反的数组
     */
    echo '---------- array_reverse() ----------<br>';
    $lampNew6 = array("os"=>"Linux", "webserver"=>"Apache", "db"=>"MySQL", "language"=>"PHP");
    $lampNew6Reverse = array_reverse($lampNew6);
    print_r($lampNew6Reverse); // 打印结果：Array ( [language] => PHP [db] => MySQL [webserver] => Apache [os] => Linux )
    echo '<br>';

    echo '---------- array_reverse()  2个参数 ----------<br>';
    $lampNew7 = array("Linux", "Apache", "MySQL", "PHP");
    $lampNew7Reverse = array_reverse($lampNew7, false);
    print_r($lampNew7Reverse); // 打印结果：Array ( [0] => PHP [1] => MySQL [2] => Apache [3] => Linux )
    echo '<br>';
    $lampNew7Reverse2 = array_reverse($lampNew7, true);
    print_r($lampNew7Reverse2); // 打印结果：Array ( [0] => PHP [1] => MySQL [2] => Apache [3] => Linux )
    echo '<br>';

<?php 
$string = pack('a6', 'china');
var_dump($string); //输出结果: string(6) "china",最后一个字节是不可见的NUL
echo ord($string[5]); //输出结果: 0(ASCII码中0对应的就是nul)

//A同理
$string = pack('A6', 'china');
var_dump($string); //输出结果: string(6) "china ",最后一个字节是空格
echo ord($string[5]); //输出结果: 32(ASCII码中32对应的就是空格)


$string = pack('H3', 281);
var_dump($string); //输出结果: string(2) "("

for($i=0;$i<strlen($string);$i++) {
echo ord($string[$i]) . PHP_EOL;
}
//输出结果: 40 16


$string = pack('L', 123456789);
var_dump($string); //输出:string(4) "�["

for($i=0;$i<strlen($string);$i++) {
	echo ord($string[$i]) . PHP_EOL;
}
//输出: 21 205 91 7

$string = pack('Z3', 'abc5'); //其实就是将从3后面的数字位置开始，全部设置为nul
var_dump($string); //输出:string(2) "a"

for($i=0;$i<strlen($string);$i++) {
echo ord($string[$i]) . PHP_EOL;
}
//输出: 97 98 0


$string = pack('@4'); //我理解为填充N个nul
var_dump($string); //输出: string(4) ""

for($i=0;$i<strlen($string);$i++) {
echo ord($string[$i]) . PHP_EOL;
}
//输出: 0 0 0 0
 
$string = pack('L4', 1, 2, 3, 4);

var_dump($string);
var_dump(unpack('L4', $string));



 ?>
<?php
function getFileType($file){
        $fp = fopen($file, "rb");
        $bin = fread($fp, 2); //只读2字节(两个字符串)
        echo $bin;

        fclose($fp);
        $str_info  = @unpack("C2chars", $bin);
        var_dump($str_info);

        $type_code = intval($str_info['chars1'].$str_info['chars2']);
        $file_type = '';
        switch ($type_code) {
            case 7790:
                $file_type = 'exe';
                break;
            case 7784:
                $file_type = 'midi';
                break;
            case 8075:
                $file_type = 'zip';
                break;
            case 8297:
                $file_type = 'rar';
                break;
            case 255216:
                $file_type = 'jpg';
                break;
            case 7173:
                $file_type = 'gif';
                break;
            case 6677:
                $file_type = 'bmp';
                break;
            case 13780:
                $file_type = 'png';
                break;
            case 11349:
                $file_type = 'txt';
                break;
            default:
                $file_type = 'unknown';
                break;
        }
    return $file_type;
    }



    $imgurl = 'http://pic.babytree.com/foto3/thumbs/2015/0506/51/8/357557aa334dd03923a408f_nb.jpg';

	//$imgurl = 'aa.txt';
   
    $imgurl = 'bb.jpg';
echo getFileType($imgurl);



    
?>
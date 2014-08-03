<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN", "SongCiRobot");
$wechatObj = new wechatCallbackapiTest();

// echo nl2br( $wechatObj->generateSongCi( mt_rand(0, 5), $wechatObj->generateRandNumber(8) ) );

$wechatObj->responseMsg();
//$wechatObj->valid();

class wechatCallbackapiTest
{
    private $arrDict = array(
        "东风", 
        "何处",
        "人间",
        "风流",
        "归去",
        "春风",
        "西风",
        "归来",
        "江南",
        "相思",
        "梅花",
        "千里",
        "回首",
        "明月",
        "多少",
        "如今",
        "阑干",
        "年年",
        "万里",
        "一笑",
        "黄昏",
        "当年",
        "天涯",
        "相逢",
        "芳草",
        "尊前",
        "一枝",
        "风雨",
        "流水",
        "依旧",
        "风吹",
        "风月",
        "多情",
        "故人",
        "当时",
        "无人",
        "斜阳",
        "不知",
        "不见",
        "深处",
        "时节",
        "平生",
        "凄凉",
        "春色",
        "匆匆",
        "功名",
        "一点",
        "无限",
        "今日",
        "天上",
        "杨柳",
        "西湖",
        "桃花",
        "扁舟",
        "消息",
        "憔悴",
        "何事",
        "芙蓉",
        "神仙",
        "一片",
        "桃李",
        "人生",
        "十分",
        "心事",
        "黄花",
        "一声",
        "佳人",
        "长安",
        "东君",
        "断肠",
        "而今",
        "鸳鸯",
        "为谁",
        "十年",
        "去年",
        "少年",
        "海棠",
        "寂寞",
        "无情",
        "不是",
        "时候",
        "肠断",
        "富贵",
        "蓬莱",
        "昨夜",
        "行人",
        "今夜",
        "谁知",
        "不似",
        "江上",
        "悠悠",
        "几度",
        "青山",
        "何时",
        "天气",
        "惟有",
        "一曲",
        "月明",
        "往事",
        "苍茫"            
    );

    private $arrSongCi = array(
        array( 'Title' => "天净沙", 'Len' => 28 ),
        array( 'Title' => "如梦令", 'Len' => 33 ),
        array( 'Title' => "清平乐", 'Len' => 46 ),
        array( 'Title' => "西江月", 'Len' => 50 ),
        array( 'Title' => "采桑子", 'Len' => 44 ),
        array( 'Title' => "忆江南", 'Len' => 27 )
    );

    private $arrTemplet = array(
        array( 6, 6, 6, 4, 6 ),
        array( 6, 6, 5, 6, 4, 6 ),
        array( 4, 5, 7, 6, 0, 6, 6, 6, 6 ),
        array( 6, 6, 7, 6, 0, 6, 6, 7, 6 ),
        array( 7, 4, 4, 7, 0, 7, 4, 4, 7 ),
        array( 3, 5, 7, 7, 5 )
    );

    private $arrCharDict = array(
        "东",
        "何",
        "人",
        "风",
        "归",
        "春",
        "西",
        "江",
        "相",
        "梅",
        "回",
        "明",
        "多",
        "如",
        "阑",
        "年",
        "当",
        "天",
        "芳",
        "流",
        "依",
        "故",
        "无",
        "斜",
        "深",
        "时",
        "平",
        "凄",
        "匆",
        "功",
        "今",
        "桃",
        "扁",
        "消",
        "憔",
        "芙",
        "神",
        "心",
        "佳",
        "长",
        "断",
        "鸳",
        "为",
        "去",
        "少",
        "海",
        "寂",
        "富",
        "蓬",
        "行",
        "谁",
        "悠",
        "青",
        "惟",
        "月",
        "往",
        "苍",
        "处",
        "间",
        "来",
        "南",
        "思",
        "花",
        "里",
        "首",
        "笑",
        "涯",
        "逢",
        "草",
        "前",
        "枝",
        "雨",
        "水",
        "旧",
        "吹",
        "情",
        "阳",
        "知",
        "见",
        "节",
        "生",
        "凉",
        "色",
        "名",
        "点",
        "限",
        "上",
        "柳",
        "湖",
        "舟",
        "息",
        "悴",
        "事",
        "蓉",
        "仙",
        "片",
        "分",
        "声",
        "安",
        "君",
        "鸯",
        "棠",
        "寞",
        "候",
        "莱",
        "夜",
        "似",
        "度",
        "山",
        "气",
        "曲",
        "茫"
    );

    private $arrCiBook = array(
        "天净沙\n\n枯藤老树昏鸦\r\n小桥流水人家\r\n古道西风瘦马\r\n夕阳西下\r\n断肠人在天涯\n\n马致远",
        "如梦令\n\n昨夜雨疏风骤\r\n浓睡不消残酒\r\n试问卷帘人\r\n却道海棠依旧\r\n知否，知否\r\n应是绿肥红瘦\n\n李清照",
        "清平乐\n\n绕床饥鼠\r\n蝙蝠翻灯舞\r\n屋上松风吹急雨\r\n破纸窗间自语\r\n\r\n平生塞北江南\r\n归来华发苍颜\r\n布被秋宵梦觉\r\n眼前万里江山\n\n辛弃疾",
        "西江月\n\n明月别枝惊鹊\r\n清风半夜鸣蝉\r\n稻花香里说丰年\r\n听取蛙声一片\r\n\r\n七八个星天外\r\n两三点雨山前\r\n旧时茅店社林边\r\n路转溪桥忽见\n\n辛弃疾",
        "采桑子\n\n人生易老天难老\r\n岁岁重阳\r\n今又重阳\r\n战地黄花分外香\r\n\r\n一年一度秋风劲\r\n不似春光\r\n胜似春光\r\n寥廓江天万里霜\n\n毛泽东",
        "忆江南\n\n江南好\r\n风景旧曾谙\r\n日出江花红胜火\r\n春来江水绿如蓝\r\n能不忆江南\n\n白居易"
    );

    /*public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }*/

    public function generateRandNumber( $len ) {
        $strResult = "";
        for($i=0; $i<$len ; $i++)
            $strResult .= sprintf( "%02d", mt_rand(0, 99) );

        return $strResult;
    }

    public function generateSongCi($index, $strIn) {
        $strResult = $this->removeNonDigit( $strIn );
        $strResult = $this->extendDigits( $strResult );
        $strResult = $this->mapToSongCi( $strResult );
        $strResult = $this->formatSongCi( $index, $strResult );

        return $strResult;
    }

    private function removeNonDigit( $strIn ) {
        $strResult = "";

        for ($i=0; $i<strlen($strIn) ; $i++) { 
            $char = substr( $strIn, $i, 1 );
            if ($char >= "0" and $char <= "9") 
                $strResult .= $char;
        }

        return $strResult;
    }

    private function extendDigits( $strIn ) {
        $strResult = $strIn;

        // Even digits + 1
        for($i=0; $i<strlen($strIn) ; $i++) { 
            if( $i % 2 === 0 )
                $strResult .= ( (int)substr($strIn, $i, 1)+1 ) % 10;
            else
                $strResult .= substr($strIn, $i, 1);
        }

        // Odd digits + 1
        for($i=0; $i<strlen($strIn) ; $i++) { 
            if( $i % 2 === 1 )
                $strResult .= ( (int)substr($strIn, $i, 1)+1 ) % 10;
            else
                $strResult .= substr($strIn, $i, 1);
        }

        // Shift
        $strInShift = substr($strIn, 1, strlen($strIn)-1) + substr($strIn, 0, 1);
        $strResult .= $strInShift;

        // Even digits + 1
        for($i=0; $i<strlen($strInShift) ; $i++) { 
            if( $i % 2 === 0 )
                $strResult .= ( (int)substr($strInShift, $i, 1)+1 ) % 10;
            else
                $strResult .= substr($strInShift, $i, 1);
        }

        // Odd digits + 1
        for($i=0; $i<strlen($strInShift) ; $i++) { 
            if( $i % 2 === 1 )
                $strResult .= ( (int)substr($strInShift, $i, 1)+1 ) % 10;
            else
                $strResult .= substr($strInShift, $i, 1);
        }

        return $strResult;
    }

    private function mapToSongCi( $strIn ) {
        $strResult = "";

        if( strlen($strIn) % 2 === 1)
            $strIn .= sprintf("%d", mt_rand(0, 9));

        for ($i=0; $i<strlen($strIn) ; $i+=2)
            $strResult .= $this->arrDict[ (int)substr($strIn, $i, 2) ];

        return $strResult;
    }
 
    private function formatSongCi( $index, $strIn ) {
        $strResult = $this->arrSongCi[$index]['Title'];
        $strResult .= "\n\n";
        $start = 0;
        $remaining = mb_strlen($strIn, 'utf-8');

        foreach( $this->arrTemplet[$index] as $len ) {
            for($i=0; $i<$len-1 and $remaining>0; $i+=2) { 
                $strResult .= mb_substr( $strIn, $start, 2, 'utf-8' );
                $start += 2;
                $remaining -= 2;
            }

            for(; $i<$len; $i++)
                $strResult .= $this->arrCharDict[ mt_rand(0, 111) ];

            $strResult .= "\n";            
        }

        $strResult .= "\n微信号\"宋词机器人\"创作";

        return $strResult;
    }

    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr)){
                
                $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $RX_TYPE = trim($postObj->MsgType);

                switch($RX_TYPE)
                {
                    case "text":
                        $resultStr = $this->handleText($postObj);
                        break;
                    case "event":
                        $resultStr = $this->handleEvent($postObj);
                        break;
                    default:
                        $resultStr = "Unknow msg type: ".$RX_TYPE;
                        break;
                }
                echo $resultStr;
        }else {
            echo "";
            exit;
        }
    }

    public function handleText($postObj)
    {
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();
        $strHelp = "请输入8位或更长的数字，它们会被智能转换为一首词。\n \n"."如果您想试试手气，请输入1~6中的一个数字。";
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>0</FuncFlag>
                    </xml>";             
        if(!empty( $keyword ))
        {
            if( strlen($keyword) === 1 ) {
                if( $keyword >= "1" and $keyword <= "6" ) {
                    $index = (int)$keyword - 1;

                    if( mt_rand(1, 3) === 1)
                        $contentStr = $this->arrCiBook[ $index ];
                    else {
                        $strNumber = $this->generateRandNumber(50);
                        $contentStr = $this->mapToSongCi( $strNumber );
                        $contentStr = $this->formatSongCi( $index, $contentStr );
                    }
                } else
                    $contentStr = $strHelp;
            } else {
                $contentStr = $this->removeNonDigit( $keyword );
                if( strlen($contentStr) < 8 )
                    $contentStr = $strHelp;
                else {
                    $contentStr = $this->extendDigits( $contentStr );
                    $contentStr = $this->mapToSongCi( $contentStr );
                    $contentStr = $this->formatSongCi( mt_rand(0, 5), $contentStr );
                }
            }
          
            $msgType = "text";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;
        }else{
            echo "Input something...";
        }
    }

    public function handleEvent($object)
    {
        $strHelp = "请输入8位或更长的数字，它们会被智能转换为一首词。\n \n"."如果您想试试手气，请输入1~6中的一个数字。";
        $contentStr = "";
        switch ($object->Event)
        {
            case "subscribe":
                $contentStr = $strHelp;
                break;
            default :
                $contentStr = "Unknow Event: ".$object->Event;
                break;
        }
        $resultStr = $this->responseText($object, $contentStr);
        return $resultStr;
    }
    
    public function responseText($object, $content, $flag=0)
    {
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>%d</FuncFlag>
                    </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $flag);
        return $resultStr;
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];    
                
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}

?>

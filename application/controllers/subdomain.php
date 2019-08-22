<?php
Class Subdomain extends CI_Controller
{
    public function domain()
    {
        $domain = @$_GET['domain'];
        $q = @$_GET['q'];
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,'http://'.$q.'.'.$domain);//获取内容url
        curl_setopt($curl,CURLOPT_HEADER,1);//获取http头信息
        curl_setopt($curl,CURLOPT_NOBODY,1);//不返回html的body信息
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);//返回数据流，不直接输出
        curl_setopt($curl,CURLOPT_TIMEOUT,30); //超时时长，单位秒
        curl_exec($curl);
        $code= curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $ip = gethostbyname($q.'.'.$domain);
        $json = array('domain'=>$q.'.'.$domain,'code' => $code,'ip'=>$ip);
        echo json_encode($json);
    }
}
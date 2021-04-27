<?php
namespace YDSoapService;
class YDSoapService
{
    public static function teste()
    {
        return 'Hello World com composer!';
    }
}



,
    "autoload":{
        "psr-4":{
            "dmyd\\YDSoapService\\":"./vendor/YDSoapService"
        }
     }
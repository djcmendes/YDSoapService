<?php
namespace djcmendes\ydsoapservice;
class YDSoapService
{
    //private $wsdl= null;
    private $conn = null;
    function __construct($url,$params) {
        try{
            $this->conn = new \SoapClient($url,$params); 
        }catch(\SoapFault $e){
            echo ('<br>failed request<br>');
        }
        catch(\Throwable $e){
            echo ('<br>failed request<br>');
        }
    }

    public function request($params,$func){
        try{
            if(is_object($params)){
                $obj_name = getClass($params);
                $params = new SoapParam(new SoapVar($params, SOAP_ENC_OBJECT),$obj_name);
            }elseif(!is_array($params)){
                throw new Exception('wrong input type');
            }

            $res = $this->conn->$func($params);
            
            return $xml = new \SimpleXMLElement($res);
        }catch(\SoapFault $e){
            echo ('<br>failed request<br>');
        }
        catch(\Throwable $e){
            echo ('<br>failed request<br>');
        }
    }
}
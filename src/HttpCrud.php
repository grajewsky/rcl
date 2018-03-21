<?php

namespace App\Foresion\Endpoint;
use App\Foresion\Model\HttpCrudMethods;
use GuzzleHttp\Client;
use GuzzleHttp\Post\PostBodyInterface;

abstract class HttpCrud extends HttpCrudMethods{

    protected $url = null;
    protected $client;

    public function __construct(Client $client){
        $this->client = $client;
        $this->init();
    }
    protected function build($array){
        if(!is_array($array)){
            return false;
        }
        $result = array_merge(array($this->url), $array);
        return join("/",$result);
    }
    public abstract function init();

    public function list(){
       return $this->client->get($this->url);
    }
    public function get($id=false){
        if($id==false){
            return $this->list();
        }
        return $this->client->get($this->build(array("id"=>$id)));
    }
    public function create($data){
        return $this->client->post($this->url, ['body'=>$data]);

    }
    public function delete($id){
        return $this->client->delete($this->build(array("id"=>$id)));

    }
    public function update($data){
        return $this->client->put($this->url, ['body'=> $data]);
    }


}
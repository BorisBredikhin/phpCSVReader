<?php

/**
 * Created by PhpStorm.
 * User: boris
 * Date: 01.01.16
 * Time: 18:53
 */
class CSVReader{
	private $file;

	/**
	 * CSVReader constructor.
	 *
	 * @param $filename
	 */
	function CSVReader($filename){
		$this->file=@file($filename);
	}
	private function parseString($s){
		return preg_split("/,/",$s);
	}
	private function getLine($n){
		return $this->parseString($this->file[$n]);
	}
	public function getArray(){
		$arr=[];
		for($i=0;$i<count($this->file);$i++){
			$arr[]=$this->getLine($i);
		}
		return $arr;
	}
}
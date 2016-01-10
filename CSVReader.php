<?php

/**
 * класс для чтения csv файлов с произвольным разделителем
 * Created by PhpStorm.
 * User: boris
 * Date: 01.01.16
 * Time: 18:53
 */
class CSVReader{
	private $file;
	private $separator;

	/**
	 * CSVReader constructor.
	 *
	 * @param string $filename
	 * путь к csv файлу
	 * @param string $separator
	 * разделитель csv файлов
	 */
	function CSVReader($filename, $separator=","){
		$this->file=@file($filename);
		$this->separator=$separator;
		return $this->getArray();
	}

	private function parseString($s){
		return preg_split("/".$this->separator."/",$s);
	}

	private function getLine($n){
		return $this->parseString($this->file[$n]);
	}

	/**
	 * конвертирует csv файл в массив php
	 * @return array
	 */
	public function getArray(){
		$arr=[];
		for($i=0;$i<count($this->file);$i++){
			$arr[]=$this->getLine($i);
		}
		return $arr;
	}
}
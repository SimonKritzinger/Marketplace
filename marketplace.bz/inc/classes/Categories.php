<?php

	class Category
	{

		private $categoryid;
		private $name;

		public function __construct($categoryid = 0, $name = null){
			$this->categoryid = $categoryid;
			$this->name = $name;
		}

		public function getCategoryid(){
			return $this->categoryid;
		}

		public function setCategoryid($categoryid){
			$this->categoryid = $categoryid;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			$this->name = $name;
		}

	}

 ?>

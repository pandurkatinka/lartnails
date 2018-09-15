<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This is a sample Item class. 
// This class could be extended by individual applications.
class MenuItem {
	
	// Item attributes are all protected:
	protected $seo_url;
	protected $name;
	protected $children = array();
	protected $external_url;

	
	// Constructor populates the attributes:
	public function __construct($seo_url = NULL, $name = NULL, $children = NULL, $external_url = NULL)	{
		$this->seo_url = $seo_url;
		$this->name = $name;
		$this->children = $children;
		$this->external_url = $external_url;
	}
	
	// Method that returns the Seo URL:
	public function getSeoUrl()	{
		if($this->external_url != ''){
			return $this->external_url;
		}else{
			return base_url() . $this->seo_url;	
		}
	}

	public function getNavSeoUrl()	{
		if($this->external_url != ''){
			return $this->external_url . '" target="_blank"';
		}else{
			return base_url() . $this->seo_url .'" ';	
		}
	}

	public function removeChildren(){
		$this->children = NULL;
	}

	// Method that returns the Seo URL:
	public function hasChildren(){
		if(!isset($this->children)){
			return false;
		}
		elseif(empty($this->children)){
			$this->removeChildren();
			return false;
		}else{
			return true;
		}
	}

	// Method that adds a child element to the list --> currently unavaible
	public function addChild(MenuItem $child){
		if(!isset($this->children)){
			$this->children = array();
		}
		array_push($this->children, $child);
	}

	// Method that returns the name:
	public function getName() {
		return $this->name;
	}

	// Method that returns the children:
	public function getChildren() {
		return $this->children;
	}

	// Method that returns the children:
	public function getExternalUrl() {
		return $this->external_url;
	}

} // End of Item class.
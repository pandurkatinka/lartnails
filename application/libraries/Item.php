<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This is a sample Item class. 
// This class could be extended by individual applications.
class Item {
	
	// Item attributes are all protected:
	protected $id;
	protected $name;
	protected $price;
	protected $picture;
	protected $content;
	protected $lead;
	
	// Constructor populates the attributes:
	public function __construct($id = NULL, $name = NULL, $price = NULL, $picture = NULL, $content = NULL, $lead = NULL )	{
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
		$this->picture = $picture;
		$this->content = $content;
		$this->lead = $lead;

	}
	
	// Method that returns the ID:
	public function getId()	{
		return $this->id;
	}

	// Method that returns the name:
	public function getName() {
		return $this->name;
	}

	// Method that returns the name:
	public function getPicture() {
		return $this->picture;
	}

	// Method that returns the price:
	public function getPrice() {
		return $this->price;
	}

	// Method that returns the content:
	public function getContent() {
		return $this->content;
	}

	// Method that returns the price:
	public function getLead() {
		return $this->lead;
	}

} // End of Item class.
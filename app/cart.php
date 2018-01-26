<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null;
	public $totalCount = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalCount = $oldCart->totalCount;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id){
		$giohang = ['count'=>0, 'price' => $item->price, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['count']++;
		$giohang['price'] = $item->price * $giohang['count'];
		$this->items[$id] = $giohang;
		$this->totalCount++;
		$this->totalPrice += $item->price;
		
	}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['count']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalCount--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['count']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalCount -= $this->items[$id]['count'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}

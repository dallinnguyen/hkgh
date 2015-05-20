<?php

class ShopController extends BaseController {
    
    public function getIndex(){
        
        $items = Item::where('price','>',0)->get();
        $userMoney = Auth::user()->money;
        return View::make('shop.index')->with('items',$items)
                                        ->with('userMoney',$userMoney);
    }
    
    public function buyItem(){
        if (Input::has('boughtid')&&Input::has('boughtnumber')){
            
            $boughtNumber = Input::get('boughtnumber');
            if ($boughtNumber > Auth::user()->money){
                Session::flash('message','không đủ tiền');
                Session::flash('alert-class','alert-danger');
                return Redirect::to('/shop');
            }   
            
            $boughtIds = Input::get('boughtid');
            $boughtIds = explode(" ",$boughtIds);
            foreach($boughtIds as $boughtId){
                $inventory = $this->getExistInventory($boughtId);
                if ($inventory == null){
                    $inventory = new Inventory;
                    $inventory->item_id = $boughtId;
                    $inventory->user_id = Auth::user()->id;
                    $inventory->quantity = 1;
                    $inventory->save();
                }else{
                    $inventory->quantity += 1;
                    
                    $inventory->save();
                }
            }
            Auth::user()->money = $boughtNumber;
            Auth::user()->save();
            return Redirect::to('/shop');
        }
        return 'something went wrong';
    }
    
    //check if inventory already exist
    public function getExistInventory($item_id){
    
        $inventory = Inventory::where('item_id',$item_id)->where('user_id',Auth::user()->id)->first();
        
        if (($inventory != null))
            return $inventory;
        return null;
    }
    
}
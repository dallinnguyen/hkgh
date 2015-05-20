<?php

class InventoryController extends BaseController {
    
    public function getIndex(){
        //$inventories = Inventory::where('user_id',Auth::user()->id)->get();
        $inventories = Auth::user()->inventories;
        $using = Auth::user()->using;
        $userMoney = Auth::user()->money;
        return View::make('inventory.index')->with('inventories',$inventories)
                                            ->with('using',$using)
                                            ->with('userMoney',$userMoney)
        ;
    }
    
    public function removeItem($id){
        
        $inventory = Inventory::find($id);
        
        $inventory->delete();
        return Redirect::to('/inventory');
    }
    
    public function useItem($item_id){
        
        $item = Item::find($item_id);
        $user = Auth::user();
        
        //stick the item to slots
        switch($item->class){
            case 'armor':
            case 'weapon':
            case 'clothes':
            case 'potion':
            case 'special':
                //remember to code this: only one class is allowed on the inventory, no one will ever wear 2 sword or 3 sword at a time
                $slot = $this->stickToSlot($item_id);
                if (!$slot){
                    Session::flash('message','đã hết chỗ chứa');
                    Session::flash('alert-class','alert-danger');
                    
                }else{
                    $using = Auth::user()->using;
                    $using->$slot = $item_id;
                    $using->save();
                    
                }
                //end stick to slot
                
                //calculate amount, if amount = 1 then remove it from the inventory table
                $inventory = $this->getExistInventory($item_id);
                if ($inventory == null){
                    Session::flash('message','something went wrong');
                    Session::flash('alert-class','alert-danger');
                }else{
                    if ($inventory->quantity > 1){
                        $inventory->quantity -= 1;
                        $inventory->save();
                    }else{
                        $inventory->delete();
                    }
                }
                break;
            
        }
        
        //specialty
        switch($item->class){
            
            case 'potion':
                $ability = $user->ability()->first();
                $ability->drink = $item->id;
                $ability->save();
                break;
            case 'armor':
                break;
            case 'weapon':
                switch($item->id){
                    case 8: //bang kiem
                        $ability = $user->ability()->first();
                        $ability->damage = 10;
                        $ability->save();
                }
                break;
                
            case 'clothes':
                break;
            case 'special':
                switch($item->id){
                    case 14: //nhan admin
                        $user->role = 'admin';
                        $user->save();
                    break;
                    case 15: //nhan developer
                        $user->role = 'master';
                        $user->save();
                    break;
                }
                break;
            
            default:
                Session::flash('message','item này chưa được code');
                Session::flash('alert-class','alert-danger');
                
        }
        return Redirect::to('/inventory');
        
    }
    
    public function removeSlot($slot){
        $user = Auth::user();
        $using = $user->using;
        $item_id = $using->$slot;
        //return the item to user inventory
        $inventory = $this->getExistInventory($item_id);    
        if ($inventory == null){
            $inventory = new Inventory;
            $inventory->item_id = $item_id;
            $inventory->quantity = 1;
            $inventory->user_id = Auth::user()->id;
            $inventory->save();
        }else{
            $inventory->quantity += 1;
            $inventory->save();
        }
        
        $using->$slot = null;
        $using->save();
        
        //update ability
        $ability = $user->ability()->first();
        $item = Item::find($item_id);
        
        switch($item->class){
            case 'weapon': 
                $ability->damage = 0;
                $ability->save();
            break;
            case 'potion': //HP cap 1
                $ability->drink = 0;
                $ability->save();
            break;
            case 'special': 
                switch($item_id){
                    case 14: //nhan admin
                        $user->role = 'member';
                        $user->save();
                    break;
                    case 14: //nhan developer
                        $user->role = 'member';
                        $user->save();
                    break;
                }
            break;
        }
        
        return Redirect::to('/inventory');
    }
    
    public function getExistInventory($item_id){
    
        $inventory = Inventory::where('item_id',$item_id)->where('user_id',Auth::user()->id)->first();
        
        if (($inventory != null))
            return $inventory;
        return null;
    }
    
    public function stickToSlot($item_id){
        //find empty slot
        $using = Auth::user()->using;
        if ($using->slot1 == null)
            return "slot1";
        elseif($using->slot2 == null){
            return "slot2";
        }
        elseif($using->slot3 == null){
            return "slot3";
        }
        elseif($using->slot4 == null){
            return "slot4";
        }
        elseif($using->slot5 == null){
            return "slot5";
        }
        elseif($using->slot6 == null){
            return "slot6";
        }
        return false;
    }
    
}
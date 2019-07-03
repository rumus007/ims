<?php namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Input;
use File;

class MenuController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function Index()
	{	
		      $pageheader = "List Menu";

		$items 	= Menu::orderBy('order')->get();

		$menu 	= new Menu;
		$menu   = $menu->getHTML($items);
		return view('backend.menus.builder', array('items'=>$items,'menu'=>$menu,'pageheader'=>$pageheader));
	}

	public function Edit($id)
	{	
		$item = Menu::find($id);
		return view('backend.menus.edit', array('item'=>$item));
	}

	public function menuEdit($id)
	{	
		$item = Menu::find($id);
		$item->title 	= e(Input::get('title','untitled'));
		$item->label 	= e(Input::get('label',''));	
		$item->url 		= e(Input::get('url',''));	
		$item->menu_position = e(Input::get('menu_position',''));	
		$item->login_condition = e(Input::get('login_condition',''));	
		if(Input::hasFile('icon'))
        {
		$filename = Input::file('icon');
		$destinationPath = public_path(). '/img/';                           
        $change = $filename->getClientOriginalName();
        $filename->move($destinationPath, str_replace(' ', '-', strtolower($change)));  
		}else{

			if( !empty( $item->icon) ){
                            $change = $item->icon;
                        }
                        else{
                                $change = '';
            }
			
		}
		$item->icon 		= e( $change );	

		$item->save();

		return redirect()->to("admin/menus");
	}

	// AJAX Reordering function
	public function postIndex()
	{	
	    $source       = e(Input::get('source'));
	    $destination  = e(Input::get('destination',0));

	    $item             = Menu::find($source);
	    $item->parent_id  = $destination;  
	    $item->save();

	    $ordering       = json_decode(Input::get('order'));
	    $rootOrdering   = json_decode(Input::get('rootOrder'));

	    if($ordering){
	      foreach($ordering as $order=>$item_id){
	        if($itemToOrder = Menu::find($item_id)){
	            $itemToOrder->order = $order;
	            $itemToOrder->save();
	        }
	      }
	    } else {
	      foreach($rootOrdering as $order=>$item_id){
	        if($itemToOrder = Menu::find($item_id)){
	            $itemToOrder->order = $order;
	            $itemToOrder->save();
	        }
	      }
	    }

	    return response()->json(array('success' => true, 'stat' => 'ok'));
	}

	public function postNew()
	{
		// Create a new menu item and save it
		$item = new Menu;

		$item->title 	= e(Input::get('title','untitled'));
		$item->label 	= e(Input::get('label',''));	
		$item->url 		= e(Input::get('url',''));	
		$item->menu_position = e(Input::get('menu_position',''));	
		$item->login_condition = e(Input::get('login_condition',''));	
		if(Input::hasFile('icon'))
        {
		$filename = Input::file('icon');
		$destinationPath = public_path(). '/img/';                           
        $change = $filename->getClientOriginalName();
        $filename->move($destinationPath, str_replace(' ', '-', strtolower($change)));  
		}else{
			$change = '';
		}
		$item->icon 		= e(str_replace(' ', '-', strtolower($change)));	
		$item->order 	= Menu::max('order')+1;
		$item->save();
		return redirect()->to('admin/menus');
	}

	public function menuDelete()
	{
		$id = Input::get('delete_id');
		// Find all items with the parent_id of this one and reset the parent_id to zero
		$items = Menu::where('id', $id)->get()->each(function($item)
		{
			$item->parent_id = 0;  
			$item->save();  
		});

		// Find and delete the item that the user requested to be deleted
		$item = Menu::find($id);
		$hName = $item->icon;
        if (!empty($hName)) {
            if (File::exists('public/img/'.$hName)) {
                unlink('public/img/'.$hName);
            }
        }
		$item->delete();

		return redirect()->to('admin/menus');
	}
}
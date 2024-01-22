<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth, DB;
use App\Http\Responses\RedirectResponse;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;


class HomeownerController extends Controller
{
    public function index()
    {       
        $user_id =auth()->user()->id;
        $properties = DB::table('properties')
        ->join('property_images', 'property_images.property_id', '=', 'properties.id')
        ->groupBy('property_images.property_id')
        ->select('properties.*', 'property_images.property_id','property_images.property_image')
        ->where('created_by',$user_id)
        ->orderBy('id','DESC')
        ->get();

        return view('frontend.homeowners.property.index',compact('properties'));
    }

    public function create()
    {       
        $countries= Country::get(["name","id"]);
        //echo '<pre>';print_r($countries); exit(); 
        return view('frontend.homeowners.property.create',compact('countries'));
    }

    public function store(Request $request)
    {       
        $user_id =auth()->user()->id;
        $property_name = $request->property_name;
        $description = $request->description;
        $address = $request->address;
        $country = $request->country;
        $state = $request->state;
        $city = $request->city;
        $price = $request->price;
        $beds = $request->beds;
        $baths = $request->baths;
        $sqft = $request->sqft;
        $garages = $request->garages;
        $prop_status = $request->prop_status;
        $prop_type = $request->prop_type;
        $style = $request->style;
        $lot_sqft = $request->lot_sqft;
        $year_built = $request->year_built;
        $time_on_zerodown = $request->time_on_zerodown;
        $view = $request->view;
        $community = $request->community;
        $hoa_dues = $request->hoa_dues;
        $virtual_tour = $request->virtual_tour;
        $floor_size = $request->floor_size;
        $bedroom_description = $request->bedroom_description;
        $master_bath_features = $request->master_bath_features;
        $brokerage = $request->brokerage;
        $source = $request->source;
        $note = $request->note;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        
        $display_order = $request->display_order;
        $status = 0;

        $values = array('created_by' => $user_id,
                        'property_name' => $property_name, 
                        'description' => $description, 
                        'address' => $address,
                        'country' => $country,
                        'state' => $state,
                        'city' => $city, 
                        'price' => $price, 
                        'beds' => $beds, 
                        'baths' => $baths, 
                        'sqft' => $sqft, 
                        'garages' => $garages,
                        'prop_status'=>$prop_status,
                        'prop_type'=>$prop_type,
                        'style'=>$style,
                        'lot_sqft'=>$lot_sqft,
                        'year_built'=>$year_built,
                        'time_on_zerodown'=>$time_on_zerodown,
                        'view' =>$view,
                        'community'=>$community,
                        'hoa_dues'=>$hoa_dues,
                        'virtual_tour'=>$virtual_tour,
                        'floor_size' =>$floor_size,
                        'bedroom_description'=>$bedroom_description,
                        'master_bath_features'=>$master_bath_features,
                        'brokerage' =>$brokerage,
                        'source'=>$source,
                        'note'=>$note,
                        'latitude'=>$latitude,
                        'longitude'=>$longitude,
                        'display_order' => $display_order, 
                        'status' => $status);
        $lastId=DB::table('properties')->insertGetId($values);
        
            if($request->hasFile('property_image'))
            {     
                foreach($request->file('property_image') as $file)
                {
                    $name = time().'.'.$file->extension();
                    $image = rand(111,999).'.'.$file->extension();
                    $file->move(public_path().'/images/properties/', $image);  
                    $file1 = array('property_id' => $lastId, 'property_image' => $image,);
                    DB::table('property_images')->insert($file1);
                }
            }
        
       
       return redirect()->route('hoproperty.index')->with('success','Property Created successfully');
    }

   
    public function edit($id)
    {       
        
        $properties= Property::with('propertyimages')
        ->leftjoin('states','states.id','=','properties.state')
        ->leftjoin('cities','cities.id','=','properties.city')
        ->select('properties.*','states.name as statename','cities.name as cityname')
        ->where('properties.id',$id)->first();
        //echo '<pre>';print_r($properties); exit();

        $countries= Country::get(["name", "id"]);
        //echo '<pre>';print_r($countries);exit;

        return view('frontend.homeowners.property.edit', compact('properties','countries'));
    }

    public function update(Request $request, $id)
    {       
        $property_data= array();      
        $property_data['property_name']=$request->property_name;
        $property_data['description']=$request->description;
        $property_data['address']=$request->address;
        $property_data['country']=$request->country;
        $property_data['state']=$request->state;
        $property_data['city']=$request->city;
        $property_data['price']=$request->price;
        $property_data['beds']=$request->beds;
        $property_data['baths']=$request->baths;
        $property_data['garages']=$request->garages;
        $property_data['prop_status']=$request->prop_status;
        $property_data['prop_type']=$request->prop_type;
        $property_data['style']=$request->style;
        $property_data['lot_sqft']=$request->lot_sqft;
        $property_data['year_built']=$request->year_built;
        $property_data['time_on_zerodown']=$request->time_on_zerodown;
        $property_data['view']=$request->view;
        $property_data['community']=$request->community;
        $property_data['hoa_dues']=$request->hoa_dues;
        $property_data['virtual_tour']=$request->virtual_tour;
        $property_data['floor_size']=$request->floor_size;
        $property_data['bedroom_description']=$request->bedroom_description;
        $property_data['master_bath_features']=$request->master_bath_features;
        $property_data['brokerage']=$request->brokerage;
        $property_data['source']=$request->source;
        $property_data['note']=$request->note;
        $property_data['latitude']=$request->latitude;
        $property_data['longitude']=$request->longitude;
        $property_data['display_order']=$request->display_order;
        $property_data['updated_by']= auth()->user()->id;
        $property_data['status']=$request->status;

        if($request->hasFile('property_image'))
        {     
            foreach($request->file('property_image') as $file)
            {
                $name = time().'.'.$file->extension();
                $image = rand(111,999).'.'.$file->extension();
                $file->move(public_path().'/images/properties/', $image);  
                $file1 = array('property_id' => $id, 'property_image' => $image,);
                DB::table('property_images')->insert($file1);
            }
        }
        
        Property::where('id',$id)->update($property_data);

        return redirect()->route('hoproperty.index')->with('success','Property updated successfully');
    }

    public function destroy($id)
    {       
        
    }

    public function hopropertyPhotoDelete($id=null)
    {
        
        $propertyimg = PropertyImage::where('id',$id)->first();
        //dd($propertyimg);
        
        $image_path= 'images/properties/';
        if(file_exists($image_path.$propertyimg->property_image))
        {
            unlink($image_path.$propertyimg->property_image);
        }
        PropertyImage::where('id',$id)->delete();

        return back()->with('success', 'Property images has been  deleted');
    }


    public function show($id)
    {       
        
    }









    public function paymentPlan()
    {       

        $propertyplans = DB::table('subscription_plans')->where('status',1)->get();

        $paymenttypes = DB::table('paymentgateways')->where('status',1)->get();
        //dd($paymenttypes);

        return view('frontend.homeowners.paymentplan',compact('paymenttypes','propertyplans'));
    }




    public function updateStatus(Request $request,$id=null)
    {
        $data = $request->all();
        Property::where('id',$data['id'])->update(['status'=>$data['status']]);
        if($data['status']==0)
        {
            return response()->json(['error' => 'Property list inactive successfully','status'=>0]);
        }
            return response()->json(['success' => 'Property list active successfully','status'=>1]);
    }



    public function chatIndex()
    {       
        //$user_id =auth()->user()->id;

        $users = User::whereNotIn('id',[auth()->user()->id])->get();

        return view('frontend.homeowners.chat.chatdashboard',compact('users'));
    }


    /* V getFavorites Properties */
    public function getFavoriteProperties(Request $request)
    {
        // $favoriteData = DB::table('properties')
        // ->join('favorites', 'favorites.property_id', '=', 'users.id')
        // ->join('userprofiles', 'userprofiles.user_id', '=', 'users.id')
        // ->where('favorites.user_id', Auth::User()->id)
        // ->select('users.*', 'userprofiles.*')
        // ->orderBy('users.id', 'DESC')
        // ->limit(4)
        // ->get()->toArray();


        $favProperties = DB::table('properties')
        ->join('property_images', 'property_images.property_id', '=', 'properties.id')
        ->join('favorites', 'favorites.property_id', '=', 'properties.id')
        ->groupBy('property_images.property_id')
        ->select('properties.*', 'property_images.property_id','property_images.property_image','favorites.property_id','favorites.user_id')
        ->orderBy('id','DESC')
        ->get()->toArray();

        //echo '<pre>'; print_r($favProperties);exit;

        // $favProperties = Property::with('propertyimages')
        // ->join('favorites', 'favorites.property_id', '=', 'properties.id')
        // ->where('status',1)
        // ->select('properties.*', 'property_images.property_id','property_images.property_image','favorites.property_id','favorites.user_id')
        // ->limit(5)
        // ->get();  

        $favoriteData=array();
        if(isset(Auth::User()->id))
        {
            $favoriteData=DB::table('favorites')->where('user_id', Auth::User()->id)->pluck('property_id')->toArray();
        }
        //echo '<pre>'; print_r($favProperties);exit;



        //echo "<pre>"; print_r($favoriteData); exit;
        return view('frontend.homeowners.favoriteproperty',compact('favProperties','favoriteData'));
    }





}

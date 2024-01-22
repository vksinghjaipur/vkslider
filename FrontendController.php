<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Auth, DB;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LenthAwarePaginator;
use Illuminate\Support\Facades\Crypt;

class FrontendController extends Controller
{
    
    public function index()
    {
        $body_class = '';
        $properties=Property::where('status',1)->get();

        $properties = DB::table('properties')
        ->join('property_images', 'property_images.property_id', '=', 'properties.id')
        ->groupBy('property_images.property_id')
        ->select('properties.*', 'property_images.property_id','property_images.property_image')
        ->get();

       // echo '<pre>'; print_r($properties);exit();
        

        $properties=Property::with('propertyimages')->get();
        //echo '<pre>'; print_r($properties);exit();

        return view('frontend.index',compact('properties'));
    }




    public function getPropDetails(Request $request, $id=null)
    {
        $body_class = '';

        // $id=base64_decode($id);
        // $property_id=$id;

        $propertyDetails=Property::with('propertyimages')->where('id',$id)->first();
        //dd($propertyDetails);

        return view('frontend.property.property-details',compact('body_class','propertyDetails'));
    }

    public function getPropList(Request $request)
    {
       
        // $id=base64_decode($id);
        // $property_id=$id;

        

        //$propertyList=Property::with('propertyimages')->get();
        //dd($propertyList);

        $query = Property::with('propertyimages')->where('status',1);  

        if(isset($_GET['prop_status']) && !empty($_GET['prop_status'])){
            $query->where('properties.prop_status', 'like', '%'.$_GET['prop_status'].'%');
        }

        if(isset($_GET['property_name']) && !empty($_GET['property_name'])){
            $query->where('properties.property_name', 'like', '%'.$_GET['property_name'].'%');
        }

        if(isset($_GET['city']) && !empty($_GET['city'])){
            $query->where('properties.city', 'like', '%'.$_GET['city'].'%');
        }

        if(isset($_GET['property_name']) && !empty($_GET['property_name'])){
            $query->where('properties.property_name', 'like', '%'.$_GET['property_name'].'%');
        }

        if(isset($_GET['beds']) && !empty($_GET['beds'])){
            $query->where('properties.beds', 'like', '%'.$_GET['beds'].'%');
        }

        if(isset($_GET['baths']) && !empty($_GET['baths'])){
            $query->where('properties.baths', 'like', '%'.$_GET['baths'].'%');
        }

        if(isset($_GET['price']) && !empty($_GET['price'])){
            if($_GET['price'] == 'price_LH')
            {
            $query->orderBy('properties.price','ASC');
            }
        }
        if(isset($_GET['price']) && !empty($_GET['price'])){
            if($_GET['price'] == 'price_HL')
            {
            $query->orderBy('properties.price','DESC');
            }
        }


        if(isset($_GET['price_from']) && !empty($_GET['price_from'])){
            $query->where('properties.price', '>=', $_GET['price_from']);
        }
        
        if(isset($_GET['price_to']) && !empty($_GET['price_to'])){
            $query->where('properties.price', '<=', $_GET['price_to']);   
        }

        if(isset($_GET['prop_type']) && !empty($_GET['prop_type'])){
            $query->where('properties.prop_type', 'like', '%'.$_GET['prop_type'].'%');
        }

        if(isset($_GET['min_area']) && !empty($_GET['min_area'])){
            $query->where('properties.sqft', '>=', $_GET['min_area']);
        }
        
        if(isset($_GET['max_area']) && !empty($_GET['max_area'])){
            $query->where('properties.sqft', '<=', $_GET['max_area']);    
        }


        if(isset($_GET['sqft']) && !empty($_GET['sqft'])){
            $query->where('properties.sqft', 'like', '%'.$_GET['sqft'].'%');
        }

        $propertyList = $query->get();

        $propertyCount = count($propertyList);  

        $favoriteData=array();
        if(isset(Auth::User()->id))
        {
            $favoriteData=DB::table('favorites')->where('user_id', Auth::User()->id)->pluck('property_id')->toArray();
        }
        //echo '<pre>'; print_r($favoriteData);exit;

        return view('frontend.property.property-list',compact('propertyList','propertyCount','favoriteData'));
    }




    public function propSearch(Request $request)
    {
       

        // $id=base64_decode($id);
        // $property_id=$id;

        
        $propertyCount = Property::where('status',1)->count(); 


        $query = Property::with('propertyimages')->where('status',1);  

        if(isset($_GET['property_name']) && !empty($_GET['property_name'])){
            $query->where('properties.property_name', 'like', '%'.$_GET['property_name'].'%');
        }

        if(isset($_GET['city']) && !empty($_GET['city'])){
            $query->where('properties.city', 'like', '%'.$_GET['city'].'%');
        }

        if(isset($_GET['property_name']) && !empty($_GET['property_name'])){
            $query->where('properties.property_name', 'like', '%'.$_GET['property_name'].'%');
        }

        if(isset($_GET['beds']) && !empty($_GET['beds'])){
            $query->where('properties.beds', 'like', '%'.$_GET['beds'].'%');
        }

        if(isset($_GET['baths']) && !empty($_GET['baths'])){
            $query->where('properties.baths', 'like', '%'.$_GET['baths'].'%');
        }

        if(isset($_GET['prop_status']) && !empty($_GET['prop_status'])){
            $query->where('properties.prop_status', 'like', '%'.$_GET['prop_status'].'%');
        }

        if(isset($_GET['price']) && !empty($_GET['price'])){
            $query->where('properties.price', 'like', '%'.$_GET['price'].'%');
        }

        if(isset($_GET['sqft']) && !empty($_GET['sqft'])){
            $query->where('properties.sqft', 'like', '%'.$_GET['sqft'].'%');
        }
        
        $propertyList = $query->paginate(10);

        //echo "<pre>"; print_r($propertyList);exit; 

        
    return view('frontend.property.property-search',compact('propertyList','propertyCount'));

    }




    
    public function getAboutus()
    {
        $body_class = '';
        return view('frontend.pages.aboutus', compact('body_class'));
    }

    public function getFeatures()
    {
        $body_class = '';
        return view('frontend.pages.features', compact('body_class'));
    }

       
    
    public function privacy()
    {
        $body_class = '';

        return view('frontend.privacy', compact('body_class'));
    }

    
    public function terms()
    {
        $body_class = '';

        return view('frontend.terms', compact('body_class'));
    }

    /* pages view */

    public function getPages($page_slug)
    {
        $page = Page::where('page_slug',$page_slug)->first();
        if(empty($page->title)) {
            return redirect()->back()->with('error', 'Url Does not exist');
            // return redirect()->back()->withFlashInfo('Url Does not exist');
        }
        return view('frontend.pages.pages',compact('page'));
    }

   


    /* function for add countries in db */

    public function getCountries(Request $request)
    { 
        $fileD = fopen(base_path('public/countries.csv'), 'r');
        $column=fgetcsv($fileD);
        while(!feof($fileD)){
         $rowData[]=fgetcsv($fileD);
        }
        foreach ($rowData as $key => $value) {
            $inserted_data=array('sortname'=>$value[0],
                                 'name'=>$value[1],
                                 'phonecode'=>$value[2],
                            );
            
             Country::insert($inserted_data);
        }
        echo 'Country list Data Updated Successfully.!';exit;
    } 

    /* function for add states in db */

    public function getStates(Request $request)
    { 
        $fileD = fopen(base_path('public/states.csv'), 'r');
        $column=fgetcsv($fileD);
        while(!feof($fileD)){
         $rowData[]=fgetcsv($fileD);
        }
        foreach ($rowData as $key => $value) {
            $inserted_data=array('name'=>$value[0],
                                 'country_id'=>$value[1],
                            );
            
            State::insert($inserted_data);
        }
        echo 'State list Data Updated Successfully.!';exit;
    } 

    /* function for add Cities in db */

    public function getCities(Request $request)
    { 
        $fileD = fopen(base_path('public/cities.csv'), 'r');
        $column=fgetcsv($fileD);
        while(!feof($fileD)){
         $rowData[]=fgetcsv($fileD);
        }
        foreach ($rowData as $key => $value) {
            $inserted_data=array('name'=>$value[0],
                                 'state_id'=>$value[1],
                            );
            
            City::insert($inserted_data);
        }
        echo 'City list Data Updated Successfully.!';exit;
    } 



    
    public function mlsSearch(Request $request)
    {

      $param_arr = array('location'=>str_replace(' ','',$request->city),'offset'=>'0','limit'=>'20','property_type'=>$request->property_type,'beds_min'=>$request->beds,'baths_min'=>$request->baths,'price_min'=>$request->price_min,'home_size_min'=>$request->size_min,'price_max'=>$request->price_max,'home_size_max'=>$request->size_max);
      $response_arr = $this->getPropertyAPIResponse('GET','for-sale',$param_arr); 
   
      //echo "<pre>"; print_r($response_arr);exit; 
      $propertyList = $response_arr->listings;
      $propertyCount = $response_arr->totalResultCount;
      // $propertyList = $this->paginate($propertyList,10);
       
       return view('frontend.property.property-search',compact('propertyList','propertyCount'));
        
    }


    public function mlsPropertyDetail($property_id)
    {
  
        $param_arr = array('id'=>$property_id);
        $response_listing = $this->getPropertyAPIResponse('GET','property',$param_arr); 
        $propertyDetails = $response_listing->listing;
    
        $body_class = '';
        return view('frontend.property.property-mls-details',compact('body_class','propertyDetails'));
        
    }



    /* V Add Favorites Property */
    public function addFavorites($id=NULL)
    {
        $data = DB::table('favorites')->where('user_id', Auth::User()->id)
        ->where('property_id',  $id)->first();
        if(empty($data))
        {
            DB::table('favorites')->insert(['user_id' => Auth::User()->id, 'property_id' => $id]);
        }
        return redirect()->back()->with('message','Property added in your favorite list.');
    }


    /* V Remove Favorites Property */
    public function removeFavorites($id=NULL)
    {
        $data = DB::table('favorites')->where('user_id', Auth::User()->id)
        ->where('property_id', $id)->first();

        if(!empty($data)){
            DB::table('favorites')->where('id', $data->id)->delete();
        }
        return redirect()->back()->with('warning','Property removed from your favorite list.');
    } 
       

       
}

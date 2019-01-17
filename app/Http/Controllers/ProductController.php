<?php
	namespace App\Http\Controllers;

	use App\DisplayCaption;
	use Illuminate\Http\Request;
	use App\Repositories\EloquentGlobal;
	use Validator;
	use App\Product;
	use App\Wishlist;
	use App\PriceAlert;
	use App\Product_Image;
	use App\Category;
	use App\SubCategory;
	use App\Subscribers;
	use Illuminate\Support\Facades\Session;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\URL;

	class ProductController extends GlobalController
	{
		  public $amount_per_call=100;
		 public $successStatus = 200;
	    public function __construct(){
	      //  $this->merchantinfo=new EloquentGlobal($merchantinfo);
	    }


	    public function viewProduct ()
	    {
	      //  $products = Product::where('merchantid',Auth::user()->uid)->paginate(10);
	        //  $categories = Category::where('idnumber',Auth::user()->idnumber)->paginate(10);
	          //  $business=$this->curlPost(array('idnumber'=>Auth::user()->idnumber),$this->url."paymentController/getBusinessByIdNumber");
	        //return view('pages.view-product',compact('products','categories','business'));

	    }

			public function addProduct(){
				//return Auth::user();
					$categories_list=$this->getCategories();
				return view('merchant.add_product',compact('categories_list'));
			}

			public function addCategoryView(){
				//return Auth::user();
				//	$categories_list=$this->getCategories();
				return view('admin.add_category');
			}

			public function addSubCategoryView(){
				//return Auth::user();
				$categories_list=$this->getCategories();
				return view('admin.add_sub_category',compact('categories_list'));
			}

			public function addAdminProduct(){
				//return Auth::user();
				return view('admin.add_product');
			}


			public function DeleteProduct(Request $request){
				//return $request;
					$product=Product::where("product_id",$request->id)->delete($request->id);
						$product2=Product_Image::where("product_id",$request->id)->delete($request->id);
					if($product){
			 			$response['error']="FALSE";
			 			$response['success_message']="Product deleted successfully";
			 			return response()->json(['success'=>$response], $this->successStatus);
			 		}else{
			 			$response['error']="TRUE";
			 			$response['error_message']="An error occurred while deleting product!";
			 			return response()->json(['error'=>$response], $this->successStatus);
			 		}
			}


						public function DeleteWishList(Request $request){
							//return $request;
								$product=Wishlist::where("wish_id",$request->id)->delete($request->id);
								if($product){
						 			$response['error']="FALSE";
						 			$response['success_message']="Product deleted from list successfully";
						 			return response()->json(['success'=>$response], $this->successStatus);
						 		}else{
						 			$response['error']="TRUE";
						 			$response['error_message']="An error occurred while deleting product!";
						 			return response()->json(['error'=>$response], $this->successStatus);
						 		}
						}

						public function DeletePriceAlert(Request $request){
							//return $request;
								$product=PriceAlert::where("alert_id",$request->id)->delete($request->id);
								if($product){
									$response['error']="FALSE";
									$response['success_message']="Product deleted from list successfully";
									return response()->json(['success'=>$response], $this->successStatus);
								}else{
									$response['error']="TRUE";
									$response['error_message']="An error occurred while deleting product!";
									return response()->json(['error'=>$response], $this->successStatus);
								}
						}

						public function DeleteCategory(Request $request){
							//return $request;
								$product=Category::where("cat_id",$request->id)->delete($request->id);
								if($product){
									$response['error']="FALSE";
									$response['success_message']="Category deleted from list successfully";
									return response()->json(['success'=>$response], $this->successStatus);
								}else{
									$response['error']="TRUE";
									$response['error_message']="An error occurred while deleting category!";
									return response()->json(['error'=>$response], $this->successStatus);
								}
						}

						public function DeleteSubCategory(Request $request){
							//return $request;
								$product=SubCategory::where("sub_cat_id",$request->id)->delete($request->id);
								if($product){
									$response['error']="FALSE";
									$response['success_message']="Sub Category deleted from list successfully";
									return response()->json(['success'=>$response], $this->successStatus);
								}else{
									$response['error']="TRUE";
									$response['error_message']="An error occurred while deleting sub category!";
									return response()->json(['error'=>$response], $this->successStatus);
								}
						}

			public function DeleteProductImages(Request $request){
				//return $request;
						$product2=Product_Image::where("product_image_id",$request->id)->delete($request->id);
					if($product2){
						$response['error']="FALSE";
						$response['success_message']="Product Image deleted successfully";
						return response()->json(['success'=>$response], $this->successStatus);
					}else{
						$response['error']="TRUE";
						$response['error_message']="An error occurred while deleting product!";
						return response()->json(['error'=>$response], $this->successStatus);
					}
			}

				public function makeThumb($src, $dest, $desired_width) {

					/* read the source image */
					$source_image =imagecreatefromjpeg($src);
					$width = imagesx($source_image);
					$height = imagesy($source_image);

					/* find the "desired height" of this thumbnail, relative to the desired width  */
				//	$desired_height = floor($height * ($desired_width / $width));
						$desired_height=300;
					/* create a new, "virtual" image */
					$virtual_image = imagecreatetruecolor($desired_width, $desired_height);

					/* copy source image at a resized size */
					imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

					/* create the physical thumbnail image to its destination */
					imagejpeg($virtual_image,$dest);
					}

				public function createProduct(Request $request){
					//return $request;
					$rules=array('category' => 'required|string',
		        'uid' => 'required|integer',
		        'sub_category' => 'required|string',
		        'product_name' => 'required|string',
		        'product_price' => 'required|numeric',
		        'product_description' => 'required|string');
					$messages = array(
							'category.required' => 'User id is required.',
							'uid.required.required' => 'User id is required',
						 'sub_category.required' => 'Sub category is required',
						 'product_name.required' => 'Product name is required',
						 'product_price.required' => 'Product price is required',
						 'product_description.required' => 'Product description is required'
					);
	        $validator = Validator::make($request->all(),$rules,$messages);
					if($validator->fails()){
							return response()->json(["errors"=>$validator->errors()]);
							}

			if(!isset($request->product_id)){
				//$request->product_id=0;
				$validator = Validator::make($request->all(), [
				'product_primary_image' => 'required',
				'product_primary_image.*' => 'image|mimes:jpeg,jpg|max:2048'
					]);
					if($validator->fails()){
							return response()->json(["errors"=>$validator->errors()]);
							}
				}
					 $input = $request->all();

					 $user=Product::updateOrCreate(array('product_id'=>$request->product_id),$input);
				   //checks if the current request is ok
					 //return $user;
					 		if($request->hasfile('product_image')) {
								$this->uploadProductImage($request,$user);
							}
									if($request->hasfile('product_primary_image')) {
										$this->uploadProductPrimaryImage($request,$user);
									}
		   if($user && !isset($input['product_id'])){
				$response['error']="FALSE";
				$response['success_message']="Product saved successfully";
				$response['data']=$user;
				//return $user;
				return response()->json(['success'=>$response], $this->successStatus);
			}
			else if($user && isset($input['product_id'])){
			 $response['error']="FALSE";
			 $response['success_message']="Product updated successfully";
			 $response['data']=$user;
			 //return $user;
			 return response()->json(['success'=>$response], $this->successStatus);
		 }else{
				$response['error']="TRUE";
				$response['error_message']="An error occurred while processing!";
				return response()->json(['error'=>$response], $this->successStatus);
			}

				}


				public function addCategory(Request $request){
					//return $request;
					$validator = Validator::make($request->all(), [
					'cat_name' => 'required|string',
					]);
					if($validator->fails()){
							return response()->json(["errors"=>$validator->errors()]);
							}
					 $input = $request->all();
					 $user=Category::updateOrCreate(array('cat_id'=>$request->cat_id),$input);
			 if($user && !isset($input['cat_id'])){
				$response['error']="FALSE";
				$response['success_message']="Category saved successfully";
				$response['data']=$user;
				//return $user;
				return response()->json(['success'=>$response], $this->successStatus);
			}
			else if($user && isset($input['cat_id'])){
			 $response['error']="FALSE";
			 $response['success_message']="Category updated successfully";
			 $response['data']=$user;
			 //return $user;
			 return response()->json(['success'=>$response], $this->successStatus);
		 }else{
				$response['error']="TRUE";
				$response['error_message']="An error occurred while processing your request!";
				return response()->json(['error'=>$response], $this->successStatus);
			}

				}


				public function addSubCategory(Request $request){
					//return $request;
					$validator = Validator::make($request->all(), [
					'sub_cat_name' => 'required|string',
					'cat_id' => 'required|integer',
					]);
					if($validator->fails()){
							return response()->json(["errors"=>$validator->errors()]);
							}
					 $input = $request->all();
					 $user=SubCategory::updateOrCreate(array('sub_cat_id'=>$request->sub_cat_id),$input);
			 if($user && !isset($input['sub_cat_id'])){
				$response['error']="FALSE";
				$response['success_message']="Sub Category saved successfully";
				$response['data']=$user;
				//return $user;
				return response()->json(['success'=>$response], $this->successStatus);
			}
			else if($user && isset($input['cat_id'])){
			 $response['error']="FALSE";
			 $response['success_message']="Sub Category updated successfully";
			 $response['data']=$user;
			 //return $user;
			 return response()->json(['success'=>$response], $this->successStatus);
		 }else{
				$response['error']="TRUE";
				$response['error_message']="An error occurred while processing your request!";
				return response()->json(['error'=>$response], $this->successStatus);
			}

				}



				public function uploadProductImage($request,$user){
					if($request->hasfile('product_image')) {
							$images = $request->file("product_image");
						 foreach($images as $image){
						$input = $request->all();
							$input['product_id']=$user->product_id;
						 // return  $user;
						$folder="products".uniqid();
						//return $image;
						$input['primary_image']=0;
						$file_name=$folder.'.'.$image->getClientOriginalExtension();
						$input['product_image'] =$file_name;
						$destinationPath = public_path('/uploads/product_images/');
						$image->move($destinationPath, $input['product_image']);
						$thumbDestinationPath = public_path('/uploads/product_images/thumbnails/');
						$this->makeThumb($destinationPath.$file_name,$thumbDestinationPath.$file_name,300);
						$prod=Product_Image::updateOrCreate(array('product_image_id'=>$request->product_image_id),$input);
						 }
					 }
				}

				public function uploadProductPrimaryImage($request,$user){
					if($request->hasfile('product_primary_image')) {
							$images = $request->file("product_primary_image");
						 foreach($images as $image){
						$input = $request->all();
							$input['product_id']=$user->product_id;
						 // return  $user;
						$folder="products".uniqid();
						//return $image;
						$input['primary_image']=1;
						$file_name=$folder.'.'.$image->getClientOriginalExtension();
						$input['product_image'] =$file_name;
						$destinationPath = public_path('/uploads/product_images/');
						$image->move($destinationPath, $input['product_image']);
						$thumbDestinationPath = public_path('/uploads/product_images/thumbnails/');
						$this->makeThumb($destinationPath.$file_name,$thumbDestinationPath.$file_name,300);
						$prod=Product_Image::updateOrCreate(array('product_image_id'=>$request->product_image_id),$input);
						 }
					 }
				}
				public function createWishList(Request $request){
					//return $request;
	        $validator = Validator::make($request->all(), [
	        'list_name' => 'required|string',
	        'product_id' => 'required|integer',
	    		]);
					if($validator->fails()){
							return response()->json(["errors"=>$validator->errors()]);
							}
					 $input = $request->all();

					 $list=WishList::updateOrCreate(array('wish_id'=>$request->wish_id),$input);

		   if($list){
				$response['error']="FALSE";
				$response['success_message']="Product added to list successfully";
				$response['data']=$list;
				//return $user;
				return response()->json(['success'=>$response], $this->successStatus);
			}else{
				$response['error']="TRUE";
				$response['error_message']="An error occurred while processing!";
				return response()->json(['error'=>$response], $this->successStatus);
			}

				}



				public function createPriceAlert(Request $request){
					//return $request;
					$validator = Validator::make($request->all(), [
					'uid' => 'required|integer',
					'product_id' => 'required|integer',
					'price' => 'required',
					]);
					if($validator->fails()){
							return response()->json(["errors"=>$validator->errors()]);
							}
					 $input = $request->all();

					 $list=PriceAlert::updateOrCreate(array('alert_id'=>$request->alert_id),$input);

			 if($list){
				$response['error']="FALSE";
				$response['success_message']="Price alert added successfully";
				$response['data']=$list;
				//return $user;
				return response()->json(['success'=>$response], $this->successStatus);
			}else{
				$response['error']="TRUE";
				$response['error_message']="An error occurred while adding price alert!";
				return response()->json(['error'=>$response], $this->successStatus);
			}

				}

				public function compare(Request $request){
					//return $request;
					$validator = Validator::make($request->all(), [
					'product_id' => 'required|integer',
					]);
					if($validator->fails()){
							return response()->json(["errors"=>$validator->errors()]);
							}
							$result=array();
					if(Session::has('cart')){
						$cart=Session::get('cart');
						$new_element=array($request->product_id);
						$result=array_merge($cart,$new_element);
							Session::put('cart',$result);
					}else{
						$cart=array($request->product_id);
					Session::put('cart',$cart);
						$result=Session::get('cart');
					}
					//return $result;

			 if($result){
				$response['error']="FALSE";
				$response['success_message']="Added to comparison list successfully";
				$response['data']=$result;
				//return $user;
				return response()->json(['success'=>$response], $this->successStatus);
			}else{
				$response['error']="TRUE";
				$response['error_message']="An error occurred while adding item!";
				return response()->json(['error'=>$response], $this->successStatus);
			}

				}



					function getAllMyProduct(Request $request){
					$product=	DB::table('products')
					->JOIN('categories','categories.cat_id','=','products.category')
					->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
					->where('uid','=',Session('uid'))->paginate();
					 $i=0;
					// return $product;
					 foreach($product as $prod){
					 $image= $this->getProductImages($prod->product_id);
					  $product[$i]->product_image=$image;
					 $i++;
				 }
				 //return $product;
					 return view('merchant.view_products',compact('product'));
					}


					function adminGetAllMyProduct(Request $request){
					$product=	DB::table('products')
					->JOIN('categories','categories.cat_id','=','products.category')
					->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
					->paginate();
					 $i=0;
					// return $product;
					 foreach($product as $prod){
					 $image= $this->getProductImages($prod->product_id);
						$product[$i]->product_image=$image;
					 $i++;
				 }
				 //return $product;
					 return view('admin.view_products',compact('product'));
					}

					public function getCategories(){
						$categories=DB::table('categories')->get();
						 $i=0;
						 foreach($categories as $cat){
							 $sub_categories=	DB::table('sub_categories')
							 ->where('cat_id','=',$cat->cat_id)
 							->get();
							$categories[$i]->sub_categories=$sub_categories;
						 $i++;
					 }
					 return $categories;
					}


					function landingGetAllMyProduct(Request $request){
					$product=	DB::table('products')
					->JOIN('categories','categories.cat_id','=','products.category')
					->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
					->paginate();
					 $i=0;
					// return $product;
					 foreach($product as $prod){
					 $image= $this->getProductImages($prod->product_id);
						$product[$i]->product_image=$image;
					 $i++;
				 }
				 $categories=$this->getCategoriesCount();

				 $featured=$this->featuredGetAllMyProduct();
				  //return $featured;
					$categories_list=$this->getCategories();
					//return $categories_list;
					$popular=$this->popularGetAllMyProduct();
				//	return $popular;
					 return view('index',compact('product','featured','popular','categories','categories_list'));
					}



					public function category($cat_id){
					$product=	DB::table('products')
					->JOIN('categories','categories.cat_id','=','products.category')
					->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
					->where('products.category','=',$cat_id)
					->paginate();
					 $i=0;

					 foreach($product as $prod){
					 $image= $this->getProductImages($prod->product_id);
						$product[$i]->product_image=$image;
					 $i++;
				 }
				 	// return $product;
				   $categories=$this->getCategoriesCount();

				 $featured=$this->featuredGetAllMyProduct();
					//return $featured;
					$categories_list=$this->getCategories();
					//return $categories_list;
					$popular=$this->popularGetAllMyProduct();
				//	return $popular;
					 return view('index',compact('product','featured','popular','categories','categories_list'));
					}

					public function getCategoriesCount(){
						$categories=DB::select('select products.category,categories.cat_id,categories.cat_name,count(products.category) as total_product_count from categories
										 JOIN products on products.category=categories.cat_id
										 group by products.category,categories.cat_id');
										 return $categories;
					}

					public function subCategory($sub_cat_id){
					$product=	DB::table('products')
					->JOIN('categories','categories.cat_id','=','products.category')
					->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
					->where('products.sub_category','=',$sub_cat_id)
					->paginate();
					 $i=0;

					 foreach($product as $prod){
					 $image= $this->getProductImages($prod->product_id);
						$product[$i]->product_image=$image;
					 $i++;
				 }
				 	// return $product;
				 $categories=$this->getCategoriesCount();
				 $featured=$this->featuredGetAllMyProduct();
					//return $featured;
					$categories_list=$this->getCategories();
					//return $categories_list;
					$popular=$this->popularGetAllMyProduct();
				//	return $popular;
					 return view('index',compact('product','featured','popular','categories','categories_list'));
					}


					function popularGetAllMyProduct(){
					$popu_product=	DB::table('products')
					->JOIN('categories','categories.cat_id','=','products.category')
					->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
					 ->orderBy('products.total_views', 'DESC')
					 ->where('products.total_views','>',0)
					->take(10)
					->get();

					 $i=0;
					// return $product;
					 foreach($popu_product as $prod){
					 $image= $this->getProductImages($prod->product_id);
						$popu_product[$i]->product_image=$image;
					 $i++;
				 }
				 //return $product;
					 return $popu_product;
					}

					function featuredGetAllMyProduct(){
					$product=	DB::table('products')->where('featured','=',1)->get();
					if(count($product)<1){
					$product=	DB::table('products')
					->JOIN('categories','categories.cat_id','=','products.category')
					->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
					->orderBy(DB::raw('RAND()'))
					//->take(8)
					->get();
					}
					 $i=0;
					// return $product;
					 foreach($product as $prod){
					 $image= $this->getProductImages($prod->product_id);
						$product[$i]->product_image=$image;
					 $i++;
				 }
				 //return $product;
					 return $product;
					}


					function productDetails($product_id){
					$product=	DB::table('products')
					->JOIN('categories','categories.cat_id','=','products.category')
					->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
					->where('products.product_id','=',$product_id)->get();
					 $i=0;
					// return $product;
					 foreach($product as $prod){
					 $image= $this->getProductImages($prod->product_id);
						$product[$i]->product_image=$image;
					 $i++;
				 }
				 //Compare
				 $compare=DB::table('products')
				 ->JOIN('categories','categories.cat_id','=','products.category')
 				 ->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
				 ->JOIN('users','users.uid','=','products.uid')
				 ->where('products.product_name','=',$product[0]->product_name)
				 ->get();
				  $i=0;
				 foreach($compare as $prod){
				 $image= $this->getProductImages($prod->product_id);
					$compare[$i]->product_image=$image;
				 $i++;
			 }
				 //return $compare;
				 //update Products
				 $this->updateViews($product_id,$product[0]->total_views,$product[0]->views_today);
				 $categories_list=$this->getCategories();
		 //return $product2;
					 return view('pages.product',compact('product','compare','categories_list'));
					}
					public function updateViews($product_id,$total_views,$today_views){
						$data=array("total_views"=>$total_views+1);
						Product::where("product_id",$product_id)->update($data);
					}




						function editProduct($product_id){
						$product=	DB::table('products')
						->JOIN('categories','categories.cat_id','=','products.category')
						->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
						->where('uid','=',Session('uid'))
						->where('product_id','=',$product_id)
						->get();
						 $i=0;
						// return $product;
						 foreach($product as $prod){
						 $image= $this->getProductImages($prod->product_id);
							$product[$i]->product_image=$image;
						 $i++;
						}
						//return $product;
						 return view('merchant.edit_product',compact('product'));
						}

						function adminEditProduct($product_id){
						$product=	DB::table('products')
						->JOIN('categories','categories.cat_id','=','products.category')
						->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
						->where('product_id','=',$product_id)
						->get();
						 $i=0;
						 //return $product;
						 foreach($product as $prod){
						 $image= $this->getProductImages($prod->product_id);
							$product[$i]->product_image=$image;
						 $i++;
						}
						//return $product;
						 return view('admin.edit_product',compact('product'));
						}

					function getProductDetails(Request $request){
						$validator = Validator::make($request->all(), [
						'uid' => 'required|integer',
						'product_id' => 'required|integer',
				]);
					if ($validator->fails()) {
					$response['error']="TRUE";
					$response['error_message']=$validator->errors();
							return response()->json(['error'=>$response],$this->successStatus);
					}
						$productImages=	DB::table('product_images')->where("product_id","=",$request->product_id)->get();

						$product=	DB::table('products')->where("product_id","=",$request->product_id)->where("uid","=",$request->uid)->get();

						  $product[0]->product_image=$productImages;
					//return view("view_product",compact(''))
				 }




				 		function getProductImages($product_id,$call_type=0){
				 		$product=	DB::table('product__images')->where("product_id","=",$product_id)->orderBy('primary_image','DESC')->distinct()->get();

				 if($call_type!=0){
				 		if($product){
				 		 $response['error']="FALSE";
				 		 $response['success_message']="Product fetched successfully";
				 		 $response['data']=$product;
				 		 //return $user;
				 		 return response()->json(['success'=>$response], $this->successStatus);
				 	 }else{
				 		 $response['error']="TRUE";
				 		 $response['error_message']="An error occurred while fetching product!";
				 		 return response()->json(['error'=>$response], $this->successStatus);
				 	 }
				  }else{
				 return $product;

				  }
				 	}

					function markAsFeatured(Request $request){
					//	return $request;
						$validator = Validator::make($request->all(), [
						'fproduct_id' => 'required',
				 ]);
				 if($validator->fails()){
						 return response()->json(["errors"=>$validator->errors()]);
						 }

					$data=array(
						'featured' =>1
						);
						foreach ($request->fproduct_id as $product_id){
						$subscribe=Product::where("product_id",$product_id)->update($data);
					}
						if($subscribe){
						 $response['error']="FALSE";
						 $response['success_message']="Featured product marked successfully";
						 return response()->json(['success'=>$response], $this->successStatus);
					 }else{
						 $response['error']="TRUE";
						 $response['error_message']="An error occurred while marking";
						 return response()->json(['error'=>$response], $this->successStatus);
					 }
					}

					function unMarkAsFeatured(Request $request){
					//	return $request;
						$validator = Validator::make($request->all(), [
						'fproduct_id' => 'required',
				 ]);
				 if($validator->fails()){
						 return response()->json(["errors"=>$validator->errors()]);
						 }

					$data=array(
						'featured' =>0
						);
						foreach ($request->fproduct_id as $product_id){
						$subscribe=Product::where("product_id",$product_id)->update($data);
					}
						if($subscribe){
						 $response['error']="FALSE";
						 $response['success_message']="Featured product unmarked successfully";
						 return response()->json(['success'=>$response], $this->successStatus);
					 }else{
						 $response['error']="TRUE";
						 $response['error_message']="An error occurred while marking";
						 return response()->json(['error'=>$response], $this->successStatus);
					 }
					}


					function markAsProductOfTheDay(Request $request){
						$validator = Validator::make($request->all(), [
						'pproduct_id' => 'required',
				 ]);
				 if($validator->fails()){
						 return response()->json(["errors"=>$validator->errors()]);
						 }

					$data=array(
						'product_of_the_day' =>1
						);
							foreach ($request->pproduct_id as $product_id){
						$subscribe=Product::where("product_id",$product_id)->update($data);
						}
						if($subscribe){
						 $response['error']="FALSE";
						 $response['success_message']="Product(s) of the day Marked successfully";
						 return response()->json(['success'=>$response], $this->successStatus);
					 }else{
						 $response['error']="TRUE";
						 $response['error_message']="An error occurred while marking";
						 return response()->json(['error'=>$response], $this->successStatus);
					 }
					}


					function unMarkAsProductOfTheDay(Request $request){
						$validator = Validator::make($request->all(), [
						'pproduct_id' => 'required',
				 ]);
				 if($validator->fails()){
						 return response()->json(["errors"=>$validator->errors()]);
						 }

					$data=array(
						'product_of_the_day' =>0
						);
							foreach ($request->pproduct_id as $product_id){
						$subscribe=Product::where("product_id",$product_id)->update($data);
						}
						if($subscribe){
						 $response['error']="FALSE";
						 $response['success_message']="Product(s) of the day Unmarked successfully";
						 return response()->json(['success'=>$response], $this->successStatus);
					 }else{
						 $response['error']="TRUE";
						 $response['error_message']="An error occurred while marking";
						 return response()->json(['error'=>$response], $this->successStatus);
					 }
					}


			function compareList(Request $request){
					$result=array();
					if(Session::has('cart')){
						$cart=Session::get('cart');
					}else{
						$cart=array();
					}
					$product2=array();
					for($i=0;$i<count($cart);$i++){
					$product=	DB::table('products')
					->JOIN('categories','categories.cat_id','=','products.category')
					->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
					->where('products.product_id','=',$cart[$i])
					->get();
					// return $product;
					 //foreach($product as $prod){
					 $product2[$i]=$product[0];
					 $image= $this->getProductImages($product[0]->product_id);
						$product2[$i]->product_image=$image;

				 //}
			 }
			 		$categories_list=$this->getCategories();
				//return $product2;
					 return view('pages.compare_list',compact('product2','categories_list'));
					}

					public function contact(){
						$categories_list=$this->getCategories();
						//return $product2;
							 return view('pages.contact-us',compact('categories_list'));
							}

							public function about(){
								$categories_list=$this->getCategories();
								//return $product2;
									 return view('pages.about',compact('categories_list'));
									}



		public function mWhishList(){
			$product=	DB::table('products')
			->JOIN('categories','categories.cat_id','=','products.category')
			->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
			->JOIN('wish_lists','wish_lists.product_id','=','products.product_id')
			->where('wish_lists.uid','=',Session('uid'))
			->get();
				 return view('merchant.wish_list',compact('product'));
				}

				public function mPriceList(){
					$product=	DB::table('products')
					->JOIN('categories','categories.cat_id','=','products.category')
					->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
					->JOIN('price_alerts','price_alerts.product_id','=','products.product_id')
					->where('price_alerts.uid','=',Session('uid'))
					->get();
						 return view('merchant.price_alert',compact('product'));
						}



public function aWhishList(){
	$product=	DB::table('products')
	->JOIN('categories','categories.cat_id','=','products.category')
	->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
	->JOIN('wish_lists','wish_lists.product_id','=','products.product_id')
	->get();
		 return view('admin.wish_list',compact('product'));
		}

		public function aPriceList(){
			$product=	DB::table('products')
			->JOIN('categories','categories.cat_id','=','products.category')
			->JOIN('sub_categories','sub_categories.sub_cat_id','=','products.sub_category')
			->JOIN('price_alerts','price_alerts.product_id','=','products.product_id')
			->get();
				 return view('admin.price_alert',compact('product'));
				}


				function viewCategory(Request $request){
				$categories_list=	DB::table('categories')->get();
				 $i=0;
			 //return $product;
				 return view('admin.view_category',compact('categories_list'));
				}

				function editCategory($cat_id){
				$categories_list=	DB::table('categories')
					->where('categories.cat_id','=',$cat_id)
					->get();
				 return view('admin.admin_edit_category',compact('categories_list'));
				}

				function viewSubCategory(Request $request){
				$categories_list=	DB::table('sub_categories')
				->JOIN('categories','sub_categories.cat_id','=','categories.cat_id')
				->get();
				//return $categories_list;
				 return view('admin.view_sub_category',compact('categories_list'));
				}

				function editSubCategory($sub_cat_id){
					$categories_list=	DB::table('sub_categories')
					->JOIN('categories','sub_categories.cat_id','=','categories.cat_id')
					->where('sub_categories.sub_cat_id','=',$sub_cat_id)
					->get();
					$categories_list2=$this->getCategories();
				 return view('admin.admin_edit_sub_category',compact('categories_list','categories_list2'));
				}
	}

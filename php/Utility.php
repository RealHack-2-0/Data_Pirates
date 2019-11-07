<?php 
	 require_once('DBController.php');
	 require_once('config.php');
	?>




<?php 
	class Utility{
		private $controller;

		public function __construct(){
			$this->controller= new DBController();
		}

		public function addJS($email,$password,$firstname,$lastname,$dob,$gender,$address,$nic){
			$query="INSERT INTO jobseeker (Email,Password,FirstName,LastName,DOB,Gender,Address,NIC)VALUES ('$email','$password','$firstname','$lastname','$dob','$gender','$address','$nic')";
			$result=$this->controller->insertQuery($query);
			if($result){
				return true;
			}else{
				return false;
			}
		}
		//get all seller details by token
		public function getBasicInfoByToken($token){
			$query="SELECT * FROM seller WHERE token='$token'";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function getBasicInfoByEmail($email){
			$query="SELECT * FROM seller WHERE store_email='$email'";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}
		//when logging in 
		public function compareLoginDetails($email,$psw){
			$query="SELECT * FROM jobseeker WHERE Email='$email' AND Password='$psw'";
			$result=$this->controller->numRows($query);

			return $result;
		}
		//add new item to item table and the itemavailability table
		public function addnewItem($model,$brand,$price,$availability,$sellerid){
			$query="SELECT * FROM brand WHERE brand_name='$brand'";
			$result=$this->controller->runQuery($query);
			if($result){
				$category_id=$result[0]['category_id'];
				$brand_id=$result[0]['brand_id'];
			$query1="INSERT INTO item(category_id,model,brand_id,item_isActive)VALUES ('$category_id','$model','$brand_id',0)";
			$result1=$this->controller->insertQuery($query1);
			$itemid=$result1;
			$query3="INSERT INTO itemavailability (store_id,item_id,availability,price,isDeleted) VALUES('$sellerid','$itemid','$availability','$price',1)";
			$result3=$this->controller->insertQuery($query3);
			return $result3;
		}
		}
		////////////////////////////////////////add new entry to itemAvailability table when item exists already in the item table
		public function addItemtoSeller($item_id,$category_id,$price,$availability,$sellerid){
			
			$query2="INSERT INTO itemavailability (category_id,store_id,item_id,availability,price,isDeleted) VALUES('$category_id','$sellerid','$item_id','$availability','$price',0)";
			$result2=$this->controller->insertQuery($query2);
			if ($result2!=0){
				echo "done";
			}
			return $result2;
		}
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		public function getBasicFeaturesOfItem($model){
			$query="SELECT * FROM seller WHERE model='$model'";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function getCategoryByName($catname){
			$query="SELECT * FROM category WHERE category_name='$catname'";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function getCategoryById($catid){
			$query="SELECT * FROM category WHERE category_id='$catid'";
			$result=$this->controller->runQuery($query);
			return $result;
		}
		
		public function getSellersItemList($sellerid){
			$query="SELECT * FROM item INNER JOIN itemavailability ON item.item_id = itemavailability.item_id WHERE store_id='$sellerid'";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function loadMobileBrands($cat){

			$query="SELECT * FROM brand WHERE category_id='$cat'";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function loaditems($brand_id){
			$query1="SELECT * FROM item WHERE brand_id='$brand_id' and item_isActive=1";
			$result1=$this->controller->runQuery($query1);
			if ($result1){
				return $result1;
			}else{
				return false;
			}
		}

		public function checkAdminPsw($password){
			if ($password=="password123"){
				return true;
			}else{
				return false;
			}
		}

		public function getsellerRequestsList(){
			$query="SELECT * FROM seller WHERE seller_isActive=0";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function getitemRequestsList(){
			$query="SELECT * FROM item INNER JOIN itemavailability ON item.item_id = itemavailability.item_id INNER JOIN seller ON itemavailability.store_id=seller.store_id WHERE item_isActive=0";
			$result=$this->controller->runQuery($query);
			return $result;
		}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		public function addNewSeller($newstore_id){
		//	$query="UPDATE seller_isActive=1 FROM seller WHERE store_id=$newstore_id ";
			$query = "UPDATE seller SET seller_isActive = 1 WHERE  store_id=$newstore_id";
			$result=$this->controller->updateQuery($query);
			if ($result){
				return $result;
			}else{
				return false;
			}
		}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		public function RemoveSeller($newstore_id){
		//	$query="UPDATE seller_isActive=1 FROM seller WHERE store_id=$newstore_id ";
			$query = "UPDATE seller SET seller_isActive = 0 WHERE  store_id=$newstore_id";
			$result=$this->controller->updateQuery($query);
			if ($result){
				return $result;
			}else{
				return false;
			}
		}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		public function RemoveItem($item_id){
		//	$query="UPDATE seller_isActive=1 FROM seller WHERE store_id=$newstore_id ";
			$query = "UPDATE item SET item_isActive = 0 WHERE  item_id=$item_id AND item_isActive = 1" ;
			$query = "UPDATE item SET item_isActive = 1 WHERE  item_id=$item_id AND item_isActive = 0" ;
			$result=$this->controller->updateQuery($query);
			if ($result){
				return $result;
			}else{
				return false;
			}
		}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		public function SellerUpdateItem($sellerid,$item,$price,$availability){
		//	$query="UPDATE seller_isActive=1 FROM seller WHERE store_id=$newstore_id ";
			$query = "UPDATE itemavailability SET availability = '$availability' , price = '$price' WHERE  item_id = '$item' AND store_id = '$sellerid'";

			$result=$this->controller->updateQuery($query);
			if ($result){
				echo "updated";
				return $result;
			}else{
				return false;
			}
		}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		public function add_laptopdetails(){
			
		}
		public function getAdditionalFeatures($item_id){
			$query="SELECT * FROM propertyavailability WHERE item_id=$item_id";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function gettotalsellerList(){
			$query="SELECT * FROM seller";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function gettotalitemList(){
			$query="SELECT * FROM category INNER JOIN  brand ON brand.category_id = category.category_id INNER JOIN item ON item.brand_id=brand.brand_id";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function addNewLaptopByAdmin($brand,$model,$processor,$ram,$storage,$battery,$os,$display,$colours){
			$query="SELECT * FROM brand WHERE brand_name='$brand'";
			$result=$this->controller->runQuery($query);
			if($result){
				$category_id=$result[0]['category_id'];
				$brand_id=$result[0]['brand_id'];
			}
			$query1="INSERT INTO item (category_id,model,brand_id,item_isActive,rating,rating_count)VALUES (3,'$model','$brand_id',1,0,0)";
			$id=$this->controller->insertQuery($query1);
			$query2 = "INSERT INTO additionalproperties (item_id,storage,os,battery_capacity,ram,display,processor,colours) VALUES ($id,'$storage','$os','$battery','$ram','$display','$processor','$colours')";
			$result3=$this->controller->insertQuery($query2);
			return $result3;
		}
		//M
		public function addNewMobileByAdmin($brand,$model,$processor,$ram,$storage,$batterycapacity,$version,$display,$colours,$camera,$fastCharging){
			$query="SELECT * FROM brand WHERE brand_name='$brand'";
			$result=$this->controller->runQuery($query);
			if($result){
				$category_id=$result[0]['category_id'];
				$brand_id=$result[0]['brand_id'];
			}
			$query1="INSERT INTO item (category_id,model,brand_id,item_isActive,rating,rating_count)VALUES (1,'$model','$brand_id',1,0,0)";
			$id=$this->controller->insertQuery($query1);
			$query2 = "INSERT INTO additionalproperties (item_id,storage,version,battery_capacity,ram,display,processor,colours,camera,fast_charging) VALUES ($id,'$storage','$version','$battery','$ram','$display','$processor','$colours','$camera','$fastCharging')";
			$result3=$this->controller->insertQuery($query2);
			return $result3;
		}
		//M
		public function addNewTabletByAdmin($brand,$model,$processor,$ram,$storage,$batterycapacity,$version,$display,$colours,$camera){
			$query="SELECT * FROM brand WHERE brand_name='$brand'";
			$result=$this->controller->runQuery($query);
			if($result){
				$category_id=$result[0]['category_id'];
				$brand_id=$result[0]['brand_id'];
			}
			$query1="INSERT INTO item (category_id,model,brand_id,item_isActive,rating,rating_count)VALUES (2,'$model','$brand_id',1,0,0)";
			$id=$this->controller->insertQuery($query1);
			$query2 = "INSERT INTO additionalproperties (item_id,storage,version,battery_capacity,ram,display,processor,colours,camera) VALUES ($id,'$storage','$version','$battery','$ram','$display','$processor','$colours','$camera')";
			$result3=$this->controller->insertQuery($query2);
			return $result3;
		}
		//M
		public function addNewCategory($category_name){
			$query = "INSERT INTO category (category_name,category_isActive) VALUES ('$category_name',1)";
			$result=$this->controller->insertQuery($query);
			return $result;
		}
		//M
		public function addNewBrand($brand_name){
			$query = "INSERT INTO brand (brand_name) VALUES ('$brand_name')";
			$result=$this->controller->insertQuery($query);
			return $result;
		}		
		//M
		public function loadData($category_id){
			$query = "SELECT * FROM item WHERE category_id=$category_id";
			$result=mysqli_query($connection,$query);
			return $result;
		}
		//M
		public function loadAdditionalProperties($item_id){
			$query = "SELECT * FROM additionalproperties WHERE item_id=$item_id";
			$result=$this->controller->loadQuery($query);
			return $result;
		}
		//M
		public function updateMobileByAdmin($id,$processor,$ram,$storage,$batterycapacity,$version,$display,$colours,$camera,$fastCharging){
			$query = "UPDATE additionalproperties SET storage='$storage', processor='$processor', ram='$ram' , battery_capacity='$batterycapacity' , version='$version' , display='$display' , camera='$camera' , fast_charging='$fastCharging' , colours='$colours' WHERE item_id=$id";
			$result=$this->controller->updateQuery($query);
			return $result;
		}
		//M
		public function updateTabletByAdmin($id,$processor,$ram,$storage,$batterycapacity,$version,$display,$colours,$camera){
			$query = "UPDATE additionalproperties SET storage='$storage', processor='$processor', ram='$ram' , battery_capacity='$batterycapacity' , version='$version' , display='$display' , camera='$camera' , colours='$colours' WHERE item_id=$id";
			$result=$this->controller->updateQuery($query);
			return $result;
		}
		public function updateLaptopByAdmin($id,$processor,$ram,$storage,$batterycapacity,$os,$display,$colours){
			$query = "UPDATE additionalproperties SET storage='$storage', processor='$processor', ram='$ram' , battery_capacity='$batterycapacity' , os='$os' , display='$display', colours='$colours' WHERE item_id=$id";
			$result=$this->controller->updateQuery($query);
			return $result;
		}
		//M
		public function updateTelevisionByAdmin($id,$display,$type,$resolution,$power,$colours){
			$query = "UPDATE additionalproperties SET display='$display', type='$type', resolution='$resolution' , power='$power', colours='$colours' WHERE item_id=$id";
			$result=$this->controller->updateQuery($query);
			return $result;
		}
		//M
		public function addNewStore($email,$companyName,$phone,$mobile,$website,$address,$is_Active){
			$query="UPDATE seller SET companyName='$companyName', telephone='$phone', mobile='$mobile', website='$website', store_address='$address', seller_isActive=$is_Active WHERE store_email='$email'";	
			$result=$this->controller->updateQuery($query);
			return $result;
		}

		public function checkSignup($email){
			$query="SELECT * FROM jobseeker WHERE Email LIKE '%$email%'";
			$result=$this->controller->numRows($query);
			return $result;
		}

		public function getItemsForModel($model){
			$query= "SELECT * FROM item WHERE model LIKE '%$model%'";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function checkItemForSeller($item_id,$sellerid){
			$query="SELECT * FROM itemavailability WHERE item_id LIKE '%$item_id%' AND store_id LIKE '%$sellerid%'";
			$result=$this->controller->numRows($query);
			return $result;
		}

		public function requestNewItem($store_id,$brand,$category,$model){
			$query = "INSERT INTO itemrequests (brand,category,model,store_id,considered) VALUES ('$brand','$category','$model','$store_id',0)";
			$result=$this->controller->insertQuery($query);
			return $result;
		}

	}

?>
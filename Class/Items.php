<!-- Create  -->
    <?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Aut
horization, X-Requested-With");

include_once '../config/Database.php';
include_once '../class/Items.php';

$database = new Database();
$db = $database->getConnection();

$items = new Items($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->name) && !empty($data->description) &&
!empty($data->price) && !empty($data->category_id) &&
!empty($data->created)){

$items->name = $data->name;
$items->description = $data->description;
$items->price = $data->price;
$items->category_id = $data->category_id;
$items->created = date('Y-m-d H:i:s');

if($items->create()){
http_response_code(201);
echo json_encode(array("message" => "Item was created."));
} else{
http_response_code(503);
echo json_encode(array("message" => "Unable to create item."));
}
}else{
http_response_code(400);
echo json_encode(array("message" => "Unable to create item. Data is incomplete.")
);
}
?>

<!-- Read
     <?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/Items.php';

$database = new Database();
$db = $database->getConnection();

$items = new Items($db);

$items->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $items->read();

if($result->num_rows > 0){
$itemRecords=array();
$itemRecords["items"]=array();
while ($item = $result->fetch_assoc()) {
extract($item);
$itemDetails=array(
"id" => $id,
"name" => $name,
"description" => $description,
"price" => $price,
"category_id" => $category_id,
"created" => $created,

"modified" => $modified
);
array_push($itemRecords["items"], $itemDetails);
}
http_response_code(200);
echo json_encode($itemRecords);
}else{
http_response_code(404);
echo json_encode(
array("message" => "No item found.")
);
}
?> -->

<!-- 
    Update
    <?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Aut
horization, X-Requested-With");

include_once '../config/Database.php';
include_once '../class/Items.php';

$database = new Database();
$db = $database->getConnection();

$items = new Items($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id) && !empty($data->name) &&
!empty($data->description) && !empty($data->price) &&
!empty($data->category_id)){

$items->id = $data->id;
$items->name = $data->name;
$items->description = $data->description;
$items->price = $data->price;
$items->category_id = $data->category_id;
$items->created = date('Y-m-d H:i:s');

if($items->update()){
http_response_code(200);
echo json_encode(array("message" => "Item was updated."));
}else{

http_response_code(503);
echo json_encode(array("message" => "Unable to update items."));
}

} else {
http_response_code(400);
echo json_encode(array("message" => "Unable to update items. Data is incomplete."
));
}
?> -->

<!-- 
    Delete
    <?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Aut
horization, X-Requested-With");

include_once '../config/Database.php';
include_once '../class/Items.php';

$database = new Database();
$db = $database->getConnection();

$items = new Items($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id)) {
$items->id = $data->id;
if($items->delete()){
http_response_code(200);
echo json_encode(array("message" => "Item was deleted."));
} else {
http_response_code(503);
echo json_encode(array("message" => "Unable to delete item."));
}
} else {
http_response_code(400);
echo json_encode(array("message" => "Unable to delete items. Data is incomplete."
));

}
?> -->


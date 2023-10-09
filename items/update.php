<?php
function update(){

$stmt = $this->conn->prepare("
UPDATE ".$this->itemsTable."
SET name= ?, description = ?, price = ?, category_id = ?, created =

?

WHERE id = ?");

$this->id = htmlspecialchars(strip_tags($this->id));
$this->name = htmlspecialchars(strip_tags($this->name));
$this->description = htmlspecialchars(strip_tags($this->description));
$this->price = htmlspecialchars(strip_tags($this->price));
$this->category_id = htmlspecialchars(strip_tags($this->category_id));
$this->created = htmlspecialchars(strip_tags($this->created));

$stmt->bind_param("ssiisi", $this->name, $this->description, $this->price, $
this->category_id, $this->created, $this->id);

if($stmt->execute()){
return true;
}

return false;
}
?>
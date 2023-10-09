<?php
function delete(){

$stmt = $this->conn->prepare("
DELETE FROM ".$this->itemsTable."
WHERE id = ?");

$this->id = htmlspecialchars(strip_tags($this->id));

$stmt->bind_param("i", $this->id);

if($stmt->execute()){
return true;
}

return false;
}
?>
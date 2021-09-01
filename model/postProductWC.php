<?php 

class postProduct extends database {

    private $conn;

    function __construct() {
        $this->conn = parent::__construct();
    }

    public function CreatePostById($id, $title) {
        $request = $this->conn->prepare("INSERT INTO id_escapeGameShope (id, name) VALUES (:id, :title)");
        $request->bindParam(":id", $id, PDO::PARAM_INT);
        $request->bindParam(":title", $title, PDO::PARAM_STR);
        if ($request->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePostById ($id) {
        $request = $this->conn->prepare("DELETE FROM `id_escapeGameShope` WHERE id = :id");
        $request->bindParam(":id", $id, PDO::PARAM_INT);
        if ($request->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePostWC($post_before, $post_after) {
        $request = $this->conn->prepare("UPDATE `id_escapeGameShope` SET `id`= :after_id,`name`= :after_title WHERE id = :before_id");
        $request->bindParam(":after_id" , $post_after->ID, PDO::PARAM_INT);
        $request->bindParam(":after_title", $post_after->post_title, PDO::PARAM_STR);
        $request->bindParam(":before_id", $post_before->ID, PDO::PARAM_INT);
        if ($request->execute()) {
            return true;
        } else {
            return false;
        }

    }
}
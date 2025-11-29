<?php
require_once "../config.php";
require_once ABS_PATH_TO_PROJECT . "classes/DB-Connection.php";

class GalleryManage
{
    public $id;
    public $imageName;
    public $tagline;
    public $imagePath;
    public $status;

    function __construct($iId = null)
    {
        if ($iId !== null) {
            $this->fetchById($iId);
        }
    }

    /* ============================================================
       Fetch Gallery Image By ID
    ============================================================ */
    function fetchById($iId)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->select("*")
            ->from("gallery")
            ->where("id = :id")
            ->andWhere("deleted = 0")
            ->setParameter("id", $iId);

        try {
            $row = $oQB->executeQuery()->fetchAssociative();

            if ($row) {
                $this->id        = $row['id'];
                $this->imageName = $row['image_name'];
                $this->tagline   = $row['image_tagline'];
                $this->imagePath = $row['image_path'];
                $this->status    = $row['status'];
                return $row;
            }

            return false;
        } catch (\Exception $e) {
            die("Error fetching gallery: " . $e->getMessage());
        }
    }

    /* ============================================================
       Add New Gallery Image
    ============================================================ */
    function addImage($imageName, $tagline, $imagePath, $status = 1)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();
        $table = "gallery";

        $oQB->insert($table)
            ->setValue("image_name", ":imageName")
            ->setValue("image_tagline", ":tagline")
            ->setValue("image_path", ":imagePath")
            ->setValue("status", ":status")
            ->setParameter("imageName", $imageName)
            ->setParameter("tagline", $tagline ?? "")
            ->setParameter("imagePath", $imagePath)
            ->setParameter("status", $status);

        try {
            $oQB->executeQuery();
            return $oConnection->conn->lastInsertId();
        } catch (\Exception $e) {
            die("Error adding gallery image: " . $e->getMessage());
        }
    }

    /* ============================================================
       Update Gallery Image
    ============================================================ */
    function updateImage($id, $imageName, $tagline, $imagePath = null, $status = 1)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();
        $table = "gallery";

        $oQB->update($table)
            ->set("image_name", ":imageName")
            ->set("image_tagline", ":tagline")
            ->set("status", ":status");

        if ($imagePath !== null && $imagePath !== "") {
            $oQB->set("image_path", ":imagePath")
                ->setParameter("imagePath", $imagePath);
        }

        $oQB->where("id = :id")
            ->andWhere("deleted = 0")
            ->setParameter("imageName", $imageName)
            ->setParameter("tagline", $tagline)
            ->setParameter("status", $status)
            ->setParameter("id", $id);

        try {
            $oQB->executeQuery();
            return true;
        } catch (\Exception $e) {
            die("Error updating gallery image: " . $e->getMessage());
        }
    }

    /* ============================================================
       Soft Delete Gallery Image
    ============================================================ */
    function deleteImage($id)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->update("gallery")
            ->set("deleted", ":deleted")
            ->where("id = :id")
            ->andWhere("deleted = 0")
            ->setParameter("deleted", 1)
            ->setParameter("id", $id);

        try {
            $oQB->executeQuery();
            return true;
        } catch (\Exception $e) {
            die("Error deleting gallery image: " . $e->getMessage());
        }
    }

    /* ============================================================
       Fetch All Images With Filters (name, status)
    ============================================================ */
    function fetchAll($name = "", $status = "",$category = "")
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->select("*")
            ->from("gallery")
            ->where("deleted = 0");

        if (!empty($name)) {
            $oQB->andWhere("image_name LIKE :name")
                ->setParameter("name", "%" . $name . "%");
        }
        if( !empty($category)) {
            $oQB->andWhere("image_tagline LIKE :category")
                ->setParameter("category","%" . $category."%");
        }

        if ($status !== "") {
            $oQB->andWhere("status = :status")
                ->setParameter("status", $status);
        }

        try {
            return $oQB->executeQuery()->fetchAllAssociative();
        } catch (\Exception $e) {
            die("Error fetching gallery images: " . $e->getMessage());
        }
    }

    /* ============================================================
       Fetch Recent Gallery Images
    ============================================================ */
    function fetchRecent($limit = 5)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->select("*")
            ->from("gallery")
            ->where("deleted = 0")
            ->andWhere("status = 1")
            ->orderBy("id", "DESC")
            ->setMaxResults($limit);

        try {
            return $oQB->executeQuery()->fetchAllAssociative();
        } catch (\Exception $e) {
            die("Error fetching recent gallery: " . $e->getMessage());
        }
    }

    function toggleStatus($iId, $newStatus)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->update("gallery")
            ->set("status", ":status")
            ->where("id = :id")
            ->andWhere("deleted = 0")
            ->setParameter("status", $newStatus)
            ->setParameter("id", $iId);

        try {
            $oQB->executeQuery();
            return true;
        } catch (\Exception $e) {
            die("Error toggling gallery status: " . $e->getMessage());
        }

    }
}

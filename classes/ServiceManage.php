<?php
require_once "../config.php";
require_once ABS_PATH_TO_PROJECT."classes/DB-Connection.php";

class ServiceManage
{
    public $title;
    public $category;
    public $description;
    public $status;
    public $image;

    function __construct($iId = null)
    {
        if ($iId !== null) {
            $this->fetchById($iId);
        }
    }

    /* ============================================================
       Fetch Service By ID
    ============================================================ */
    function fetchById($iId)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();
        $sTable = "app_services";

        $oQB->select("*")
            ->from($sTable)
            ->where("id = :id")
            ->andWhere("deleted = 0")
            ->setParameter("id", $iId);

        try {
            $oResult = $oQB->executeQuery();
            $aRow = $oResult->fetchAssociative();

            if ($aRow) {

                $this->title       = $aRow['service_title'];
                $this->category    = $aRow['service_category'];
                $this->description = $aRow['service_description'];
                $this->status      = $aRow['service_status'];
                $this->image       = $aRow['service_image'];

                return $aRow;
            }

            return false;

        } catch (\Exception $e) {
            die("Error fetching service: " . $e->getMessage());
        }
    }

    /* ============================================================
       Add New Service
    ============================================================ */
    function addService($author, $title, $category, $description, $status = 1, $image = null)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();
        $sTable = "app_services";

        $sServiceId = $this->generateServiceId();
        if ($image == null) {
            $image = "";   // Default empty (no image)
        }

        $oQB->insert($sTable)
            ->setValue("service_id", ":service_id")
            ->setValue("author_name", ":author")
            ->setValue("service_title", ":title")
            ->setValue("service_category", ":category")
            ->setValue("service_description", ":description")
            ->setValue("service_status", ":status")
            ->setValue("service_image", ":image")
            ->setParameter("service_id", $sServiceId)
            ->setParameter("author", $author)
            ->setParameter("title", $title)
            ->setParameter("category", $category)
            ->setParameter("description", $description)
            ->setParameter("status", ($status == "Active" || $status == 1 ? 1 : 0))
            ->setParameter("image", $image);

        try {
            $oQB->executeQuery();
            return $oConnection->conn->lastInsertId();
        } catch (\Exception $e) {
            die("Error adding service: " . $e->getMessage());
        }
    }

    /* ============================================================
       Generate Unique Service ID
    ============================================================ */
    function generateServiceId()
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->select("MAX(id) AS max_id")
            ->from("app_services");

        try {
            $row = $oQB->executeQuery()->fetchAssociative();
            $nextId = ($row['max_id'] ?? 0) + 1;

            return "SR-" . str_pad($nextId, 3, "0", STR_PAD_LEFT);

        } catch (\Exception $e) {
            die("Error generating service ID: " . $e->getMessage());
        }
    }

    /* ============================================================
       Update Service
    ============================================================ */
    function updateService($iId, $title, $category, $description, $status, $image = null)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();
        $sTable = "app_services";

        $oQB->update($sTable)
            ->set("service_title", ":title")
            ->set("service_category", ":category")
            ->set("service_description", ":description")
            ->set("service_status", ":status");

        // Update image only when new image is provided
        if ($image !== null && $image !== "") {
            $oQB->set("service_image", ":image")
                ->setParameter("image", $image);
        }

        $oQB->where("id = :id")
            ->andWhere("deleted = 0")
            ->setParameter("title", $title)
            ->setParameter("category", $category)
            ->setParameter("description", $description)
            ->setParameter("status", $status)
            ->setParameter("id", $iId);

        try {
            $oQB->executeQuery();
            return true;

        } catch (\Exception $e) {
            die("Error updating service: " . $e->getMessage());
        }
    }

    /* ============================================================
       Soft Delete Service
    ============================================================ */
    function deleteService($iId)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();
        $sTable = "app_services";

        $oQB->update($sTable)
            ->set("deleted", ":deleted")
            ->where("id = :id")
            ->andWhere("deleted = 0")
            ->setParameter("deleted", 1)
            ->setParameter("id", $iId);

        try {
            $oQB->executeQuery();
            return true;

        } catch (\Exception $e) {
            die("Error deleting service: " . $e->getMessage());
        }
    }

    /* ============================================================
       Fetch All Services
    ============================================================ */
    function fetchAll($title = "", $category = "", $status = "",$sOrder = "desc",$iLimit = "")
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();
        $sTable = "app_services";

        $oQB->select("*")
            ->from($sTable)
            ->where("deleted = 0");

        if (!empty($title)) {
            $oQB->andWhere("service_title LIKE :title")
                ->setParameter("title", "%".$title."%");
        }

        if (!empty($category)) {
            $oQB->andWhere("service_category = :category")
                ->setParameter("category", $category);
        }

        if ($status !== "") {
            $oQB->andWhere("service_status = :status")
                ->setParameter("status", $status);
        }

        if ($sOrder != "") {
            $oQB->orderBy("id", $sOrder);
        }

        if($iLimit != ""){
            $oQB->setMaxResults($iLimit);
        }

        try {
            return $oQB->executeQuery()->fetchAllAssociative();

        } catch (\Exception $e) {
            die("Error fetching services: " . $e->getMessage());
        }
    }
}

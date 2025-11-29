<?php
require_once "../config.php";
require_once ABS_PATH_TO_PROJECT . "classes/DB-Connection.php";

class BlogManage
{
    public $title;
    public $slug;
    public $category;
    public $content;
    public $status;
    public $image;
    public $whatsapp;
    public $seoTitle;
    public $seoKeywords;
    public $seoDescription;

    function __construct($iId = null)
    {
        if ($iId !== null) {
            $this->fetchById($iId);
        }
    }

    /* ============================================================
       Fetch Blog By ID
    ============================================================ */
    function fetchById($iId)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->select("*")
            ->from("app_blogs")
            ->where("id = :id")
            ->andWhere("deleted = 0")
            ->setParameter("id", $iId);

        try {
            $row = $oQB->executeQuery()->fetchAssociative();

            if ($row) {
                $this->title          = $row['blog_title'];
                $this->slug           = $row['blog_slug'];
                $this->category       = $row['blog_category'];
                $this->content        = $row['blog_content'];
                $this->status         = $row['blog_status'];
                $this->image          = $row['blog_image'];
                $this->whatsapp       = $row['whatsapp_link'];
                $this->seoTitle       = $row['seo_title'];
                $this->seoKeywords    = $row['seo_keywords'];
                $this->seoDescription = $row['seo_description'];

                return $row;
            }

            return false;
        } catch (\Exception $e) {
            die("Error fetching blog: " . $e->getMessage());
        }
    }

    /* ============================================================
       Add New Blog
    ============================================================ */
    function addBlog($author, $title, $slug, $category, $content, $status = 1, $image = null, $whatsapp = null, $seoTitle = null, $seoKeywords = null, $seoDesc = null)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();
        $table = "app_blogs";

        $blogId = $this->generateBlogId();

        $oQB->insert($table)
            ->setValue("blog_id", ":blog_id")
            ->setValue("author_name", ":author")
            ->setValue("blog_title", ":title")
            ->setValue("blog_slug", ":slug")
            ->setValue("blog_category", ":category")
            ->setValue("blog_content", ":content")
            ->setValue("blog_status", ":status")
            ->setValue("blog_image", ":image")
            ->setValue("whatsapp_link", ":whatsapp")
            ->setValue("seo_title", ":seoTitle")
            ->setValue("seo_keywords", ":seoKeywords")
            ->setValue("seo_description", ":seoDesc")

            ->setParameter("blog_id", $blogId)
            ->setParameter("author", $author)
            ->setParameter("title", $title)
            ->setParameter("slug", $slug)
            ->setParameter("category", $category)
            ->setParameter("content", $content)
            ->setParameter("status", $status)
            ->setParameter("image", $image ?? "")
            ->setParameter("whatsapp", $whatsapp ?? "")
            ->setParameter("seoTitle", $seoTitle ?? "")
            ->setParameter("seoKeywords", $seoKeywords ?? "")
            ->setParameter("seoDesc", $seoDesc ?? "");

        try {
            $oQB->executeQuery();
            return $oConnection->conn->lastInsertId();
        } catch (\Exception $e) {
            die("Error adding blog: " . $e->getMessage());
        }
    }

    /* ============================================================
       Generate Blog ID
    ============================================================ */
    function generateBlogId()
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->select("MAX(id) AS max_id")
            ->from("app_blogs");

        try {
            $row = $oQB->executeQuery()->fetchAssociative();
            $next = ($row['max_id'] ?? 0) + 1;

            return "BL-" . str_pad($next, 3, "0", STR_PAD_LEFT);
        } catch (\Exception $e) {
            die("Error generating blog ID: " . $e->getMessage());
        }
    }

    /* ============================================================
       Update Blog
    ============================================================ */
    function updateBlog($id, $title, $sAuthorName, $slug, $category, $content, $status, $image = null, $whatsapp = null, $seoTitle = null, $seoKeywords = null, $seoDesc = null)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();
        $table = "app_blogs";

        $oQB->update($table)
            ->set("blog_title", ":title")
            ->set("author_name", ":author")
            ->set("blog_slug", ":slug")
            ->set("blog_category", ":category")
            ->set("blog_content", ":content")
            ->set("blog_status", ":status")
            ->set("whatsapp_link", ":whatsapp")
            ->set("seo_title", ":seoTitle")
            ->set("seo_keywords", ":seoKeywords")
            ->set("seo_description", ":seoDesc");

        if ($image !== null && $image !== "") {
            $oQB->set("blog_image", ":image")
                ->setParameter("image", $image);
        }

        $oQB->where("id = :id")
            ->andWhere("deleted = 0")
            ->setParameter("title", $title)
            ->setParameter("author", $sAuthorName)
            ->setParameter("slug", $slug)
            ->setParameter("category", $category)
            ->setParameter("content", $content)
            ->setParameter("status", $status)
            ->setParameter("whatsapp", $whatsapp)
            ->setParameter("seoTitle", $seoTitle)
            ->setParameter("seoKeywords", $seoKeywords)
            ->setParameter("seoDesc", $seoDesc)
            ->setParameter("id", $id);

        try {
            $oQB->executeQuery();
            return true;
        } catch (\Exception $e) {
            die("Error updating blog: " . $e->getMessage());
        }
    }

    /* ============================================================
       Soft Delete Blog
    ============================================================ */
    function deleteBlog($id)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->update("app_blogs")
            ->set("deleted", ":deleted")
            ->where("id = :id")
            ->andWhere("deleted = 0")
            ->setParameter("deleted", 1)
            ->setParameter("id", $id);

        try {
            $oQB->executeQuery();
            return true;
        } catch (\Exception $e) {
            die("Error deleting blog: " . $e->getMessage());
        }
    }

    /* ============================================================
       Fetch All Blogs With Filters
    ============================================================ */
    function fetchAll($title = "", $category = "", $status = 1)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->select("*")
            ->from("app_blogs")
            ->where("deleted = 0");

        if (!empty($title)) {
            $oQB->andWhere("blog_title LIKE :title")
                ->setParameter("title", "%" . $title . "%");
        }

        if (!empty($category)) {
            $oQB->andWhere("blog_category = :category")
                ->setParameter("category", $category);
        }

        if ($status != "") {
            $oQB->andWhere("blog_status = :status")
                ->setParameter("status", $status);
        }

        try {
            return $oQB->executeQuery()->fetchAllAssociative();
        } catch (\Exception $e) {
            die("Error fetching blogs: " . $e->getMessage());
        }
    }


    /* ============================================================
   Fetch Recent Blogs
============================================================ */
    function fetchRecent($limit = 5)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->select("id, blog_title, blog_slug, blog_image, blog_category, added_on")
            ->from("app_blogs")
            ->where("deleted = 0")
            ->andWhere("blog_status = 1")
            ->orderBy("id", "DESC")
            ->setMaxResults($limit);

        try {
            return $oQB->executeQuery()->fetchAllAssociative();
        } catch (\Exception $e) {
            die("Error fetching recent blogs: " . $e->getMessage());
        }
    }


    /* ============================================================
   Fetch All Blog Categories (Distinct)
============================================================ */
    function fetchCategories()
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->select("DISTINCT blog_category,count(blog_category) as total")
            ->from("app_blogs")
            ->where("deleted = 0")
            ->andWhere("blog_category IS NOT NULL")
            ->andWhere("blog_category != ''")
            ->groupBy("blog_category")
            ->orderBy("blog_category", "ASC");

        try {
            return $oQB->executeQuery()->fetchAllAssociative();
        } catch (\Exception $e) {
            die("Error fetching categories: " . $e->getMessage());
        }
    }
}

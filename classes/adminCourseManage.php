<?php
require_once "../config.php";
require_once ABS_PATH_TO_PROJECT . "classes/DB-Connection.php";

class CourseManage
{
    public $title;
    public $slug;
    public $category;
    public $shortDesc;
    public $fullDesc;
    public $thumbnail;
    public $banner;
    public $link;
    public $whatsapp;
    public $price;
    public $duration;
    public $level;
    public $requirements;
    public $whatYouLearn;
    public $seoTitle;
    public $seoKeywords;
    public $seoDescription;
    public $status;

    function __construct($iId = null)
    {
        if ($iId !== null) {
            $this->fetchById($iId);
        }
    }

    /* ============================================================
       Fetch Course By ID
    ============================================================ */
    function fetchById($iId)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->select("*")
            ->from("admin_courses")
            ->where("id = :id")
            ->andWhere("deleted = 0")
            ->setParameter("id", $iId);

        try {
            $row = $oQB->executeQuery()->fetchAssociative();

            if ($row) {
                $this->title         = $row['course_title'];
                $this->slug          = $row['course_slug'];
                $this->category      = $row['course_category'];
                $this->shortDesc     = $row['course_short_desc'];
                $this->fullDesc      = $row['course_full_desc'];
                $this->thumbnail     = $row['course_thumbnail'];
                $this->banner        = $row['course_banner'];
                $this->link          = $row['course_link'];
                $this->whatsapp      = $row['whatsapp_link'];
                $this->price         = $row['course_price'];
                $this->duration      = $row['course_duration'];
                $this->level         = $row['course_level'];
                $this->requirements  = $row['requirements'];
                $this->whatYouLearn  = $row['what_you_learn'];
                $this->seoTitle      = $row['seo_title'];
                $this->seoKeywords   = $row['seo_keywords'];
                $this->seoDescription= $row['seo_description'];
                $this->status        = $row['course_status'];

                return $row;
            }

            return false;
        } catch (\Exception $e) {
            die("Error fetching course: " . $e->getMessage());
        }
    }

    /* ============================================================
       Add New Course
    ============================================================ */
    function addCourse($author, $title, $slug, $category, $shortDesc, $fullDesc, $status = 1, $thumbnail = null, $banner = null, $link = null, $whatsapp = null, $price = 0.00, $duration = null, $level = null, $requirements = null, $whatYouLearn = null, $seoTitle = null, $seoKeywords = null, $seoDesc = null)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();
        $table = "admin_courses";

        $courseId = $this->generateCourseId();

        $oQB->insert($table)
            ->setValue("course_id", ":course_id")
            ->setValue("author_name", ":author")
            ->setValue("course_title", ":title")
            ->setValue("course_slug", ":slug")
            ->setValue("course_category", ":category")
            ->setValue("course_short_desc", ":shortDesc")
            ->setValue("course_full_desc", ":fullDesc")
            ->setValue("course_status", ":status")
            ->setValue("course_thumbnail", ":thumbnail")
            ->setValue("course_banner", ":banner")
            ->setValue("course_link", ":link")
            ->setValue("whatsapp_link", ":whatsapp")
            ->setValue("course_price", ":price")
            ->setValue("course_duration", ":duration")
            ->setValue("course_level", ":level")
            ->setValue("requirements", ":requirements")
            ->setValue("what_you_learn", ":whatYouLearn")
            ->setValue("seo_title", ":seoTitle")
            ->setValue("seo_keywords", ":seoKeywords")
            ->setValue("seo_description", ":seoDesc")
            ->setParameter("course_id", $courseId)
            ->setParameter("author", $author)
            ->setParameter("title", $title)
            ->setParameter("slug", $slug)
            ->setParameter("category", $category)
            ->setParameter("shortDesc", $shortDesc)
            ->setParameter("fullDesc", $fullDesc)
            ->setParameter("status", $status)
            ->setParameter("thumbnail", $thumbnail ?? "")
            ->setParameter("banner", $banner ?? "")
            ->setParameter("link", $link ?? "")
            ->setParameter("whatsapp", $whatsapp ?? "")
            ->setParameter("price", $price)
            ->setParameter("duration", $duration ?? "")
            ->setParameter("level", $level ?? "")
            ->setParameter("requirements", $requirements ?? "")
            ->setParameter("whatYouLearn", $whatYouLearn ?? "")
            ->setParameter("seoTitle", $seoTitle ?? "")
            ->setParameter("seoKeywords", $seoKeywords ?? "")
            ->setParameter("seoDesc", $seoDesc ?? "");

        try {
            $oQB->executeQuery();
            return $oConnection->conn->lastInsertId();
        } catch (\Exception $e) {
            die("Error adding course: " . $e->getMessage());
        }
    }

    /* ============================================================
       Generate Course ID
    ============================================================ */
    function generateCourseId()
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->select("MAX(id) AS max_id")
            ->from("admin_courses");

        try {
            $row = $oQB->executeQuery()->fetchAssociative();
            $next = ($row['max_id'] ?? 0) + 1;

            return "CR-" . str_pad($next, 2, "0", STR_PAD_LEFT);
        } catch (\Exception $e) {
            die("Error generating course ID: " . $e->getMessage());
        }
    }

    /* ============================================================
       Update Course
    ============================================================ */
    function updateCourse($id, $title, $author, $slug, $category, $shortDesc, $fullDesc, $status, $thumbnail = null, $banner = null, $link = null, $whatsapp = null, $price = 0.00, $duration = null, $level = null, $requirements = null, $whatYouLearn = null, $seoTitle = null, $seoKeywords = null, $seoDesc = null)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();
        $table = "admin_courses";

        $oQB->update($table)
            ->set("course_title", ":title")
            ->set("author_name", ":author")
            ->set("course_slug", ":slug")
            ->set("course_category", ":category")
            ->set("course_short_desc", ":shortDesc")
            ->set("course_full_desc", ":fullDesc")
            ->set("course_status", ":status")
            ->set("course_banner", ":banner")
            ->set("course_link", ":link")
            ->set("whatsapp_link", ":whatsapp")
            ->set("course_price", ":price")
            ->set("course_duration", ":duration")
            ->set("course_level", ":level")
            ->set("requirements", ":requirements")
            ->set("what_you_learn", ":whatYouLearn")
            ->set("seo_title", ":seoTitle")
            ->set("seo_keywords", ":seoKeywords")
            ->set("seo_description", ":seoDesc");

        if ($thumbnail !== null && $thumbnail !== "") {
            $oQB->set("course_thumbnail", ":thumbnail")
                ->setParameter("thumbnail", $thumbnail);
        }

        $oQB->where("id = :id")
            ->andWhere("deleted = 0")
            ->setParameter("title", $title)
            ->setParameter("author", $author)
            ->setParameter("slug", $slug)
            ->setParameter("category", $category)
            ->setParameter("shortDesc", $shortDesc)
            ->setParameter("fullDesc", $fullDesc)
            ->setParameter("status", $status)
            ->setParameter("banner", $banner)
            ->setParameter("link", $link)
            ->setParameter("whatsapp", $whatsapp)
            ->setParameter("price", $price)
            ->setParameter("duration", $duration)
            ->setParameter("level", $level)
            ->setParameter("requirements", $requirements)
            ->setParameter("whatYouLearn", $whatYouLearn)
            ->setParameter("seoTitle", $seoTitle)
            ->setParameter("seoKeywords", $seoKeywords)
            ->setParameter("seoDesc", $seoDesc)
            ->setParameter("id", $id);

        try {
            $oQB->executeQuery();
            return true;
        } catch (\Exception $e) {
            die("Error updating course: " . $e->getMessage());
        }
    }

    /* ============================================================
       Soft Delete Course
    ============================================================ */
    function deleteCourse($id)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->update("admin_courses")
            ->set("deleted", ":deleted")
            ->where("id = :id")
            ->andWhere("deleted = 0")
            ->setParameter("deleted", 1)
            ->setParameter("id", $id);

        try {
            $oQB->executeQuery();
            return true;
        } catch (\Exception $e) {
            die("Error deleting course: " . $e->getMessage());
        }
    }

    /* ============================================================
       Fetch All Courses With Filters
    ============================================================ */
    function fetchAll($title = "", $category = "", $status = 1)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->select("*")
            ->from("admin_courses")
            ->where("deleted = 0");

        if (!empty($title)) {
            $oQB->andWhere("course_title LIKE :title")
                ->setParameter("title", "%" . $title . "%");
        }

        if (!empty($category)) {
            $oQB->andWhere("course_category = :category")
                ->setParameter("category", $category);
        }

        if ($status != "") {
            $oQB->andWhere("course_status = :status")
                ->setParameter("status", $status);
        }

        try {
            return $oQB->executeQuery()->fetchAllAssociative();
        } catch (\Exception $e) {
            die("Error fetching courses: " . $e->getMessage());
        }
    }

    /* ============================================================
       Fetch Recent Courses
    ============================================================ */
    function fetchRecent($limit = 5)
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->select("id, course_title, course_slug, course_thumbnail, course_category, added_on")
            ->from("admin_courses")
            ->where("deleted = 0")
            ->andWhere("course_status = 1")
            ->orderBy("id", "DESC")
            ->setMaxResults($limit);

        try {
            return $oQB->executeQuery()->fetchAllAssociative();
        } catch (\Exception $e) {
            die("Error fetching recent courses: " . $e->getMessage());
        }
    }

    /* ============================================================
       Fetch All Course Categories (Distinct)
    ============================================================ */
    function fetchCategories()
    {
        $oConnection = new DBConnection();
        $oQB = $oConnection->conn->createQueryBuilder();

        $oQB->select("DISTINCT course_category, COUNT(course_category) AS total")
            ->from("admin_courses")
            ->where("deleted = 0")
            ->andWhere("course_category IS NOT NULL")
            ->andWhere("course_category != ''")
            ->groupBy("course_category")
            ->orderBy("course_category", "ASC");

        try {
            return $oQB->executeQuery()->fetchAllAssociative();
        } catch (\Exception $e) {
            die("Error fetching categories: " . $e->getMessage());
        }
    }
}

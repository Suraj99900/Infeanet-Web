<?php
require_once "../config.php";
require_once "DB-Connection.php";

final class StudentSemesterManager
{
    private $oConnection;
    private $oQueryBuilder;

    public function __construct()
    {
        $this->oConnection = new DBConnection();
        $this->oQueryBuilder = $this->oConnection->conn->createQueryBuilder();
    }

    // Add new semester/class
    public function addSemester($semester)
    {
        $sTableName = "student_semester";

        try {
            $this->oQueryBuilder->insert($sTableName)
                ->values([
                    'semester' => ':semester',
                    'status' => ':status',
                    'deleted' => ':deleted',
                    'created_at' => ':created_at',
                    'updated_at' => ':updated_at'
                ])
                ->setParameter('semester', $semester)
                ->setParameter('status', 1)
                ->setParameter('deleted', 0)
                ->setParameter('created_at', date('Y-m-d H:i:s'))
                ->setParameter('updated_at', date('Y-m-d H:i:s'));

            $oResult = $this->oQueryBuilder->executeQuery();

            if ($oResult) {
                return $this->oConnection->conn->lastInsertId();
            } else {
                return false;
            }
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    // Get semester by ID
    public function getSemesterById($semesterId)
    {
        $sTableName = "student_semester";

        try {
            $this->oQueryBuilder->select('*')
                ->from($sTableName)
                ->where("id = :id")
                ->andWhere("deleted = 0")
                ->setParameter('id', $semesterId);

            $oResult = $this->oQueryBuilder->executeQuery();
            return $oResult->fetchAssociative() ?: [];

        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    // Update semester details
    public function updateSemester($semesterId, $semesterName)
    {
        $sTableName = "student_semester";

        try {
            $this->oQueryBuilder->update($sTableName)
                ->set("semester", ":semester")
                ->set("updated_at", ":updated_at")
                ->where("id = :id")
                ->setParameter("semester", $semesterName)
                ->setParameter("updated_at", date('Y-m-d H:i:s'))
                ->setParameter("id", $semesterId);

            return $this->oQueryBuilder->executeQuery();
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    // Soft delete semester
    public function deleteSemester($semesterId)
    {
        $sTableName = "student_semester";

        try {
            $this->oQueryBuilder->update($sTableName)
                ->set("deleted", ":deleted")
                ->set("updated_at", ":updated_at")
                ->where("id = :id")
                ->setParameter("deleted", 1)
                ->setParameter("updated_at", date('Y-m-d H:i:s'))
                ->setParameter("id", $semesterId);

            return $this->oQueryBuilder->executeQuery();
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    // Change Active/Inactive Status
    public function changeStatus($semesterId, $status)
    {
        $sTableName = "student_semester";

       try {
            $this->oQueryBuilder->update($sTableName)
                ->set("status", ":status")
                ->set("updated_at", ":updated_at")
                ->where("id = :id")
                ->setParameter("status", $status)
                ->setParameter("updated_at", date('Y-m-d H:i:s'))
                ->setParameter("id", $semesterId);

            return $this->oQueryBuilder->executeQuery();
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    // Get all semesters (active only)
    public function getAllSemesters($onlyActive = true)
    {
        $sTableName = "student_semester";

        try {
            $this->oQueryBuilder->select('*')
                ->from($sTableName);

            if ($onlyActive) {
                $this->oQueryBuilder->where("deleted = 0")
                    ->andWhere("status = 1");
            }

            $this->oQueryBuilder->orderBy("id", "ASC");

            $oResult = $this->oQueryBuilder->executeQuery();
            return $oResult->fetchAllAssociative() ?: [];

        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    // Search semester by name
    public function searchSemester($keyword)
    {
        $sTableName = "student_semester";

        try {
            $keyword = "%" . $keyword . "%";

            $this->oQueryBuilder->select('*')
                ->from($sTableName)
                ->where("semester LIKE :keyword")
                ->andWhere("deleted = 0")
                ->setParameter("keyword", $keyword);

            $oResult = $this->oQueryBuilder->executeQuery();
            return $oResult->fetchAllAssociative() ?: [];

        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

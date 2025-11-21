<?php
require_once "../config.php";
require_once "DB-Connection.php";

class StaffUpload
{
    private $table = "staff_upload";

    // Add New Upload
    public function addUpload($data)
    {
        $conn = new DBConnection();
        $qb = $conn->conn->createQueryBuilder();

        try {
            $qb->insert($this->table)
                ->values([
                    'name'            => ':name',
                    'isbn'            => ':isbn',
                    'semester'        => ':semester',
                    'description'     => ':description',
                    'file_name'       => ':file_name',
                    'file_path'       => ':file_path',
                    'file_type'       => ':file_type',
                    'user_name'       => ':user_name',
                    'submission_date' => ':submission_date',
                    'added_on'        => ':added_on',
                    'status'          => 1,
                    'deleted'         => 0
                ])
                ->setParameters([
                    'name'            => $data['name'],
                    'isbn'            => $data['isbn'],
                    'semester'        => $data['semester'],
                    'description'     => $data['description'],
                    'file_name'       => $data['file_name'],
                    'file_path'       => $data['file_path'],
                    'file_type'       => $data['file_type'],
                    'user_name'       => $data['user_name'],
                    'submission_date' => $data['submission_date'],
                    'added_on'        => date("Y-m-d H:i:s")
                ]);

            return $qb->executeQuery();
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }


    // Fetch All (not deleted)
    public function getAllUploads($iClassId = null)
    {
        $conn = new DBConnection();
        $qb = $conn->conn->createQueryBuilder();
        $sSemesterTable = "student_semester";
        $qb->select("A.*,S.semester")
            ->from($this->table,'A')
            ->leftjoin('A', $sSemesterTable, 'S', 'A.semester = S.id')
            ->where("A.deleted = 0")
            ->andWhere("A.status = 1")
            ->andWhere("S.deleted = 0")
            ->orderBy("A.id", "DESC");

        if(!is_null($iClassId) && $iClassId > 0) {
            $qb->andWhere("A.semester = :class_id")
               ->setParameter("class_id", $iClassId);
        }
        try {
            $result = $qb->executeQuery();
            return $result ? $result->fetchAllAssociative() : [];
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }


    // Fetch Single Upload By ID
    public function getUploadById($id)
    {
        $conn = new DBConnection();
        $qb = $conn->conn->createQueryBuilder();

        $qb->select("*")
            ->from($this->table)
            ->where("id = :id")
            ->setParameter("id", $id);

        try {
            $result = $qb->executeQuery();
            return $result ? $result->fetchAssociative() : false;
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }


    // Fetch Uploads by Semester
    public function getBySemester($semester)
    {
        $conn = new DBConnection();
        $qb = $conn->conn->createQueryBuilder();

        $qb->select("*")
            ->from($this->table)
            ->where("semester = :sem")
            ->andWhere("deleted = 0")
            ->setParameter("sem", $semester)
            ->orderBy("id", "DESC");

        try {
            $result = $qb->executeQuery();
            return $result ? $result->fetchAllAssociative() : [];
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }


    // Update Upload
    public function updateUpload($id, $data)
    {
        $conn = new DBConnection();
        $qb = $conn->conn->createQueryBuilder();

        try {
            $qb->update($this->table)
                ->set("name", ":name")
                ->set("isbn", ":isbn")
                ->set("semester", ":semester")
                ->set("description", ":description")
                ->set("file_type", ":file_type")
                ->set("submission_date", ":submission_date")
                ->set("updated_at", ":updated_at")
                ->where("id = :id")
                ->setParameters([
                    "id"             => $id,
                    "name"           => $data['name'],
                    "isbn"           => $data['isbn'],
                    "semester"       => $data['semester'],
                    "description"    => $data['description'],
                    "file_type"      => $data['file_type'],
                    "submission_date"=> $data['submission_date'],
                    "updated_at"     => date("Y-m-d H:i:s")
                ]);

            // Optional file update
            if (!empty($data['file_name'])) {
                $qb->set("file_name", ":file_name")
                    ->set("file_path", ":file_path")
                    ->setParameter("file_name", $data['file_name'])
                    ->setParameter("file_path", $data['file_path']);
            }

            return $qb->executeQuery();

        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }


    // Soft Delete Upload
    public function deleteUpload($id)
    {
        $conn = new DBConnection();
        $qb = $conn->conn->createQueryBuilder();

        $qb->update($this->table)
            ->set("deleted", 1)
            ->where("id = :id")
            ->setParameter("id", $id);

        try {
            return $qb->executeQuery();
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

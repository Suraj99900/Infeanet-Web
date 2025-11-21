CREATE TABLE `staff_upload` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `isbn` VARCHAR(255) NULL,
    `semester` INT NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `file_name` VARCHAR(255) NOT NULL,
    `file_type` INT NOT NULL,
    `user_name` VARCHAR(255) NULL,
    `added_on` TIMESTAMP NULL,
    `status` INT DEFAULT 1,
    `deleted` INT DEFAULT 0,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL,
    INDEX (`semester`),
    INDEX (`status`),
    INDEX (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `staff_upload`
ADD `file_path` VARCHAR(255) AFTER `file_name`;

ALTER TABLE `staff_upload`
ADD `submission_date` DATE NULL AFTER `file_type`;


CREATE TABLE `student_semester` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `semester` VARCHAR(255) NOT NULL,       -- Now stores class/batch names
    `status` BOOLEAN DEFAULT 1,
    `deleted` BOOLEAN DEFAULT 0,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL,
    INDEX (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert Class 9–12 + JEE + MHT-CET
INSERT INTO `student_semester` (`semester`, `status`, `deleted`, `created_at`, `updated_at`)
VALUES
('Class 9', 1, 0, NOW(), NOW()),
('Class 10', 1, 0, NOW(), NOW()),
('Class 11', 1, 0, NOW(), NOW()),
('Class 12', 1, 0, NOW(), NOW()),
('JEE Batch', 1, 0, NOW(), NOW()),
('MHT-CET Batch', 1, 0, NOW(), NOW());


CREATE TABLE `folder_master` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `folder_name` VARCHAR(255) NOT NULL,
    `user_name` VARCHAR(255) NULL,
    `creation_on` DATE NULL,
    `status` INT DEFAULT 1,
    `deleted` INT DEFAULT 0,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL,
    INDEX (`folder_name`),
    INDEX (`creation_on`),
    INDEX (`status`),
    INDEX (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `subfolder` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `master_folder_id` INT NOT NULL,
    `sub_folder` VARCHAR(255) NOT NULL,
    `user_name` VARCHAR(255) NULL,
    `creation_on` DATE NULL,
    `status` INT DEFAULT 1,
    `deleted` INT DEFAULT 0,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL,
    INDEX (`master_folder_id`),
    INDEX (`status`),
    INDEX (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `folder_file` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `sub_folder_id` INT NOT NULL,
    `file` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `file_name` VARCHAR(255) NOT NULL,
    `file_path` VARCHAR(255) NOT NULL,
    `file_type` INT NOT NULL,
    `user_name` VARCHAR(255) NULL,
    `creation_on` DATE NULL,
    `status` INT DEFAULT 1,
    `deleted` INT DEFAULT 0,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL,
    INDEX (`sub_folder_id`),
    INDEX (`file_type`),
    INDEX (`file`),
    INDEX (`file_name`),
    INDEX (`file_path`),
    INDEX (`status`),
    INDEX (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `app_services` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `service_id` VARCHAR(50) NOT NULL,          -- Auto-generated like IN-01
    `author_name` VARCHAR(255) NOT NULL,        -- From session username
    `service_title` VARCHAR(255) NOT NULL,
    `service_category` VARCHAR(255) NOT NULL,
    `service_description` LONGTEXT NOT NULL,

    `service_image` VARCHAR(255) DEFAULT NULL,  -- NEW: image filename or full path

    `service_status` INT DEFAULT 1,             -- 1=Active, 0=Inactive
    `added_on` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `deleted` INT DEFAULT 0,                     -- 0=Not deleted, 1=Soft deleted

    INDEX (`service_category`),
    INDEX (`service_status`),
    INDEX (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `app_blogs` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `blog_id` VARCHAR(50) NOT NULL,                -- Auto ID like BL-01
    `author_name` VARCHAR(255) NOT NULL,           -- From session
    `blog_title` VARCHAR(255) NOT NULL,
    `blog_slug` VARCHAR(255) UNIQUE NOT NULL,      -- For page URL
    `blog_category` VARCHAR(255) NOT NULL,
    `blog_content` LONGTEXT NOT NULL,
    `blog_image` VARCHAR(255) DEFAULT NULL,        -- Feature Image
    `whatsapp_link` VARCHAR(255) DEFAULT NULL,     -- Optional promotion link

    `seo_title` VARCHAR(255) DEFAULT NULL,
    `seo_keywords` VARCHAR(255) DEFAULT NULL,
    `seo_description` VARCHAR(400) DEFAULT NULL,

    `blog_status` INT DEFAULT 1,                   -- 1=Published, 0=Draft
    `added_on` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `deleted` INT DEFAULT 0,                       -- Soft delete

    INDEX (`blog_category`),
    INDEX (`blog_status`),
    INDEX (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `app_courses` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `course_id` VARCHAR(50) NOT NULL,                -- Auto ID: CR-01
    `author_name` VARCHAR(255) NOT NULL,

    `course_title` VARCHAR(255) NOT NULL,
    `course_slug` VARCHAR(255) UNIQUE NOT NULL,      -- For URL
    `course_category` VARCHAR(255) NOT NULL,

    `course_description` LONGTEXT NOT NULL,
    `curriculum` LONGTEXT DEFAULT NULL,              -- Modules / chapters

    `course_image` VARCHAR(255) DEFAULT NULL,        -- Thumbnail image
    `video_intro_link` VARCHAR(255) DEFAULT NULL,    -- YouTube/Vimeo
    `whatsapp_link` VARCHAR(255) DEFAULT NULL,       -- Direct enrollment link

    `course_duration` VARCHAR(100) DEFAULT NULL,     -- e.g., "45 Days"
    `course_level` VARCHAR(100) DEFAULT NULL,        -- Beginner/Expert
    `course_price` DECIMAL(10,2) DEFAULT 0.00,       -- If needed

    `seo_title` VARCHAR(255) DEFAULT NULL,
    `seo_keywords` VARCHAR(255) DEFAULT NULL,
    `seo_description` VARCHAR(400) DEFAULT NULL,

    `course_status` INT DEFAULT 1,                   -- 1=Active, 0=Inactive
    `added_on` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `deleted` INT DEFAULT 0,                         -- Soft delete

    INDEX (`course_category`),
    INDEX (`course_status`),
    INDEX (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

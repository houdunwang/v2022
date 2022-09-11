-- CreateTable
CREATE TABLE `Lesson` (
    `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(191) NOT NULL,
    `price` DECIMAL(8, 2) NOT NULL,
    `description` VARCHAR(191) NOT NULL,
    `preview` VARCHAR(191) NOT NULL,
    `download` VARCHAR(191) NULL,
    `click` MEDIUMINT UNSIGNED NOT NULL,
    `status` BOOLEAN NOT NULL,
    `video_num` MEDIUMINT UNSIGNED NOT NULL,

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

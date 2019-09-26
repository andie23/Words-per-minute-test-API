<?php

use Phinx\Migration\AbstractMigration;

class DatabaseInstallation extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $this->query("
            CREATE TABLE `participants` (
                `id` INTEGER NOT NULL AUTO_INCREMENT,
                `code` VARCHAR(250),
                `fullname` VARCHAR(145) NOT NULL,
                PRIMARY KEY (`id`),
                UNIQUE (`code`)
            );
            
            CREATE TABLE `challenges` (
                `id` INTEGER NOT NULL AUTO_INCREMENT,
                `time_limit` INTEGER NOT NULL,
                `paragraph` TEXT NOT NULL,
                `is_active` BOOLEAN NOT NULL,
                `created_by` INTEGER NOT NULL,
                `created` DATETIME NOT NULL,
                `modified` DATETIME NOT NULL,
                PRIMARY KEY (`id`)
            );
            
            CREATE TABLE `perfomances` (
                `id` INTEGER NOT NULL AUTO_INCREMENT,
                `challenge_id` FLOAT NOT NULL,
                `participant_id` INTEGER NOT NULL,
                `net_wpm` INTEGER NOT NULL,
                `gross_wpm` INTEGER NOT NULL,
                `accuracy` INTEGER NOT NULL,
                `correct_words` INTEGER NOT NULL,
                `incorrect_words` INTEGER NOT NULL,
                `typed_list` TEXT NOT NULL,
                `mistake_list` TEXT NOT NULL,
                `minutes` DECIMAL NOT NULL,
                `is_time_out` BOOLEAN NOT NULL,
                `created` DATETIME NOT NULL,
                `modified` DATETIME NOT NULL,
                PRIMARY KEY (`id`)
            );
            
            CREATE TABLE `users` (
                `id` INTEGER NOT NULL AUTO_INCREMENT,
                `username` VARCHAR(15) NOT NULL,
                `password` TEXT NOT NULL,
                `fullname` VARCHAR(145) NOT NULL,
                `created_by` INTEGER NULL,
                `email` VARCHAR(150) NOT NULL,
                `phone` VARCHAR(15) NOT NULL,
                `last_login` DATETIME NULL,
                `created` DATETIME NOT NULL,
                `modified` DATETIME NOT NULL,
                PRIMARY KEY (`id`),
                UNIQUE (`username`, `email`, `phone`)
            );
            
            ALTER TABLE `challenges` ADD FOREIGN KEY (`created_by`) REFERENCES `users`(`id`);
            ALTER TABLE `perfomances` ADD FOREIGN KEY (`participant_id`) REFERENCES `participants`(`id`);
            ALTER TABLE `perfomances` ADD FOREIGN KEY (`challenge_id`) REFERENCES `challenges`(`id`);
        ");
    }
}

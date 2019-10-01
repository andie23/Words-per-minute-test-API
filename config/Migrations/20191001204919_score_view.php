<?php

use Phinx\Migration\AbstractMigration;

class ScoreView extends AbstractMigration
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
        $this->query(
            'CREATE VIEW scores AS SELECT 
              participants.fullname as "participant",
              avg(score) as "points", avg(net_wpm) as "wpm", 
              avg(accuracy) as "accuracy", 
              avg(seconds) as "time"
               FROM perfomances 
                INNER JOIN participants ON participants.id = perfomances.participant_id 
                GROUP BY participant_id 
                ORDER BY score DESC
                '
        );
    }
}

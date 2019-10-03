<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Participant cell
 */
class ParticipantCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
    }

    public function name($id){
        $this->loadModel('Participants');
        $this->set('name', $this->Participants->get($id)->fullname);
    }
}

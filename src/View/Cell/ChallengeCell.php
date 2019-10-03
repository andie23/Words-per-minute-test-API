<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Challenge cell
 */
class ChallengeCell extends Cell
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
        $this->loadModel('Challenges');
        $this->set('name', $this->Challenges->get($id)->title);
    }
}

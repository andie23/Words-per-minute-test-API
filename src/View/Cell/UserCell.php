<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * User cell
 */
class UserCell extends Cell
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
        $this->loadModel('Users');
        $this->set('name', $this->Users->get($id)->fullname);
    }
}

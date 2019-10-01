<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Scores Controller
 *
 * @property \App\Model\Table\ScoresTable $Scores
 */
class ScoresController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('scores', $this->paginate($this->Scores));
        $this->set('_serialize', ['scores']);
    }
}

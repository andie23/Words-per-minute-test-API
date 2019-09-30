<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Lib\RealTimeDatabaseClient;
use App\Lib\CloudMessagingClient;
use App\Lib\SearchIndexClient;
/**
 * Dashboard Controller
 *
 * @property \App\Model\Table\DashboardTable $Dashboard
 */
class DashboardController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
       $this->loadModel('Challenges');

       $this->set('active_passage', $this->Challenges->getActiveChallenge());
    }
}

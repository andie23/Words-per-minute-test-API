<div class="features-boxed">
        <div class="container">
            <div class="intro text-center">
                <h2>Active Passage</h2>
                <p>Welcome to Mdima Panel. This is where you can manage loadshedding schedules for android clients</p>
                <a href="<?= $this->url->build([])?>" class="badge badge-outline-primary">View perfomances</a>
                <a href="<?= $this->url->build([])?>" class="badge badge-outline-primary">Next Random</a>
            </div>
            <div class="row justify-content-center features">
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-map-marker icon"></i>
                        <h3 class="name">Leadership Board</h3>
                        <p class="description">View whose leading the competition</p>
                        <a href="<?= $this->url->build([])?>" class="badge badge-outline-primary">View </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-clock-o icon"></i>
                        <h3 class="name">Challenges</h3>
                        <p class="description">View all challenges</p>
                        <a href="<?= $this->url->build([])?>" class="badge badge-outline-primary">View all</a>
                        <a href="<?= $this->url->build([])?>" class="badge badge-outline-primary">Add new</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-list-alt icon"></i>
                        <h3 class="name">Participants</h3>
                        <p class="description">View registered participants</p>
                        <a href="<?= $this->url->build([])?>" class="badge badge-outline-primary">Add New</a>
                        <a href="<?= $this->url->build([])?>" class="badge badge-outline-primary">View All</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-user-circle icon"></i>
                        <h3 class="name">User Accounts </h3>
                        <p class="description">Manage user authentication for web-app</p>
                        <a href="<?= $this->url->build(['controller'=>'Users', 'action'=>'index'])?>" class="badge badge-outline-primary">Manage Users</a>    
                        <a href="<?= $this->url->build(['controller'=>'Users', 'action'=>'view'])?>" class="badge badge-outline-primary">My Account</a>    
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-sign-out icon"></i>
                        <h3 class="name">Signout</h3>
                        <p class="description">Leave current session.</p>
                        <a href="<?= $this->url->build(['controller'=>'Users', 'action'=>'logout'])?>" class="badge badge-outline-primary">Logout</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
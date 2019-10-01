<nav class="navbar  navbar-expand-lg sticky-top navbar-light" style="background-color: rgb(242,242,242);">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?= $this->url->build(['controller'=>'Dashboard', 'action'=>'index'])?>"> <?= $this->Html->image('logo.png')?></a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Scores', 'action' => 'index'])?>">Leadership Board</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->Url->build(['controller'=>'challenges', 'action'=>'index'])?>">Challenges</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->Url->build(['controller'=>'participants', 'action'=>'index'])?>">Participants</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->Url->build(['controller'=>'perfomances', 'action'=>'index'])?>">Perfomances</a>
            </li>
            </ul>
            <b><?= $this->fetch('title') ?></b>
        </div>
    </nav>
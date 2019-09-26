<div class="row">
<div class="col-md-2">
<div class="list-group">
       <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $perfomance->id],
                ['class' => 'list-group-item list-group-item-action', 'confirm' => __('Are you sure you want to delete # {0}?', $perfomance->id)],
                []
            )
        ?>
        <?= $this->Html->link(__('List Perfomances'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?></li>
        <?= $this->Html->link(__('List Challenges'), ['controller' => 'Challenges', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>

        <?= $this->Html->link(__('New Challenge'), ['controller' => 'Challenges', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>

        <?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>

        <?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>

</div>
</div>
<div class="col-md-10">   
    <?= $this->Form->create($perfomance) ?>
    <div class="card">
    <h5 class="card-header"> <?= __('Edit Perfomance') ?></h5>
    <div class="card-body">
        <?php
            echo "<div class='form-group'>";
            echo $this->Form->input('challenge_id', ['placeholder' => 'challenge_id', 'class'=> 'custom-select custom-select-lg mb-3"', 'options' => $challenges]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('participant_id', ['placeholder' => 'participant_id', 'class'=> 'custom-select custom-select-lg mb-3"', 'options' => $participants]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('net_wpm', ['class'=> 'form-control', 'placeholder' => 'net_wpm',]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('gross_wpm', ['class'=> 'form-control', 'placeholder' => 'gross_wpm',]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('accuracy', ['class'=> 'form-control', 'placeholder' => 'accuracy',]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('correct_words', ['class'=> 'form-control', 'placeholder' => 'correct_words',]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('incorrect_words', ['class'=> 'form-control', 'placeholder' => 'incorrect_words',]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('typed_list', ['class'=> 'form-control', 'placeholder' => 'typed_list',]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('mistake_list', ['class'=> 'form-control', 'placeholder' => 'mistake_list',]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('minutes', ['class'=> 'form-control', 'placeholder' => 'minutes',]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('is_time_out', ['class'=> 'form-control', 'placeholder' => 'is_time_out',]);
            echo "</div>";
        ?>
    <p/>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-outline-danger']) ?>
    <?= $this->Form->end() ?> 
    </div>
</div>
</div>
</div>

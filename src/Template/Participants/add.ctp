<div class="row">
<div class="col-md-2">
<div class="list-group">
        <?= $this->Html->link(__('List Participants'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?></li>
</div>
</div>
<div class="col-md-10">   
    <?= $this->Form->create($participant) ?>
    <div class="card">
    <h5 class="card-header"> <?= __('Add Participant') ?></h5>
    <div class="card-body">
        <?php
            echo "<div class='form-group'>";
            echo $this->Form->input('code', ['class'=> 'form-control', 'placeholder' => 'Reference Code',]);
            echo "</div>";
            echo "<div class='form-group'>";
            echo $this->Form->input('fullname', ['class'=> 'form-control', 'placeholder' => 'Fullname',]);
            echo "</div>";
        ?>
    <p/>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-outline-primary']) ?>
    <?= $this->Form->end() ?> 
    </div>
</div>
</div>
</div>

<h4><?= __('Leadership Board') ?></h4>
    <table class="table text-center">
        <tr>
            <th>Rank</th>
            <th><?= __('Points') ?></th>
            <th><?= __('Participant') ?></th>
            <th><?= __('Words Per Minute') ?></th>
            <th><?= __('Accuracy') ?></th>
            <th><?= __('Time') ?></th>
        </tr>
        <?php foreach ($scores as $index => $score): ?>
        <tr>
            <td> <?= $index +1 ?></td>
            <td><?= h((int) $score->points) ?></td>
            <td><?= h($score->participant) ?></td>
            <td><?= h((int) $score->wpm) ?></td>
            <td><?= h((int) $score->accuracy) ?></td>
            <td><?= h($score->time) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>    
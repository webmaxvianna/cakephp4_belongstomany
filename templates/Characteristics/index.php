<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Characteristic[]|\Cake\Collection\CollectionInterface $characteristics
 */
?>
<div class="characteristics index content">
    <?= $this->Html->link(__('New Characteristic'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Characteristics') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('characteristic') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($characteristics as $characteristic): ?>
                <tr>
                    <td><?= $this->Number->format($characteristic->id) ?></td>
                    <td><?= h($characteristic->characteristic) ?></td>
                    <td><?= h($characteristic->created) ?></td>
                    <td><?= h($characteristic->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $characteristic->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $characteristic->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $characteristic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $characteristic->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

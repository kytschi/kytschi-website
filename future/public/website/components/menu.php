<?php
foreach ($menu->items as $item) {
    ?>
    <li class="nav-item">
        <a
            href="<?= $item->url; ?>"
            class="nav-link <?= $item->active ? ' active' : '';?>"
            <?= !empty($item->new_window) ? 'target="_blank"' : ''; ?>
            title="Click to view the talk topic, <?= $item->title; ?>"
        >
            <?= $item->title; ?>
        </a>
    </li>
    <?php
}
?>
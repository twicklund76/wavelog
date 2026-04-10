<div class="container">
    <h2><?= __("Visual Designer"); ?></h2>

    <div class="card">
        <div class="card-body">
            <p><strong><?= __("Label"); ?>:</strong> <?php echo htmlspecialchars($label->label_name); ?></p>
            <p><strong><?= __("Label ID"); ?>:</strong> <?php echo (int)$label->id; ?></p>
            <p><strong><?= __("Use Visual Designer"); ?>:</strong> <?php echo ((int)$label->use_visual_designer === 1) ? 'Yes' : 'No'; ?></p>

            <hr>

            <p><?= __("This is the placeholder page for the visual label designer."); ?></p>

            <h5><?= __("Current Layout JSON"); ?></h5>
            <textarea class="form-control" rows="12" readonly><?php
                echo isset($label->visual_layout_json) ? $label->visual_layout_json : '';
            ?></textarea>

            <div class="mt-3">
                <a href="<?php echo site_url('labels/edit/' . $label->id); ?>" class="btn btn-secondary">
                    <?= __("Back to Label"); ?>
                </a>
            </div>
        </div>
    </div>
</div>

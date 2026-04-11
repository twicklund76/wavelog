<div id="qsl_card_labels_container" class="container">

<br>
	<?php if($this->session->flashdata('message')) { ?>
		<!-- Display Message -->
		<div class="alert-message error">
		  <p><?php echo $this->session->flashdata('message'); ?></p>
		</div>
	<?php } ?>

<?php echo validation_errors(); ?>

<form method="post" action="<?php echo site_url('labels/updateLabel/' . $label->id); ?>" id="labelEditForm" name="create_label_type">

	<div class="card">
		<h2 class="card-header"><?php echo $page_title; ?></h2>

		<div class="card-body">

			<!-- Label Name Input -->
	    	<div class="mb-3">
			    <label for="LabelName"><?= __("Label Name"); ?></label>
			    <input name="label_name" type="text" class="form-control" required id="LabelName" aria-describedby="label_nameHelp" placeholder="Code 925041 6x3 Generic Label Sheet" value="<?php if(isset($label->label_name)) { echo $label->label_name; } ?>">
			    <small id="label_nameHelp" class="form-text text-muted"><?= __("Label name used for display purposes so pick something meaningful perhaps the label style."); ?></small>
			</div>

			<div class="mb-3 row">
    			<label class="col-sm-2 col-form-label" for="paperType_id"><?= __("Paper Type"); ?></label>
			    <div class="col-sm-4">
				    <select name="paper_type_id" class="form-select" id="paperType_id">
						<?php
							foreach($papertypes as $paper){
								echo '<option value="' . ($paper->paper_id ?? '') . '"';
								if (($label->paper_type_id ?? '') == ($paper->paper_id ?? '')) echo ' selected';
								echo '>' . ucwords(strtolower(($paper->paper_name ?? ''))) . '</option>';
							}
						?>
					</select>
			    </div>

    			<label class="col-sm-2 col-form-label" for="measurementType"><?= __("Measurement used"); ?></label>
			    <div class="col-sm-4">
				    <select name="measurementType" class="form-select" id="measurementType">
						<option value="mm" <?php if($label->metric == "mm") { echo "selected=\"selected\""; } ?>><?= __("Millimeters"); ?></option>
						<option value="in" <?php if($label->metric == "in") { echo "selected=\"selected\""; } ?>><?= __("Inches"); ?></option>
					</select>
			    </div>
  			</div>

			<div class="mb-3 row">
    			<label class="col-sm-2 col-form-label" for="marginTop"><?= __("Margin Top"); ?></label>
			    <div class="col-sm-4">
				    <input name="marginTop" type="text" class="form-control" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" required id="marginTop" aria-describedby="marginTopHelp" value="<?php if(isset($label->margintop)) { echo $label->margintop; } ?>">
			    	<small id="marginTopHelp" class="form-text text-muted"><?= __("Top margin of labels"); ?></small>
			    </div>

    			<label class="col-sm-2 col-form-label" for="marginLeft"><?= __("Margin Left"); ?></label>
			    <div class="col-sm-4">
				    <input name="marginLeft" type="text" class="form-control" id="marginLeft" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" required aria-describedby="marginLeftHelp" value="<?php if(isset($label->marginleft)) { echo $label->marginleft; } ?>">
			    	<small id="marginLeftHelp" class="form-text text-muted"><?= __("Left margin of labels."); ?></small>
			    </div>
  			</div>
			<div class="mb-3 row">
			    <label class="col-sm-2 col-form-label" for="use_visual_designer"><?= __("Use Visual Designer"); ?></label>
			    <div class="col-sm-10">
			        <div class="form-check">
			            <input
			                class="form-check-input"
			                type="checkbox"
			                id="use_visual_designer"
			                name="use_visual_designer"
			                value="1"
			                <?php if(isset($label->use_visual_designer) && (int)$label->use_visual_designer === 1) { echo 'checked'; } ?>
			            >
			            <label class="form-check-label" for="use_visual_designer">
			                <?= __("Use a visual layout instead of the standard label renderer"); ?>
			            </label>
			        </div>
			    </div>
			</div>
			<div class="mb-3 row">
			    <div class="col-sm-2"></div>
			    <div class="col-sm-10">
			        <button
			            type="button"
			            id="open_visual_designer"
			            class="btn btn-secondary"
			            data-label-id="<?php echo $label->id; ?>"
			            <?php if (!isset($label->use_visual_designer) || (int)$label->use_visual_designer !== 1) echo 'disabled'; ?>
			        >
			            <?= __("Open Visual Designer"); ?>
			        </button>
			        <small class="form-text text-muted d-block mt-2">
				    <?= __("Checking the box enables the designer button. Opening the designer activates visual designer mode for this label."); ?>
			        </small>
			    </div>
			</div>
  			<div class="mb-3 row">
    			<label class="col-sm-2 col-form-label" for="NX"><?= __("Labels horizontally"); ?></label>
			    <div class="col-sm-4">
				    <input name="NX" type="number" min="1" max="40" step="1" class="form-control" required id="NX" aria-describedby="NXHelp" value="<?php if(isset($label->nx)) { echo $label->nx; } ?>">
			    	<small id="NXHelp" class="form-text text-muted"><?= __("Number of labels horizontally across the page."); ?></small>
			    </div>

    			<label class="col-sm-2 col-form-label" for="NY"><?= __("Labels vertically"); ?></label>
			    <div class="col-sm-4">
				    <input name="NY" type="number" min="1" max="40" step="1" class="form-control" id="NY" required aria-describedby="NYHelp" value="<?php if(isset($label->ny)) { echo $label->ny; } ?>">
			    	<small id="NYHelp" class="form-text text-muted"><?= __("Number of labels vertically across the page."); ?></small>
			    </div>
  			</div>

  			<div class="mb-3 row">
    			<label class="col-sm-2 col-form-label" for="SpaceX"><?= __("Horizontal space"); ?></label>
			    <div class="col-sm-4">
				    <input name="SpaceX" type="text" class="form-control" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" required id="SpaceX" value="<?php if(isset($label->spacex)) { echo $label->spacex; } ?>">
					<small id="NYHelp" class="form-text text-muted"><?= __("Horizontal space between 2 labels."); ?></small>
			    </div>

    			<label class="col-sm-2 col-form-label" for="SpaceY"><?= __("Vertical space"); ?></label>
			    <div class="col-sm-4">
				    <input name="SpaceY" type="text" class="form-control" id="SpaceY" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" required value="<?php if(isset($label->spacey)) { echo $label->spacey; } ?>">
					<small id="NYHelp" class="form-text text-muted"><?= __("Vertical space between 2 labels."); ?></small>
			    </div>
  			</div>

			<div class="mb-3 row">
    			<label class="col-sm-2 col-form-label" for="width"><?= __("Width of label"); ?></label>
			    <div class="col-sm-4">
				    <input name="width" type="text" class="form-control" id="width" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" required aria-describedby="widthHelp" value="<?php if(isset($label->width)) { echo $label->width; } ?>">
			    	<small id="widthHelp" class="form-text text-muted"><?= __("Total width of one label."); ?></small>
			    </div>

    			<label class="col-sm-2 col-form-label" for="height"><?= __("Height of label"); ?></label>
			    <div class="col-sm-4">
				    <input name="height" type="text" class="form-control" id="height" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" required aria-describedby="heightHelp" value="<?php if(isset($label->height)) { echo $label->height; } ?>">
			    	<small id="heightHelp" class="form-text text-muted"><?= __("Total height of one label"); ?></small>
			    </div>
  			</div>

  			<div class="mb-3 row">
    			<label class="col-sm-2 col-form-label" for="font_size"><?= __("Font Size"); ?></label>
			    <div class="col-sm-4">
				    <input name="font_size" type="number" min="1" max="40" step="1" class="form-control" id="font_size" required aria-describedby="font_sizeHelp" value="<?php if(isset($label->font_size)) { echo $label->font_size; } ?>">
			    	<small id="font_sizeHelp" class="form-text text-muted"><?= __("Font size used on the label don't go too big."); ?></small>
			    </div>

    			<label class="col-sm-2 col-form-label" for="font_size"><?= __("QSOs on label"); ?></label>
			    <div class="col-sm-4">
				    <input name="label_qsos" type="number" min="1" max="40" step="1" class="form-control" id="label_qsos" required aria-describedby="font_sizeHelp" value="<?php if(isset($label->qsos)) { echo $label->qsos; } ?>">
			    </div>
  			</div>
  			<button type="submit" class="btn btn-primary"><i class="fas fa-plus-square"></i> <?= __("Save Label Type"); ?></button>
		</div>
	</div>

</form>
<form method="post" action="<?php echo site_url('labels/visual_designer/'.$label->id); ?>" id="visualDesignerLaunchForm" style="display:none;">
    <input type="hidden" name="label_name" id="vd_label_name">
    <input type="hidden" name="paper_type_id" id="vd_paper_type_id">
    <input type="hidden" name="measurementType" id="vd_measurementType">
    <input type="hidden" name="marginTop" id="vd_marginTop">
    <input type="hidden" name="marginLeft" id="vd_marginLeft">
    <input type="hidden" name="NX" id="vd_NX">
    <input type="hidden" name="NY" id="vd_NY">
    <input type="hidden" name="SpaceX" id="vd_SpaceX">
    <input type="hidden" name="SpaceY" id="vd_SpaceY">
    <input type="hidden" name="width" id="vd_width">
    <input type="hidden" name="height" id="vd_height">
    <input type="hidden" name="font_size" id="vd_font_size">
    <input type="hidden" name="font" id="vd_font">
    <input type="hidden" name="label_qsos" id="vd_label_qsos">
    <input type="hidden" name="use_visual_designer" id="vd_use_visual_designer">
</form>
</div>
<br>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("labelEditForm");
    if (!form) return;

    const labelId = "<?php echo $label->id; ?>";
    const storageKey = "wavelog_label_edit_draft_" + labelId;

    const trackedIds = [
        "label_name",
        "paper_type_id",
        "measurementType",
        "marginTop",
        "marginLeft",
        "NX",
        "NY",
        "SpaceX",
        "SpaceY",
        "width",
        "height",
        "font_size",
        "font",
        "label_qsos",
        "use_visual_designer"
    ];

    function saveDraft() {
        const draft = {};

        trackedIds.forEach(id => {
            const el = document.getElementById(id);
            if (!el) return;

            if (el.type === "checkbox") {
                draft[id] = el.checked ? "1" : "0";
            } else {
                draft[id] = el.value;
            }
        });

        sessionStorage.setItem(storageKey, JSON.stringify(draft));
    }

    function restoreDraft() {
        const raw = sessionStorage.getItem(storageKey);
        if (!raw) return;

        try {
            const draft = JSON.parse(raw);

            trackedIds.forEach(id => {
                const el = document.getElementById(id);
                if (!el || typeof draft[id] === "undefined") return;

                if (el.type === "checkbox") {
                    el.checked = draft[id] === "1";
                } else {
                    el.value = draft[id];
                }
            });

            const checkbox = document.getElementById("use_visual_designer");
            const button = document.getElementById("open_visual_designer");
            if (checkbox && button) {
                button.disabled = !checkbox.checked;
            }
        } catch (e) {
            console.warn("Could not restore label draft", e);
        }
    }

    restoreDraft();

    trackedIds.forEach(id => {
        const el = document.getElementById(id);
        if (!el) return;

        const eventName = (el.type === "checkbox" || el.tagName === "SELECT") ? "change" : "input";
        el.addEventListener(eventName, saveDraft);
    });

    const realSaveButton = form.querySelector('button[type="submit"], input[type="submit"]');
    if (realSaveButton) {
        realSaveButton.addEventListener("click", function () {
            sessionStorage.removeItem(storageKey);
        });
    }

    const checkbox = document.getElementById("use_visual_designer");
    const button = document.getElementById("open_visual_designer");

    if (checkbox && button) {
        checkbox.addEventListener("change", function() {
            button.disabled = !this.checked;
            saveDraft();
        });

        button.disabled = !checkbox.checked;

        button.addEventListener("click", function() {
            saveDraft();

            const copy = (fromId, toId) => {
                const from = document.getElementById(fromId);
                const to = document.getElementById(toId);
                if (from && to) {
                    if (from.type === "checkbox") {
                        to.value = from.checked ? "1" : "0";
                    } else {
                        to.value = from.value;
                    }
                }
            };

            copy("label_name", "vd_label_name");
            copy("paper_type_id", "vd_paper_type_id");
            copy("measurementType", "vd_measurementType");
            copy("marginTop", "vd_marginTop");
            copy("marginLeft", "vd_marginLeft");
            copy("NX", "vd_NX");
            copy("NY", "vd_NY");
            copy("SpaceX", "vd_SpaceX");
            copy("SpaceY", "vd_SpaceY");
            copy("width", "vd_width");
            copy("height", "vd_height");
            copy("font_size", "vd_font_size");
            copy("font", "vd_font");
            copy("label_qsos", "vd_label_qsos");
            copy("use_visual_designer", "vd_use_visual_designer");

            document.getElementById("visualDesignerLaunchForm").submit();
        });
    }
});
</script>


<div class="container mt-3">
    <h3><?= __("Visual Label Designer"); ?></h3>

    <?php if ($this->session->flashdata('message')) { ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('message'); ?>
        </div>
    <?php } ?>

    <?php if ($this->session->flashdata('error')) { ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>

    <form method="post" action="<?php echo site_url('labels/save_visual_designer/' . $label->id); ?>" id="designerSaveForm">
        <input type="hidden" name="visual_layout_json" id="visual_layout_json">

        <div class="mb-3 d-flex gap-2">
		<a href="<?php echo site_url('labels/edit/' . $label->id); ?>" class="btn btn-secondary">
		    <?= __("Back to Label"); ?>
		</a>
            <button type="submit" class="btn btn-success">
                <?= __("Save Layout"); ?>
            </button>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header designer-toggle" data-target="section-background-guide" style="cursor:pointer;">
                        <strong><?= __("Background Guide"); ?></strong>
                    </div>
                    <div id="section-background-guide" class="card-body designer-section-body" style="display:none;">
                        <input type="file" id="bgUpload" class="form-control mb-2" accept="image/*">

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="bgToggle" checked>
                            <label class="form-check-label" for="bgToggle"><?= __("Show Background"); ?></label>
                        </div>

                        <label class="form-label"><?= __("Opacity"); ?></label>
                        <input type="range" id="bgOpacity" class="form-range" min="0" max="100" value="35">

                        <button type="button" id="bgClear" class="btn btn-outline-danger btn-sm mt-2">
                            <?= __("Clear Background"); ?>
                        </button>

                        <small class="form-text text-muted d-block mt-2">
                            <?= __("Background image is temporary and only used to help place elements."); ?>
                        </small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header designer-toggle" data-target="section-fields" style="cursor:pointer;">
                        <strong><?= __("Fields"); ?></strong>
                    </div>
                    <div id="section-fields" class="card-body designer-section-body">
                        <div class="card mb-2">
                            <div class="card-header designer-toggle" data-target="fields-basic-qso" style="cursor:pointer;">
                                <strong><?= __("Basic QSO"); ?></strong>
                            </div>
                            <div id="fields-basic-qso" class="card-body designer-section-body">
                                <div class="field" data-field="qso.call">qso.call</div>
                                <div class="field" data-field="qso.station_callsign">qso.station_callsign</div>
                                <div class="field" data-field="qso.band">qso.band</div>
                                <div class="field" data-field="qso.mode">qso.mode</div>
                                <div class="field" data-field="qso.submode">qso.submode</div>
                                <div class="field" data-field="qso.freq">qso.freq</div>
                                <div class="field" data-field="qso.operator">qso.operator</div>
                                <div class="field" data-field="qso.comment">qso.comment</div>
                            </div>
                        </div>

                        <div class="card mb-2">
                            <div class="card-header designer-toggle" data-target="fields-date-time" style="cursor:pointer;">
                                <strong><?= __("Date / Time"); ?></strong>
                            </div>
                            <div id="fields-date-time" class="card-body designer-section-body" style="display:none;">
                                <div class="field" data-field="qso.qso_date">qso.qso_date</div>
                                <div class="field" data-field="qso.time_on">qso.time_on</div>
                                <div class="field" data-field="qso.datetime">qso.datetime</div>
                                <div class="field" data-field="qso.date_day">qso.date_day</div>
                                <div class="field" data-field="qso.date_month">qso.date_month</div>
                                <div class="field" data-field="qso.date_year">qso.date_year</div>
                                <div class="field" data-field="qso.time_hour">qso.time_hour</div>
                                <div class="field" data-field="qso.time_minute">qso.time_minute</div>
                            </div>
                        </div>

                        <div class="card mb-2">
                            <div class="card-header designer-toggle" data-target="fields-signal" style="cursor:pointer;">
                                <strong><?= __("Signal Reports"); ?></strong>
                            </div>
                            <div id="fields-signal" class="card-body designer-section-body" style="display:none;">
                                <div class="field" data-field="qso.rst_sent">qso.rst_sent</div>
                                <div class="field" data-field="qso.rst_rcvd">qso.rst_rcvd</div>
                                <div class="field" data-field="qso.srx">qso.srx</div>
                                <div class="field" data-field="qso.stx">qso.stx</div>
                                <div class="field" data-field="qso.srx_string">qso.srx_string</div>
                                <div class="field" data-field="qso.stx_string">qso.stx_string</div>
                            </div>
                        </div>

                        <div class="card mb-2">
                            <div class="card-header designer-toggle" data-target="fields-location" style="cursor:pointer;">
                                <strong><?= __("Location / Address"); ?></strong>
                            </div>
                            <div id="fields-location" class="card-body designer-section-body" style="display:none;">
                                <div class="field" data-field="address.name">address.name</div>
                                <div class="field" data-field="address.line1">address.line1</div>
                                <div class="field" data-field="address.line2">address.line2</div>
                                <div class="field" data-field="address.line3">address.line3</div>
                                <div class="field" data-field="address.city">address.city</div>
                                <div class="field" data-field="address.state">address.state</div>
                                <div class="field" data-field="address.postcode">address.postcode</div>
                                <div class="field" data-field="address.country">address.country</div>
                                <div class="field" data-field="qso.gridsquare">qso.gridsquare</div>
                                <div class="field" data-field="qso.my_gridsquare">qso.my_gridsquare</div>
                                <div class="field" data-field="qso.dxcc">qso.dxcc</div>
                            </div>
                        </div>

                        <div class="card mb-2">
                            <div class="card-header designer-toggle" data-target="fields-qsl" style="cursor:pointer;">
                                <strong><?= __("QSL / Card"); ?></strong>
                            </div>
                            <div id="fields-qsl" class="card-body designer-section-body" style="display:none;">
                                <div class="field" data-field="qso.qsl_via">qso.qsl_via</div>
                                <div class="field" data-field="qso.name">qso.name</div>
                                <div class="field" data-field="qso.iota">qso.iota</div>
                                <div class="field" data-field="qso.pota_ref">qso.pota_ref</div>
                                <div class="field" data-field="qso.sota_ref">qso.sota_ref</div>
                                <div class="field" data-field="qso.my_pota_ref">qso.my_pota_ref</div>
                                <div class="field" data-field="qso.my_sota_ref">qso.my_sota_ref</div>
                            </div>
                        </div>

                        <div class="card mb-2">
                            <div class="card-header designer-toggle" data-target="fields-extra" style="cursor:pointer;">
                                <strong><?= __("Extra"); ?></strong>
                            </div>
                            <div id="fields-extra" class="card-body designer-section-body" style="display:none;">
                                <button type="button" id="btnAddText" class="btn btn-outline-secondary w-100 mt-1">
                                    <?= __("Add Custom Text"); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header designer-toggle" data-target="section-selected-element" style="cursor:pointer;">
                        <strong><?= __("Selected Element"); ?></strong>
                    </div>
                    <div id="section-selected-element" class="card-body designer-section-body" style="display:none;">
                        <div id="noSelection" class="small text-muted">
                            <?= __("Click a placed field to edit its properties."); ?>
                        </div>

                        <div id="selectionPanel" style="display:none;">
                            <label class="form-label"><?= __("Font"); ?></label>
                            <select id="propFont" class="form-control mb-2">
                                <option value="Helvetica">Helvetica</option>
                                <option value="Times">Times</option>
                                <option value="Courier">Courier</option>
                            </select>

                            <label class="form-label"><?= __("Font Size"); ?></label>
                            <input id="propFontSize" type="number" step="1" min="6" max="48" class="form-control mb-2" value="12">

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="propBold">
                                <label class="form-check-label" for="propBold"><?= __("Bold"); ?></label>
                            </div>

			    <div class="form-check mb-2">
				 <input class="form-check-input" type="checkbox" id="propMultiQso">
 			    	 <label class="form-check-label" for="propMultiQso"><?= __("Display Multiple QSOs"); ?></label>
		    	    </div>
                            <button type="button" id="btnApplyProps" class="btn btn-primary w-100">
                                <?= __("Apply"); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card p-3 mb-3">
                    <div class="d-flex flex-wrap gap-4">
                        <div><strong><?= __("Label"); ?>:</strong> <?php echo htmlentities($label->label_name); ?></div>
                        <div><strong><?= __("Width"); ?>:</strong> <?php echo htmlentities($label->width); ?></div>
                        <div><strong><?= __("Height"); ?>:</strong> <?php echo htmlentities($label->height); ?></div>
                        <div><strong><?= __("Units"); ?>:</strong> <?php echo  htmlentities($label->metric); ?></div>
                    </div>
                </div>

                <div class="card p-3">
                    <div id="stageWrap" style="display:flex; justify-content:center;">
                        <div id="rulerWrap" style="position:relative; width:940px; height:640px;">

                            <div id="rulerTop"
                                 style="position:absolute; left:40px; top:0; width:900px; height:40px; background:#f6f6f6; border:1px solid #ddd;">
                            </div>

                            <div id="rulerLeft"
                                 style="position:absolute; left:0; top:40px; width:40px; height:600px; background:#f6f6f6; border:1px solid #ddd;">
                            </div>

                            <div id="stage"
                                 style="position:absolute; left:40px; top:40px; width:900px; height:600px; border:1px solid #ccc; overflow:hidden; background:white;">

                                <div id="stageBg"
                                     style="position:absolute; left:0; top:0; width:100%; height:100%; background-repeat:no-repeat; background-position:center center; background-size:contain; opacity:.35; pointer-events:none; z-index:0; display:block;">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="small text-muted mt-2">
                        <?= __("Drag fields onto the label. Double-click a placed item to remove it."); ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .field {
        cursor: grab;
        user-select: none;
        padding: 6px 8px;
        border: 1px solid #cfcfcf;
        margin-bottom: 6px;
        border-radius: 6px;
        background: #ffffff;
        color: #111111;
        font-weight: 600;
        font-size: 0.95rem;
    }

    .field:hover {
        background: #f3f7ff;
        border-color: #8fb4ff;
    }

    .placed {
        position: absolute;
        padding: 4px 6px;
        border: 2px solid #1f6feb;
        border-radius: 6px;
        background: #ffffff;
        color: #111111;
        font-weight: 600;
        box-shadow: 0 2px 8px rgba(0,0,0,.15);
        cursor: move;
        white-space: nowrap;
        z-index: 2;
    }

    .placed.selected {
        border-color: #ff7a00;
        box-shadow: 0 0 0 3px rgba(255,122,0,.25);
    }

    #stage {
        background:
            linear-gradient(to right, rgba(0,0,0,.06) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(0,0,0,.06) 1px, transparent 1px);
        background-size: 37.5px 37.5px;
        background-color: #ffffff;
    }

    .designer-toggle {
        user-select: none;
        padding: 0.6rem 0.9rem;
    }

    .designer-toggle:hover {
        background: #f5f5f5;
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const stage = document.getElementById('stage');

    const labelWidthRaw = <?php echo json_encode((float)$label->width); ?>;
    const labelHeightRaw = <?php echo json_encode((float)$label->height); ?>;
    const isMetric = <?php echo ($label->metric === "mm") ? 'true' : 'false'; ?>;
    const W_IN = isMetric ? (labelWidthRaw / 25.4) : labelWidthRaw;
    const H_IN = isMetric ? (labelHeightRaw / 25.4) : labelHeightRaw;

    const MAX_STAGE_W = 900;
    const MAX_STAGE_H = 600;

    // convert everything to inches for scaling
    const realWidthIn = W_IN;
    const realHeightIn = H_IN;

    // scale factor to fit inside box without distortion
    const scale = Math.min(
        MAX_STAGE_W / realWidthIn,
        MAX_STAGE_H / realHeightIn
    );

    // final stage size
    const STAGE_W_PX = realWidthIn * scale;
    const STAGE_H_PX = realHeightIn * scale;
    function pxToInX(px){ return (px / STAGE_W_PX) * W_IN; }
    function pxToInY(py){ return (py / STAGE_H_PX) * H_IN; }
    function inToPxX(ix){ return (ix / W_IN) * STAGE_W_PX; }
    function inToPxY(iy){ return (iy / H_IN) * STAGE_H_PX; }

    stage.style.width = STAGE_W_PX + 'px';
    stage.style.height = STAGE_H_PX + 'px';

    document.getElementById('rulerWrap').style.width = (STAGE_W_PX + 40) + 'px';
    document.getElementById('rulerWrap').style.height = (STAGE_H_PX + 40) + 'px';

    document.getElementById('rulerTop').style.width = STAGE_W_PX + 'px';
    document.getElementById('rulerLeft').style.height = STAGE_H_PX + 'px';
    let selectedElementId = null;
    let elements = [];

    const existingLayout = <?php
        if (!empty($label->visual_layout_json)) {
            echo $label->visual_layout_json;
        } else {
            echo json_encode([
                'version' => 1,
                'canvas' => [
                    'width_in' => 0,
                    'height_in' => 0
                ],
                'elements' => []
            ]);
        }
    ?>;

    function makeElem(type, value, x = 50, y = 50, existing = null) {
        const el = document.createElement('div');
        const id = existing?.id || ('el_' + Math.random().toString(16).slice(2));

        el.className = 'placed';
        el.dataset.id = id;
        el.dataset.type = type;

        if (type === 'field') {
            el.dataset.field = value;
            el.textContent = value;
        } else {
            el.dataset.text = value;
            el.textContent = value || 'Custom Text';
        }

        el.style.left = x + 'px';
        el.style.top = y + 'px';
        el.style.fontSize = (existing?.font_pt || 12) + 'px';
        el.style.fontFamily = (existing?.font || 'Helvetica');
        el.style.fontWeight = (existing?.bold ? '700' : '600');

        stage.appendChild(el);

        const item = {
            id,
            type,
            x_in: existing?.x_in ?? pxToInX(x),
            y_in: existing?.y_in ?? pxToInY(y),
            font: existing?.font || 'Helvetica',
            font_pt: existing?.font_pt || 12,
            bold: existing?.bold || false,
            multi_qso: existing?.multi_qso || false
        };

        if (type === 'field') {
            item.field = value;
        } else {
            item.text = value;
        }

        elements.push(item);

        let dragging = false, ox = 0, oy = 0;

        el.addEventListener('mousedown', (e) => {
            dragging = true;
            ox = e.offsetX;
            oy = e.offsetY;
            selectPlacedElement(id);
        });

        window.addEventListener('mousemove', (e) => {
            if (!dragging) return;

            const rect = stage.getBoundingClientRect();
            let nx = e.clientX - rect.left - ox;
            let ny = e.clientY - rect.top - oy;

            nx = Math.max(0, Math.min(STAGE_W_PX - 10, nx));
            ny = Math.max(0, Math.min(STAGE_H_PX - 10, ny));

            el.style.left = nx + 'px';
            el.style.top = ny + 'px';

            const found = elements.find(z => z.id === id);
            if (found) {
                found.x_in = pxToInX(nx);
                found.y_in = pxToInY(ny);
            }
        });

        window.addEventListener('mouseup', () => {
            dragging = false;
        });

        el.addEventListener('click', (e) => {
            e.stopPropagation();
            selectPlacedElement(id);
        });

        el.addEventListener('dblclick', () => {
            if (stage.contains(el)) {
                stage.removeChild(el);
            }
            elements = elements.filter(z => z.id !== id);

            if (selectedElementId === id) {
                selectedElementId = null;
                refreshSelectionPanel();
            }
        });

        return item;
    }

    function selectPlacedElement(id) {
        selectedElementId = id;

        document.querySelectorAll('.placed').forEach(el => {
            el.classList.toggle('selected', el.dataset.id === id);
        });

        const selectedSection = document.getElementById('section-selected-element');
        if (selectedSection) {
            selectedSection.style.display = 'block';
        }

        refreshSelectionPanel();
    }

    function refreshSelectionPanel() {
        const noSel = document.getElementById('noSelection');
        const panel = document.getElementById('selectionPanel');
        const item = elements.find(z => z.id === selectedElementId);

        if (!item) {
            noSel.style.display = 'block';
            panel.style.display = 'none';
            return;
        }

        noSel.style.display = 'none';
        panel.style.display = 'block';

        document.getElementById('propFont').value = item.font || 'Helvetica';
        document.getElementById('propFontSize').value = item.font_pt || 12;
        document.getElementById('propBold').checked = !!item.bold;
	document.getElementById('propMultiQso').checked = !!item.multi_qso;
	const multiQsoCheckbox = document.getElementById('propMultiQso');
	multiQsoCheckbox.disabled = (item.type === 'text');
	if (item.type === 'text') {
	    multiQsoCheckbox.checked = false;
	}
    }

    stage.addEventListener('click', () => {
        selectedElementId = null;
        document.querySelectorAll('.placed').forEach(el => el.classList.remove('selected'));
        refreshSelectionPanel();
    });

    document.querySelectorAll('.field').forEach(f => {
        f.addEventListener('click', () => {
            makeElem('field', f.dataset.field, 40, 40);
        });
    });

    document.getElementById('btnApplyProps').addEventListener('click', () => {
        const item = elements.find(z => z.id === selectedElementId);
        if (!item) return;

        item.font = document.getElementById('propFont').value;
        item.font_pt = parseInt(document.getElementById('propFontSize').value || '12', 10);
        item.bold = document.getElementById('propBold').checked;
	item.multi_qso = document.getElementById('propMultiQso').checked;

        const dom = [...stage.querySelectorAll('.placed')].find(d => d.dataset.id === selectedElementId);
        if (dom) {
            dom.style.fontFamily = item.font;
            dom.style.fontSize = item.font_pt + 'px';
            dom.style.fontWeight = item.bold ? '700' : '600';
        }
    });

    document.getElementById('btnAddText').addEventListener('click', () => {
        const txt = prompt('Enter custom text:', 'Comments:');
        if (txt === null) return;
        makeElem('text', txt, 60, 60);
    });
    function updateStageGrid() {
        if (isMetric) {
            // 5 mm grid
            const pxPerMmX = STAGE_W_PX / labelWidthRaw;
            const pxPerMmY = STAGE_H_PX / labelHeightRaw;
            stage.style.backgroundSize = `${pxPerMmX * 5}px ${pxPerMmY * 5}px`;
        } else {
            // 1/4 inch grid
            const pxPerInX = STAGE_W_PX / W_IN;
            const pxPerInY = STAGE_H_PX / H_IN;
            stage.style.backgroundSize = `${pxPerInX / 4}px ${pxPerInY / 4}px`;
        }
    }
    function drawRulers() {
        const top = document.getElementById('rulerTop');
        const left = document.getElementById('rulerLeft');
   
        top.innerHTML = '';
        left.innerHTML = '';
  
        if (isMetric) {
            const pxPerMmX = STAGE_W_PX / labelWidthRaw;
            const pxPerMmY = STAGE_H_PX / labelHeightRaw;
    
            // top ruler: major tick every 10 mm, minor every 5 mm
            for (let mm = 0; mm <= Math.ceil(labelWidthRaw); mm += 5) {
                const x = mm * pxPerMmX;

                const tick = document.createElement('div');
                tick.style.position = 'absolute';
                tick.style.left = `${x}px`;
                tick.style.bottom = '0';
                tick.style.width = '1px';
                tick.style.background = '#666';
                tick.style.height = (mm % 10 === 0) ? '18px' : '10px';
                top.appendChild(tick);

                if (mm % 10 === 0) {
                    const label = document.createElement('div');
                    label.style.position = 'absolute';
                    label.style.left = `${x + 3}px`;
                    label.style.top = '2px';
                    label.style.fontSize = '11px';
                    label.style.color = '#111111';
                    label.style.fontWeight = '600';
                    label.textContent = `${mm}`;
                    top.appendChild(label);
                }
            }

            // left ruler: major tick every 10 mm, minor every 5 mm
            for (let mm = 0; mm <= Math.ceil(labelHeightRaw); mm += 5) {
                const y = mm * pxPerMmY;

                const tick = document.createElement('div');
                tick.style.position = 'absolute';
                tick.style.top = `${y}px`;
                tick.style.right = '0';
                tick.style.height = '1px';
                tick.style.background = '#666';
                tick.style.width = (mm % 10 === 0) ? '18px' : '10px';
                left.appendChild(tick);
    
                if (mm % 10 === 0) {
                    const label = document.createElement('div');
                    label.style.position = 'absolute';
                    label.style.right = '20px';
                    label.style.top = `${y - 6}px`;
                    label.style.fontSize = '11px';
                    label.style.color = '#111111';
                    label.style.fontWeight = '600';
                    label.textContent = `${mm}`;
                    left.appendChild(label);
                }
            }
        } else {
            const pxPerInX = STAGE_W_PX / W_IN;
            const pxPerInY = STAGE_H_PX / H_IN;
 
            // top ruler: major tick every 1 inch, minor every 1/4 inch
            for (let q = 0; q <= Math.ceil(W_IN * 4); q++) {
                const x = q * (pxPerInX / 4);
 
                const tick = document.createElement('div');
                tick.style.position = 'absolute';
                tick.style.left = `${x}px`;
                tick.style.bottom = '0';
                tick.style.width = '1px';
                tick.style.background = '#666';
                tick.style.height = (q % 4 === 0) ? '18px' : '10px';
                top.appendChild(tick);

                if (q % 4 === 0) {
                    const label = document.createElement('div');
                    label.style.position = 'absolute';
                    label.style.left = `${x + 3}px`;
                    label.style.top = '2px';
                    label.style.fontSize = '11px';
                    label.style.color = '#111111';
                    label.style.fontWeight = '600';
                    label.textContent = `${q / 4}`;
                    top.appendChild(label);
                }
            }

            // left ruler: major tick every 1 inch, minor every 1/4 inch
            for (let q = 0; q <= Math.ceil(H_IN * 4); q++) {
                const y = q * (pxPerInY / 4);
 
                const tick = document.createElement('div');
                tick.style.position = 'absolute';
                tick.style.top = `${y}px`;
                tick.style.right = '0';
                tick.style.height = '1px';
                tick.style.background = '#666';
                tick.style.width = (q % 4 === 0) ? '18px' : '10px';
                left.appendChild(tick);

                if (q % 4 === 0) {
                    const label = document.createElement('div');
                    label.style.position = 'absolute';
                    label.style.right = '20px';
                    label.style.top = `${y - 6}px`;
                    label.style.fontSize = '11px';
                    label.style.color = '#111111';
                    label.style.fontWeight = '600';
                    label.textContent = `${q / 4}`;
                    left.appendChild(label);
                }
            }
        }
    }
    function buildLayout() {
        return {
            version: 1,
            canvas: {
                width_in: W_IN,
                height_in: H_IN
            },
            elements: elements
        };
    }

    function loadExistingLayout() {
        if (!existingLayout || !existingLayout.elements || !Array.isArray(existingLayout.elements)) {
            return;
        }

        existingLayout.elements.forEach(item => {
            const x = inToPxX(item.x_in || 0);
            const y = inToPxY(item.y_in || 0);

            if (item.type === 'field') {
                makeElem('field', item.field, x, y, item);
            } else if (item.type === 'text') {
                makeElem('text', item.text, x, y, item);
            }
        });
    }

    document.getElementById('designerSaveForm').addEventListener('submit', function () {
        document.getElementById('visual_layout_json').value = JSON.stringify(buildLayout(), null, 2);
    });

    const bgUpload = document.getElementById('bgUpload');
    const bgToggle = document.getElementById('bgToggle');
    const bgOpacity = document.getElementById('bgOpacity');
    const bgClear = document.getElementById('bgClear');
    const stageBg = document.getElementById('stageBg');

    if (bgUpload && stageBg) {
        bgUpload.addEventListener('change', function () {
            const file = this.files && this.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                stageBg.style.backgroundImage = `url('${e.target.result}')`;
                stageBg.style.display = bgToggle.checked ? 'block' : 'none';
            };
            reader.readAsDataURL(file);
        });
    }

    if (bgToggle && stageBg) {
        bgToggle.addEventListener('change', function () {
            stageBg.style.display = this.checked ? 'block' : 'none';
        });
    }

    if (bgOpacity && stageBg) {
        bgOpacity.addEventListener('input', function () {
            stageBg.style.opacity = (parseInt(this.value, 10) / 100).toString();
        });
    }

    if (bgClear && stageBg && bgUpload) {
        bgClear.addEventListener('click', function () {
            stageBg.style.backgroundImage = '';
            bgUpload.value = '';
        });
    }

    document.querySelectorAll('.designer-toggle').forEach(header => {
        header.addEventListener('click', function() {
            const targetId = this.dataset.target;
            const body = document.getElementById(targetId);
            if (!body) return;

            body.style.display = (body.style.display === 'none') ? 'block' : 'none';
        });
    });
    
    updateStageGrid();
    drawRulers();
    loadExistingLayout();
});
</script>

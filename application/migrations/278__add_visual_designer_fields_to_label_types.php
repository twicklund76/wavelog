<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_visual_designer_fields_to_label_types extends CI_Migration {

    public function up()
    {
        $fields = array(
            'use_visual_designer' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'null' => FALSE,
            ),
            'visual_layout_json' => array(
                'type' => 'MEDIUMTEXT',
                'null' => TRUE,
            ),
        );

        $this->dbforge->add_column('label_types', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('label_types', 'visual_layout_json');
        $this->dbforge->drop_column('label_types', 'use_visual_designer');
    }
}

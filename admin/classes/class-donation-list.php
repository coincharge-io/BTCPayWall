<?php
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}
class Donation_List_Table extends WP_List_Table
{
    public $items;

    /**
     * Get a list of columns.
     *
     * @return array
     */
    public function get_columns()
    {
        return array(
            'cb'      => '<input type="checkbox" />',
            'title'   => wp_strip_all_tags(__('Title')),
            'logo'    => wp_strip_all_tags(__('Logo')),
            'description'  => wp_strip_all_tags(__('Description')),
            'tipping-text'    => wp_strip_all_tags(__('Tipping text')),
            'button-text'    => wp_strip_all_tags(__('Button text')),
            'shortcode'      => wp_strip_all_tags(__('Shortcode')),
        );
    }

    /**
     * Prepares the list of items for displaying.
     */
    /* public function prepare_items()
    {
        $columns  = $this->get_columns();
        $hidden   = array();
        $sortable = array();
        $primary  = 'cb';
        $this->_column_headers = array($columns, $hidden, $sortable, $primary);
    } */
    public function prepare_items()
    {

        //$this->_column_headers = $this->get_column_info();
        $this->_column_headers = array($this->get_columns(), array(), array(), 'cb');
        $this->process_bulk_action();

        $per_page = $this->get_items_per_page('customers_per_page', 5);
        $current_page = $this->get_pagenum();
        $total_items = self::record_count();

        $this->set_pagination_args([
            'total_items' => $total_items,
            'per_page' => $per_page
        ]);

        $this->items = self::get_shortcodes($per_page, $current_page);
    }
    /**
     * Returns the count of shortcodes in the database.
     *
     * @return null|string
     */
    public static function record_count()
    {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM {$wpdb->prefix}btc_forms";

        return $wpdb->get_var($sql);
    }

    /**
     * Retrieve shortcode’s data from the database
     *
     * @param int $per_page
     * @param int $page_number
     *
     * @return mixed
     */
    public static function get_shortcodes($per_page = 5, $page_number = 1)
    {

        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}btc_forms";

        if (!empty($_REQUEST['orderby'])) {
            $sql .= ' ORDER BY ' . esc_sql($_REQUEST['orderby']);
            $sql .= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
        }

        $sql .= " LIMIT $per_page";

        $sql .= ' OFFSET ' . ($page_number - 1) * $per_page;

        $result = $wpdb->get_results($sql, 'ARRAY_A');

        return $result;
    }
    /**
     * Delete a shortcode record.
     *
     * @param int $id shortcode ID
     */
    /* public static function delete_shortcode($id)
    {
        global $wpdb;

        $wpdb->delete(
            "{$wpdb->prefix}btc_forms",
            ['id' => $id],
            ['%d']
        );
    } */
    public function process_bulk_action()
    {

        // security check!
        if (isset($_POST['_wpnonce']) && !empty($_POST['_wpnonce'])) {

            $nonce  = filter_input(INPUT_POST, '_wpnonce', FILTER_SANITIZE_STRING);
            $action = 'bulk-' . $this->_args['plural'];

            if (!wp_verify_nonce($nonce, $action))
                wp_die('Nope! Security check failed!');
        }

        $action = $this->current_action();

        switch ($action) {

            case 'delete':
                global $wpdb;
                $table_name = $wpdb->prefix . 'btc_forms';
                $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
                //var_dump($ids);
                if (is_array($ids)) $ids = implode(',', $ids);
                if (!empty($ids)) {
                    $wpdb->query("DELETE FROM $table_name WHERE id IN($ids)");
                }

                wp_die('You have deleted this succesfully');
                break;

            case 'edit':
                wp_die('This is the edit page.');
                break;

            default:
                // do nothing or something else
                return;
                break;
        }

        return;
    }
    protected function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="%1$s[]" value="%2$s" />',
            $this->_args['singular'],
            $item['id']
        );
    }
    protected function column_logo($item)
    {
        return sprintf(
            '<img width=60 height=60 src="%s" />',
            $item['logo']
        );
    }


    protected function get_bulk_actions()
    {
        $actions = array(
            'delete'    => 'Delete',
            'trash'    => 'Move To Trash'
        );
        return $actions;
    }

    /* protected function column_title($item)
    {
        $item_json = json_decode(json_encode($item), true);
        $actions = array(
            'edit' => sprintf('<a href="?page=%s&action=%s&id=%s">Edit</a>', $_REQUEST['page'], 'edit', $item_json['id']),
            'delete' => sprintf('<a href="?page=%s&action=%s&id=%s">Delete</a>', $_REQUEST['page'], 'delete', $item_json['id']),
        );
        return '<em>' . sprintf('%s %s', $item_json['title_text'], $this->row_actions($actions)) . '</em>';
    } */
    protected function column_title($item)
    {
        /* $page = wp_unslash($_REQUEST['page']); // WPCS: Input var ok.

        // Build edit row action.
        $edit_query_args = array(
            'page'   => $page,
            'action' => 'edit',
            'shortcode'  => $item['id'],
        );

        $actions['edit'] = sprintf(
            '<a href="%1$s">%2$s</a>',
            esc_url(wp_nonce_url(add_query_arg($edit_query_args, 'admin.php'), 'editshortcode_' . $item['id'])),
            _x('Edit', 'List table row action', 'wp-list-table')
        );

        // Build delete row action.
        $delete_query_args = array(
            'page'   => $page,
            'action' => 'delete',
            'shortcode'  => $item['id'],
        );

        $actions['delete'] = sprintf(
            '<a href="%1$s">%2$s</a>',
            esc_url(wp_nonce_url(add_query_arg($delete_query_args, 'admin.php'), 'deleteshortcode_' . $item['id'])),
            _x('Delete', 'List table row action', 'wp-list-table')
        );

        // Return the title contents.
        return '<em>' . sprintf('%s %s', $item['title_text'], $this->row_actions($actions)) . '</em>'; */
        $item_json = json_decode(json_encode($item), true);
        $actions = array(
            'edit' => sprintf('<a href="?page=%s&action=%s&id=%s">Edit</a>', $_REQUEST['page'], 'edit', $item_json['id']),
            'delete' => sprintf('<a href="?page=%s&action=%s&id=%s">Delete</a>', $_REQUEST['page'], 'delete', $item_json['id']),
        );
        return '<em>' . sprintf('%s %s', $item_json['name'], $this->row_actions($actions)) . '</em>';
    }
    /**
     * Generates content for a single row of the table.
     * 
     * @param object $item The current item.
     * @param string $column_name The current column name.
     */
    protected function column_default($item, $column_name)
    {
        $shortcode = BTCPayWall_Admin::outputShortcodeAttributes(BTCPayWall_Admin::extractName($item['dimension'])['name'], $item['id']);
        switch ($column_name) {
            case 'cb':
                return esc_html($item['cb']);
            case 'title':
                return esc_html($item['title']);
            case 'logo':
                return esc_html($item['logo']);
            case 'description':
                return esc_html($item['description_text']);
            case 'tipping-text':
                return esc_html($item['tipping_text']);
            case 'button-text':
                return esc_html($item['button_text']);
            case 'shortcode':
                return esc_html($shortcode);
            default:
                return 'Unknown';
        }
    }

    /**
     * Generates custom table navigation to prevent conflicting nonces.
     * 
     * @param string $which The location of the bulk actions: 'top' or 'bottom'.
     */
    protected function display_tablenav($which)
    {
?>
        <div class="tablenav <?php echo esc_attr($which); ?>">

            <div class="alignleft actions bulkactions">
                <?php $this->bulk_actions($which); ?>
            </div>
            <?php
            $this->extra_tablenav($which);
            $this->pagination($which);

            ?>

            <br class="clear" />
        </div>
    <?php
    }

    /**
     * Generates content for a single row of the table.
     *
     * @param object $item The current item.
     */
    public function single_row($item)
    {
        echo '<tr>';
        $this->single_row_columns($item);
        echo '</tr>';
    }

    public function display()
    {
        $singular = $this->_args['singular'];

        $this->display_tablenav('top');

        $this->screen->render_screen_reader_content('heading_list');
    ?>
        <table class="wp-list-table <?php echo implode(' ', $this->get_table_classes()); ?>">
            <thead>
                <tr>
                    <?php $this->print_column_headers(); ?>
                </tr>
            </thead>

            <tbody id="the-list" <?php
                                    if ($singular) {
                                        echo " data-wp-lists='list:$singular'";
                                    }
                                    ?>>
                <?php $this->display_rows_or_placeholder(); ?>
            </tbody>



        </table>
<?php
    }
}
new Donation_List_Table();

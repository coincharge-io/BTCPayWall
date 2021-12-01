<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}
class Tipping_Forms_Table extends WP_List_Table
{
    public $items;
    public function __construct()
    {
        parent::__construct([
            'singular' => __('Shortcode', 'sd'), //singular name of the listed records, this will show in screen options
            'plural'   => __('Shortcodes', 'sd'), //plural name of the listed records, this will show in screen options
            'ajax'     => false //does this table support ajax?
        ]);
    }
    /**
     * Get a list of columns.
     *
     * @return array
     */
    public function get_columns()
    {
        return array(
            'cb'      => '<input type="checkbox" />',
            'template' => (__('Template')),
            'title'   => (__('Title')),
            'logo'    => (__('Logo')),
            'description'  => (__('Description')),
            'tipping-text'    => (__('Tipping text')),
            'button-text'    => (__('Button text')),
            'shortcode'      => (__('Shortcode')),
        );
    }

    /**
     * Prepares the list of items for displaying.
     */

    public function prepare_items()
    {

        $this->_column_headers = array($this->get_columns(), array(), array(), 'cb');
        $this->process_bulk_action();

        $per_page = $this->get_items_per_page('shortcodes_per_page', 5);
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

        $shortcodes = new BTCPayWall_Tipping_Form();
        return $shortcodes->form_count();
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
        $shortcodes = new BTCPayWall_Tipping_Form();

        return $shortcodes->get_forms($per_page, $page_number);
    }
    /**
     * Delete a shortcode record.
     *
     * @param int $id shortcode ID
     */
    public static function delete_shortcode($id)
    {
        $shortcodes = new BTCPayWall_Tipping_Form();
        return $shortcodes->delete($id);
    }

    public function process_bulk_action()
    {
        if ('delete' === $this->current_action()) {

            $nonce = esc_attr($_REQUEST['_wpnonce']);
            if (isset($_POST['_wpnonce']) && !empty($_POST['_wpnonce'])) {

                $nonce  = filter_input(INPUT_POST, '_wpnonce', FILTER_SANITIZE_STRING);
                $action = 'bulk-' . $this->_args['plural'];

                if (!wp_verify_nonce($nonce, $action))
                    wp_die('Nope! Security check failed!');
            } else {
                self::delete_shortcode(absint($_GET['id']));
            }
        }

        if ((isset($_POST['action']) && $_POST['action'] == 'bulk-delete')
            || (isset($_POST['action2']) && $_POST['action2'] == 'bulk-delete')
        ) {

            $delete_ids = esc_sql($_POST['bulk-delete']);

            foreach ($delete_ids as $id) {
                self::delete_shortcode($id);
            }
        }
    }

    protected function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="bulk-delete[]" value="%1$s" />',
            $item['id']
        );
    }
    protected function column_logo($item)
    {
        $logo = wp_get_attachment_image_src($item['logo']) ? wp_get_attachment_image_src($item['logo'])[0] : $item['logo'];
        return sprintf(
            '<img width=60 height=60 src="%s" />',
            $logo
        );
    }


    protected function get_bulk_actions()
    {
        $actions = array(
            'bulk-delete'    => 'Delete',
        );
        return $actions;
    }



    protected function column_template($item)
    {

        $page = wp_unslash($_REQUEST['page']);
        $delete_query_args = array(
            'page'   => $page,
            'action' => 'delete',
            'id'  => $item['id'],
        );
        $edit_query_args = array(
            'page'   => 'btcpw_edit',
            'action' => 'edit',
            'id'  => $item['id'],
        );

        $actions['edit'] = sprintf(
            '<a href="%1$s">%2$s</a>',
            esc_url(wp_nonce_url(add_query_arg($edit_query_args, 'admin.php'), 'id' . $item['id'])),
            _x('Edit', 'List table row action', 'wp-list-table')
        );
        $actions['delete'] = sprintf(
            '<a href="%1$s">%2$s</a>',
            esc_url(wp_nonce_url(add_query_arg($delete_query_args, 'admin.php'), 'id' . $item['id'])),
            _x('Delete', 'List table row action', 'wp-list-table')
        );
        $item_json = json_decode(json_encode($item), true);

        return '<em>' . sprintf('%s %s', $item_json['form_name'], $this->row_actions($actions)) . '</em>';
    }
    /**
     * Generates content for a single row of the table.
     * 
     * @param object $item The current item.
     * @param string $column_name The current column name.
     */
    protected function column_default($item, $column_name)
    {
        $shortcode = outputShortcodeAttributes(extractName($item['dimension'])['name'], $item['id']);
        switch ($column_name) {
            case 'cb':
                return esc_html($item['cb']);
            case 'template':
                return esc_html($item['form_name']);
            case 'title':
                return esc_html($item['title_text']);
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
new Tipping_Forms_Table();
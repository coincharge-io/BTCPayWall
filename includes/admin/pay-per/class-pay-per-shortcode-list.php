<?php

/**
 * Pay_Per_Shortcode_List
 *
 * @package    BTCPayWall
 * @subpackage Admin/Pay_Per_Shortcode_List
 * @copyright  Copyright (c) 2022, Coincharge
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since      1.0.9
 */

use Pay_Per_Shortcode_List as GlobalPay_Per_Shortcode_List;

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
if (!class_exists('WP_List_Table')) {
    include_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Pay_Per_Shortcode_List extends WP_List_Table
{
    public $items;
    public function __construct()
    {
        parent::__construct(
            [
                'singular' => __('Shortcode', 'btcpaywall'),
                'plural'   => __('Shortcodes', 'btcpaywall'),
                'ajax'     => false
            ]
        );
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
            'name' => (__('Name', 'btcpaywall')),
            'type' => (__('Type', 'btcpaywall')),
            'header_text'   => (__('Title', 'btcpaywall')),
            'info_text'    => (__('Price information text', 'btcpaywall')),
            'button_text'    => (__('Button text', 'btcpaywall')),
            'shortcode'      => (__('Shortcode', 'btcpaywall')),
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

        $this->set_pagination_args(
            [
                'total_items' => $total_items,
                'per_page' => $per_page
            ]
        );
        $this->items = self::get_shortcodes($per_page, $current_page);
    }
    /**
     * Returns the count of shortcodes in the database.
     *
     * @return null|string
     */
    public static function record_count()
    {
        $shortcodes = new BTCPayWall_Pay_Per_Shortcode();
        return $shortcodes->shortcode_count();
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
        $shortcodes = new BTCPayWall_Pay_Per_Shortcode();

        return $shortcodes->get_shortcodes($per_page, $page_number);
    }
    /**
     * Retrieve all shortcodes from the database
     *
     * @return mixed
     */
    public static function get_all_shortcodes()
    {
        $shortcodes = new BTCPayWall_Pay_Per_Shortcode();

        return $shortcodes->get_all_shortcodes();
    }
    /**
     * Delete a shortcode record.
     *
     * @param int $id shortcode ID
     */
    public static function delete_shortcode($id)
    {
        $shortcodes = new BTCPayWall_Pay_Per_Shortcode();
        return $shortcodes->delete($id);
    }

    public function process_bulk_action()
    {
        if ('delete' === $this->current_action()) {
            $nonce = esc_attr($_REQUEST['_wpnonce']);
            if (!wp_verify_nonce($nonce, 'delete')) {
                wp_die('Nope! Security check failed!');
            }

            self::delete_shortcode(absint($_GET['id']));
        }

        if ((isset($_POST['action']) && sanitize_text_field($_POST['action']) == 'bulk-delete')
            || (isset($_POST['action2']) && sanitize_text_field($_POST['action2']) == 'bulk-delete')
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

    protected function column_shortcode($item)
    {
        $shortcode = (new BTCPayWall_Pay_Per_Shortcode($item['id']))->shortcode();

        printf(
            '<div class="misc-pub-section"><button type="button" class="button hint-tooltip hint--top js-btcpaywall-shortcode-button" aria-label="%1$s" data-btcpaywall-shortcode="%2$s"><span class="dashicons dashicons-admin-page"></span> %3$s</button></div>',
            esc_attr($shortcode),
            esc_attr($shortcode),
            esc_html__('Copy Shortcode', 'give')
        );
    }
    protected function get_bulk_actions()
    {
        $actions = array(
            'bulk-delete'    => 'Delete'
        );
        return $actions;
    }


    protected function column_name($item)
    {
        $page = wp_unslash(sanitize_text_field($_REQUEST['page']));
        $delete_query_args = array(
            'page' => 'btcpw_pay_per_shortcode_list',
            'action' => 'delete',
            'id'  => $item['id'],
        );
        $edit_query_args = array(
            'page'   => 'btcpw_pay_per_shortcode',
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
            esc_url(wp_nonce_url(add_query_arg($delete_query_args, 'admin.php'), 'delete')),
            _x('Delete', 'List table row action', 'wp-list-table')
        );
        $item_json = json_decode(json_encode($item), true);

        return '<em>' . sprintf('%s %s', $item_json['name'], $this->row_actions($actions)) . '</em>';
    }
    /**
     * Generates content for a single row of the table.
     *
     * @param object $item        The current item.
     * @param string $column_name The current column name.
     */
    protected function column_default($item, $column_name)
    {
        $shortcode = (new BTCPayWall_Pay_Per_Shortcode($item['id']))->shortcode();

        switch ($column_name) {
            case 'cb':
                return esc_html($item['cb']);
            case 'name':
                return esc_html($item['name']);
            case 'type':
                return esc_html($item['type']);
            case 'header_text':
                return esc_html($item['header_text']);
            case 'info_text':
                return esc_html($item['info_text']);
            case 'button_text':
                return esc_html($item['button_text']);
            case 'shortcode':
                return esc_html($shortcode);
            default:
                return '';
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
    private function sort_data($a, $b)
    {
        // Set defaults
        $orderby = 'title';
        $order = 'asc';

        // If orderby is set, use this as the sort column
        if (!empty($_GET['orderby'])) {
            $orderby = $_GET['orderby'];
        }

        // If order is set use this as the order
        if (!empty($_GET['order'])) {
            $order = $_GET['order'];
        }


        $result = strcmp($a[$orderby], $b[$orderby]);

        if ($order === 'asc') {
            return $result;
        }

        return -$result;
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
class Pay_Per_Shortcode
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'btcpaywall_add_submenu'], 99);

        add_filter('set-screen-option', [__CLASS__, 'set_screen'], 10, 3);
    }
    public function after_load_wordpress()
    {
        new Pay_Per_Shortcode_List();
    }
    public function btcpaywall_add_submenu()
    {
        $hook = add_submenu_page('btcpw_general_settings', __('Pay-per -> All templates', 'btcpaywall'), __('Pay-per -> All templates', 'btcpaywall'), 'manage_options', 'btcpw_pay_per_shortcode_list', array($this, 'btcpaywall_render_pay_per_shortcode_list'), 2);
        add_action("load-$hook", [$this, 'screen_option']);
    }
    public function screen_option()
    {
        $option = 'per_page';
        $args   = [
            'label'   => 'Shortcodes',
            'default' => 5,
            'option'  => 'shortcodes_per_page'
        ];

        add_screen_option($option, $args);

        $this->shortcodes = new Pay_Per_Shortcode_List();
    }
    public function btcpaywall_render_pay_per_shortcode_list()
    {
        $shortcodes = new Pay_Per_Shortcode_List();
        $shortcodes->prepare_items();
    ?>
        <div class="wrap">
            <h2><?php echo esc_html__('Pay-per shortcodes', 'btcpaywall'); ?></h2>
            <div>
                <div>
                    <div>
                        <div>
                            <form method="post">
                                <?php
                                $shortcodes->prepare_items();
                                $shortcodes->display(); ?>
                            </form>
                        </div>
                    </div>
                </div>
                <br class="clear">
            </div>
        </div>
<?php
    }
}
//add_action('plugins_loaded', function () {
new Pay_Per_Shortcode();
//});
